<?php

  include("functions.php");

  $nombreDefault = '';
  $emailDefault = '';
  $usernameDefault = '';
  $contrasenaDefault= '';
  $archivo = __DIR__.'/data.txt';



//Errores de la valdacion
  if ($_POST) {
    $errores = validarDatos($_POST);

    if (!isset($errores["nombre"])) {
      $nombreDefault = $_POST["nombre"];
    }
    if (!isset($errores["mail"])) {
      $emailDefault = $_POST["mail"];
    }
    if (!isset($errores["username"])) {
      $usernameDefault = $_POST["username"];
    }
    if (count($errores) == 0) {

      $_SESSION ['user'] = $_POST ['mail'];
      $usuarioNuevo = crearUsuario($_POST);

      $texto = json_encode($usuarioNuevo);
      //var_dump($texto);

      echo "Escribiendo en $archivo<br/>";
      if (file_put_contents($archivo, $texto  . PHP_EOL, FILE_APPEND | LOCK_EX)) {
        echo "Vamos!";
      } else {
        echo "No!";
      }

      header("location: ../index.html");
      exit;
}
  }

  $paises = [
    'AR' => 'Argentina',
    'BR' => 'Brazil',
    'URU' => 'Uruguay',
    'PE' => 'Peru',
    'ECU' => 'Ecuador',
    'COL' => 'Colombia',
    'MEX' => 'Mexico',
    'NIC' => 'Nicaragua',
    'USA' => 'Murica',
    'CHI' => 'Chile',
  ];

 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Registro</title>

     <!-- Bootsrtap CDNs -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
     <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">

     <!-- CSS -->
     <link rel="stylesheet" href="../css/styles.css">
     <link rel="stylesheet" href="../css/registrocss.css">

     <!-- Fonts -->
     <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

   </head>
   <body>
     <nav class="navbar navbar-default">
       <div class="container-fluid">
         <div class="navbar-header" style="width: 25%">
           <a class="navbar-brand" href="">
             <img alt="Brand" src="../img/logo.png">
             <h3>ServiWEB</h3>
           </a>
         </div>
         <form class="navbar-form navbar-left " style="width: 50%">
           <div class="form-group search-btn" style="width: 85%">
             <input type="text" class="form-control" placeholder="Search" style="width: 100%">
           </div>
            <button type="submit" class="btn btn-default search-btn" style="width: 15%">
               <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </button>
          </form>
          <div class="navbar-right navbar-btns" style="width: 25%">
            <button type="button" class="btn btn-default navbar-btn">Ingresa</button>
            <button type="button" class="btn btn-default navbar-btn">Registrate</button>
            <button type="button" class="btn btn-default navbar-btn">Publica</button>
          </div>
          <div class="dropdown">
            <button class="btn btn-default navbar-btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <li class="dropdown-item" href="#">
                <button type="button" class="btn btn-default navbar-btn">Ingresa</button>
              </li>
              <li class="dropdown-item" href="#">
                <button type="button" class="btn btn-default navbar-btn">Registrate</button>
              </li>
              <li class="dropdown-item" href="#">
                <button type="button" class="btn btn-default navbar-btn">Publica</button>
              </li>
            </ul>
          </div>
       </div>
     </nav>

      <!-- Fin del Nav, Comienzo del Registro -->

     <?php if ($_POST && count($errores) > 0) { ?>
   		<ul>
   			<?php foreach ($errores as $error) { ?>
   				<li>
   					<?=$error?>
   				</li>
   			<?php } ?>
   		</ul>
   	<?php } ?>

    <!--
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/registrocss.css">
  -->

    <div class="testbox">
      <h1>Registro</h1>

      <form action="/">
          <hr>
        <div class="accounttype">
          <input type="radio" value="None" id="radioOne" name="account" checked/>
          <label for="radioOne" class="radio" chec>Personal</label>
          <input type="radio" value="None" id="radioTwo" name="account" />
          <label for="radioTwo" class="radio">Compania</label>
        </div>
      <hr>
      <label id="icon" for="name"><i class="icon-envelope "></i></label>
      <input type="text" name="name" id="name" placeholder="Email" required/>
      <label id="icon" for="name"><i class="icon-user"></i></label>
      <input type="text" name="name" id="name" placeholder="Nombre Completo" required/>
      <label id="icon" for="name"><i class="icon-shield"></i></label>
      <input type="password" name="name" id="name" placeholder="Password" required/>
      <div class="genero">
        <input type="radio" value="None" id="male" name="genero" checked/>
        <label for="male" class="radio" chec>Hombre</label>
        <input type="radio" value="None" id="female" name="genero" />
        <label for="female" class="radio">Mujer</label>
       </div>
       <p>Clickeando Registrarse, Aceptas nuestros <a href="#">terminos y condiciones</a>.</p>
       <a href="#" class="button">Registrate</a>
      </form>
    </div>








    <!-- RegisterBox
     <div class="register-box" id='fg_membersite' style=''>
         <form id='register' action='' method='post'>
             <fieldset class="box" >
                 <legend>Registrate</legend>

                 <div class='container'>
                     <label for='name' >Nombre completo: </label><br/>
                     <input type='text' name='nombre' id='name' value='<?=$nombreDefault?>' maxlength="50" /><br/>
                 </div>

                 <div class='container'>
                     <label for='avatar' >Avatar: </label><br/>
                     <input type='text' name='avatar' id='avatar' value= maxlength="50" /><br/>
                 </div>

                 <div class='container'>
                     <label for='mail' >Mail:</label><br/>
                     <input type='text' name='mail' id='mail' value='<?=$emailDefault?>' maxlength="50" /><br/>
                 </div>

                 <div class='container'>
                     <label for='username' >Username:</label><br/>
                     <input type='text' name='username' id='username' value='<?=$usernameDefault?>' maxlength="50" /><br/>
                 </div>

                 <div class='container' style=''>
                     <label for='password' >Contaseña:</label><br/>
                     <input type='password' name='password' id='password' maxlength="50" />
                     <div id='register_password_errorloc' class='error' style='clear:both'></div>
                 </div>

                 <?php
                   if (!array_key_exists("versionCorta", $_GET)) {?>
                     <div class='container' style='height: 80px;' >
                         <label for='password' >Confirmar contaseña:</label><br/>
                         <input type='password' name='passwordConfir' id='passwordConfir' maxlength="50" />
                     </div>
                   <?php }
                  ?>

                  <div style='height:80px;' class='container'>
                      <select class="paises" name="Pais">
                        <?php foreach ($paises as $codigo => $pais) { ?>
                          <option value="<?= $codigo ?>">
                            <?= $pais ?>
                          </option> <?php
                        } ?>
                      </select>
                  </div>

                 <div class='container'>
                     <input type='submit' name='Submit' value='Enviar' />
                 </div>

             </fieldset>
         </form>
       </div>
     -->

   </body>
 </html>
