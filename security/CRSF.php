<?php
namespace Negocio\Nativo\Seguranca;

session_start();

class CRSF
{
    
    public static function generate() : void
    {
        $crsfToken = crypt(md5(time()), '$6$'.md5(time()).'$').crypt(sha1(time()), '$6$'.sha1(time()).'$');
        $_SESSION['crsf_token'] = $crsfToken;
        echo "<input type='hidden' name='crsf_token' value='{$crsfToken}'>";
    }
    
    
    public static function isValid(string $token) : bool
    {
       return isset($_SESSION['crsf_token']) && ($_SESSION['crsf_token'] == $token);
    }
   

    public function check(string $token) : void
    {
        if ($_SESSION['crsf_token'] != $token){
            die ("<h1>Token da Sessão não Encontrado!</h1>");
        }
    }
    
    
}

