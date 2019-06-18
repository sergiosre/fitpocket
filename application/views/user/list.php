<h2>Lista de usuarios</h2>
<table class="table table-striped table-bordered">
    <tr>
        <th>Email</th>
        <th>Password(md5)</th>
        <th colspan="2">Opciones</th>
    </tr>
    <?php foreach ($users as $user) : ?>
        <tr>
            <td>
                <?= $user->email ?>
            </td>

            <td>
                <?= $user->password ?>
            </td>

            <td>
                <form action="<?= base_url() ?>user/update" method="post">
                    <button class="btn btn-info btn-block">
                        <i class="fas fa-user-edit"></i>
                    </button>
                    <input type="hidden" name="user_id_for_update" value="<?= $user->id ?>" />
                </form>
            </td>

            <td>
                <form action="<?= base_url() ?>user/delete" method="post">
                    <button class="btn btn-danger btn-block">
                        <i class="fas fa-trash"></i>
                    </button>
                    <input type="hidden" name="user_id_for_update" value="<?= $user->id ?>" />
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>