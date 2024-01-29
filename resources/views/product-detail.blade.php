<?php
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(0);

$header = new \App\Models\TemplateHeader();
$footer = new \App\Models\TemplateFooter();
$hero = new \App\Models\TemplateHeroSection();

/** @var array $productAr */
/** @var array $categoryAr */
?>
    <!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $productAr['title'] ?> </title>
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

    <!-- page title area -->
    <section class="page__title-area  pt-85">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="page__title-content mb-50">
                        <h2 class="page__title"><?= $productAr['title'] ?></h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="/product/list">Product</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $productAr['title'] ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title end -->

    <!-- product area start -->
    <section class="product__area pb-115">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div class="product__wrapper">
                        <div class="product__details-thumb w-img mb-30">
                            <img src="<?=$productAr['image_url']?>" alt="product-details">
                        </div>
                        <div class="product__details-content">
                            <div class="product__tab mb-40">
                                <ul class="nav nav-tabs" id="proTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="overview-tab" data-bs-toggle="tab"
                                                data-bs-target="#overview" type="button" role="tab"
                                                aria-controls="overview" aria-selected="true">Overview
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="product__tab-content">
                                <div class="tab-content" id="proTabContent">
                                    <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                         aria-labelledby="overview-tab">
                                        <div class="product__overview">
                                            <h3 class="product__overview-title">Template Details</h3>
                                            <p><?= nl2br($productAr['description']) ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4">
                    <div class="product__details-sidebar ml-30">
                        <div class="product__proprietor white-bg mb-30">
                            <div class="product__proprietor-head mb-25">
                                <div class="product__prorietor-info mb-20 d-flex justify-content-between">
                                    <div class="product__proprietor-avater d-flex align-items-center">
                                        <div class="product__proprietor-name">
                                            <h5><a href="#"><?= $categoryAr['title'] ?></a></h5>
                                        </div>
                                    </div>
                                    <?php if ($productAr['type'] == 'paid'){ ?>

                                    <div class="product__proprietor-price">
                                        <span class="d-flex align-items-start"><span>$</span><?= $productAr['price'] ?></span>
                                    </div>
                                    <?php } else{ ?>
                                    <div class="product__proprietor-price">
                                        <span class="d-flex align-items-start">Free</span>
                                    </div>
                                    <?php } ?>

                                </div>
                            </div>
                            <div class="product__proprietor-body fix">
                                <ul class="mb-10 fix">

                                    <li>
                                        <h6>Released On:</h6>
                                        <span><?= date("d-m-Y", $productAr['release_date']) ?></span>
                                    </li>
                                    <li>
                                        <h6>Version:</h6>
                                        <span><?= $productAr['current_version'] ?></span>
                                    </li>
                                    <li>
                                        <h6>Technology:</h6>
                                        <span><?= $productAr['technology'] ?></span>
                                    </li>
                                    <li>
                                        <h6>Tags:</h6>
                                        <span><?= $productAr['tags'] ?></span>
                                    </li>
                                </ul>

                                <a href="<?=$productAr['demo_link']?>"
                                   target="_blank" class="m-btn m-btn-border w-100 mb-2"> <span></span> Preview Project</a>
                                <?php if ($productAr['type'] == 'free' && $productAr['github_link']){ ?>
                                <a href="<?=$productAr['github_link']?>"
                                   target="_blank" class="m-btn m-btn-border w-100"> <span></span> View Source Code</a>
                                <?php } ?>
                                <a href="https://www.buymeacoffee.com/bipon770j" target="_blank" class="buy-me-a-coffee"><img src="/assets/frontend/img/buy_me_a_coffee.png" alt="Buy Me a Coffee" /></a>
                            </div>
                        </div>
                        <div class="sidebar__banner" data-background="/assets/frontend/img/banner/sidebar-banner.jpg">
                            <h4 class="sidebar__banner-title">Check Out <br>Our free Templates</h4>
                            <a href="/product/list" class="m-btn m-btn-white"> <span></span> free template</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product area end -->

</main>

<!-- footer area start -->
<?= $footer->getHtml() ?>

    <!-- footer area end -->

<!-- JS here -->
<?= assetsJs("iglyphic") ?>

</body>

</html>

