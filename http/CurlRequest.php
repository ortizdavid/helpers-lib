<?php
namespace Negocio\Nativo\HTTP;

use HttpRequest;

require_once 'HttpRequest.php';

class CurlRequest extends HttpRequest
{

    /**
     */
    public function __construct(string $url)
    {
        $this->setUrl($url);
    }
    
    
    public function sendGet(array $dados=null)  : void
    {
        $novaUrl = ($dados==null) ? $this->getUrl() : $this->getUrl(). '?' .http_build_query($dados);
        $curl = curl_init($novaUrl);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($dados));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $this->setResponse($response);
        $this->setHttpCode(curl_getinfo($curl, CURLINFO_HTTP_CODE));
        curl_close($curl);
    }

    
    public function sendDelete(array $dados=null)  : void
    {
        $novaUrl = ($dados==null) ? $this->getUrl() : $this->getUrl(). '?' .http_build_query($dados);
        $curl = curl_init($novaUrl);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($dados));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $this->setResponse($response);
        $this->setHttpCode(curl_getinfo($curl, CURLINFO_HTTP_CODE));
        curl_close($curl);
    }

    
    public function sendPost(array $dados)  : void
    {
        $curl = curl_init($this->getUrl());
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($dados));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $this->setResponse($response);
        $this->setHttpCode(curl_getinfo($curl, CURLINFO_HTTP_CODE));
        curl_close($curl);
    }

    
    public function sendPut(array $dados)  : void
    {
        $curl = curl_init($this->getUrl());
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($dados)); 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $this->setResponse($response);
        $this->setHttpCode(curl_getinfo($curl, CURLINFO_HTTP_CODE));
        curl_close($curl);
    }
    
    
}


 
 
 
 
 