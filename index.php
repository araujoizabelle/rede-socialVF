<!doctype html>  
<html>
	<head>
		<meta charset="utf-8"/>	
		<link rel="stylesheet" type="text/css" href="./css/index.css"/>
		<link href="https://fonts.googleapis.com/css?family=Quicksand|Raleway" rel="stylesheet">
		<script src="./js/jquery.js"></script>
		<script>
			$(function(){
				$("#Cadastrar").click(function(){
					$(".global").fadeOut();
					$(".botao").fadeOut();
					$(".login").fadeOut();
					$(".cadastro").fadeIn();
					var altura = $(window).innerHeight();
					var alturaDiv = $(".cadastro").innerHeight();
					var novaAltura = (altura - alturaDiv)/2;
					$(".cadastro").css("top",novaAltura);
					var largura = $(window).innerWidth();
					var larguraDiv = $(".cadastro").innerWidth();
					var novalargura = (largura- larguraDiv)/2;
					$(".cadastro").css("left",novalargura);
				})
				$("#Entrar").click(function(){
					$(".global").fadeOut();
					$(".botao").fadeOut();
					$("#Cadastrar").fadeIn();
					$(".cadastro").fadeOut();
					$(".login").fadeIn();
					var altura = $(window).innerHeight();
					var alturaDiv = $(".login").innerHeight();
					var novaAltura = (altura - alturaDiv)/2;
					$(".login").css("top",novaAltura);
					var largura = $(window).innerWidth();
					var larguraDiv = $(".login").innerWidth();
					var novalargura = (largura- larguraDiv)/2;
					$(".login").css("left",novalargura);
				})
			});
		</script>
	</head>
	<body id="body">

		<div class="botao">
			<button class="entrar-cadastrar" id="Cadastrar"> Cadastrar </button>
			<button class="entrar-cadastrar" id="Entrar"> Entrar </button>
		</div>
		<div class="login">
			<form method="POST" action="login.php">
				<label>Usuário</label>
					<input type="text" name="username"/>
					<label>Senha</label>
					<input type="password" name="senha"/>
				<input class="sub" type="submit" value="Entrar"/><br/>
			</form>
		</div>
		
		<img src="./img/chat-icon.png" id="icon" class="global"/>
		<p class="welcome global" >Welcome</p>

		<div class="cadastro">
			<form enctype="multipart/form-data" action="cadastrar.php" method="POST">
				<input class="firstName" name="nome" type="text" placeholder="nome"/>
				<input class="lastName" name="sobrenome" type="text" placeholder="sobrenome"/>
				<label for="sexo">Sexo:</label>
				<input type="radio" name="sexo" class="sexo" value="F"/>F
				<input type="radio" name="sexo" class="sexo" value="M"/>M
				<input type="radio" name="sexo" class="sexo" value="O"/>Outro</br></br>
				<input class="email" name="email" type="email" placeholder="email"/>
				<input class="userName" name="username" type="text" placeholder="username"/>
				<input class="password" name="senha" type="password" placeholder="senha"/>
				<input class="confPassword" name="csenha" type="password" placeholder="confirma senha"/>
				<input type="file" class="arquivo" name="perfil" class="arquivos"/>
				<input type="file" class="arquivo"  name="fundo" class="arquivos"/>
				<input class="sub" type="submit" value="Cadastrar"/><br/>

			</form>
		</div>
		

	</body>
</html>