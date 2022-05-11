<?php

class Usuario{
    private $pdo;
    public $msgErro = "";

    public function conectar($nome, $host,$usuario,$senha){
        global $pdo;
        try{
            $pdo = new pdo("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);

        }catch (PDOException $e){
            $msgErro=$e -> getMessage();
        }   
    }
    public function cadastrar($nome, $telefone,$email,$senha){
        global $pdo;
        //verificar cadastro existente
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();
        if($sql->rowCount()> 0) 
        {
            return false; //ja esta cadastrado
        }
        else
        {
            //caso nao cadastrado
            $sql = $pdo->prepare("INSERT INTO usuarios (nome,telefone,email,senha) VALUES (:n, :t, :e, :s)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",$senha);
            $sql->execute();
            return true; //tudo ok

        }

    }
    public function logar($email,$senha){
        global $pdo;
        //verificar se o email e senha estao cadastrados, se sim
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",$senha);
        $sql->execute();
        if($sql->rowCount()> 0)
        {
            //entrar no sistema (sessao)
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true; //cadastrado com sucesso
        }
        else
        {
            return false;//nao foi possivel logar
        }

    }
}
?>