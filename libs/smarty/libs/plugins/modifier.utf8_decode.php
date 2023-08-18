<?php
/**
* UTF-8 safe HTML Entities
*/
function smarty_modifier_utf8_decode($utf8_decode='')
{
   # ENT_IGNORE is not available on old systems.
   return utf8_decode($utf8_decode);
}
?>