<?php
  require_once "bancodedados.php";
  session_start();
    
  if(isset($_SESSION['usuario'])&& !isset($_GET['uid'] ))
  {
    $u = $_SESSION['usuario'];
  }
  else if(isset($_SESSION['usuario'])&& isset($_GET['uid'] ))
  {
    $u = bd_obter_usuario_por_id( $con, $_GET['uid'] );
	if(!$u){
			header("location:erro.php?erro=Esse usuario nao existe."); 
			die();
			}
  }
  
  else if(!isset($_SESSION['usuario'])&& isset($_GET['uid'] ))
  {
    $u = bd_obter_usuario_por_id( $con, $_GET['uid'] );
	if(!$u){
			header("location:erro.php?erro=Esse usuario nao existe."); 
			die();
			}
  }
  else 
  {
    header('location:erro.php?erro=Erro');
  }
?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="./css/home.css"/>
    <style>
      body{
        background:url(<?php echo '"dados/'. $u['apelido'] .'/fundo.jpg"'?>);
        background-repeat:no-repeat;
        background-size: cover;
      }
    </style>
  </head>
  <body>
    <ul id="pagina-inicial-logout">
      <li class="btn-sessao"><a href="index.php">Página Inicial</a></li>
      <li class="btn-sessao"><a href="logOut.php">Sair</a></li>
    </ul>
  <div class="resumo-perfil">
  <div class="img-perfil">
    <style>
      .img-perfil{
        background:url(<?php echo '"dados/'.$u['apelido'].'/perfil.jpg"'?>);
        background-repeat:no-repeat;
        background-size: cover;
      }
    </style> 
  </div>
  <!-- <img class="perfil" src= /> -->
  <div class="infos">
  <h2> <?php echo $u['apelido'];  ?> </h2>
  <ul class="ul-info">
  <li class="li-info"> <?php echo $u['nome']; ?> </li>
 <li class="li-info"> <?php echo $u['sobrenome']; ?> </li><br/><br/>
  <li class="li-info"> <?php echo $u['sexo']; ?>  </li><br/><br/>
  <li class="li-info"> <?php echo $u['email']; ?> </li><br/><br/>
  </ul>
   </div>
   </div>



  <?php 
  if(isset($_SESSION['usuario']) && isset($_GET['uid'] ))
  {
  ?>
  <form action="funcaoadd.php" method="get" class="btn-form">
    <input type="submit" value="Adicionar" name="add" id="btn-submit"/></br></br>
    <input type="hidden" name="uid" value=<?php echo '"'.$_GET['uid'].'"';?>/>
  </form><div class="amigos">
 
  <?php 
  }  ?>
 
   <?php 
   if(isset($_SESSION['usuario']))
  { 



    ?> <h2 id="lista-amigos">Lista de amigos</h2>
  <div class="amigos"> <?php
    $amigos=bd_obter_amigos_usuario( $con, $u );
    foreach ($amigos as $amigo)
    {
    ?>
   
    <div id="nome-amigo">
    <span id="user_amigo"> <?php
       echo $amigo['nome'];
       ?></span>
       <div class="perf-amigo">
        <img src= <?php echo '"dados/'.$amigo['apelido'].'/perfil.jpg"'?> class="perfil-amigo"/>

      </div>
	  </div>
    

    <?php
    }
  }
 
  ?>
  
</div>
  </body>
</html>