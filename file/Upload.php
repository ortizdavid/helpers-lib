<?php

namespace Negocio\Nativo\Ficheiro;

/**
 *
 * @author Arcanjo David
 * 
 *        
 */
abstract class Upload
{
    
    private $nomeFicheiro;
    private $extensoes;
    private $erros;
    
    /**
     * Método responsável pelo upload do Ficheiro
     * */
    abstract public function upload(string $nomeCampo, string $directorio, string $nome);
    
    
    /**
     * @return mixed
     */
    public function getNomeFicheiro()
    {
        return $this->nomeFicheiro;
    }

    /**
     * @return multitype:
     */
    public function getExtensoes()
    {
        return $this->extensoes;
    }

    /**
     * @return multitype:
     */
    public function getErros()
    {
        return $this->erros;
    }
    /**
     * @param mixed $nomeFicheiro
     */
    public function setNomeFicheiro($nomeFicheiro)
    {
        $this->nomeFicheiro = $nomeFicheiro;
    }

    /**
     * @param multitype: $extensoes
     */
    public function setExtensoes($extensoes)
    {
        $this->extensoes = $extensoes;
    }

    /**
     * @param multitype: $erros
     */
    public function setErros($erros)
    {
        $this->erros = $erros;
    }


}
