<?php
session_start();
include 'functions.php';
if ($_POST) {
  $errores = validarLogin($_POST);

  if (!count($errores)) {
    $_SESSION ['user'] = $_POST['mail'];
    header("location: ../index.html");
  }

}
 ?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <title>ServiWEB</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/loginstyle.css">

  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="">
            <img alt="Brand" src="../img/logo.png">
            <h3>ServiWEB</h3>
          </a>
        </div>
        <form class="navbar-form navbar-left">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
           <button type="submit" class="btn btn-default">
              <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
           </button>
         </form>
         <div class="navbar-right navbar-btns">
           <button action="header("location: ../index.html")" type="button" class="btn btn-default navbar-btn">Ingresa</button>
           <button type="button" class="btn btn-default navbar-btn">Registrate</button>
           <button type="button" class="btn btn-default navbar-btn">Publica</button>
           <button type="button" class="btn btn-default navbar-btn">Contrata</button>
         </div>
      </div>
    </nav>

    <section>
      <h1>Login</h1>
      <?php if ($_POST && count($errores) > 0) { ?>
    		<ul>
    			<?php foreach ($errores as $error) { ?>
    				<li>
    					<?=$error?>
    				</li>
    			<?php } ?>
    		</ul>
    	<?php } ?>
      <form action="" method="post">
        <div class="">
          <label for="">Mail</label>
          <input type="text" name="mail" value="">
        </div>
        <div class="">
          <label for="">Contraseña</label>
          <input type="password" name="password" value="">
        </div>
        <div>
          <input type="checkbox" name="recordar_usu"> Recordar usuario
        </div>
        <div class="">
          <input type="submit" name="" value="Loguearse">
        </div>
      </form>
      </div>
    </section>
