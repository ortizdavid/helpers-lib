<?php

require_once 'Validador.php';


use Negocio\Nativo\Seguranca\Validador;

$v = new Validador();

$nome = $v->validarNome('1k', 'nome', 1);
$bi = $v->validarBI('003334743A032',0);
$email = $v->validarEmail('a@gma...il.com', 'Email Principal');
$data = $v->validarDataSimples('1000-10-11', 'Data');
$hora = $v->validarHoraSimples('10:00:77', 'Hora');
$telefone = $v->validarTelefone('9121926191', 'Telefone');
$int = $v->validarInt('10', 1, 20, 'Num Interio');
$float = $v->validarFloat('10.1.2343', 1.1, 20.1, 'Num Float');
$str = $v->validarString('Olá Mundo... Estou Programanado!', 5, 6, 'String Normal');
$login = $v->validarLogin('o');
$senha = $v->validarSenha('12345678888888888888', 'ortiz@gmail.com');
$url = $v->validarURL("http://m.facebook.com", 'URL do Facebook', 1);
$sexo = $v->validarSexo("Feminino");
$est = $v->validarEstadoCivil("Casado");
$mes = $v->validarMes("Dezembro");
$dia = $v->validarDiaSemana("Segunda-Feira");
$dataHora = $v->validarDataHora(date("Y-m-d H:i:s"), "2020-08-26 10:00:01", "2020-08-29 10:00:01", "Data Hora");

echo "<br>Nome: $nome<br>BI: $bi<br>Telefone: $telefone<br>Email: $email<br>Data: $data
      <br>Hora: $hora<br>String: $str<br>Float: $float<br>Inteiro: $int
      <br>Login: $login<br>Senha: $senha<br>URL: $url<br>Sexo: $sexo
      <br>Estado Civil: $est<br>Mes: $mes<br>Dia: $dia<br>Data Hora: $dataHora<br>
      <hr>";

var_dump($v->getErros());
