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
    <title>Contact </title>
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

    <!-- contact area start -->
    <section class="contact__area pt-105 pb-145">
        <div class="contact__shape">
            <img class="man-1" src="/assets/frontend/img/icon/sign/man-1.png" alt="">
            <img class="circle" src="/assets/frontend/img/icon/sign/circle.png" alt="">
            <img class="zigzag" src="/assets/frontend/img/icon/sign/zigzag.png" alt="">
            <img class="dot" src="/assets/frontend/img/icon/sign/dot.png" alt="">
            <img class="bg" src="/assets/frontend/img/icon/sign/sign-up.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="page__title-wrapper mb-55">
                        <h2 class="page__title-2">Contact With Us</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="contact__map" style="height: 550px;">
                        <?=$settingAr['gmap']['value']?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact area end -->

    <!-- contact info area start -->
    <section class="contact__info pt-20 pb-120">
        <div class="contact__info-shape">
            <img src="/assets/frontend/img/icon/contact/contact-bg.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="page__title-wrapper text-center mb-55">
                        <h2 class="page__title-2">We'd love to <br>hear from you</h2>
                        <p>Stay in touch with us</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="contact__item text-center white-bg mb-30 transition-3">
                        <div class="contact__icon mb-30 d-flex justify-content-center align-items-center">
                            <img src="/assets/frontend/img/icon/contact/office.png" alt="">
                        </div>
                        <div class="contact__content">
                            <h4 class="contact__content-title"><?=$settingAr['address']['value']?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="contact__item text-center white-bg mb-30 transition-3">
                        <div class="contact__icon mb-30 d-flex justify-content-center align-items-center">
                            <img src="/assets/frontend/img/icon/contact/mail.png" alt="">
                        </div>
                        <div class="contact__content">
                            <h4 class="contact__content-title"><a href="#"><span class="__cf_email__" data-cfemail="d9aaaca9a9b6abad99b4b8abb2b0adf7bab6b4"><?=$settingAr['email']['value']?></span></a></h4>

                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="contact__item text-center white-bg mb-30 transition-3">
                        <div class="contact__icon mb-30 d-flex justify-content-center align-items-center">
                            <img src="/assets/frontend/img/icon/contact/phone.png" alt="">
                        </div>
                        <div class="contact__content">
                            <h4 class="contact__content-title"><a href="tel:+<?=$settingAr['contact']['value']?>"><?=$settingAr['contact']['value']?></a> </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact info area end -->

</main>
<!-- footer area start -->
<?= $footer->getHtml() ?>

    <!-- footer area end -->

<!-- JS here -->
<?= assetsJs("iglyphic") ?>

</body>

</html>

