<?php

namespace Negocio\Nativo\Ficheiro;

class Ficheiro
{
 
     private $directorio;
     private $erros = array();
     
     
     public function __construct(string $directorio="")
     {
         $this->setDirectorio($directorio);
         return $this;
     }
     
     
     public function copiar(string $destino)
     {
         if(file_exists($this->getDirectorio()))
         {
             copy($this->getDirectorio(), $destino);
         }
         else
         {
             $this->erros[] = "O Directorio Destino '{$destino}' não Existe! ";
         }
     }
     
     
     public function renomear(string $novoDirectorio)
     {
         if(file_exists($novoDirectorio))
         {
             $this->erros[] = "O Ficheiro '{$novoDirectorio}' já Existe! ";
         }
         else
         {
             rename($this->getDirectorio(), $novoDirectorio);
         }
     }
     
     public function renomearVarios(string $directorio, string $nomeBase)
     {
         
     }
     
     public function eliminar()
     {
         if(file_exists($this->getDirectorio()))
         {
             unlink($this->getDirectorio());
         }
         else
         {
             $this->erros[] = "O Ficheiro  '{$this->getDirectorio()}' não Existe! ";
         }
     }
     
     public function eliminarVarios()
     {
         
     }
     
     
     /**
      * @return mixed
      */
     public function getDirectorio()
     {
         return $this->directorio;
     }
     
     /**
      * @param mixed $directorio
      */
     public function setDirectorio($directorio)
     {
         $this->directorio = $directorio;
     }
     /**
      * @return multitype:
      */
     public function getErros()
     {
         return $this->erros;
     }
     
     /**
      * @param multitype: $erros
      */
     public function setErros($erros)
     {
         $this->erros = $erros;
     }
 
}