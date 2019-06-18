<!DOCTYPE html>
<html>

<body>

    <form action="<?= base_url() ?>administrador/subidaArchivosPost" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="text " name="nombreArchivo" placeholder="Nombre del archivo">
        <input type="submit" value="Upload Image" name="submit">
    </form>

</body>

</html>