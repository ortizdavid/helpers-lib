<?php
namespace Negocio\Nativo\Autenticacao;

/**
 *
 * @author Ortiz de Arcanjo David
 * @copyright 2020
 * <br>Email: ortizaad1994@gmail.com <br>Tel: +244936166699
 * @name Logger
 * @desc Classe usada para gravar dados num arquivo de texto
 *        
 */
class Logger
{

    private $fileName;
    
    /**
     */
    public function __construct(string $fileName)
    {
        $this->setFileName($fileName);
    }
    
    
    public function write(string $content) : void
    {
        /*if(!is_writeable($this->fileName))
            die(utf8_encode("Mude o as permissões do arquivo: ". $this->fileName));*/
            
        $arq = fopen($this->fileName, "a+");
        fwrite($arq, "\r\r".$content);
        fclose($arq);
    }
    
    
    public function getContent() : string
    {
        fopen($this->fileName, "r");
        return utf8_encode(file_get_contents($this->fileName));
    }
    
    
    public function printContent() : void
    {
        echo "<pre>{$this->getContent()}</pre>";
    }
    
    
    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param mixed $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    
}
