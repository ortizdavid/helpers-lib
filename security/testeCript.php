<?php

use Negocio\Nativo\Seguranca\CRSF;

require_once 'CRSF.php';

if(isset($_POST['enviar']))
{
    //var_dump($_POST, $_SESSION);
    echo "Token da Sessao: {$_SESSION['crsf_token']}<hr>";
    echo "Token do Form: {$_POST['crsf_token']}<hr>";

    if(!CRSF::isValid($_POST['crsf_token']))
        die("<h1 style='color: red'>Erro ao Gerar Token</h1>");
        
    else
    {
        echo "<h1>Token Gerado Com Sucesso!<h1><br>";
    }
}
?>

<form name="form" action="" method="post">
	<input type="text" name="Name" autofocus="autofocus">
	<?php CRSF::generate();?>
	<input type="submit"name="enviar" value="Enviar">
</form>