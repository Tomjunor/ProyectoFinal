<?php
  function validarDatos($datos) {
    $errores = [];

    if (trim($datos["nombre"]) === "") {
      $errores["nombre"] = "No ingreso ningun nombre.";
    }

    $mail = trim($_POST["mail"]);
    if (trim($datos["mail"]) === "") {
      $errores["mail"] = "No ingreso ningun mail.";
    } else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
  		$errores["mail"] = "Mal formato de mail";
  	}

    if (strlen(trim($datos["username"]) === "")) {
      $errores["username"] = "No ingreso ningun Username.";
    }
    $username = trim($datos["username"]);
    if (strlen($username) < 8) {
      $errores["usernameLen"] = "Username ingresado menor a 8 caracteres";
    }

    $pass = trim($_POST["password"]);
    $passConf = trim($_POST["passwordConfir"]);

    if (strlen(trim($datos["password"]) === "")) {
      $errores["password"] = "No ingreso ninguna Contraseña.";
    } else if (strlen($pass) < 8) {
      $errores["passwordLen"] = "La Contraseña ingresada en menor a 8 caracteres.";
    } else if ($pass != $passConf) {
      $errores["passwordConfir"] = "La Contraseña y la Conifirmacion son distintas.";
    }


    return $errores;
  };

  function validarLogin($datos) {
		$errores = [];

		$mail = trim($datos["mail"]);

		if ($mail === "") {
			$errores["mail"] = "Che amigo, te falto el mail";

		} else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
			$errores["mail"] = "Mal formato de mail";

		} else if (dameUnoPorMail($mail) == NULL) {
			$errores["mail"] = "Ese mail no existe en nuestra base";

		} else { // SIGNIFICA QUE EL USUARIO EXISTE

			$usuario = dameUnoPorMail($mail);
			if (!password_verify($datos["password"], $usuario["password"])) {
				$errores["mail"] = "Contraseña invalida";

        return $errores;
			}
		}
}
    function crearUsuario($datos) {
      $usuario = [
        "nombre" => $datos["nombre"],
        "username" => $datos["username"],
        "mail" => $datos["mail"],
        "password" => password_hash($datos["password"], PASSWORD_DEFAULT),
        "pais" => $datos["Pais"]
      ];

      $usuario["id"] = traerNuevoId();

      return $usuario;
    }

    function traerNuevoId() {
  		$archivo = file_get_contents("usuarios.json");

  		// Si el archivo estaba vacio devuelvo 1
  		if ($archivo == "") {
  			return 1;
  		}

  		// Divido mi archivo por enters
  		$usuarios = explode(PHP_EOL, $archivo);

  		// Borro la linea del enter vacio
  		array_pop($usuarios);

  		// Obtengo el ultimo usuario
  		$ultimoUsuario = $usuarios[count($usuarios) - 1];

  		// Transformo mi ultimo usuario en formoto array
  		$ultimoUsuario = json_decode($ultimoUsuario,true);

  		// Devuelvo ese id + 1
  		return $ultimoUsuario["id"] + 1;
  	}

    function dameUnoPorMail($mail) {
  		$usuarios = dameTodos();

  		foreach ($usuarios as $usuario) {
  			if ($usuario["mail"] == $mail) {
  				return $usuario;
  			}
  		}
  		return NULL;
  	}

    function dameTodos() {
  		$archivo = file_get_contents("php/data.txt");

  		// Lo separo linea por linea
  		$usuariosJSON = explode(PHP_EOL, $archivo);

  		// Borro el enter vacio
  		array_pop($usuariosJSON);

  		$usuariosFinal = [];
  		foreach ($usuariosJSON as $usuarioJSON) {
  			$usuariosFinal[] = json_decode($usuarioJSON,true);
  		}

  		return $usuariosFinal;
  	}

 ?>
