<?php
    include '../cadastro/gerar-codigo.php';
    include '../classes/Modal.php';

    $exibirModal = 0; //Seta a variável para que o modal fique (oculto 1 para true e 0 para false)

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include '../funcoes/funcoes.php';
        $dados_livro = array('nome'=> $_POST['nome_livro'],'desc'=> $_POST['desc_livro']);
        $dados_qr = array('pagina'=>$_POST['pagina'],'codigo'=>$_POST['codigo']);
        $dados_url = array('url'=>$_POST['url'],'desc'=>$_POST['desc_url']);

        /*
        if(isset($_FILES['fileUpload'])) {
            $id_livro = cadastrar_livro($dados_livro);

            $id_qr = cadastrar_qr_code($dados_qr,$id_livro, $_FILES['fileUpload']);

            cadastrar_url($dados_url, $id_qr);
            $exibirModal = 1; //Seta a variável para que o modal possa aparecer (1 para true e 0 para false)
        }
        else{
            echo "Não há arquivo.";
        }
        */






    }
?>
<!DOCTYPE html>
<html lang="pt">
<head>

	<title>Cadastro QR</title>
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

	<div class="bg-contact100" >
		<div class="container-contact100">
			<div class="wrap-contact100">

				<form class="contact100-form validate-form" id="form-cadastro" method="POST" action="#" enctype="multipart/form-data">
					<span class="contact100-form-title">
						Cadastro QR Code
					</span>

					<!-- Código do Qr Gerado -->
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="codigo" id="codigo" value="<?php echo $codigo ?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-qrcode" aria-hidden="true"></i>
						</span>
					</div>

                    <!-- Arquivo -->
					<input type="file" id="fileUpload" name="fileUpload" class="inputfile">
                    <label for="fileUpload" class="contact100-form-btn" id="btn-arquivo" onclick="nome_arquivo()">Adicionar arquivo</label>

					<!-- Nome do Livro -->
					<div class="wrap-input100 validate-input espaco-categorias" data-validate = "Não pode deixar vazio">
						<input class="input100" type="text" name="nome_livro" placeholder="Nome Livro">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						  <i class="fa fa-book" aria-hidden="true"></i>
						</span>
					</div>

					<!-- Localização - Nº página -->
					<div class="wrap-input100 validate-input " data-validate = "Não pode deixar vazio">
						<input class="input100" type="text" name="pagina" placeholder="Nº página">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						  <i class="fa fa-calculator" aria-hidden="true"></i>
						</span>
					</div>

					<!-- Descrição do Livro -->
					<div class="wrap-input100">
						<textarea class="input100" name="desc_livro" placeholder="Descrição do livro"></textarea>
						<span class="focus-input100"></span>
					</div>

					<!-- Url -->
					<div class="wrap-input100 validate-input espaco-categorias" data-validate = "Não esqueça de colocar o 'http' ou 'https'">
					<input class="input100" type="text" name="url" placeholder="Url">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						  <i class="fa fa-code" aria-hidden="true"></i>
						</span>
					</div>

					<!-- Descrição do url -->
					<div class="wrap-input100">
						<textarea class="input100" name="desc_url" placeholder="Descrição url"></textarea>
						<span class="focus-input100"></span>
					</div>


					<!-- Botão cadastro -->
					<div class="container-contact100-form-btn">
                        <?php
                            $modal = new Modal('cadastro-modal','Cadastro do qr realizado com sucesso!','Cadastro',array('continuar'),['continuar'=>'cadastrar.php']);
                            echo $modal->getModal();
                        ?>
						<input class="contact100-form-btn" id="btnConfirmar" type="submit" value="Cadastrar">
					</div>

					<!-- Botão voltar -->
					<div class="container-contact100-form-btn">
						<input type="button" class="contact100-form-btn" value="Voltar" onclick="voltar()">
					</div>

				</form>


				<!-- LADO DIREITO -->
				<div class="contact100-pic js-tilt" data-tilt>
					<!-- Imagem Qr -->
					<center class="espaco-categorias"><img src="../images/img-00.png" alt="IMG"></center>		
					<!-- Url para criar o QR -->
					<div class="wrap-input100 validate-input espaco-categorias" data-validate = "Message is required">
						<textarea class="input100" name="desc-url" placeholder="Descrição url">http://qr.doctum.edu.br/<?php echo $codigo ?></textarea>
						<span class="focus-input100"></span>
					</div>
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
	<script src="../js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<script>
	function voltar(){
		window.location.href = "index.php";
	}
</script>

<script>
    $(document).ready(function(){
        //Verifica se
        if (<?php echo $exibirModal ?> == 1){
            $.ajax({
                type: "POST",
                url: "cadastrar.php",
                //data: $('#form-cadastro').serialize(),
                success: function () {
                    //$("#feedback").html(message)
                    jQuery.noConflict();
                    $("#cadastro-modal").modal('show');
                },
                error: function () {
                    alert("Error");
                }
            });
            console.log(<?php echo $exibirModal = 0; ?>);
            //Oculta o modal
            window.setTimeout(function() {
                $("#cadastro-modal").modal('hide');
                window.setTimeout(function(){
                    window.location.href = "cadastrar.php";
                },500);
            },1500);
        }

    });

    function nome_arquivo(){
        window.setInterval(function(){

            if($('#fileUpload').val()){
                console.log('teste');
            };
        },2000);


    }


</script>


</body>
</html>

