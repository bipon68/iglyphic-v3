<?php
$header = new \App\Models\TemplateHeader();
$footer = new \App\Models\TemplateFooter();
$hero = new \App\Models\TemplateHeroSection();
$indexPage = new \App\Models\TemplateIndexPage();
/** @var array $productAr */
/** @var array $categoryAr */

$divAr = "";
foreach ($productAr as $det_ar) {
    $divAr .= "
            <div class=\"col-xxl-4 col-xl-4 col-lg-4 col-md-6\">
                <div class=\"product__item white-bg mb-30 wow fadeInUp\" data-wow-delay=\".3s\">
                    <div class=\"product__thumb\">
                        <div class=\"product__thumb-inner fix w-img\">
                            <a href=\"/product/" . $det_ar['id'] . "/detail\">
                                <img style=\"height:240px\" src=\"" . $det_ar['image_url'] . "\" alt=\"\">
                            </a>
                            <div class=\"product__thumb-btn transition-3\">
                                <a href=\"" . $det_ar['demo_link'] . "\" class=\"m-btn m-btn-6 mb-15\">
                                Demo Link
                                </a>
                                <a href=\"/product/" . $det_ar['id'] . "/detail\" class=\"m-btn m-btn-7\">
                                Details
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class=\"product__content\">
                        <h3 class=\"product__title product__title2\" style=\"overflow: hidden;
                            display: -webkit-box;
                            -webkit-line-clamp: 1;
                            -webkit-box-orient: vertical;\">
                            <a href=\"/product/" . $det_ar['id'] . "/detail\">" . $det_ar['title'] . "</a>
                        </h3>
                        <p class=\"product__author\">
                            " . ($categoryAr[$det_ar['category_id']]['title'] ? "of " . $categoryAr[$det_ar['category_id']]['title'] : "") . "
                        </p>

                        <div class=\"product__meta d-flex justify-content-between align-items-end mt-15\">
                            <div class=\"product__price\">
                                <span>
                                    " . ($det_ar['type'] == 'free' ? "Free" : $det_ar['price']) . "
                                </span>
                            </div>
                            <div class=\"product__action-btn\">
                                <a class=\"link_prview\" target=\"_blank\"
                                   href=\"" . $det_ar['demo_link'] . "\">Preview</a>
                                <a class=\"link_heart\" href=\"#\"><i class=\"fal fa-heart\"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ";
}
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
<?= $header->getHtml2() ?>
    <!-- header area end -->

<main>
    <section class="product__area pt-105 pb-110 grey-bg-2">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="section__title-wrapper text-center mb-60">
                        <h2 class="section__title"> <?=(isset($_GET['cat']) ? $categoryAr[$_GET['cat']]['title'] : "Recent")?>  <?=(isset($_GET['type']) ? ucwords($_GET['type']) : "")?> Templates</h2>
                        <p>From multipurpose themes to niche templates</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?= $divAr ?>
            </div>
        </div>
    </section>

</main>

<!-- footer area start -->
<?= $footer->getHtml() ?>

    <!-- footer area end -->

<!-- JS here -->
<?= assetsJs("iglyphic") ?>

</body>

</html>

