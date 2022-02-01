<?php

namespace Negocio\Nativo\HTTP;

use HttpRequest;

require_once 'HttpRequest.php';

class NormalRequest extends HttpRequest
{
    
    
    /**
     */
    public function __construct(string $url)
    {
        $this->setUrl($url);
        
    }
    
   
    public function sendPost(array $dados) : void
    {
        $opcoes = array(
            "http" => array(
                "method" => "POST",
                "header" => "Content-Type: application/x-www-form-urlencoded",
                "content" => http_build_query($dados)
         ));
        $this->setResponse(file_get_contents(
            $this->getUrl(),
            false,
            stream_context_create($opcoes)
         ));
    }
    
    
    public function sendGet(array $dados=null) : void
    {
        if(is_null($dados)){
            $this->setResponse(file_get_contents($this->getUrl()));
        }
        else{
            $novaUrl = $this->getUrl(). '?' .http_build_query($dados);
            $this->setResponse(file_get_contents($novaUrl));
        }
    }
    
    
    public function sendPut(array $dados) : void
    {
        $opcoes = array(
            "http" => array(
                "method" => "PUT",
                "header" => "Content-Type: application/x-www-form-urlencoded",
                "content" => http_build_query($dados)
        ));
        $this->setResponse(file_get_contents(
            $this->getUrl(),
            false,
            stream_context_create($opcoes)
        ));
    }
    
    
    public function sendDelete(array $dados=null)  : void
    {
        $opcoes = array(
            "http" => array(
                "method" => "DELETE",
               
        )); 
        $this->setResponse(
            file_get_contents($this->getUrl()),
            false,
            stream_context_create($opcoes)
        );
    }
    
      
}


header('Content-Type: application/json; charset=utf8');

$URI = "http://localhost:8080/ModeloProjecto/Negocio/Nativo/HTTP/testeNormal.php";//?nome=Joana&sexo=Feminino&idade=19";

$req = new NormalRequest($URI);
$dados = ['nome'=>'Ortiz', 'sexo'=>'Masculino', 'idade'=>99];
$req->sendGET($dados);
echo $req->getResponse();
;


