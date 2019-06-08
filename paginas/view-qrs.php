<!DOCTYPE html>
<html lang="pt">
<head>
	<?php
		include '../consulta/dados-qrs.php';
		//include '../consulta/dados-qr.php';
		
		
		// for ($i=0; $i < $quantidade_qrs; $i++){
		// 	$dados_qr_codes_implode = implode("|",$dados_qr_codes[$i]);
		// 	$dados_livro_implode = implode("|",dados_livro($dados_qr_codes[$i]['id_livro']));
		// 	$dados_url_implode = implode("|",dados_url($dados_qr_codes[$i]['id_qr_code']));
			
		// 	$dados_implode = $dados_implode . "§" . $dados_qr_codes_implode. '~' .$dados_livro_implode. '~' .$dados_url_implode;

		// }

		// session_start();
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
<!--===============================================================================================-->
</head>
<body>
	
	<div class="bg-contact100">
		<div class="container-contact100">
			<div class="wrap-contact100">
					<span class="contact100-form-title">
						Atualizar QR Code
					</span>
					<!-- Area de pesquisa -->
                        <?php
                            include '../template/pesquisa-qr.php';
                            //$_card_qr = CardQr();
                        ?>


					<div class="row" id="qrs">
						<?php
                            $array = array();
							for ($i=0; $i < $quantidade_qrs; $i++){
								if ($dados_qr_codes[$i]['codigo'] != ''){
									echo '<div class="espaco-categorias" style="margin: 10px";><a href="view-qr.php?codigo=' .$dados_qr_codes[$i]['codigo'] .'"><center>'.$dados_qr_codes[$i]['codigo'].'</center><img name="codigo" style="height: 200px; width: 200px;" src="../images/'.$dados_qr_codes[$i]['codigo'].'.png" alt="IMG"></a></div>';
                                    $array[] = $dados_qr_codes[$i]['codigo'];
								}
							}
						?>	
					</div>	

					<!-- Botão cadastro -->
					<div class="container-contact100-form-btn" id="inicio">
						<input type="button" class="contact100-form-btn" value="Início" onclick="inicio()">
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
	function inicio(){
		window.location.href = "index.php";
	}

    (function($) {
        "use strict";
        var codigo_qr = "";
        var img_link_qr = "";

        var codigo_qr_php = <?php echo json_encode(array_values($array)); ?>;

        //Verifica se o codigo está no input de pesquisa
        $( "#pesquisa-codigo" ).focus(function() {
            //$("#qrs").append("<h1>Título</h1>");

            $(document).keypress(function(e) {
                codigo_qr = $("#pesquisa-codigo").val();
                img_link_qr = '../images/' + codigo_qr + '.png';

                if (e.which == 13){
                    console.log(codigo_qr_php.indexOf(codigo_qr));

                    //Se o código for encontrado
                    if (codigo_qr_php.indexOf(codigo_qr) != -1){
                        $("#qrs").html('<div class="espaco-categorias" style="margin: 10px";><a href="view-qr.php?codigo='+ codigo_qr +'"><center>'+ codigo_qr +'</center><img name="codigo" style="height: 200px; width: 200px;" src="'+ img_link_qr +'" alt="IMG"></a></div>');
                    }else{
                        if ($("#pesquisa-codigo").val() == ""){
                            location.reload();
                        }else{
                            $("#qrs").html('<div><span class="contact100-form-title" style="margin-left: 10px; margin-top: 50px; color: grey;">Código não encontrado, insira outro.</span></div>');
                        }
                    }
                }

            });

        });

    })(jQuery);
	
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>



</body>
</html>
