<?php
namespace Negocio\Nativo\Ficheiro;

require_once 'Upload.php';
require_once 'ConstUpload.php';
require_once 'ConstByte.php';

/**
 *
 * @author Arcanjo David
 * <br>Email: ortizaad1994@gmail.com <br>Tel: +244936166699
 *        
 */
class UploadPDF extends Upload
{
    
    /**
     */
    public function __construct()
    {
        $this->extensoes = array('application/pdf');
        $this->erros = array();
    }

   
    public function upload(string $nomeCampo, string $directorio, string$nome) 
    {
        if(is_array($nomeCampo))
        {
            if(!in_array($nomeCampo['type'], $this->extensoes))
                $this->erros[] = " '$nome' -  Extensão do Documento não é Permitido... Apenas PDF !";
            else if($nomeCampo['size'] > ConstUpload::MAX_PDF){
                $tam = (ConstUpload::MAX_PDF / ConstByte::MEGABYTE);
                $this->erros[] = " '$nome' -  O Tamanho Máximo Permitido para o Documento é de {$tam}MB!";
            }   
            else{
                $nome = md5(time()).$nomeCampo['name'];
                $this->setNomeFicheiro($nome);
                move_uploaded_file($nomeCampo['tmp_name'], $directorio.$nome);
            }
        }
        else{
            die("Erro ao Carregar o Documento - '$nome' !");
        }
        return $this;
    }
    
    
}

