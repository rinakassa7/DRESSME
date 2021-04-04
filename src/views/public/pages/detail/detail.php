    <article class="annonce-detail">
        <section class="img-section">
            <?php foreach($image_path as $image) { ?>
                <div class="img-box">
                    <img src="<?= $image ?>" alt="Photo de l'objet à vendre" />
                </div>
            <?php } ?>
        </section>
        <section>
            <div class="information">
                <h3><span><?=  $data_annnonce->get_date_poste() ?></span></h3>
                <h1><span><?=  $data_utilisateur['email'] ?></span></h1>
                <h1><span><?=  $data_utilisateur['telephone'] ?></span></h1>
            </div>
            <div class="text">
                <p> <?= $data_annnonce->get_description() ?> </p>
            </div>

        </section>

    </article>
    <article class="annonce-commentaires">
        <header class="annonce-commentaires-header"><h1>Commentaires : </h1></header>
        <form action="<?= $this->router->annonces_detail_url($data_annnonce->get_annonces_id()) ?>" method="POST">
            <textarea name="commentaire" cols="60" rows="5" placeholder="Commentaire ..."></textarea>
            <input type="submit" />
        </form>

        <?php 
            foreach($commentaires_annonce as $commentaire) { ?>
                <div class="commentaire-text">
                    <p><?= $commentaire->get_commentaire() ?></p>
                    <small><?= $commentaire->get_pseudo_utilisateur() ?></small><br />
                    <small><?= $commentaire->get_date_poste() ?></small>
                </div>
        <?php } ?>
    </article>
