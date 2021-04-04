<aside class="left-login-aside">

    <article class="left-login-aside-article">
        <header class="left-login-aside-header">
            <h2>Inscription</h2>
        </header>
        <section class="error-message">
            <small><?= $error_message ?></small>
        </section>

        <div class="left-login-aside-form">
            <form action="<?= $this->router->register_URL() ?>" method="POST">
                <input type="text" name="prenom" placeholder="prenom" value="<?= $form_save['prenom'] ?>" />
                <input type="text" name="nom" placeholder="nom" value="<?= $form_save['nom'] ?>" />
                <input type="text" name="pseudo" placeholder="pseudo" value="<?= $form_save['pseudo'] ?>" />
                <input type="password" name="password" placeholder="mot de passe " />
                <input type="password" name="password_confirmation" placeholder="confirmation mot de passe " />
                <input type="text" name="email" placeholder="email" value="<?= $form_save['email'] ?>" />
                <input type="text" name="telephone" placeholder="telephone" value="<?= $form_save['telephone'] ?>" />
                <select name="sexe">
                    <option value="femme">Femme</option>
                    <option value="homme">Homme</option>
                </select>

                <input class="button" type="submit" value="inscription">
            </form>
        </div>
    </article>

</aside>