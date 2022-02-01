<?php
namespace Negocio\Nativo\Autenticacao;

use Negocio\Nativo\Seguranca\Encryption;
use Negocio\Sistema\Usuario;

require_once 'Sessao.php';
require_once '../Cript/Encryption.php';
require_once '../../Sistema/Usuario.php';

/**
 *
 * @author Ortiz David
 * <br>Email: ortizaad1994@gmail.com <br>Tel: +244936166699
 * @name Autenticador
 * @desc Classe responsável pela autenticação de Usuárips
 * @copyright 2020   
 */
class Autenticador
{

    private static string $dirInicio = "";
    private static string $dirLogin = "";
    
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @name autenticar
     * @desc Método para autenticação de usuários
     * <br> Verfiica se existe um usuário com a senha e login dadas
     * <br> Se existe, inicia a sessão e redirecciona para a página inicial,
     * <br> Se não existe redirecciona para para o login
     * @param string $login
     * @param string $senha
     * @return void
     */
    public static function autenticar(string $login, string $senha) : void
    {
        $login = filter_var($_POST['login'], FILTER_SANITIZE_STRING);
        $campoSenha = filter_var($_POST['senha'], FILTER_SANITIZE_STRING);
        $salt = $login;
        $senha = Encryption::encryptPassword($campoSenha, $salt);
        $usuario = new Usuario(0, $login, $senha);
        
        if ($usuario->isUsuario('tb_administrador')) 
        {
            Sessao::iniciar($login, $senha);
            Sessao::criar('tipo_usuario', 'Administrador');
            header("Location: ".self::$dirInicio."");
        } 
        else if ($usuario->isUsuario('tb_programador'))
        {
            Sessao::iniciar($login, $senha);
            Sessao::criar('tipo_usuario', 'Programador');
            header("Location: ".self::$dirInicio."");
        } 
        else if ($usuario->isUsuario('tb_funcionario'))
        {
            Sessao::iniciar($login, $senha);
            Sessao::criar('tipo_usuario', 'Funcionario');
            header("Location: ".self::$dirInicio."");
        } 
        else
        {
            header("Location: ".self::$dirLogin."");
        }
    }


    /**
     * @author Ortiz David
     * @copyright 2020
     * @name logout
     * @desc Método para fazer o logout de usuários
     * @return void
     */
    public static function logout() : void
    {
        Sessao::terminar();
    }




}

