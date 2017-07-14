<?php
/*
Plugin Name: Import CSV
Plugin URI: http://www.erreurs404.net
Description: Allows you to attach photos to articles
Version: 0.1
Author: Nicolas GRILLET
Author URI: http://www.erreurs404.net

*/

$lang=(defined('WPLANG') ? WPLANG : 'en');
require_once("importCSV-".$lang.".php");

function importCSV_upload_form()
{
    global $timportCSV,$lang;
     $root = get_option("home");
        if (strrchr($root, '/') != strlen($root)) {
            $root .= '/';
        }
    ?>
    <a href="<?php echo $root?>wp-content/plugins/importCSV/upload-process.php?lang=<?php echo $lang?>&TB_iframe=true" id="importCSV" class="thickbox"><div class="button" style="background:url('<?php echo get_option("siteurl")?>/wp-content/plugins/importCSV/logo-csv.png') top left no-repeat;width:110px;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $timportCSV['CSV_FILE']?></div></a>
    <?php
}

function importCSV_init()
{
    add_meta_box('importCSV','Import CSV in Content', 'importCSV_upload_form', 'post', 'normal', 'high');
}
load_plugin_textdomain('importCSV',dirname(__FILE__)); 
add_action('admin_menu', 'importCSV_init');

?>
