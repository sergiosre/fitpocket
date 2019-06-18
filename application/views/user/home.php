    <div class="row ml-1 mr-1 sticky-top-3 bg-light">
    </div>
    <div class="row ml-1 mr-1 mt-row mb-row">

        <?php foreach ($posts as $post) : ?>
            <div class="col-12 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span><img src="https://img2.freepng.es/20180403/bkq/kisspng-computer-icons-symbol-avatar-logo-clip-art-person-with-helmut-5ac35496b2daa3.1580708315227506147326.jpg" alt="" class="m-2" style="width: 40px; height: 40px; background-color: grey; border-radius: 50%;"><?= $post->publicado_por->nombre . " " . $post->publicado_por->apellidos ?></span>
                                <span class="card-text"><small class="text-muted" style="color:orange!important;">fittweeted at <?= $post->horaPublicacion ?></small></span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <span><?= $post->texto ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="row sticky-bottom-1 m-0">
            <div class="col" data-toggle="modal" data-target="#post">
                <div class="btn-add-post ml-auto">
                    <a class="btn p-0" href="#">
                        <i class="text-light fas fa-pen m-3"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="post" tabindex="-1" role="dialog" aria-labelledby="post" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Fittweet</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="tweet" method="post">
                            <div>
                                <textarea class="form-control" name="text-post" id="text-post" cols="30" rows="10" placeholder="¿Qué está pasando?" style="resize:none;"></textarea>
                                <input type="hidden" id="user_id" value="<?= $_SESSION['user_id'] ?>">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="publicar">Publicar</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?= base_url() ?>assets/js/app/fittweet.js"></script>