<?php

namespace App\Models;

use Illuminate\Support\Facades\Route;

class TemplateHeader
{
    private string $currentRoute = "";

    function __construct()
    {
        $this->currentRoute = Route::getFacadeRoot()->current()->uri();
    }

    function getHtml(): string
    {
        return "
        <header>
            <div class=\"header__area header__shadow-2 white-bg header-transparent\" id=\"header-sticky\">
                <div class=\"container\">
                    <div class=\"row align-items-center\">
                        <div class=\"col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-6\">
                            <div class=\"logo\">
                                <a href=\"/\">
                                    <img src=\"/assets/frontend/img/logo/logo.svg\" alt=\"logo\">
                                </a>
                            </div>
                        </div>
                        <div class=\"col-xxl-7 col-xl-7 col-lg-8 d-none d-lg-block\">
                            <div class=\"main-menu d-flex justify-content-end\">
                                <nav id=\"mobile-menu\">
                                    <ul>
                                        <li class=\"" . self::isActive("/") . "\">
                                            <a href=\"/\">Home</a>
                                        </li>
                                        <li class=\"has-dropdown " . self::isActive("product/list") . "\">
                                            <a href=\"#\">Templates</a>
                                            <ul class=\"submenu\">
                                                <li class=\"" . self::isActive("product/list") . "\"><a href=\"/product/list?type=free\">Free Templates</a></li>
                                                <li class=\"" . self::isActive("product/list") . "\"><a href=\"/product/list?type=paid\">Premium Templates</a></li>
                                            </ul>
                                        </li>
                                        <li  class=\"has-dropdown\">
                                            <a href=\"#\">Support</a>
                                            <ul class=\"submenu\">
                                                <li><a href=\"#\">Forums</a></li>
                                                <li><a href=\"#\">FAQS</a></li>
                                                <li><a href=\"#\">License</a></li>
                                                <li><a href=\"#\">Donate</a></li>
                                            </ul>
                                        </li>
                                        <li class=\"" . self::isActive("blog/list") . "\"><a href=\"/blog/list\">Blog</a></li>
                                        <li class=\"" . self::isActive("about") . "\"><a href=\"/about\">About Us</a></li>
                                        <li class=\"" . self::isActive("contact") . "\"><a href=\"/contact\">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class=\"col-xxl-3 col-xl-3 col-lg-3 col-md-8 col-6\">
                            <div class=\"header__action d-flex align-items-center justify-content-end\">

                                <div class=\"sidebar__menu d-lg-none\">
                                   <div class=\"sidebar-toggle-btn\" id=\"sidebar-toggle\">
                                       <span class=\"line\"></span>
                                       <span class=\"line\"></span>
                                       <span class=\"line\"></span>
                                   </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- sidebar area start -->
          <div class=\"sidebar__area\">
             <div class=\"sidebar__wrapper\">
                <div class=\"sidebar__close\">
                   <button class=\"sidebar__close-btn\" id=\"sidebar__close-btn\">
                   <span><i class=\"fal fa-times\"></i></span>
                   <span>close</span>
                   </button>
                </div>
                <div class=\"sidebar__content\">
                   <div class=\"logo mb-40\">
                      <a href=\"index.html\">
                      <img src=\"/assets/frontend/img/logo/logo.svg\" alt=\"logo\">
                      </a>
                   </div>
                   <div class=\"mobile-menu\"></div>

                </div>
             </div>
          </div>
        ";

    }
    function getHtml2(): string
    {
        return "
        <header>
         <div class=\"header__area header__shadow white-bg\" id=\"header-sticky\">
            <div class=\"container\">
               <div class=\"row align-items-center\">
                  <div class=\"col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-6\">
                     <div class=\"logo\">
                        <a href=\"/\">
                           <img src=\"/assets/frontend/img/logo/logo.svg\" alt=\"logo\">
                        </a>
                     </div>
                  </div>
                  <div class=\"col-xxl-8 col-xl-8 col-lg-8 d-none d-lg-block\">
                     <div class=\"main-menu\">
                        <nav id=\"mobile-menu\">
                            <ul>
                                <li class=\"" . self::isActive("/") . "\">
                                    <a href=\"/\">Home</a>
                                </li>
                                <li class=\"has-dropdown " . self::isActive("product/list") . "\">
                                    <a href=\"#\">Templates</a>
                                    <ul class=\"submenu\">
                                        <li class=\"" . self::isActive("product/list") . "\"><a href=\"/product/list?type=free\">Free Templates</a></li>
                                        <li class=\"" . self::isActive("product/list") . "\"><a href=\"/product/list?type=paid\">Premium Templates</a></li>
                                    </ul>
                                </li>
                                <li  class=\"has-dropdown\">
                                    <a href=\"#\">Support</a>
                                    <ul class=\"submenu\">
                                        <li><a href=\"#\">Forums</a></li>
                                        <li><a href=\"#\">FAQS</a></li>
                                        <li><a href=\"#\">License</a></li>
                                        <li><a href=\"#\">Donate</a></li>
                                    </ul>
                                </li>
                                <li class=\"" . self::isActive("blog/list") . "\"><a href=\"/blog/list\">Blog</a></li>
                                <li class=\"" . self::isActive("about") . "\"><a href=\"/about\">About Us</a></li>
                                <li class=\"" . self::isActive("contact") . "\"><a href=\"/contact\">Contact</a></li>
                            </ul>
                        </nav>
                     </div>
                  </div>
                  <div class=\"col-xxl-2 col-xl-2 col-lg-2 col-md-8 col-6\">
                        <div class=\"header__action d-flex align-items-center justify-content-end\">

                            <div class=\"sidebar__menu d-lg-none\">
                               <div class=\"sidebar-toggle-btn\" id=\"sidebar-toggle\">
                                   <span class=\"line\"></span>
                                   <span class=\"line\"></span>
                                   <span class=\"line\"></span>
                               </div>
                           </div>
                        </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
       <!-- sidebar area start -->
          <div class=\"sidebar__area\">
             <div class=\"sidebar__wrapper\">
                <div class=\"sidebar__close\">
                   <button class=\"sidebar__close-btn\" id=\"sidebar__close-btn\">
                   <span><i class=\"fal fa-times\"></i></span>
                   <span>close</span>
                   </button>
                </div>
                <div class=\"sidebar__content\">
                   <div class=\"logo mb-40\">
                      <a href=\"index.html\">
                      <img src=\"/assets/frontend/img/logo/logo.svg\" alt=\"logo\">
                      </a>
                   </div>
                   <div class=\"mobile-menu\"></div>

                </div>
             </div>
          </div>
        ";

    }

    private function isActive($menuUrl): ?string
    {

        if ($menuUrl == $this->currentRoute) {
            return 'active';
        } else {
            return null;
        }
    }
}
