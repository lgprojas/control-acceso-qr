<?php
/**
 * This file is part of PHPWord - A pure PHP library for reading and writing
 * word processing documents.
 *
 * PHPWord is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPWord/contributors.
 *
 * @link        https://github.com/PHPOffice/PHPWord
 * @copyright   2010-2014 PHPWord contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpWord;

use PhpOffice\PhpWord\Exception\CopyFileException;
use PhpOffice\PhpWord\Exception\CreateTemporaryFileException;
use PhpOffice\PhpWord\Exception\Exception;
use PhpOffice\PhpWord\Shared\String;
use PhpOffice\PhpWord\Shared\ZipArchive;

class TemplateProcessor
{
    /**
     * ZipArchive object.
     *
     * @var mixed
     */
    private $zipClass;

    /**
     * @var string Temporary document filename (with path).
     */
    private $temporaryDocumentFilename;

    /**
     * Content of main document part (in XML format) of the temporary document.
     *
     * @var string
     */
    private $temporaryDocumentMainPart;

    /**
     * Content of headers (in XML format) of the temporary document.
     *
     * @var string[]
     */
    private $temporaryDocumentHeaders = array();

    /**
     * Content of footers (in XML format) of the temporary document.
     *
     * @var string[]
     */
    private $temporaryDocumentFooters = array();

    /**
     * @since 0.12.0 Throws CreateTemporaryFileException and CopyFileException instead of Exception.
     *
     * @param string $documentTemplate The fully qualified template filename.
     * @throws \PhpOffice\PhpWord\Exception\CreateTemporaryFileException
     * @throws \PhpOffice\PhpWord\Exception\CopyFileException
     */
    public function __construct($documentTemplate)
    {
        // Temporary document filename initialization
        $this->temporaryDocumentFilename = tempnam(Settings::getTempDir(), 'PhpWord');
        if (false === $this->temporaryDocumentFilename) {
            throw new CreateTemporaryFileException();
        }

        // Template file cloning
        if (false === copy($documentTemplate, $this->temporaryDocumentFilename)) {
            throw new CopyFileException($documentTemplate, $this->temporaryDocumentFilename);
        }

        // Temporary document content extraction
        $this->zipClass = new ZipArchive();
        $this->zipClass->open($this->temporaryDocumentFilename);
        $index = 1;
        while ($this->zipClass->locateName($this->getHeaderName($index)) !== false) {
            $this->temporaryDocumentHeaders[$index] = $this->zipClass->getFromName($this->getHeaderName($index));
            $index++;
        }
        $index = 1;
        while ($this->zipClass->locateName($this->getFooterName($index)) !== false) {
            $this->temporaryDocumentFooters[$index] = $this->zipClass->getFromName($this->getFooterName($index));
            $index++;
        }
        $this->temporaryDocumentMainPart = $this->zipClass->getFromName('word/document.xml');
        
        $this->_countRels=100;
    }

    /**
     * Applies XSL style sheet to template's parts.
     *
     * @param \DOMDocument $xslDOMDocument
     * @param array $xslOptions
     * @param string $xslOptionsURI
     * @return void
     * @throws \PhpOffice\PhpWord\Exception\Exception
     */
    public function applyXslStyleSheet($xslDOMDocument, $xslOptions = array(), $xslOptionsURI = '')
    {
        $xsltProcessor = new \XSLTProcessor();

        $xsltProcessor->importStylesheet($xslDOMDocument);

        if (false === $xsltProcessor->setParameter($xslOptionsURI, $xslOptions)) {
            throw new Exception('Could not set values for the given XSL style sheet parameters.');
        }

        $xmlDOMDocument = new \DOMDocument();
        if (false === $xmlDOMDocument->loadXML($this->temporaryDocumentMainPart)) {
            throw new Exception('Could not load XML from the given template.');
        }

        $xmlTransformed = $xsltProcessor->transformToXml($xmlDOMDocument);
        if (false === $xmlTransformed) {
            throw new Exception('Could not transform the given XML document.');
        }

        $this->temporaryDocumentMainPart = $xmlTransformed;
    }

    /**
     * @param mixed $search
     * @param mixed $replace
     * @param integer $limit
     * @return void
     */
    public function setValue($search, $replace, $limit = -1)
    {
        foreach ($this->temporaryDocumentHeaders as $index => $headerXML) {
            $this->temporaryDocumentHeaders[$index] = $this->setValueForPart($this->temporaryDocumentHeaders[$index], $search, $replace, $limit);
        }

        $this->temporaryDocumentMainPart = $this->setValueForPart($this->temporaryDocumentMainPart, $search, $replace, $limit);

        foreach ($this->temporaryDocumentFooters as $index => $headerXML) {
            $this->temporaryDocumentFooters[$index] = $this->setValueForPart($this->temporaryDocumentFooters[$index], $search, $replace, $limit);
        }
    }

    /**
     * Returns array of all variables in template.
     *
     * @return string[]
     */
    public function getVariables()
    {
        $variables = $this->getVariablesForPart($this->temporaryDocumentMainPart);

        foreach ($this->temporaryDocumentHeaders as $headerXML) {
            $variables = array_merge($variables, $this->getVariablesForPart($headerXML));
        }

        foreach ($this->temporaryDocumentFooters as $footerXML) {
            $variables = array_merge($variables, $this->getVariablesForPart($footerXML));
        }

        return array_unique($variables);
    }

    /**
     * Clone a table row in a template document.
     *
     * @param string $search
     * @param integer $numberOfClones
     * @return void
     * @throws \PhpOffice\PhpWord\Exception\Exception
     */
    public function cloneRow($search, $numberOfClones)
    {
        if (substr($search, 0, 2) !== '${' && substr($search, -1) !== '}') {
            $search = '${' . $search . '}';
        }

        $tagPos = strpos($this->temporaryDocumentMainPart, $search);
        if (!$tagPos) {
            throw new Exception("Can not clone row, template variable not found or variable contains markup.");
        }

        $rowStart = $this->findRowStart($tagPos);
        $rowEnd = $this->findRowEnd($tagPos);
        $xmlRow = $this->getSlice($rowStart, $rowEnd);

        // Check if there's a cell spanning multiple rows.
        if (preg_match('#<w:vMerge w:val="restart"/>#', $xmlRow)) {
            // $extraRowStart = $rowEnd;
            $extraRowEnd = $rowEnd;
            while (true) {
                $extraRowStart = $this->findRowStart($extraRowEnd + 1);
                $extraRowEnd = $this->findRowEnd($extraRowEnd + 1);

                // If extraRowEnd is lower then 7, there was no next row found.
                if ($extraRowEnd < 7) {
                    break;
                }

                // If tmpXmlRow doesn't contain continue, this row is no longer part of the spanned row.
                $tmpXmlRow = $this->getSlice($extraRowStart, $extraRowEnd);
                if (!preg_match('#<w:vMerge/>#', $tmpXmlRow) &&
                    !preg_match('#<w:vMerge w:val="continue" />#', $tmpXmlRow)) {
                    break;
                }
                // This row was a spanned row, update $rowEnd and search for the next row.
                $rowEnd = $extraRowEnd;
            }
            $xmlRow = $this->getSlice($rowStart, $rowEnd);
        }

        $result = $this->getSlice(0, $rowStart);
        for ($i = 1; $i <= $numberOfClones; $i++) {
            $result .= preg_replace('/\$\{(.*?)\}/', '\${\\1#' . $i . '}', $xmlRow);
        }
        $result .= $this->getSlice($rowEnd);

        $this->temporaryDocumentMainPart = $result;
    }

    /**
     * Clone a block.
     *
     * @param string $blockname
     * @param integer $clones
     * @param boolean $replace
     * @return string|null
     */
    public function cloneBlock($blockname, $clones = 1, $replace = true)
    {
        $xmlBlock = null;
        preg_match(
            '/(<\?xml.*)(<w:p.*>\${' . $blockname . '}<\/w:.*?p>)(.*)(<w:p.*\${\/' . $blockname . '}<\/w:.*?p>)/is',
            $this->temporaryDocumentMainPart,
            $matches
        );

        if (isset($matches[3])) {
            $xmlBlock = $matches[3];
            $cloned = array();
            for ($i = 1; $i <= $clones; $i++) {
                $cloned[] = $xmlBlock;
            }

            if ($replace) {
                $this->temporaryDocumentMainPart = str_replace(
                    $matches[2] . $matches[3] . $matches[4],
                    implode('', $cloned),
                    $this->temporaryDocumentMainPart
                );
            }
        }

        return $xmlBlock;
    }

    /**
     * Replace a block.
     *
     * @param string $blockname
     * @param string $replacement
     * @return void
     */
    public function replaceBlock($blockname, $replacement)
    {
        preg_match(
            '/(<\?xml.*)(<w:p.*>\${' . $blockname . '}<\/w:.*?p>)(.*)(<w:p.*\${\/' . $blockname . '}<\/w:.*?p>)/is',
            $this->temporaryDocumentMainPart,
            $matches
        );

        if (isset($matches[3])) {
            $this->temporaryDocumentMainPart = str_replace(
                $matches[2] . $matches[3] . $matches[4],
                $replacement,
                $this->temporaryDocumentMainPart
            );
        }
    }

    /**
     * Delete a block of text.
     *
     * @param string $blockname
     * @return void
     */
    public function deleteBlock($blockname)
    {
        $this->replaceBlock($blockname, '');
    }

    /**
     * Saves the result document.
     *
     * @return string
     * @throws \PhpOffice\PhpWord\Exception\Exception
     */
    public function save()
    {
        foreach ($this->temporaryDocumentHeaders as $index => $headerXML) {
            $this->zipClass->addFromString($this->getHeaderName($index), $this->temporaryDocumentHeaders[$index]);
        }

        $this->zipClass->addFromString('word/document.xml', $this->temporaryDocumentMainPart);
        
if($this->_rels!="")
{
    $this->zipClass->addFromString('word/_rels/document.xml.rels', $this->_rels);
}
if($this->_types!="")
{
    $this->zipClass->addFromString('[Content_Types].xml', $this->_types);
}

        foreach ($this->temporaryDocumentFooters as $index => $headerXML) {
            $this->zipClass->addFromString($this->getFooterName($index), $this->temporaryDocumentFooters[$index]);
        }

        // Close zip file
        if (false === $this->zipClass->close()) {
            throw new Exception('Could not close zip file.');
        }

        return $this->temporaryDocumentFilename;
    }

    /**
     * Saves the result document to the user defined file.
     *
     * @since 0.8.0
     *
     * @param string $fileName
     * @return void
     */
    public function saveAs($fileName)
    {
        $tempFileName = $this->save();

        if (file_exists($fileName)) {
            unlink($fileName);
        }

        rename($tempFileName, $fileName);
    }

    /**
     * Find and replace placeholders in the given XML section.
     *
     * @param string $documentPartXML
     * @param string $search
     * @param string $replace
     * @param integer $limit
     * @return string
     */
    protected function setValueForPart($documentPartXML, $search, $replace, $limit)
    {
        $pattern = '|\$\{([^\}]+)\}|U';
        preg_match_all($pattern, $documentPartXML, $matches);
        foreach ($matches[0] as $value) {
            $valueCleaned = preg_replace('/<[^>]+>/', '', $value);
            $valueCleaned = preg_replace('/<\/[^>]+>/', '', $valueCleaned);
            $documentPartXML = str_replace($value, $valueCleaned, $documentPartXML);
        }

        if (substr($search, 0, 2) !== '${' && substr($search, -1) !== '}') {
            $search = '${' . $search . '}';
        }

        if (!String::isUTF8($replace)) {
            $replace = utf8_encode($replace);
        }

        $regExpDelim = '/';
        $escapedSearch = preg_quote($search, $regExpDelim);
        return preg_replace("{$regExpDelim}{$escapedSearch}{$regExpDelim}u", $replace, $documentPartXML, $limit);
    }

    /**
     * Find all variables in $documentPartXML.
     *
     * @param string $documentPartXML
     * @return string[]
     */
    protected function getVariablesForPart($documentPartXML)
    {
        preg_match_all('/\$\{(.*?)}/i', $documentPartXML, $matches);

        return $matches[1];
    }

    /**
     * Get the name of the footer file for $index.
     *
     * @param integer $index
     * @return string
     */
    private function getFooterName($index)
    {
        return sprintf('word/footer%d.xml', $index);
    }

    /**
     * Get the name of the header file for $index.
     *
     * @param integer $index
     * @return string
     */
    private function getHeaderName($index)
    {
        return sprintf('word/header%d.xml', $index);
    }

    /**
     * Find the start position of the nearest table row before $offset.
     *
     * @param integer $offset
     * @return integer
     * @throws \PhpOffice\PhpWord\Exception\Exception
     */
    private function findRowStart($offset)
    {
        $rowStart = strrpos($this->temporaryDocumentMainPart, '<w:tr ', ((strlen($this->temporaryDocumentMainPart) - $offset) * -1));

        if (!$rowStart) {
            $rowStart = strrpos($this->temporaryDocumentMainPart, '<w:tr>', ((strlen($this->temporaryDocumentMainPart) - $offset) * -1));
        }
        if (!$rowStart) {
            throw new Exception('Can not find the start position of the row to clone.');
        }

        return $rowStart;
    }

    /**
     * Find the end position of the nearest table row after $offset.
     *
     * @param integer $offset
     * @return integer
     */
    private function findRowEnd($offset)
    {
        return strpos($this->temporaryDocumentMainPart, '</w:tr>', $offset) + 7;
    }

    /**
     * Get a slice of a string.
     *
     * @param integer $startPosition
     * @param integer $endPosition
     * @return string
     */
    private function getSlice($startPosition, $endPosition = 0)
    {
        if (!$endPosition) {
            $endPosition = strlen($this->temporaryDocumentMainPart);
        }

        return substr($this->temporaryDocumentMainPart, $startPosition, ($endPosition - $startPosition));
    }
    
    public function setImg($strKey, $img) {
        $strKey       = '${' . $strKey . '}';
        $relationTmpl = '<Relationship Id="RID" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/image" Target="media/IMG"/>';

        $imgTmpl = '<w:drawing><wp:inline distT="0" distB="0" distL="0" distR="0" wp14:anchorId="6E59C072" wp14:editId="50C440CF"><wp:extent cx="WID" cy="HEI"/><wp:effectExtent l="0" t="0" r="12065" b="0"/><wp:docPr id="1" name="signature" descr=""/><wp:cNvGraphicFramePr><a:graphicFrameLocks xmlns:a="http://schemas.openxmlformats.org/drawingml/2006/main" noChangeAspect="1"/></wp:cNvGraphicFramePr><a:graphic xmlns:a="http://schemas.openxmlformats.org/drawingml/2006/main"><a:graphicData uri="http://schemas.openxmlformats.org/drawingml/2006/picture"><pic:pic xmlns:pic="http://schemas.openxmlformats.org/drawingml/2006/picture"><pic:nvPicPr><pic:cNvPr id="0" name="signature" descr=""/><pic:cNvPicPr><a:picLocks noChangeAspect="1" noChangeArrowheads="1"/></pic:cNvPicPr></pic:nvPicPr><pic:blipFill><a:blip r:embed="RID" cstate="print"><a:extLst><a:ext uri="{28A0092B-C50C-407E-A947-70E740481C1C}"><a14:useLocalDpi xmlns:a14="http://schemas.microsoft.com/office/drawing/2010/main" val="0"/></a:ext></a:extLst></a:blip><a:srcRect/><a:stretch><a:fillRect/></a:stretch></pic:blipFill><pic:spPr bwMode="auto"><a:xfrm><a:off x="0" y="0"/><a:ext cx="WID" cy="HEI"/></a:xfrm><a:prstGeom prst="rect"><a:avLst/></a:prstGeom><a:noFill/><a:ln><a:noFill/></a:ln></pic:spPr></pic:pic></a:graphicData></a:graphic></wp:inline></w:drawing>';

        $toAdd       = $toAddImg = $toAddType = '';
        $aSearch     = array( 'RID', 'IMG' );
        $aSearchType = array( 'IMG', 'EXT' );
        $countrels   = $this->_countRels++;
        //I'm work for jpg files, if you are working with other images types -> Write conditions here
        $imgExt  = 'jpg';
        $imgName = 'img' . $countrels . '.' . $imgExt;

        $this->zipClass->deleteName('word/media/' . $imgName);
        $this->zipClass->addFile($img['src'], 'word/media/' . $imgName);

        $typeTmpl = '<Override PartName="/word/media/' . $imgName . '" ContentType="image/EXT"/>';


        $rid = 'rId' . $countrels;
        $countrels++;

        list($w, $h) = getimagesize($img['src']);

        if(isset($img['size'])){
            $w = (int)($img['size'][0] * (3 / 100) * 376653); //px * cm * em
            $h = (int)($img['size'][1] * (3 / 100) * 376653); //px * cm * em
        }

        $toAddImg .= str_replace(array( 'RID', 'WID', 'HEI' ), array( $rid, $w, $h ), $imgTmpl);
        if(isset($img['dataImg'])){
            $toAddImg .= '<w:br/><w:t>' . $this->limpiarString($img['dataImg']) . '</w:t><w:br/>';
        }

        $aReplace  = array( $imgName, $imgExt );
        $toAddType .= str_replace($aSearchType, $aReplace, $typeTmpl);

        $aReplace = array( $rid, $imgName );
        $toAdd    .= str_replace($aSearch, $aReplace, $relationTmpl);


        $this->tempDocumentMainPart = str_replace('<w:t>' . $strKey . '</w:t>', $toAddImg, $this->tempDocumentMainPart);

        if($this->_rels == ""){
            $this->_rels  = $this->zipClass->getFromName('word/_rels/document.xml.rels');
            $this->_types = $this->zipClass->getFromName('[Content_Types].xml');
        }

        $this->_types = str_replace('</Types>', $toAddType, $this->_types) . '</Types>';
        $this->_rels  = str_replace('</Relationships>', $toAdd, $this->_rels) . '</Relationships>';
    }

function limpiarString($str) {
        return str_replace(
                array('&', '<', '>', "\n"), 
                array('&amp;', '&lt;', '&gt;', "\n" . '<w:br/>'), 
                $str
        );
}
   
}
