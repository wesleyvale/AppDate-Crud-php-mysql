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
    <div id="corpo-form-cad">
    <h1>Cadastrar</h1>
    <form method="POST"">
        <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
        <input type="text" name="telefone"placeholder="Telefone" maxlength="30">
        <input type="password" name="confsenha" placeholder="Confirmar senha" maxlength="15">
        <input type="email" name="email"placeholder="Usuário"maxlength="40">
        <input type="password" name="senha"placeholder="Senha" maxlength="15">
        <input type="submit" value="Cadastrar">
        
    </form>
    </div>
    <?php
    //verificar se clicou no botao
    if(isset($_POST['nome']))//verifica a existencia do arrey "POST"
    {
        $nome = addslashes($_POST['nome']);
        $telefone= addslashes($_POST['telefone']);
        $email= addslashes($_POST['email']);
        $senha= addslashes($_POST['senha']);
        $confirmarSenha= addslashes($_POST['confsenha']);
        //verificar se esta preenchido
        if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha) )
        {
            //CONEXAO BANCO DE DADOS
            $u->conectar("projeto_login","localhost","root","");
            if($u->msgErro == "")//se esta tudo ok
            {
                if($senha == $confirmarSenha)
                {
                   if( $u->cadastrar($nome,$telefone,$email,$senha))
                   {
                       ?>
                       <div id="msg-sucesso"> cadastrado com sucesso,acesse para entrar</div>
                       <?php

                   }
                   else
                   {
                       ?>
                       <div class="msg-erro"> Email ja cadastrado</div>
                       <?php
                   }
                    
                }
                else
                {
                    
                    ?>
                       <div class="msg-erro"> Senha e confirmar senha nao corresponde</div>
                       <?php
                }
                

            }
            else
            {
                ?>
                <div class="msg-erro">
                    <?php echo "Erro: ".$u->msgErro;?>
            </div>
            <?php

            }

        }else
        {
            ?>
                       <div class="mensagem erro"> Preencha todos os campos</div>
                       <?php
            
        }
    }


    ?>
</body>
</html>