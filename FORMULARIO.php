<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>"FORMULARIO"</title>
		<link rel="stylesheet" href="css/estilo.css" type="text/css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
		<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
		<link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">
	</head>



	<body class="container">

  
		<form  method="POST" action="" class="card m-5 p-5 mb-1 pt-1" id="form1" >

			<div class="text-center">
				<h3 class="display-8">FORMULARIO VACUNACION COVID-19</h3>
			</div>

			<div class="container">
				<div class="row">
				  <div class="col">
					<div class="form-group">
						<label for="num_a1">NOMBRE Y APELLIDOS :</label>
					   <input class="form-control" type="text" name="nombre" id="nombre" 
						   placeholder="Ingrese su Nombre Completo y Apellidos" required>

				 
				</div>

				<div class="row">
					<div class="col">
					  <div class="form-group">
						  <label for="cedula">CEDULA:</label>
						 <input  name="cedula" id="cedula" class="form-control" type="number"
							 placeholder="Ingrese su cedula" required>

                             </div>
				  </div>
				  <div class="col">
					<div class="form-group">
						<label for="EDAD">EDAD:</label>
					   <input id="edad" name="edad" class="form-control" type="number" min="1" max="100" step="0.01"
						   placeholder="Ingrese su Edad" required>
				 </div>
				  </div>           

                  <div class="row">
				  <div class="col">
					<div class="form-group">
                    <p></p>
						<label for="1dosis:">FECHA PRIMERA DOSIS DE VACUNA:</label>
					   <input type="date" name="1dosis" step="1" min="2017-01-01" max="2024-12-31" value="2022-01-01">
                </div>
                </div>
				  <div class="col">
					<div class="form-group">
                    <p></p>
					    <label for="2dosis">FECHA SEGUNDA DOSIS DE VACUNA:</label>
                        <input type="date" name="2dosis" step="1" min="2017-01-01" max="2024-12-31" value="2022-01-01">
				 </div>
				  </div>    
				  
          <div class="row">
				  <div class="col">
					<div class="form-group">
                    <p></p>
                    <select name="tipo" class="form-select" aria-label="Default select example">
                    <option selected>SELECIONE TIPO DE BIOLOGICO</option>
                    <option value="PFIZER">PFIZER</option>
                    <option value="MODERNA">MODERNA</option>
                    <option value="JANSSEN">JANSSEN</option>
                    <option value="SINOVAC">SINOVAC</option>
                    <option value="ASTRAZENECA">ASTRAZENECA</option>
                    </select>
				
				</div>
			  </div>
			<input class="btn btn-success mt-3" type="submit" value="GUARDAR">
		</form>


		<?php
		$DATOS = array(
		$nombre = $_POST["nombre"],
		$edad = $_POST["edad"],
		$cedula =$_POST["cedula"],
		$fecha1 =$_POST["1dosis"],
		$fecha2 =$_POST["2dosis"],
		$tipo =$_POST["tipo"],
		);
#		echo $nombre;
#		echo $edad;
#		echo $cedula;
#		echo $fecha1;
#		echo $fecha2;
		#print_r($DATOS);

		$file = fopen("DATOS.txt", "a");
		foreach($DATOS as $final) {
			fwrite($file, $final);
			fwrite($file,";");
		}
		fwrite($file,$final.PHP_EOL);

		fclose($file);

		
		?>

	
        <?php
			$numlinea='0';
			
			if(($fp = fopen("DATOS.txt", "r")) !== FALSE) {
				while ($linea = fgets($fp)) {
					 #echo $linea.'<br/>';
					$aux[] = $linea;    
					$numlinea++;
				}
				fclose($fp);
			}
			

		?>
		

		<h2>REGISTRADOS</h2>
	
		<table class="table table-striped table-hover">
		
					<tr>
						<td><b>NOMBRE</b></td>
						<td><b>CEDULA<b></td>
						<td><b>EDAD<b></td>
						<td><b>TIPO DE BIOLOGICO<b></td>
						<td><b>PRIMERA DOSIS<b></td>
						<td><b>SEGUNDA DOSIS<b></td>
					<tr>
			<?php
			foreach ( $aux as $r ) {
					?>
					</tr>
					<?php
				
						$dat = explode(";",$r);
					?>
							<td><?php echo $dat[0];?></td>
							<td><?php echo $dat[2];?></td>
							<td><?php echo $dat[1];?></td>
							<td><?php echo $dat[5];?></td>
							<td><?php echo $dat[3];?></td>
							<td><?php echo $dat[4];?></td>
		
					</tr>
			<?php
			}
			?>
			</table>
		
		<footer class="container mb-5 pb-5">
			<h3 class="display-8">Creado por:</h3>
			Kevin Guerrero.
		</footer>
	</body>
	

	<script
		src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>
	<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="scripts.js">

	</script>

</html>