<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <!-- Bootsrtap CDNs -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/catestyle.css">

    <title>Categorias</title>
  </head>
  <body>

    <!-- NavrBar -->

    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header" style="width: 25%">
          <a class="navbar-brand" href="../index.html">
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
           <button type="button" class="btn btn-default navbar-btn"><a href="login.php">Ingresa</a></button>
           <button type="button" class="btn btn-default navbar-btn"><a href="regitro_usuario.php">Registrate</a></button>
           <button type="button" class="btn btn-default navbar-btn"><a href="#">Publica</a></button>
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

<!-- Categorias test 1 -->

  <div class="CategoriasDropdown">
    <h2>Servicios</h2>
    <!-- Split button -->
    <div class="btn-group">
      <button type="button" class="btn btn-danger">Action</button>
      <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="caret"></span>

        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <ul class="dropdown-menu">
        <li><a href="regitro_usuario.php">Action</a></li>
        <li><a href="#">Another action</a></li>
        <li><a href="#">Something else here</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="#">Separated link</a></li>
      </ul>
    </div>
  </body>
</html>
