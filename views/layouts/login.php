<?php

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
AppAsset::register($this);
/* @var $this \yii\web\View */
/* @var $content string */

$this->beginPage();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- Include additional CSS or meta tags here -->
</head>

<body class="login-bg">
    <?php $this->beginBody() ?>

    <!-- Preloader HTML -->
    <div class="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- Login Content Section -->
    <section class="user-area-all-style log-in-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Render the login form or content -->
                    <?= $content ?>
                </div>
            </div>
        </div>
    </section>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
