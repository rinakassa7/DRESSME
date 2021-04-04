<article class="annonces-liste">
       
       <?php 
       
        if(!empty($liste_annonces)){
            foreach($liste_annonces as $annonce) { ?>
                <section class="annonce-section">
                    <div class="image-objet">
                        <img src="<?= $annonce->get_miniature_path() ?>" alt="Image representant l'objet à vendre"/>
                    </div>
                    <footer class="annonce-footer">
                        <div class="annonce-prix"><h1>Prix : <?= $annonce->get_prix() ?> €</h1></div><br />
                        <div class="annonce-type"><h1>Type : <?= $annonce->get_type() ?> - <?= $annonce->get_type_detail() ?></h1></div><br />
                        <div class="annonce-etat"><h1>Etat : <?= $annonce->get_etat() ?></h1></div><br />
                        <div class="annonce-date-publication"><h1>Date Publication : <?= $annonce->get_date_poste() ?></h1></div><br />
                        
                        <?php if($this->authentificationManager->is_utilisateur_connected()){ ?>

                            <span><a class="button" href="<?= $this->router->annonces_detail_url($annonce->get_annonces_id()) ?>">Détail</a></span>

                                <?php if($_SESSION['user']->get_id() == $annonce->get_utilisateur_id()) { ?>

                                    <span><a class="button" href="<?= $this->router->update_annonces_URL($annonce->get_annonces_id()) ?>">Modifier</a></span>
                                    <span><a class="button" href="<?= $this->router->delete_annonces_URL($annonce->get_annonces_id()) ?>" onclick="return confirm('êtes vous sur de vouloir supprimer ?')">Supprimer</a></span>

                                <?php } ?>

                        <?php }else{ ?>
                            <p>Vous devez être connecté pour voir le détail de l'annonce</p>
                        <?php } ?>
                        
                    </footer>
                </section>
        <?php } 
        }else{ ?>

            <h1>Aucune annonces pour le moment</h1>
            
        <?php }?>
       
   </article>