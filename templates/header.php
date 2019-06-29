<?php if(!isset($_niveisacesso)) die("<h1><strong>não foi importado o arquivo: permissoes.php</strong></h1>")?>
<header>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">
            <ul class="nav navbar-nav">            
                <li><a href="administrativo.php">Home</a></li>

                <?php if(in_array($_niveisacesso, $_permissaoCadastro)):?>
                    <li><a class="dropdown-toggle" data-toggle="dropdown">Cadastro<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="lista_membro.php">Membros</a></li>
                            <li><a href="lista_macro.php">Macro</a></li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if(in_array($_niveisacesso, $_permissaoCelulograma)):?>
                    <li><a href="lista_presenca.php">Celulograma</a></li>
                <?php endif; ?>

                <?php if(in_array($_niveisacesso, $_permissaoRelatorios)):?>
                    <li><a href="relatorio_lider.php">Relatorios</a></li>
                <?php endif; ?>

                <?php if(in_array($_niveisacesso, $_permissaoEstudosCelula)):?>
                    <li><a href="estudos.php">Estudos de Celula</a></li>
                <?php endif; ?>

                <?php if(in_array($_niveisacesso, $_permissaoUsuario)):?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">Usuario<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="lista_usuario.php">Cadastro Usuario</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span>
                        <?=$_SESSION['usuarioNome']?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="../sair.php">Sair</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<script>
    (function () {        
        document.addEventListener("DOMContentLoaded", function(event) {
            var _urlAtual = '<?=basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING'])?>';
            var _carregar = function () {
                $("nav.navbar.navbar-inverse.navbar-static-top").find("li a[href='"+_urlAtual+"']")
                    .closest('li').addClass("active")
                    .closest('li.dropdown').addClass("active");
            };
            _carregar();
        });
    })()
</script>