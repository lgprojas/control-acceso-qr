<?php
/**
* UTF-8 safe HTML Entities
*/
function smarty_modifier_utf8_encode($utf8_encode='')
{
   # ENT_IGNORE is not available on old systems.
   return utf8_encode($utf8_encode);
}
?>