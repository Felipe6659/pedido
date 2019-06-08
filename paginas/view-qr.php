<!DOCTYPE html>
<html lang="pt">
<head>
	<?php 
		include '../consulta/dados-qr.php';
		
		$codigo = $_GET['codigo']; 

		$dados_qr_code = dados_qr($codigo);
		$dados_livro = dados_livro($dados_qr_code['id_livro']);
		$dados_url = dados_url($dados_qr_code['id_qr_code']);

		session_start();

		//Salvar na sessão
		$_SESSION['id_qr_code'] = $dados_qr_code['id_qr_code'];
		$_SESSION['id_livro'] = $dados_qr_code['id_livro'];
		$_SESSION['codigo'] = $codigo;
		$_SESSION['pagina'] = $dados_qr_code['pagina'];
		$_SESSION['url'] = $dados_url['url'];
		$_SESSION['desc_url'] = $dados_url['desc_url'];
		$_SESSION['nome_livro'] = $dados_livro['nome_livro'];
		$_SESSION['desc_livro'] = $dados_livro['desc_livro'];

	?>


	<title>Cadastro Qr</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../images/icons/favicon2.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/qr.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="bg-contact100" style="background-image: url('images/bg-01.jpg');">
		<div class="container-contact100">
			<div class="wrap-contact100">

				<form class="contact100-form validate-form" method="POST" action="../cadastro/atualizar-cadastro.php" enctype="multipart/form-data">
					<span class="contact100-form-title">
						<span>Atualizar URL:</span>
					</span>
					
					<!-- Id Qr Code -->
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						
						<input class="input100" type="text" name="id_qr_code" placeholder="<?php echo $dados_qr_code['id_qr_code']; ?>" disabled>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-qrcode" aria-hidden="true"></i>
						</span>
					</div>

					<!-- Código do Qr Gerado -->
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						
						<input class="input100" type="text" name="codigo" id="codigo" placeholder="<?php echo $dados_qr_code['codigo']; ?>" disabled>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-qrcode" aria-hidden="true"></i>
						</span>
					</div>

					<!-- Nome do Livro -->
					<div class="wrap-input100 validate-input espaco-categorias" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="nome-livro" placeholder="<?php echo $dados_livro['nome_livro']; ?>" disabled>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						  <i class="fa fa-book" aria-hidden="true"></i>
						</span>
					</div>

					<!-- Localização - Nº página -->
					<div class="wrap-input100 validate-input " data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="pagina" placeholder="<?php echo $dados_qr_code['pagina']; ?>" disabled>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						  <i class="fa fa-calculator" aria-hidden="true"></i>
						</span>
					</div>

					<!-- Descrição do Livro -->
					<div class="wrap-input100">
						<textarea class="input100" name="desc-livro" placeholder="<?php echo $dados_livro['desc_livro']; ?>" disabled></textarea>
						<span class="focus-input100"></span>
					</div>

					<!-- Url -->
					<div class="wrap-input100 validate-input espaco-categorias" data-validate = "Valid email is required: ex@abc.xyz">
					<input class="input100" type="text" name="url" placeholder="Url" value="<?php echo $dados_url['url']; ?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						  <i class="fa fa-code" aria-hidden="true"></i>
						</span>
					</div>

					<!-- Descrição do url -->
					<div class="wrap-input100">
						<textarea class="input100" name="desc-url" placeholder="<?php echo $dados_url['desc_url']; ?>" disabled></textarea>
						<span class="focus-input100"></span>
					</div>

					<!-- Botão atualizar -->
					<div class="container-contact100-form-btn">
						<input type="submit" class="contact100-form-btn" value="Atualizar">
					</div>
					<!-- Botão voltar -->
					<div class="container-contact100-form-btn">
						<input type="button" class="contact100-form-btn" value="Voltar" onclick="voltar()">
					</div>


				</form>


				<!-- LADO DIREITO -->
				<div class="contact100-pic js-tilt" data-tilt>
					<!-- Imagem Qr -->
					<center class="espaco-categorias"><img src="../images/<?php echo $dados_qr_code['codigo']; ?>.png" alt="IMG"></center>
					
					
					
				</div>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<script>
	function voltar(){
		window.location.href = "view-qrs.php";
	}
</script>



</body>
</html>
