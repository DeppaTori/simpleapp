<?php
namespace App\Library;

/**
 * Description of Config
 *
 * @author tommytoban
 */
class Config {
    public static function getParams(){
        return array(
            "PATH_ADMINTHEME" =>"public/matrixadmin/",
            "KATA_RAHASIA"=> getenv("SOLATA_RAHASIA"),
            "BLOG_ADMIN"=>getenv("SIL_WP_ADMIN_URL")
        );
    }
    
    public static function getUsers(){
        return array(
            "tommylocal" =>array("user"=>getenv("USER_SATU"),"email"=>getenv("USER_SATU_EMAIL")),
            "tommy" =>array("user"=>getenv("USER_DUA"),"email"=>getenv("USER_DUA_EMAIL")),
         
            "onal" =>array("user"=>getenv("USER_TIGA"),"email"=>getenv("USER_TIGA_EMAIL"))
            
            
        );
    }
}
