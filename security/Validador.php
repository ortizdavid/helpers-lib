<?php
namespace Negocio\Nativo\Seguranca;

require_once 'ConstValidacao.php';
require_once 'Encryption.php';

/**
 * @author Ortiz David
 * <br>Email: ortizaad1994@gmail.com <br>Tel: +244936166699
 * @copyright 2020
 * @desc Classe responsável pela validação de dados
 * @name Validador
 *        
 */
class Validador
{

    private $erros = array();
 
    
    public function __construct()
    {
        return $this;
    }
    
    
    public function validarURL(string $valorURL, string $nome, bool $required=true) : string
    {
        if(empty($valorURL) && $required){
            $this->erros[] = sprintf("A '%s' é obrigatória.", $nome);
            return "'Erro.'";
        }
        else if(!filter_var($valorURL, FILTER_VALIDATE_URL)){
            $this->erros[] = sprintf("A '%s' está no formato incorrecto. Sugestão: https://www.google.com", $nome);
            return "'Erro.'";
        }
        else
            return filter_var($valorURL, FILTER_SANITIZE_URL);
    }
    
    
    public function validarEmail(string $valorEmail, string $nome, bool $required=true) : string
    {
        if(empty($valorEmail) && $required){
            $this->erros[] = sprintf("O '%s' é obrigatório.", $nome);
            return "'Erro.'";
        }   
        else if($valorEmail > ConstValidacao::MAX_EMAIL){
            $this->erros[] = sprintf("O '%s' deve ter no máximo %d caracteres.", $nome, ConstValidacao::MAX_EMAIL);
            return "'Erro.'";
        }
        else if(!filter_var($valorEmail, FILTER_VALIDATE_EMAIL)){
            $this->erros[] = sprintf("O '%s' está no formato incorrecto. Sugestão: fulano@email.com.", $nome);
            return "'Erro.'";
        } 
        else
            return filter_var($valorEmail, FILTER_SANITIZE_EMAIL);               
    }
    
    

    //--------------------LOGIN E SENHA------------------------------------------------------------------------- 
    public function validarLogin(string $valorLogin, string $nome, bool $required=true) : string
    {
        if(empty($valorLogin) && $required){
            $this->erros[] = sprintf("O '%s' é obrigatório.", $nome);
            return "'Erro.'";
        }   
        else if(strlen($valorLogin)< ConstValidacao::MIN_LOGIN || strlen($valorLogin)>ConstValidacao::MAX_LOGIN){
            $this->erros[] = sprintf("O '%s' deve ter no mínimo %d e no máximo %d caracteres.", $nome, ConstValidacao::MIN_LOGIN, ConstValidacao::MAX_LOGIN);    
            return "'Erro.'";
        }   
        else
            return filter_var($valorLogin, FILTER_SANITIZE_STRING);
    }
    
    
    public function validarSenha(string $valorSenha, string $valorSalt, string $nome,  bool $required=true) : string
    {
        if(empty($valorSenha) && $required){
             $this->erros[] = sprintf("A '%s' é obrigatória.", $nome);
             return "'Erro.'";
        }
        else if(strlen($valorSenha)< ConstValidacao::MIN_SENHA || strlen($valorSenha)> ConstValidacao::MAX_SENHA){
            $this->erros[] = sprintf("A '%s' ter no mínimo %d e no máximo %d caracteres.", $nome, ConstValidacao::MIN_SENHA, ConstValidacao::MAX_SENHA);
            return "'Erro.'";
        }   
        else
        {
            $senha = filter_var($valorSenha, FILTER_SANITIZE_STRING);
            $senhaCript = Encryption::encryptPassword($senha, $valorSalt);
            return $senhaCript;
        }       
    }



    //----------------------------------------------------------------------------------------------------------
    
    public function validarNome(string $valorNome, string $nome, bool $required=true) : string
    {
        if(empty($valorNome) && $required){
            $this->erros[] = sprintf("O '%s' é obrigatório.", $nome);
            return "'Erro.'";
        } 
        /*else if(!preg_match("/^[A-z]{*}$/", $valorNome)){
            $this->erros[] = sprintf("O '%s' está no formato incorrecto. Sugestão: André Manuel.", $nome);
            return "'Erro.'";
        } */
        else if(strlen($valorNome) < ConstValidacao::MIN_NOME || strlen($valorNome) > ConstValidacao::MAX_NOME){
            $this->erros[] = sprintf("O '%s' deve ter no mínimo %d e máximo %d caracteres.", $nome, ConstValidacao::MIN_NOME, ConstValidacao::MAX_NOME);
            return "'Erro.'";
        }
        else
            return filter_var($valorNome, FILTER_SANITIZE_STRING);      
    }
    
    
    public function validarDescricao(string $valorDesc, string $nome, bool $required=true) : string
    {
        if(empty($valorDesc) && $required){
            $this->erros[] = sprintf("A '%s' é obrigatória.", $nome);
            return "'Erro.'";
        }
        else if(!is_string($valorDesc)){
            $this->erros[] = sprintf("A '%s' deve ser um texto.", $nome);
            return "'Erro.'";
        }  
        else if(strlen($valorDesc) > ConstValidacao::MAX_DESCRICAO){
            $this->erros[] = sprintf("A '%s' deve ter no máximo %d caracteres.", $nome, ConstValidacao::MAX_DESCRICAO);
            return "'Erro.'";
        }
        else
            return filter_var($valorDesc, FILTER_SANITIZE_STRING);        
    }
    
    
    public function validarTelefone(string $valorTelefone, string $nome, bool $required=false) : int
    {
        if(empty($valorTelefone) && $required){
            $this->erros[] = sprintf("O '%s' é obrigatório.", $nome);
            return 0;
        } 
        else if($valorTelefone< ConstValidacao::MIN_TELEFONE || $valorTelefone>ConstValidacao::MAX_TELEFONE){
            $this->erros[] =  sprintf("O '%s' deve estar  no intervalo de %d à %d", $nome, ConstValidacao::MIN_TELEFONE, ConstValidacao::MAX_TELEFONE);
            return 0;
        }
        else
            return filter_var($valorTelefone, FILTER_SANITIZE_NUMBER_INT);            
    }
    
    
    public function validarBI(string $valorBI, bool $required=true) : string
    {
        if(empty($valorBI) && $required){
            $this->erros[] = sprintf("O 'BI' é obrigatório.");
            return "'Erro.'";
        }
        else if(!preg_match("/^[0-9]{9}[A-Z]{2}[0-9]{3}$/", $valorBI)){
            $this->erros[] = sprintf("O 'BI' está no formato incorrecto. Sugestão: 123456789LA034.");
            return "'Erro.'";
        } 
        else if(strlen($valorBI)!= 14){
            $this->erros[] = sprintf("O 'BI' deve ter exactamente 14 caracteres.");
            return "'Erro.'";
        }
        else
            return filter_var($valorBI, FILTER_SANITIZE_STRING);           
    }
    
    
    public function validarNIF(string $valorNIF, bool $required=true) : string
    {
        if(empty($valorNIF) && $required){
            $this->erros[] = sprintf("O 'NIF' é obrigatório.");
            return "'Erro.'";
        }   
        else if(!preg_match("/^[0-9]{9}[A-Z]{2}[0-9]{3}$/", $valorNIF)){
            $this->erros[] = sprintf("O 'NIF' está no formato incorrecto. Sugestão: 098456789HB032.");
            return "'Erro.'";
        }
        else if(strlen($valorNIF)!= 14){
            $this->erros[] = sprintf("O 'NIF' deve ter exactamente 14 caracteres.");
            return "'Erro.'";
        }   
        else
            return filter_var($valorNIF, FILTER_SANITIZE_STRING);          
    }
    


    //-----------------------DATA E HORA ---------------------------------------------------------
    //---------------------------------------------------------------------------------------------
    public function validarDataSimples(string $valorData, string $nome, bool $required=true) : string
    {
        if(empty($valorData) && $required){
            $this->erros[] = sprintf("A '%s' é obrigatória.", $nome);
            return "'Erro.'";
        }
        else if(!preg_match("/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/", $valorData)){
            $this->erros[] = sprintf("A '%s' está no formato incorrecto. Deve estar no formato (AAAA-MM-DD).", $nome);
            return "'Erro.'";
        }
        else
            return filter_var($valorData, FILTER_SANITIZE_STRING);      
    }
    
    public function validarHoraSimples(string $valorHora, string $nome, bool $required=true) : string
    {
        if(empty($valorHora) && $required){
            $this->erros[] = sprintf("A '%s' é obrigatória.", $nome);
            return "'Erro.'";
        }
        else if(!preg_match("/^[0-9]{2}\:[0-9]{2}\:[0-9]{2}$/", $valorHora)){
            $this->erros[] = sprintf("A '%s' está no formato incorrecto. Deve estar no formato (H:m:s).", $nome);
            return "'Erro.'";
        }
        else
            return filter_var($valorHora, FILTER_SANITIZE_STRING);
    }
    
    public function validarData(string $valorData, string $min, string $max, string $nome, bool $required=true) : string
    {
        if(empty($valorData) && $required){
            $this->erros[] = sprintf("A '%s' é obrigatória.", $nome);
            return "'Erro.'";
        }   
        else if(!preg_match("/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/", $valorData)){
            $this->erros[] = sprintf("A '%s' está no formato incorrecto. Deve estar no formato  (AAAA-MM-DD).", $nome);
            return "'Erro.'";
        }    
        else if($valorData<$min || $valorData>$max){
            $this->erros[] = sprintf("A '%s' deve estar  no intervalo de '%s' à '%s'.", $nome, $min, $max);
            return "'Erro.'";
        }
        else
            return filter_var($valorData, FILTER_SANITIZE_STRING);
    }
    
    
    public function validarDataHora(string $valorData, string $min, string $max, string $nome, bool $required=true) : string
    {
        if(empty($valorData) && $required){
            $this->erros[] = sprintf("A '%s' é obrigatória.", $nome);
            return "'Erro.'";
        }
        else if(!preg_match("/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}\ [0-9]{2}\:[0-9]{2}\:[0-9]{2}$/", $valorData)){
            $this->erros[] = sprintf("A '%s' está no formato incorrecto. Deve estar no formato (AAAA-MM-DD  HH:MM:SS).", $nome);
            return "'Erro.'";
        }
        else if($valorData<$min || $valorData>$max){
            $this->erros[] = sprintf("A '%s' deve estar  no intervalo de '%s' à '%s'.", $nome, $min, $max);
            return "'Erro.'";
        }
        else
            return filter_var($valorData, FILTER_SANITIZE_STRING);
    }
    
    
    public function validarHora(string $valorHora, string $min, string $max, string $nome, bool $required=true) : string
    {
        if(empty($valorHora) && $required){
            $this->erros[] = sprintf("A '%s' é obrigatória.", $nome);
            return "'Erro.'";
        }
        else if(!preg_match("/^[0-9]{2}\:[0-9]{2}\:[0-9]{2}$/", $valorHora)){
            $this->erros[] = sprintf("A '%s' está no formato incorrecto. Deve estar no formato (H:m:s).", $nome);
            return "'Erro.'";
        }
        else if($valorHora<$min || $valorHora>$max){
            $this->erros[] = sprintf("A '%s' deve estar  no intervalo de '%s' à '%s'.", $nome, $min, $max);
            return "'Erro.'";
        } 
        else
            return filter_var($valorHora, FILTER_SANITIZE_STRING);
    }
    



    //------------------------------------------------------------------------------------------------------
    
    public function validarString(string $valor, int $min, int $max, string $nome, bool $required=true) : string
    {
        if(empty($valor) && $required){
            $this->erros[] = sprintf("'%s' é obrigatório(a).", $nome);
            return "'Erro.'";
        }
        else if(strlen($valor)<$min || strlen($valor)>$max){
            $this->erros[] = sprintf("'%s' deve ter no mínimo %d e no máximo %d caracteres.", $nome, $min, $max);  
            return "'Erro.'";
        } 
        else
            return filter_var($valor, FILTER_SANITIZE_STRING);       
    }
    
    
    public function validarInt(string $valor, int $min, int $max, string $nome, bool $required=true) : int
    {
        if(empty($valor) && $required){
            $this->erros[] = sprintf("%s' é obrigatório(a).", $nome);
            return 0;
        }
        else if($valor<$min || $valor>$max){
            $this->erros[] = sprintf("'%s' deve ser  deve estar  no intervalo de %d à %d.", $nome, $min, $max);
            return 0;
        }
        else
            return filter_var($valor, FILTER_SANITIZE_NUMBER_INT);          
    }
    
    
    public function validarFloat(string $valor, float $min, float $max, string $nome, bool $required=true) : float
    {
        if(empty($valor) && $required){
            $this->erros[] = sprintf("'%s' é obrigatório(a).", $nome);
            return 0.0;
        }
        else if($valor<$min || $valor>$max){
            $this->erros[] = sprintf("'%s' deve ser  deve estar  no intervalo de %f à %f.", $nome, $min, $max);
            return 0.0;
        }
        else
            return filter_var($valor, FILTER_SANITIZE_NUMBER_FLOAT);
    }
    
    
    public function validarSexo(string $valorSexo, bool $required=true) : string
    {
        if(empty($valorSexo) && $required){
            $this->erros[] = sprintf("O 'Sexo' deve ser preenchido.");
            return "'Erro'";
        }
        else if(!in_array($valorSexo, ConstValidacao::GENEROS)){
            $this->erros[] = sprintf("O 'Sexo' deve ser: Masculino ou Feminino.");
            return "'Erro'";
        }
        else 
            return filter_var($valorSexo, FILTER_SANITIZE_STRING);
    }
    
    
    public function validarEstadoCivil(string $valorEstado, bool $required=true) : string
    {
        $cont = 0;
        $estados = ConstValidacao::ESTADOS_CIVIS;
        if(empty($valorEstado) && $required){
            $this->erros[] = sprintf("O 'Estado Civil' deve ser preenchido.");
            return "'Erro'";
        }
        else if(!in_array($valorEstado, $estados)){
            $strEst = "";
            foreach ($estados as $estado){
                $cont++;
                $strEst .=  ($cont == count($estados)) ? " ou {$estado} " : "{$estado}, "; 
            }
            $this->erros[] = sprintf("O 'Estado Civil' deve ser: %s.", $strEst);
            return "'Erro'";
        }
        else
            return filter_var($valorEstado, FILTER_SANITIZE_STRING);
    }
    
    
    public function validarMes(string $valorMes, bool $required=true) : string
    {
        $meses = ConstValidacao::MESES_ANO;
        if(empty($valorMes) && $required){
            $this->erros[] = sprintf("O 'Mês do Ano' deve ser preenchido.");
            return "'Erro'";
        }
        else if(!in_array($valorMes, $meses)){
            $this->erros[] = sprintf("O 'Mês do Ano' éstá incorrecto.");
            return "'Erro'";
        }
        else
            return filter_var($valorMes, FILTER_SANITIZE_STRING);
    }
    
    
    public function validarDiaSemana(string $valorDia, bool $required=true) : string
    {
        $cont = 0;
        $dias = ConstValidacao::DIAS_SEMANA;
        if(empty($valorDia) && $required){
            $this->erros[] = sprintf("O 'Dia da Semana' deve ser preenchido.");
            return "'Erro'";
        }
        else if(!in_array($valorDia, $dias)){
            $strDia = "";
            foreach ($dias as $dia){
                $cont++;
                $dia = $dia;
                $strDia .=  ($cont == count($dias)) ? " ou {$dia} " : "{$dia}, ";
            }
            $this->erros[] = sprintf("O 'Dia da Semana' deve ser: %s.", $strDia);
            return "'Erro'";
        }
        else
            return filter_var($valorDia, FILTER_SANITIZE_STRING);
    }
    
    
    public function validarProvincia(string $valorProvincia, bool $required=true) : string
    {
        $provincias = ConstValidacao::PROVINCIAS_ANGOLA;
        if(empty($valorProvincia) && $required){
            $this->erros[] = sprintf("A 'Província' deve ser preenchida.");
            return "'Erro'";
        }
        else if(!in_array($valorProvincia, $provincias)){
            $this->erros[] = sprintf("A 'Província' digitada não existe em Angola.");
            return "'Erro'";
        }
        else
            return filter_var($valorProvincia, FILTER_SANITIZE_STRING);
    }
    
    
    public function validarPais(string $valorPais, bool $required=true) : string
    {
        $paises = ConstValidacao::PAISES;
        if(empty($valorPais) && $required){
            $this->erros[] = sprintf("O 'País' deve ser preenchido.");
            return "'Erro'";
        }
        else if(!in_array($valorPais, $paises)){
            $this->erros[] = sprintf("O 'País' selecionado não existe.");
            return "'Erro'";
        }
        else
            return filter_var($valorPais, FILTER_SANITIZE_STRING);
    }
    
    
    public function validarContinente(string $valorContinente, bool $required=true) : string
    {
        $continentes = ConstValidacao::CONTINENTES;
        if(empty($valorContinente) && $required){
            $this->erros[] = sprintf("O 'Continente' deve ser preenchido.");
            return "'Erro'";
        }
        else if(!in_array($valorContinente, $continentes)){
            $this->erros[] = sprintf("O 'Continente' selecionado não existe.");
            return "'Erro'";
        }
        else
            return filter_var($valorContinente, FILTER_SANITIZE_STRING);
    }
    


    //-------------------------------------------------------------
    //--------------UPLOAD de Arquivos-----------------------------
    public function uploadPDF($campoPdf, string $directorio, string $nome) : string 
    {
        if(is_array($campoPdf))
        {
            if(!in_array($campoPdf['type'], ConstValidacao::EXTENSOES_PDF)){
                $this->erros[] = sprintf("'%s' está no formato incorrecto. Formato permitido: PDF", $nome);
            }
            else if($campoPdf['size'] > ConstValidacao::MAX_PDF){
                $tam = (ConstValidacao::MAX_PDF / 1048576);
                $this->erros[] = sprintf("O tamanho máximo permitido para '%s' são {$tam}MB!", $nome);
            }     
            else{
                $nomePdf = md5(time()).$campoPdf['name'];
                move_uploaded_file($campoPdf['tmp_name'], $directorio.$nomePdf);
            }
            return $nomePdf;
        }
        else{
            die("Erro ao Carregar a Documento - '$nome' !");
            return "";
        }
    }


    public function uploadIMG($campoImg, string $directorio, string $nome) : string 
    {
        if(is_array($campoImg))
        {
            if(!in_array($campoImg['type'], ConstValidacao::EXTENSOES_IMG)){
                $this->erros[] = sprintf("'%s' está no formato incorrecto. Formatos permitidos: JPG, JPEG e PNG", $nome);
            }
            else if($campoImg['size'] > ConstValidacao::MAX_IMG){
                $tam = (ConstValidacao::MAX_IMG / 1048576);
                $this->erros[] = sprintf("O tamanho máximo permitido para '%s' são {$tam}MB!", $nome);
            }     
            else{
                $nomeImg = md5(time()).$campoImg['name'];
                move_uploaded_file($campoImg['tmp_name'], $directorio.$nomeImg);
            }
            return $nomeImg;
        }
        else{
            die("Erro ao Carregar a Imagem - '$nome' !");
            return "";
        }
    }
   

    /**
     * Get the value of erros
     */
    public function getErros() : array
    {
        return $this->erros;
    }
    
    /**
     * Set the value of erros
     *
     * @return  void
     */
    public function addErro(string $erro) : void
    {
        $this->erros[] = $erro;
    }
    
    
}
