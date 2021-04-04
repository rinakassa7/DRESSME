<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
            <link rel="stylesheet" href="css/theme/commun.css" />
            <link rel="stylesheet" href="css/theme/includes/navbar/navbar.css" />
            <link rel="stylesheet" href="css/mobile/includes/navbar/navbar.css" />

            <?php require_once($page_link) ?>
            <title><?= $title ?></title>
        </head>
        <body>
            <div class="content">
            
                <?php require_once('views/public/includes/navbar/navbar.php'); ?>

                <?php require_once($HTML_content) ?>
                
            </div>
        </body>
    </html>