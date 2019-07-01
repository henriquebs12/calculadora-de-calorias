<?php

require_once 'assets/php/classUsuario.php';

$user = new Usuario();

if (isset($_POST['action'])){
  $user->setNome($_POST['nome']);
  $user->setAltura(floatval(str_replace(',', '.', $_POST['altura'])));
  $user->setPeso($_POST['peso']);
  $user->setData($_POST['data']);  
  $user->setEmail($_POST['email']);
  $user->setSenha($_POST['senha']);
  $user->setGenero($_POST['genero']);
  $user->setIs_admin($_POST['is_admin']);
  if($id = $user->insert()){
      $result = "Vamos a calculadora!";
      session_start();
      $_SESSION['id'] = $id;
      header("Location: calculadora.php");
    }else{
      $error = "Ops, algo deu errado!";
      }
}

?>
<html lang="pt-BR">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Thiago: Eu que coloquei -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
      
    </script>

  <!-- Bootstrap Reboot -->
  <link rel="stylesheet" href="assets/css/bootstrap-reboot.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Main CSS -->
  <link rel="stylesheet" href="assets/css/style.min.css">
  <title>Biblioteca calórica</title>
</head>

<body class="body-home">

  <img class="logo" src="assets/images/diamond.svg" alt="">
  <h3 class="text-center">Mais controle.<br>
    Menos preocupação.</h3>
    <div id="temporizador">
      <?php
      if(isset($warning)){
        ?>
        <div class="alert alert-warning">
          <?php echo $warning; ?>      
        </div> 
      <?php 
      }else if(isset($result)) {
      ?>
        <div class="alert alert-success">
          <?php echo $result; ?>
        </div>
      <?php
      }else if(isset($error)){
      ?>
        <div class="alert alert-danger">
          <?php echo $error; ?>
        </div>
      <?php
      }
      ?>
    </div>
  <main class="landing-page">

    <div class="container">
      <form method="post" action="InsertUser.php" class="login" id='login'>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input required="required" type="email" id="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="exemplo@email.com.br">
          <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Senha</label>
          <input required="required" type="password" id="senha" name="senha" class="form-control" id="exampleInputPassword1" placeholder="*******">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nome</label>
          <input required="required" type="name" id="nome" name="nome" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Poliana da silva">
          <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Altura</label>
          <input required="required" step="0.01" type="number" id="altura" name="altura" class="form-control" id="exampleInputPassword1" placeholder="Em centimetros">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Peso</label>
          <input required="required" step="0.01" type="number" id="peso" name="peso" class="form-control" id="exampleInputPassword1" placeholder="em quilos">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Data de nascimento</label>
          <input required="required" type="date" id="data" name="data" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Genero</label>
          <br>
          <input type="radio" required="required" id="male" name="genero"  value="M">M<br>
          <input type="radio" required="required" id="female" name="genero"  value="F">F<br>
        </div>
        <input required="required" type="hidden" name="is_admin" value=0>
        <input required="required" type="hidden" name="action" value="insert">
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </main>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
    <script>
      $(document).ready(function() {
        $('#temporizador').fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
        $(".alert-success").fadeTo(1000, 500).slideUp(300, function(){
          $(".alert-success").alert('close');
          window.location.href = "login.php";
        });
        $(".alert-danger").fadeTo(1000, 500).slideUp(300, function(){
          $(".alert-danger").alert('close');
          window.location.href = "InsertUser.php";
        });
      });
    </script>
</body>

</html>

