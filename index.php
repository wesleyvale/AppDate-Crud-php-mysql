<?php
require_once 'classes/usuarios.php';
$u = new Usuario;

?>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>Projeto Login</title>
    <link rel="stylesheet" href = "CSS/estilo.css">
</head>
<body>
    <div id="corpo-form">
    <h1>Entrar</h1>
    <form method="POST">
        <input type="email" placeholder="Usuário"name="email">
        <input type="password" placeholder="Senha"name="senha">
        <input type="submit" value="Acessar">
        <a href="cadastrar.php">Ainda nao é inscrito?<strong>Cadastrar-se
    </form>
    </div>
    <!-- <label for="checkbox" class="toggler">
        <input type="checkbox" id="checkbox">
        <span class="ball"></span>
        <i class="ri-sun-line sun"></i>
        <i class="ri-moon-line moon"></i>
    </label> -->

    <?php
    if(isset($_POST['email']))//verifica a existencia do arrey "POST"
    {
        $email= addslashes($_POST['email']);
        $senha= addslashes($_POST['senha']);
        //verificar se esta preenchido
        if(!empty($email) && !empty($senha) )
        {
            $u->conectar("projeto_login","localhost","root","");
            if($u->msgErro =="")
            
            {
                if($u->logar($email,$senha))
                {
                    header("location: AreaPrivada.php");

                }
                else
                {
                    ?>
                    <div class="msg-erro">
                        Email e/ou senha incorretos!
                    <?php

                }

            }
            else 
            {
                ?>
                    <div class="msg-erro">
                        Preencha todos os campos!
                    <?php
            }

        }else
        {
            ?>
                    <div class="msg-erro">
                        <?php echo "Erro: ".$u->msgErro; ?>
                    </div>
                    <?php

        }
    }
    ?>
    </body>

    
</html>