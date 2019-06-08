<!DOCTYPE html>
<html lang="pt">
<head>

	<title>Frases</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
<!--===============================================================================================-->

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/qr.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="bg-contact100">
		<div class="container-contact100">
			<div class="wrap-contact100 row">

                    <!-- Descrição do Livro -->
                    <div class="wrap-input100">
                        <label class="input100" name="desc_livro" placeholder="Descrição do livro" style="text-align:center; margin-bottom:-30px;padding: 50px; border-radius: 20px;">
                            <b>
                                <a href="index2.php" class="typewrite" data-period="2000" data-type='[
                                    "Dara  Cristina Xavier Rosa, sei que não faz tanto tempo que nos conhecemos, porém já é mais que o suficiente pra você ter dipertado algo em mim.",
                                    "Algo que eu achei que NUNCA poderia sentir.",
                                    "Você meu anjo, é o que eu preciso...",
                                    "Seu jeito...",
                                    "Sua voz...",
                                    "Principalmente a de sono ...",
                                    "Seu cheiro...",
                                    "Sua cantoria kkkk",
                                    "Seu carinho ...",
                                    "Suas palavras... principalmente suas palavras...",
                                    "...o eu te amo...",
                                    "... tudo isso me encantou.",
                                    "...",
                                    "...",
                                    "Chegamos agora no momento das perguntas rs, desculpa ter te deixado tão ansiosa s2",
                                    "Lá vai...",
                                    "Clique aqui, para ir para as perguntas!",
                                    "Clique aqui, para ir para as perguntas!",
                                    "Clique aqui, para ir para as perguntas!",
                                    "Clique aqui, para ir para as perguntas!",
                                    "Clique aqui, para ir para as perguntas!",
                                    "Clique aqui, para ir para as perguntas!",
                                    "Clique aqui, para ir para as perguntas!"
                                ]'>
                                    <span class="wrap"></span>
                                </a>
                            </b>
                        </label>
                    </div>

			</div>
		</div>
	</div>








<script>
	function novo_cadastro(){
		window.location.href = "cadastrar.php";
	}

	function atualizar(){
		window.location.href = "view-qrs.php";
	}

	function excluir(){
		if(confirm("Uma vez que o qr for excluído não há como recuperar! Deseja prosseguir?")){
			window.location.href = "view-excluir-qr.php";
		}
	}

    var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
            this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
            this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
            delta = this.period;
            this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
            this.isDeleting = false;
            this.loopNum++;
            delta = 500;
        }

        setTimeout(function() {
            that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
                new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
        document.body.appendChild(css);
    };
</script>





</body>
</html>
