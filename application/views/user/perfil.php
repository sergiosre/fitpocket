<div class="row flex-column align-items-center my-5 mt-row m-0">
    <img src="<?= base_url() ?>" class="img-square" width="200" height="200" id="user_image" style="display:none"/>
    <div class="mt-4"><button class="btn btn-sm btn-warning" id="editarFotoPerfil" data-toggle="modal" data-target="#editImgPerfilModal"><span class="glyphicon glyphicon-eye-open"></span> Editar Foto Perfil</button></div>
</div>
<div class="row justify-content-center m-0">
    <div class="col-md-8">
        <div class="row my-4">
            <div class="col-sm-6 col-12">
                <div class="row">
                    <div class="col-md-4"><label for="nombre">Nombre</label></div>
                    <div class="col-md-8"><input type="text" class="form-control" id="nombre"></div>
                </div>
            </div>

            <div class="col-sm-6 col-12">
                <div class="row">
                    <div class="col-md-4"><label for="apellidos">Apellidos</label></div>
                    <div class="col-md-8"><input type="text" class="form-control" id="apellidos"></div>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-sm-6 col-12">
                <div class="row">
                    <div class="col-md-4"><label for="email">Email</label></div>
                    <div class="col-md-8"><input type="text" class="form-control" id="email"></div>
                </div>
            </div>

            <div class="col-sm-6 col-12">
                <div class="row">
                    <div class="col-md-4"><label for="usuario">Usuario</label></div>
                    <div class="col-md-8"><input type="text" class="form-control" id="usuario"></div>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-sm-6 col-12">
                <div class="row">
                    <div class="col-md-4"><label for="edad">Edad</label></div>
                    <div class="col-md-8"><input type="text" class="form-control" id="edad"></div>
                </div>
            </div>

            <div class="col-sm-6 col-12">
                <div class="row">
                    <div class="col-md-4"><label for="estatura">Estatura</label></div>
                    <div class="col-md-8"><input type="text" class="form-control" id="estatura"></div>
                </div>
            </div>
        </div>

        <div class="row my-4">
            <div class="col-sm-6 col-12">
                <div class="row">
                    <div class="col-md-4"><label for="movil">Movil</label></div>
                    <div class="col-md-8"><input type="text" class="form-control" id="movil"></div>
                </div>
            </div>


        </div>

        <div class="row my-4 mx-0 justify-content-center mb-row">
            <button type="button" class="btn btn-primary btn-lg btn-block col-sm-4 mx-4 col-12">Guardar</button>
        </div>
        <input type="hidden" id="user_id" value="<?= $_SESSION['user_id'] ?>">
    </div>

    <!-- Modal foto perfil -->
    <div class="modal fade" id="editImgPerfilModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Foto de perfil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <form id="formUpdateImg">
                            <div class="col form-group">
                                <div class="row flex-column align-items-center my-5 mt-row">
                                    <label for="imgInp" class="btn">Selecciona una foto</label>
                                    <input type='file' name="imgInp" id="imgInp" style="visibility:hidden;" />
                                    <img class="img-circle" alt="" width="200" height="200" id="new_image" />
                                    <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>" />
                                    
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="updateImgPerfil">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url() ?>assets/js/app/perfil.js"></script>