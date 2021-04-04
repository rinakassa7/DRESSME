
<header class="header-top">
    <nav class="header-top-nav">
        
        <ul class="header-top-nav-ul-left">
            <li><h2 class="header-top-nav-ul-left-title">DRESSME</h2> </li>
        </ul>


        <ul class="header-top-nav-ul-middle">
            <?php foreach($this->navbar[0] as $text => $link) { ?>

                <li><a class="header-top-nav-link" href="<?= $link ?>"><?= $text ?></a></li>

            <?php } ?> 
        </ul>

        <ul class="header-top-nav-ul-right">
            <?php foreach($this->navbar[1] as $text => $link) { ?>

                <li><a class="header-top-nav-link" href="<?= $link ?>"><?= $text ?></a></li>

            <?php } ?> 
        </ul>

    </nav>
</header>

