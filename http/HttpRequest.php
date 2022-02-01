<?php

abstract class HttpRequest
{
    
    private $url;
    private $response;
    private $httpCode;  
    private $error;
    
    
    public abstract function sendPost(array $dados) : void;
    
    
    public abstract function sendGet(array $dados=null) : void;
    
    
    public abstract function sendPut(array $dados) : void;
    
    
    public abstract function sendDelete(array $dados=null) : void;
    
    
    
    public function getStatus() : string
    {
        switch ($this->httpCode){
            case 200: $status = "200: Sucesso!"; break;
            case 201: $status = "201: Criado!"; break;
            case 202: $status = "201: Aceite!"; break;
            case 401: $status = "401: Não Autorizado!"; break;
            case 404: $status = "404: API ou Endereço não encontrado!"; break;
            case 405: $status = "405: Método não Permitido!"; break;
            case 500: $status = "500: O Servidor respondeu com um erro!"; break;
            case 502: $status = "502: O Servidor caiu ou pode estar sendo actualizado. Esperamos que regresse em breve!"; break;
            case 503: $status = "503: Serviço Índisponível. Esperamos que regresse em breve!"; break;
            default: $status = "{$this->httpCode}: Erro não documentado!"; break;
        }
        return utf8_encode($status);
    }
    
    
    public function printResponse() : string
    {
        return "<pre>{$this->getResponse()}</pre>";
    }
    
    
    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param mixed $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }

    /**
     * @return mixed
     */
    public function getUrl() : string
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param mixed $URI
     */
    public function setUrl(string $url) : void
    {
        $this->url = $url;
    }

    /**
     * @param mixed $response
     */
    public function setResponse($response) : void
    {
        $this->response = $response;
    }
    
    
    /**
     * @return mixed
     */
    public function getHttpCode() : int
    {
        return $this->httpCode;
    }
    
    /**
     * @param mixed $httpCode
     */
    public function setHttpCode(int $httpCode) : void
    {
        $this->httpCode = $httpCode;
    }
    
    
}

