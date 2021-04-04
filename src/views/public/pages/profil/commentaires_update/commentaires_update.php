
<article class="commentaires-article">
    <section class="error-message">
        <small><?= $error_message ?></small>
    </section>
    <form action="<?= $this->router->update_commentaires_URL($form_content['commentaire_id']) ?>" method="POST">
        <textarea name="commentaire" cols="60" rows="5" placeholder="Commentaire ..."><?= $form_content['commentaire'] ?></textarea><br />
        <input type="submit" value="modifier" />
    </form>
</article>