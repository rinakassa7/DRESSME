<aside class="left-login-aside">

    <article class="left-login-aside-article">
        <header class="left-login-aside-header">
            <h2>Connexion</h2>
        </header>
        <section class="error-message">
            <small><?= $error_message ?></small>
        </section>
        <div class="left-login-aside-form">
            <form action="<?= $this->router->login_URL() ?>" method="POST">
                <input name="pseudo_email" type="text" placeholder="pseudo ou email" value="<?= $form_save['pseudo_email'] ?>"/>
                <input name="password" type="password" name="" id="" placeholder="mot de passe "/>
                <input class="button" type="submit" value="connexion">
            </form>
        </div>
    </article>

</aside>