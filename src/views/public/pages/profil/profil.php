<div class="main-content">


<aside class="aside-left">
    <nav class="aside-left-nav">
        <ul class="aside-left-nav-bottom-ul">
            <li>
                <a href=""><span>Profil</span>
                    <div class="img-box">
                       <img src="<?= $user_data->get_profil_picture_path() ?>" alt="Test" />
                    </div>
                    <small class="user-name"><?= $user_data->get_pseudo() ?></small>
                </a>
                
            </li>
        </ul>
        <ul class="aside-left-nav-top-ul">
            <li><a href="<?= $this->router->create_annonces_URL()  ?>">Créer une annonce</a></li>
            <li><a href="<?= $this->router->profil_URL()  ?>">Gérer les annonces</a></li>
            <li><a href="<?= $this->router->show_commentaires_URL() ?>">Gérer mes commentaires</a></li>
            <li><a href="<?= $this->router->update_profil_URL()  ?>">Modifier mes infos</a></li>
        </ul>
    </nav>
</aside>

<?php   require_once($right_content)    ?>


</div>


