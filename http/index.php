<?php


header('Content-Type: application/json; charset=utf8');
 
$url = "http://localhost:8080/ModeloProjecto/Negocio/Nativo/HTTP/testeCurl.php";//?nome=Joana&sexo=Feminino&idade=19";

$dados = ['nome'=>'Ortiz David', 'sexo'=>'Masculino', 'idade'=>25];
 
 
$req = new CurlRequest($url);
$req->sendPost($dados);
//$req->sendGet($dados);
//$req->sendDelete($dados);
//$req->sendPut($dados);
echo "Status {$req->getStatus()}\n";
echo $req->getResponse();
