<article class="liste-commentaires">
    <header><h1>Mes commentaires : </h1></header>
    <?php foreach($liste_commentaires as $commentaire) {  ?>

        <section class="section-commentaires">
            <p class="commentaire-text"><?= $commentaire->get_commentaire() ?></p>
            <a href="<?= $this->router->update_commentaires_URL($commentaire->get_id()) ?>">Modifier</a>
            <a href="<?= $this->router->delete_commentaires_URL($commentaire->get_id()) ?>" onclick="return confirm('êtes vous sur de vouloir supprimer ?')">Supprimer</a>
        </section>

        <hr />

    <?php } ?>
</article>