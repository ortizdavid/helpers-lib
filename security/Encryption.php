<?php
namespace Negocio\Nativo\Seguranca;

/**
 *
 * @author filipe
 *        
 */
class Encryption
{

    public static function encryptPassword(string $password, string $salt) : string
    {
        $newSalt = hash("sha512", $salt);
        return crypt($password, '$6$'.$newSalt.'$new_system_user$');  
    }
    
    
    public static function generateCryptId() : string
    {
        $str1 = password_hash(base64_encode(random_bytes(16)).md5(sha1(time())),  PASSWORD_DEFAULT);
        $str2 = crypt($str1, md5(time())).crypt(unixtojd(), md5(sha1(time())));
        
        $notAllowed = [
            '~', '*', '$', '/', '(', ')', '[', ']', '@', '?', '!', '-', '+', '=', ',', '.',
            ':', ';', '%',  '\'', '\\', '´','{', '}', '`', '"', '~', '|', '^', '#','>', '<', '_' 
        ];
        $result = "";
        $novoTexto = self::multiexplode($str2, $notAllowed);
        foreach ($novoTexto as $val){
            $result .= $val;
        }
        return substr($result, 0, 38);
    }
    
    
    private static function  multiexplode (string $string, array $delimiters) 
    {
        $ready = str_replace($delimiters, $delimiters[0], $string);
        $launch = explode($delimiters[0], $ready);
        return  $launch;
    }
    
    
}


