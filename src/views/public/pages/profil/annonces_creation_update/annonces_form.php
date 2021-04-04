<article class="annonces-form">

    <section class="error-message">
        <small><?= $error_message ?></small>
    </section>
    <div class="form">
        <form action="<?= $form_action ?>" method="POST" enctype="multipart/form-data">
            <textarea name="description" cols="60" rows="5" type="text" name="description" placeholder="Description de votre annonces ..."><?= $form_content["description"] ?></textarea> <br />
            <input type="text" name="prix" placeholder="Prix ..." value="<?= $form_content["prix"] ?>"/><br />

            <select name="type_annonce">
                <?php foreach($select_option["type_annonce"] as $ligne){ ?>

                    <option value="<?= $ligne ?>"><?= $ligne ?></option>

                <?php } ?>
            </select>
        

            <select name="type">
                <?php foreach($select_option["type"] as $ligne){ ?>

                    <option value="<?= $ligne ?>"><?= $ligne ?></option>

                <?php } ?>

            </select>

            <select name="type_detail">
                <?php foreach($select_option["type_detail"] as $ligne){ ?>

                    <option value="<?= $ligne ?>"><?= $ligne ?></option>

                <?php } ?>
            </select>
            <select name="etat">
                <?php foreach($select_option["etat"] as $ligne){ ?>

                    <option value="<?= $ligne ?>"><?= $ligne ?></option>

                <?php } ?>
            </select>
            
            <br />
            <label>Miniature : </label>
            <input name="miniature" type="file"><br />
            <label>Photos : (2 Maximum )</label>
            <input type="file" name="file[]" id="file" multiple>
            <input type="hidden" name="miniature_path" value="<?= $form_content['miniature_path'] ?>" />
            <button type="submit" value="Submit"><?= $button_value ?></button>

        </form>
    </div>

</article>