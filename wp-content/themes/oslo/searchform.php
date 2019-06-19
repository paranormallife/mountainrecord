<?php
/**
* The Template for search form.
*
* @package WordPress
* @subpackage Oslo
* @since Oslo 1.0
*/
?>
<form action="<?php echo esc_url(home_url()); ?>" id="searchform" method="get">
     <fieldset>
         <input type="text" id="s" name="s" placeholder="<?php esc_html_e('Search...', 'oslo') ?>" />
         <div id="thmlv-search-submit">
         	<i class="fa fa-search"></i>
         	<input type="submit" id="searchsubmit" value="" />
         </div>
     </fieldset>
</form>