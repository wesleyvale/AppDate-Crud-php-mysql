<?php
    require_once 'classes/usuarios.php';
    $u = new Usuario;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>LoveService</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
</head>
<body>
  <main>
    <img src="imagem/logo.png">
    <div class="profiles">
      <div class="profile">
        <div class="profile__image" style="background-image: url('imagem/3.jpg');"></div>
        <div class="profile__infos">
          <div class="profile__name">Service <span class="profile__age">20</span></div>
          <div class="profile__description">Lindo</div>
        </div>
      </div>
      <div class="profile">
        <div class="profile__image" style="background-image: url('imagem/2.jpg');"></div>
        <div class="profile__infos">
          <div class="profile__name">Nildo <span class="profile__age">20</span></div>
          <div class="profile__description">Tenho Sauna</div>
        </div>
      </div>
      <div class="profile">
        <div class="profile__image" style="background-image: url('imagem/1.jpg');"></div>
        <div class="profile__infos">
          <div class="profile__name">Vinicius <span class="profile__age">12</span></div>
          <div class="profile__description">A.D.M</div>
        </div>
      </div>
    </div>
    <div class="bottombar">
      <div class="bottombar__button">
        <img src="imagem/icon-next.svg">
      </div>
      <div class="bottombar__button">
        <img src="imagem/icon-heart.svg">
      </div>
    </div>
  </main>
  <script src='js/hammer.min.js'></script>
  <script src='js/main.js'></script>

  <?php

//   $u->conectar("projeto_login","localhost","root","");
 
//  $sql = $pdo->prepare("SELECT nome FROM usuarios");

//  $sql->execute();

//           while($pdo = $sql->fetch(pdo::FETCH_ASSOC)){
//             echo "nome: " . $pdo['nome']. "<br>";
//           }
        
  ?>
</body>
</html>