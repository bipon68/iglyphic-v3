<?php
$header = new \App\Models\TemplateHeader();
$footer = new \App\Models\TemplateFooter();
$hero = new \App\Models\TemplateHeroSection();
$indexPage = new \App\Models\TemplateIndexPage();
?>
    <!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>iglyphic.com</title>
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
<?= $header->getHtml() ?>
    <!-- header area end -->

<main>
    <?= $hero->getHtml(); ?>


    {{--Category List--}}
    <?= $indexPage->getCategoryHtml() ?>
    {{--Category List End--}}

    {{--Template List--}}
    <?= $indexPage->getThemeHtml() ?>
    {{--Template List End--}}

    {{--Testimonial List--}}
    <?= $indexPage->getTestimonialHtml() ?>
    {{--Testimonial List End--}}

    <!-- subscribe area start -->

    <!-- subscribe area end -->

    <!-- blog area start -->
    <?= $indexPage->getBlogHtml() ?>
        <!-- blog area end -->


</main>

<!-- footer area start -->
<?= $footer->getHtml() ?>
    <!-- footer area end -->

<!-- JS here -->
<?= assetsJs("iglyphic") ?>

</body>
</html>

