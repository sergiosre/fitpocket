<h1>Has llegado al update</h1>
<form method="post" action="<?= base_url() ?>user/updatePost" name="form_user_update">
    <div class="form-group">
        <label for="email_name_update">
            Email:
            <input type="text" class="form-control" name="email_name_update" value="<?= $email ?>" />
        </label>
    </div>
    <div class="form-group">
        <label for="password_name_update">
            Contraseña:(En md5)
            <input type="text" class="form-control" name="password_name_update" value="<?= $password ?>" />
        </label>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Registrar</button>
    </div>
    <input type="hidden" value="<?= $id ?>" name="id_user_updating_name">
</form>