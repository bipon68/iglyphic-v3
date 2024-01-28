<?php

namespace App\Models;

use Sourav\SelectQuery;

class TemplateFooter
{
    function getHtml(): string
    {
        $select = new SelectQuery("setting");
        $select->setQuery("select * from setting where 1");
        $settingAr = $select->getQueues('type');

        return "
        <footer>
            <div class=\"footer__area footer-bg-2\">
                <div class=\"footer__top pt-90 pb-50\">
                    <div class=\"container\">
                        <div class=\"row\">
                            <div class=\"col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6\">
                                <div class=\"footer__widget mb-40 wow fadeInUp\" data-wow-delay=\".3s\">
                                    <div class=\"footer__widget-head mb-35\">
                                        <a href=\"/\">
                                            <img src=\"/assets/frontend/img/logo/logo.svg\" alt=\"\">
                                        </a>
                                    </div>
                                    <div class=\"footer__widget-content\">
                                        <div class=\"footer__social mb-30\">
                                            <h4>Follow our Socials</h4>
                                            <ul>
                                                <li><a href=\"".$settingAr['fbLink']['value']."\" class=\"fb\"><i class=\"fab fa-facebook-f\"></i></a></li>
                                                <li><a href=\"".$settingAr['twLink']['value']."\" class=\"tw\"><i class=\"fab fa-twitter\"></i></a></li>
                                                <li><a href=\"".$settingAr['pinLink']['value']."\" class=\"pin\"><i class=\"fab fa-pinterest-p\"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=\"col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-sm-6\">
                                <div class=\"footer__widget mb-40 wow fadeInUp\" data-wow-delay=\".5s\">
                                    <div class=\"footer__widget-head\">
                                        <h4 class=\"footer__widget-title footer__widget-title-2\">Products</h4>
                                    </div>
                                    <div class=\"footer__widget-content\">
                                        <div class=\"footer__link footer__link-2\">
                                            <ul>
                                                <li><a href=\"/product/list?type=free\">Free Template </a></li>
                                                <li><a href=\"/product/list?type=paid\">Premium Template </a></li>
                                                <li><a href=\"/product/list\">All Products </a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=\"col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6\">
                                <div class=\"footer__widget mb-40 wow fadeInUp footer__widget-pl-70\"  data-wow-delay=\".7s\">
                                    <div class=\"footer__widget-head\">
                                        <h4 class=\"footer__widget-title footer__widget-title-2\">Resources</h4>
                                    </div>
                                    <div class=\"footer__widget-content\">
                                        <div class=\"footer__link footer__link-2\">
                                            <ul>
                                                <li><a href=\"/blog/list\">Blog </a></li>
                                                <li><a href=\"/about\">About Us</a></li>
                                                <li><a href=\"/contact\">Contact Us</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=\"col-xxl-4 col-xl-3 col-lg-3 col-md-5 col-sm-6\">
                                <div class=\"footer__widget mb-40 wow fadeInUp footer__widget-sub-pl-70\"  data-wow-delay=\".7s\">
                                    <div class=\"footer__widget-head\">
                                        <h4 class=\"footer__widget-title footer__widget-title-2\">Newsletter</h4>
                                    </div>
                                    <div class=\"footer__widget-content\">
                                        <div class=\"footer__subscribe\">
                                            <p>Subscribe to recieve a monthly email on the latest news!</p>
                                            <div class=\"footer__subscribe-input\">
                                                <form action=\"#\">
                                                    <input type=\"email\" placeholder=\"Email\">
                                                    <button type=\"submit\" class=\"m-btn\">Subscribe!</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"footer__bottom\">
                    <div class=\"container\">
                        <div class=\"footer__bottom-inner footer__bottom-inner-2\">
                            <div class=\"row\">
                                <div class=\"col-xxl-6 col-xl-6 col-md-6\">
                                    <div class=\"footer__copyright footer__copyright-2 wow fadeInUp\" data-wow-delay=\".5s\">
                                        <p>Copyright © ".date("Y",getTimeStamp())." All Rights Reserved, Developed by <a href=\"https://sourav.xyz/\">Sourav Co.</a></p>

                                    </div>
                                </div>
                                <div class=\"col-xxl-6 col-xl-6 col-md-6\">
                                    <div class=\"footer__bottom-link footer__bottom-link-2 wow fadeInUp text-md-end\" data-wow-delay=\".8s\">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        ";

    }
}
