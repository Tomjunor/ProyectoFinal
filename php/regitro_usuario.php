<?php

  include("functions.php");

  $nombreDefault = '';
  $emailDefault = '';
  $usernameDefault = '';
  $contrasenaDefault= '';

  if ($_POST) {
    $errores = validarDatos($_POST);

    if (!isset($errores["nombre"])) {
      $nombreDefault = $_POST["nombre"];
    }
    if (!isset($errores["email"])) {
      $emailDefault = $_POST["email"];
    }
    if (!isset($errores["username"])) {
      $usernameDefault = $_POST["username"];
    }

    if (count($errores) == 0) {
      header("location: confirmacion.php");exit;
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
     <title>Registro Usuario</title>
     <link rel="stylesheet" href="css/master.css">
   </head>
   <body>
     <?php if ($_POST && count($errores) > 0) { ?>
   		<ul>
   			<?php foreach ($errores as $error) { ?>
   				<li>
   					<?=$error?>
   				</li>
   			<?php } ?>
   		</ul>
   	<?php } ?>
     <div class="register-box" id='fg_membersite' style=''>
         <form id='register' action='' method='post'>
             <fieldset >
                 <legend>Registrate</legend>

                 <div class='container'>
                     <label for='name' >Nombre completo: </label><br/>
                     <input type='text' name='nombre' id='name' value='<?=$nombreDefault?>' maxlength="50" /><br/>
                 </div>

                 <div class='container'>
                     <label for='email' >Email:</label><br/>
                     <input type='text' name='email' id='email' value='<?=$emailDefault?>' maxlength="50" /><br/>
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
   </body>
 </html>
<?php
if ($_POST) {

  var_dump($_POST);
};
 ?>
