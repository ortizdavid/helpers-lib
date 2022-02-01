<?php
namespace Negocio\Nativo\Ficheiro;

require_once 'Upload.php';
require_once '../Constantes/ConstUpload.php';

/**
 *
 * @author Arcanjo David
 * <br>Email: ortizaad1994@gmail.com <br>Tel: +244936166699
 *        
 */
class UploadImagem extends Upload
{

    /**
     */
    public function __construct()
    {
        $this->extensoes = array('image/png', 'image/jpeg', 'image/jpg');
        $this->erros = array();
    }

    /**
     * 
     */
    public function upload(string $nomeCampo, string $directorio, string $nome) 
    {
        if(is_array($nomeCampo))
        {
            if(!in_array($nomeCampo['type'], $this->extensoes))
                $this->erros[] = " '$nome' -  Extensão de Imagem  não é Permitido... Apenas JPG, JPEG e PNG !";
            else if($nomeCampo['size'] > ConstUpload::MAX_IMG){
                $tam = (ConstUpload::MAX_IMG / ConstByte::MEGABYTE);
                $this->erros[] = " '$nome' -  O Tamanho Máximo Permitido para a Imagem é de {$tam}MB!";
            }     
            else{
                $nome = md5(time()).$nomeCampo['name'];
                $this->setNomeFicheiro($nome);
                move_uploaded_file($nomeCampo['tmp_name'], $directorio.$nome);
            }
        }
        else{
            die("Erro ao Carregar a Imagem - '$nome' !");
        }
        return $this;
    }
    
    
}

