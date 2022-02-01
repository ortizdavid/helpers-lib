<?php

namespace Negocio\Nativo\Autenticacao;

session_start();

/**
 *
 * @author Ortiz de Arcanjo David
 * @copyright 2020
 * <br>Email: ortizaad1994@gmail.com <br>Tel: +244936166699
 * @name Sessao
 * @desc Responsável pelo controle da sessão: iniciar, reconhecer, expirar e outros m�todos
 *
 */
class Sessao
{
    
    private static $dirLogin = "../auth/login.php";
    
    
    public static function iniciar(string $login, string $senha) : void
    {
        self::criar('login', $login);
        self::criar('senha', $senha);
        self::criar('token_usuario', password_hash('Sessao do Usuario'.md5(time()), PASSWORD_DEFAULT));
        session_regenerate_id(true);
    }
    
    
    public static function terminar() : void
    {
        session_destroy();
        echo "<script>window.location.href='".self::$dirLogin."';</script>";
    }
    
    
    public static function reconhecer() : void
    {
        if(!isset($_SESSION["senha"]) || !isset($_SESSION["login"]) ){
            self::terminar();
        }
    }
    
    
    public static function criar(string $nome, string $valor) : void
    {
        $_SESSION[$nome] = $valor;
        session_write_close();
    }
    
    
    public static function expirar() : void
    {
        self::terminar();
    }
    
    
    public static function setValor(string $chave, string $valor) : void
    {
        $_SESSION[$chave] = $valor;
        session_write_close();
    }
    
    
    public static function getValor(string $chave) : string
    {
        $valor = $_SESSION[$chave];
        session_write_close();
        return $valor;
    }
    
    
    public static function existe(string $chave) : bool
    {
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION[$chave]) && (!empty($_SESSION[$chave]))) {
            session_write_close();
            return true;
        }
        else {
            session_write_close();
            return false;
        }
    }
   
    
    public static function bloquear() : void
    {
        if( !(isset($_SESSION["senha"]) && isset($_SESSION["login"])) ){
            self::terminar();
        }
    }
    
    
}


