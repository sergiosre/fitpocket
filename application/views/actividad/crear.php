
<h2>Nuevo actividad</h2>
<form method="post" action="<?=base_url()?>actividad/crearPost" enctype="multipart/form-data">
	Nombre
	<input type="text" name="nombre" required="required" id="nombre">
	<br />
	Info
	<textarea name="info" rows="1" cols="30" id="info" required="required" placeholder="Información de la actividad"></textarea>
		<br />
	Impacto
	<select name="impacto" id="impacto">
		<option value="Alto">Alto</option>
		<option value="Medio">Medio</option>
		<option value="Bajo">Bajo</option>
	</select>
	<br/>
	Selecciona una imagen
	<input type="file" name="fileToUpload" id="fileToUpload">
	<br>
	
	<input type="submit" value="Crear Actividad"/>
</form>

<!-- 
<form action="<?=base_url()?>administrador/subidaArchivosPost" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="text "name="nombreArchivo" placeholder="Nombre del archivo">
    <input type="submit" value="Upload Image" name="submit">
</form> -->

<script src="<?= base_url() ?>assets/js/app/actividades.js"></script>