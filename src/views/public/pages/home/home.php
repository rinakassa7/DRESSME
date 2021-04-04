<article class="top-middle-content">

<section class="top-middle-content-annonces">
    <header><h1>Découvrez</h1></header>
    <div><p>Découvrez nos compléments et qui nous sommes</p></div>
    <footer><a href="<?= $this->router->complement_URL() ?>">Voir les compléments choisis</a></footer>
</section>

<section class="top-middle-content-title">
    <h1><?= $top_middle_title ?></h1>
</section>

</article>

<main class="main-content">

<article id="first-article" class="article">
    <section id="first-section" class="section left-section none">
        <div class="img-box">
            <img id="first-article-img" src="assets/images/home/first-section-img.svg" alt="aze" />

        </div>
        <div class="section-content">
            <header class="section-content-title">Qui sommes nous ? </header>
            
            <div class="section-content-text">
                <p>Nous sommes un site de vente de vêtements et d'accessoires permettant</p>
                <p>aux utilisateurs de vendre et d'acheter en toute sécurité .</p>

                <small>Découvrez nos annonces</small>
            </div>
            <footer class="section-content-footer">

                <a href="<?= $this->router->annonces_all_URL() ?>">Nous découvrir</a>
            </footer>
        </div>
    </section>
</article>


<article id="second-article" class="article">
    <section id="second-section" class="section right-section none">

        <div class="section-content">
            <header class="section-content-title">Comment commencer ? </header>
            <div class="section-content-text">
                <p>Pour commencer à vendre et à acheter, vous devez créer</p>
                <p>un compte gratuitement qui vous permettera de voir en détail</p>
                <p>les annonces qui vous plaisent pour contacter le vendeur</p>
                <p>ou pour tout simplement commencer à mettre en vente .</p>
            </div>
            <footer class="section-content-footer">
                <a href="<?= $this->router->register_URL() ?>">Inscrivez-vous</a>
            </footer>
        </div>

        <div class="img-box">
            <img id="second-section-img" src="assets/images/home/second-section-img.svg" alt="aze" />
        </div>

    </section>
</article>


<article id="third-article" class="article">
    <section id="third-section" class="section left-section none">

        <div class="img-box">
            <img id="third-section-img" src="assets/images/home/third-section-img.svg" alt="aze" />
        </div>
        <div class="section-content">
            <header class="section-content-title">Comment acheter ? </header>

            <div class="section-content-text">
                <p>Une fois le compte créé, vous pourrez voir en détail</p>
                <p>l'annonce qui vous plait, et contacter le vendeur </p>
                <p>pour les modalités d'achat </p>


            </div>
            <footer class="section-content-footer">
                <a href="<?= $this->router->annonces_all_URL() ?>">Voir les annonces</a>
            </footer>
        </div>
    </section>
</article>


<article id="fourth-article" class="article">
    <section id="fourth-section" class="section right-section none">

        <div class="section-content">
            <header class="section-content-title">Comment vendre ? </header>

            <div class="section-content-text">
                <p>Maintenant que votre compte est créé, allez dans votre page de profil</p>
                <p>pour pouvoir créer, modifier, ou supprimer vos annonces .</p><br />
                <p>Quand un utilisateur est intéressé par une de vos annonces</p>
                <p>il n'aura qu'à vous contacter aux coordonnées que vous avez renseigné lors de l'inscription</p>


            </div>
            <footer class="section-content-footer">
                <a href="<?= $this->router->profil_URL() ?>">Commencer à vendre</a>
            </footer>
        </div>
        <div class="img-box">
            <img id="fourth-section-img" src="assets/images/home/fourth-section-img.svg" alt="aze" />
        </div>
    </section>
</article>

</main>