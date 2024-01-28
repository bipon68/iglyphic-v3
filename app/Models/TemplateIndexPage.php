<?php

namespace App\Models;

use Sourav\SelectQuery;

class TemplateIndexPage
{
    function getCategoryHtml()
    {
        $select = new SelectQuery("category_list");
        $select->setQuery("
        select * from category_list
                 where 1
              ORDER BY `id` LIMIT 3
        ");
        $categoryAllAr = $select->getQueues();

        $divAr = "";
        foreach ($categoryAllAr as $det_ar) {
            $divAr .= "
            <div class=\"col-lg-3 col-md-3 col-sm-6\">
                <div class=\"mt_cat shadow\">
                    <div class=\"mt_cat_avater\">
                        <img style=\"height: 30px\" src=\"" . $det_ar['image_url'] . "\" class=\"img-fluid\" alt=\"\">
                    </div>
                    <div class=\"mt_cat_caps\">
                        <h3 class=\"mt_cat_title\"><a href=\"/product/list?cat=" . $det_ar['id'] . "\">" . $det_ar['title'] . "</a></h3>
                    </div>
                </div>
            </div>
            ";
        }
        return "
        <section class=\"overlay-top\">
            <div class=\"container\">
                <div class=\"row\" style=\"justify-content: center\">
                    <!-- Single Category -->
                    $divAr
                </div>
            </div>
        </section>
    ";
    }

    function getThemeHtml(): string
    {
        $select = new SelectQuery("products");
        $select->setQuery("select * from products where 1");
        $productsAllAr = $select->getQueues();

        $select = new SelectQuery("category_list");
        $select->setQuery("select * from category_list where 1");
        $categoryAllAr = $select->getQueues('id');

        $divAr = "";
        foreach ($productsAllAr as $det_ar) {
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
                            " . ($categoryAllAr[$det_ar['category_id']]['title'] ? "of " . $categoryAllAr[$det_ar['category_id']]['title'] : "") . "
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

        return "
        <section class=\"product__area pt-105 pb-110 grey-bg-2\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-xxl-12\">
                        <div class=\"section__title-wrapper text-center mb-60\">
                            <h2 class=\"section__title\">Recent Templates</h2>
                            <p>From multipurpose themes to niche templates</p>
                        </div>
                    </div>
                </div>
                <div class=\"row\">
                    $divAr
                </div>
                <div class=\"row\">
                    <div class=\"col-xxl-12\">
                        <div class=\"product__more text-center mt-30\">
                            <a href=\"/product/list\" class=\"m-btn m-btn-2\"> <span></span> Explore All</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        ";
    }

    function getBlogHtml(): string
    {
        $select = new SelectQuery("blogs");
        $select->setQuery("select * from blogs where 1 ORDER BY `publish_date` DESC LIMIT 3");
        $blogsAllAr = $select->getQueues();

        $divAr = "";
        foreach ($blogsAllAr as $det_ar) {
            $divAr .= "
            <div class=\"col-xl-4 col-lg-4 col-md-6\">
                <div class=\"latest-blog mb-30\">
                    <div class=\"latest-blog-img pos-rel\">
                        <img style='height: 350px' src=\"" . ($det_ar['image_url']?:"/assets/frontend/img/blog.jpeg") . "\" alt=\"\">
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

        return "
        <div class=\"latest-news-area pt-120 pb-90\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-xxl-12\">
                        <div class=\"section__title-wrapper text-center mb-60\">
                            <h2 class=\"section__title\">Latest from Blog</h2>
                            <p>From multipurpose themes to niche templates</p>
                        </div>
                    </div>
                </div>
                <div class=\"row\">
                    $divAr
                </div>
            </div>
        </div>
        ";
    }

    function getTestimonialHtml(): string
    {
        $select = new SelectQuery("testimonial_list");
        $select->setQuery("select * from testimonial_list where 1");
        $testimonialAllAr = $select->getQueues();
        $divAr = "";
        foreach ($testimonialAllAr as $det_ar) {
            $point = "";
            for ($i = 1; $i <= 5; $i++) {
                if ($det_ar['point'] >= $i) {
                    $point .= "<li><a href=\"#\"><i class=\"fas fa-star\"></i></a></li>";
                } else {
                    $point .= "<li><a href=\"#\"><i class=\"fal fa-star\"></i></a></li>";
                }

            }
            $divAr .= "
                <div class=\"testimonial__item-2\">
                    <div class=\"testimonial__person-wrapper\">
                        <div class=\"testimonial__person d-flex\">
                            <div class=\"testimonial__avater\">
                                <img src=\"/assets/frontend/img/testimonial/testi-1.jpg\" alt=\"\">
                            </div>
                            <div class=\"testimonial__info ml-15\">
                                <h5>" . $det_ar['user_name'] . "</h5>
                            </div>
                        </div>
                    </div>
                    <div class=\"testimonial__text testimonial__text-2 white-bg mt--40\">
                        <div class=\"rating mb-5\">
                            <ul>
                                $point
                            </ul>
                        </div>
                        <p>" . $det_ar['comment'] . "</p>
                    </div>
                </div>

            ";
        }
        return "
        <section class=\"testimonial__area pt-105 fix\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-xxl-12\">
                        <div class=\"section__title-wrapper mb-115 text-center\">
                            <h2 class=\"section__title\">What our <br>Customers have to say</h2>
                            <p>Curabitur lacus arcu, sodales in quam sed, commodo efficitur ligula.</p>
                        </div>
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"col-xxl-12\">
                        <div class=\"testimonial__wrapper p-relative pb-135 wow fadeInUp\" data-wow-delay=\".5s\">
                            <div class=\"testimonial__shape\">
                                <img src=\"/assets/frontend/img/testimonial/testimonial-shape.png\" alt=\"\">
                            </div>
                            <div class=\"testimonial__slider-2 owl-carousel\">
                                $divAr
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        ";
    }
}
