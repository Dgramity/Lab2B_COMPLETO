
<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Preguntas</title>
    <link rel='stylesheet' type='text/css' href='estilos/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='estilos/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='estilos/smartphone.css' />
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
		<span class="right"><a href="registro.html">Registrarse</a></span>
      		<span class="right"><a href="login.php">Login</a></span>
      		<span class="right" style="display:none;"><a href="/logout">Logout</a></span>
		<h2>Quiz: el juego de las preguntas</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.html'>Inicio</a></spam>
		<span><a href='pregunta.html'>Preguntas</a></spam>
		<span><a href='creditos.html'>Creditos</a></spam>
	</nav>
    <section class="main" id="s1">
    
	<div>
	<?php  
		// Se conecta al SGBD 
		$iden = mysqli_connect("localhost", "root", "","Quiz")or die("Error: No se pudo conectar");
  		
		//comprobamos que hayamos pasado la imagen
		if (!isset($_FILES["archivo"]) || $_FILES["archivo"]["error"] > 0)
		{
		$destino="fotos/image_not_found.png";
		
		}else
		{
		$foto=$_FILES["archivo"]["name"];
		$ruta=$_FILES["archivo"]["tmp_name"];
		$destino="fotos/".$foto;
		copy($ruta,$destino);
		}
			
		$tabla="SELECT * FROM preguntas";
		$Numero = mysqli_num_rows(mysqli_query($iden,$tabla));
		$Numero=$Numero +1;
			//sentencia a ejecutar
			$sql="INSERT INTO preguntas VALUES ('$Numero','$_POST[correo]','$_POST[pregunta]','$_POST[correcta]','$_POST[incorrecta1]','$_POST[incorrecta2]','$_POST[incorrecta3]','$_POST[tema]','$_POST[complejidad]','$destino')";
				if (!mysqli_query($iden ,$sql))
					{
					die('Error: ' . mysqli_error($iden));
					}

		echo "Pregunta añadida";
		echo "<p> <a href='VerPreguntas.php'> Ver preguntas registradas </a>";
		
			
	mysqli_close($iden);		
	?>; 
	</div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://es.wikipedia.org/wiki/Quiz" target="_blank">Que es un Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>
