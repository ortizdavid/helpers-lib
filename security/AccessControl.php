<?php

namespace classes;

class AccessControl
{

    public static function checkAccess(string $tipo, array $usuarios) : void
    {
        foreach ($usuarios as $key) 
        {
            if (!in_array($tipo, $usuarios)) {
               die("<br><h1 align='center'>Não tem permissão para aceder essa página!</h1>");
            }
        }
    }

}