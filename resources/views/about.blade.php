<?php
$header = new \App\Models\TemplateHeader();
$footer = new \App\Models\TemplateFooter();
$hero = new \App\Models\TemplateHeroSection();

/** @var array $settingAr*/

?>
    <!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>About </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon.ico">
    <!-- CSS here -->
    <?= assetsCss("iglyphic") ?>

</head>
<body>
<!-- back to top start -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
    </svg>
</div>
<!-- back to top end -->

<!-- header area start -->
<?= $header->getHtml2() ?>
    <!-- header area end -->

<main>

    <!-- bg shape area start -->
    <div class="bg-shape">
        <img src="/assets/frontend/img/shape/shape-1.png" alt="">
    </div>
    <!-- bg shape area end -->

    <!-- about area start -->
    <section class="about__area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-xxl-10 offset-xxl-1 col-xl-10 offset-xl-1">
                    <div class="about__wrapper">
                        <span class="about__sub-title">About iglyphic</span>
                        <h3 class="about__title">We're enabling <br> Everyone to create for the website.</h3>

                        <div class="about__content">
                            <p class="about__sub-text"><?=$settingAr['about']['value']?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about area end -->

</main>

<!-- footer area start -->
<?= $footer->getHtml() ?>

    <!-- footer area end -->

<!-- JS here -->
<?= assetsJs("iglyphic") ?>

</body>

</html>

