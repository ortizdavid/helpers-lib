<?php

header('Content-Type: application/json; charset=utf8');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $dados = file_get_contents("php://input");
    $obj = json_decode($dados);
    
    echo json_encode(
        array(
            'METODO'=>'...POST....',
            'msg'=>'Dados Recebidos POST',
            'nome' =>$obj->nome,
            'sexo'=> $obj->sexo,
            'idade'=>$obj->idade,
            'erro'=>false,
        )
        , JSON_PRETTY_PRINT);
}

else if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    $dados = file_get_contents("php://input");
    $obj = json_decode($dados);
    echo json_encode(
        array(
            'METODO'=>'...GET....',
            'msg'=>'Dados Recebidos por GET',
            'nome' =>$obj->nome,
            'sexo'=> $obj->sexo,
            'idade'=>$obj->idade,
            'erro'=>false,
        )
        , JSON_PRETTY_PRINT);
}

else if($_SERVER['REQUEST_METHOD'] == 'PUT')
{
    $dados = file_get_contents("php://input");
    $obj = json_decode($dados);
    echo json_encode(
        array(
            'METODO'=>'...PUT....',
            'msg'=>'Dados Recebidos por PUT',
            'nome' =>$obj->nome,
            'sexo'=> $obj->sexo,
            'idade'=>$obj->idade,
            'erro'=>false,
        )
        , JSON_PRETTY_PRINT);
}

else if($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
    $dados = file_get_contents("php://input");
    $obj = json_decode($dados);
    echo json_encode(
        array(
            'METODO'=>'...DELETE....',
            'msg'=>'Dados Recebidos por DELETE',
            'nome' =>$obj->nome,
            'sexo'=> $obj->sexo,
            'idade'=>$obj->idade,
            'erro'=>false,
        )
        , JSON_PRETTY_PRINT);
}

else
{
    
    echo json_encode( array(
        'msg'=>"Nenhum Comando Enviado!",
        'erro'=>true),
        JSON_PRETTY_PRINT);
}