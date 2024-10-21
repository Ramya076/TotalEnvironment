<?php
use yii\helpers\Url;
?>

<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="<?= Url::to(['/site/index']) ?>">
        <img src="<?= Url::to('@web/web/assets/images/plotslogo.png'); ?>" alt="Logo 1" style="height: 50px;">
        <img src="<?= Url::to('@web/web/assets/images/SRPL.png'); ?>" alt="Logo 2" style="height: 50px;">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
        <div class="mx-auto">
            <ul class="navbar-nav">
                <li class="nav-item p-2">
                    <a class="nav-link" href="#overview">OVERVIEW</a>
                </li>
                <li class="nav-item p-2">
                    <a class="nav-link" href="#">WHY DUBAI</a>
                </li>
                <li class="nav-item p-2">
                    <a class="nav-link" href="#">EMAAR PROPERTIES</a>
                </li>
                <li class="nav-item p-2">
                    <a class="nav-link" href="#">WHY EMAAR</a>
                </li>
                <li class="nav-item p-2">
                    <a class="nav-link" href="#">FAQ</a>
                </li>
            </ul>
        </div>
        
        <!-- Add a button aligned to the right -->
        <div class="ml-auto">
            <button class="btn btn-primary">+91 8310768803</button>
        </div>
    </div>
</nav>
