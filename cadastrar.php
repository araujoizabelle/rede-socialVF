
<?php
session_start();
require_once "bancodedados.php";
if ( (isset($_POST["username"])) && (isset($_FILES['perfil'])) && (isset($_FILES['fundo'])) && isset($_POST[ "nome" ])&& isset($_POST[ "sobrenome" ])&& isset($_POST[ "sexo"])&& isset($_POST[ "email" ])&& isset($_POST[ "senha" ]) && isset($_POST[ "csenha" ]))
if(!(($_POST["username"]=="") || ($_POST[ "nome" ]=="") || ($_POST[ "sobrenome" ]=="") || ($_POST[ "sexo"]=="") || ($_POST[ "email" ]=="") || ($_POST[ "senha" ]=="") || ($_POST[ "csenha" ]=="")))
{


	$usuario[ 'apelido' ]=$_POST["username"];
	$usuario[ 'perfil' ]=$_FILES["perfil"];
	$usuario[ 'fundo' ]=$_FILES["fundo"];
	$usuario[ 'nome' ]=$_POST["nome"];
	$usuario[ 'sobrenome' ]=$_POST["sobrenome"];
	$usuario[ 'sexo' ]=$_POST["sexo"];
	$usuario[ 'email' ]=$_POST["email"];
	$usuario[ 'senha' ]=$_POST["senha"];
	//$usuario[ 'senha' ]=hash('sha512',$usuario['senha']);
	
	$email= bd_verificar_email_existe( $con,$_POST["email"]);
	$apelido= bd_verificar_apelido_existe( $con, $_POST["username"]);
	

	if($email!=false)
	{
		header("location:erro.php?erro=Email ja existe."); 
	}
	else if($apelido!=false)
	{
		header("location:erro.php?erro=Nome de usuário já existe.");
	}
	else if((trim($_POST["senha"])!=trim($_POST[ "csenha" ])) )
	{
		header("location:erro.php?erro=Senha incorreta."); //erro
	}
	else{
		$cards=bd_adicionar_usuario( $con, $usuario );
		var_dump( $con->errorInfo() );
		if($cards!=false)
			{
			
				if(!file_exists('dados/'.$_POST['username']))
				{
					MKDIR('dados/'.$_POST['username']);
				}
			
			
				move_uploaded_file($_FILES['perfil']['tmp_name'],'dados/'.$_POST['username'].'/perfil.jpg');
				move_uploaded_file($_FILES['fundo']['tmp_name'],'dados/'.$_POST['username'].'/fundo.jpg');
			
				$_SESSION[ 'usuario' ] = bd_obter_usuario_por_apelido($con,$usuario['apelido']);
			
				header('location:home.php');
			}
			else
			{
				
				header("location:erro.php?erro=Verifique se nenhum campo esta vazio.");
			}
	}
			
			
}
else
{
	header("location:erro.php?erro=Verifique se nenhum campo esta vazio."); 
}
else
{
	header("location:erro.php?erro=Verifique se nenhum campo esta vazio."); 
}
?>
