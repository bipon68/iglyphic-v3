<?php
$header = new \App\Models\TemplateHeader();
$footer = new \App\Models\TemplateFooter();
$hero = new \App\Models\TemplateHeroSection();

/** @var array $blogAr */
?>
    <!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $blogAr['title'] ?> </title>
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
                        <h2 class="page__title"><?= $blogAr['title'] ?></h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="/blog/list">Blog</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $blogAr['title'] ?></li>
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
                            <?php if($blogAr['image_url']){ ?>
                                <img src="<?=$blogAr['image_url']?>" alt="product-details">
                            <?php } ?>
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
                                            <p><?= nl2br($blogAr['description']) ?></p>
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
                            <div class="product__proprietor-body fix">
                                <ul class="mb-10 fix">

                                    <li>
                                        <h6>Released On:</h6>
                                        <span><?= date("d-m-Y", $blogAr['current_version']) ?></span>
                                    </li>
                                    <li>
                                        <h6>Tags:</h6>
                                        <span><?= $blogAr['tags'] ?></span>
                                    </li>
                                </ul>
                            </div>
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

