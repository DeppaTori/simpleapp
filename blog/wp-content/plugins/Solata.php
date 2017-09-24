<?php
/**
 * @package Solata
 * @version 1.6
 */
/*
Plugin Name: Solata
Plugin URI: http://wordpress.org/plugins/solatabatan/
Description: Plugin untuk show link ke silsilah keluarga.
Author: Tommy Toban
Version: 1.0
Author URI: http://tommytoban.com/
*/

add_action('admin_menu', 'solata_plugin_admin_menu');
 
function solata_plugin_admin_menu(){
        add_menu_page( 'Halaman Silsilah Keluarga', 'Silsilah Keluarga', 'manage_options', 'test-plugin', 'solata_pam_init' );
}
 
function solata_pam_init(){
        $current_user = wp_get_current_user();
        /*
        echo 'Username: ' . $current_user->user_login . '<br />';
    echo 'User email: ' . $current_user->user_email . '<br />';
    echo 'User first name: ' . $current_user->user_firstname . '<br />';
    echo 'User last name: ' . $current_user->user_lastname . '<br />';
    echo 'User display name: ' . $current_user->display_name . '<br />';
    echo 'User ID: ' . $current_user->ID . '<br />';
         
         */
        echo "<h2>Selamat datang di silsilah keluarga.</h2>";
        $code = $current_user->user_login;
        $kataRahasia = getenv("SOLATA_RAHASIA");
        
        $code = $code."".$kataRahasia;
        $code = sha1($code);
        $url = "http://localhost:50/keluargaku/silsilah/index.php/admin/aksesdariwp/";
         //$url = "http://keluargaku-rotimisko.rhcloud.com/silsilah/index.php/admin/aksesdariwp/";
        $url = $url."".$code;
        echo "[[link] Klik di <a href='".$url."' >sini</a> untuk akses ke halaman admin silsilah keluarga";
        
        
        
}

?>
