<?php
$header = new \App\Models\TemplateHeader();
$footer = new \App\Models\TemplateFooter();
$hero = new \App\Models\TemplateHeroSection();
$indexPage = new \App\Models\TemplateIndexPage();
/** @var array $blogsAllAr */
$divAr = "";
foreach ($blogsAllAr as $det_ar) {
    $divAr .= "
            <div class=\"col-xl-4 col-lg-4 col-md-6\">
                <div class=\"latest-blog mb-30\">
                    <div class=\"latest-blog-img pos-rel\">
                        <img style='height: 350px' src=\"" . ($det_ar['image_url'] ?: "/assets/frontend/img/blog.jpeg") . "\" alt=\"\">
                        <div class=\"top-date\">
                            <a href=\"/blog/" . $det_ar['id'] . "/detail\">" . date("d-m-Y", $det_ar['publish_date']) . "</a>
                        </div>
                    </div>
                    <div class=\"latest-blog-content\">
                        <div class=\"latest-post-meta mb-15\">

                        </div>
                        <h3 class=\"latest-blog-title\" style=\"overflow: hidden;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;\">
                            <a href=\"/blog/" . $det_ar['id'] . "/detail\">" . $det_ar['title'] . "</a>
                        </h3>
                        <div class=\"blog-arrow\">
                            <a href=\"/blog/" . $det_ar['id'] . "/detail\">Read More</a>
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
    <title>iglyphic.com </title>
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
    {{--Template List--}}
    <div class="latest-news-area pt-120 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="section__title-wrapper text-center mb-60">
                        <h2 class="section__title">Latest from Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?= $divAr ?>
            </div>
        </div>
    </div>
    {{--Template List End--}}

</main>

<!-- footer area start -->
<?= $footer->getHtml() ?>

        <!-- footer area end -->

<!-- JS here -->
<?= assetsJs("iglyphic") ?>

</body>

</html>

