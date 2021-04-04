<article class="update-form">

    <section class="error-message">
            <small><?= $error_message ?></small>
    </section>

    <section class="update-form-section">
        <form action="<?= $this->router->update_profil_URL() ?>" method="POST" enctype="multipart/form-data">
            <input type="text" name="prenom" placeholder="prenom" value="<?= $form_content['prenom'] ?>" /><br />
            <input type="text" name="nom" placeholder="nom" value="<?= $form_content['nom'] ?>" /><br />
            <input type="text" name="pseudo" placeholder="pseudo" value="<?= $form_content['pseudo'] ?>" /><br />
            <input type="text" name="email" placeholder="email" value="<?= $form_content['email'] ?>" /><br />
            <input type="text" name="telephone" placeholder="telephone" value="<?= $form_content['telephone'] ?>" /><br />
            <select name="sexe">
                <option value="femme">Femme</option>
                <option value="homme">Homme</option>
            </select><br />
                <input name="profil_picture" type="file"><br />
                <input class="button" type="submit" value="Modifier">
            </form>
        </form>
    </section>
</article>