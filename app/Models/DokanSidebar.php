<?php

namespace App\Models;

use Illuminate\Support\Facades\Route;

class DokanSidebar
{

    private string $currentRoute = "";

    function __construct()
    {
        $this->currentRoute = Route::getFacadeRoot()->current()->uri();
    }

    function getHtml()
    {

        return "
        <div class=\"app-menu navbar-menu\">
            <!-- LOGO -->
            <div class=\"navbar-brand-box text-lg-start\">
                <a href=\"/dashboard\" class=\"logo logo-dark\">
                            <span class=\"logo-sm\">
                                <img src=\"/assets/images/logo.svg\" alt=\"\" height=\"26\">
                            </span>
                    <span class=\"logo-lg\">
                                <img src=\"/assets/images/logo.svg\" alt=\"\">
                            </span>
                </a>
                <a href=\"/dashboard\" class=\"logo logo-light\">
                            <span class=\"logo-sm\">
                                <img src=\"/assets/images/logo.svg\" alt=\"\" height=\"26\">
                            </span>
                    <span class=\"logo-lg\">
                                <img src=\"/assets/images/logo.svg\" alt=\"\" height=\"26\">
                            </span>
                </a>
                <button type=\"button\" class=\"btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover\"
                        id=\"vertical-hover\">
                    <i class=\"ri-record-circle-line\"></i>
                </button>
            </div>

            <div id=\"scrollbar\">
                <div class=\"container-fluid\">

                    <div id=\"two-column-menu\"></div>
                    <ul class=\"navbar-nav\" id=\"navbar-nav\">


                        <li class=\"nav-item\">
                            <a href=\"/manage/products\" class=\"nav-link " . self::isActive("manage/products") . "\">
                                <span class=\"menu-icon product-icon\"></span>
                                <span data-key=\"t-multi-level\">Products</span>
                            </a>
                        </li>
                        <li class=\"nav-item\">
                            <a href=\"/manage/category\" class=\"nav-link " . self::isActive("manage/category") . "\">
                                <span class=\"menu-icon vendor-icon\"></span>
                                <span data-key=\"t-multi-level\">Category</span>
                            </a>
                        </li>
                        <li class=\"nav-item\">
                            <a href=\"/manage/blog\" class=\"nav-link " . self::isActive("manage/blog") . "\">
                                <span class=\"menu-icon vendor-icon\"></span>
                                <span data-key=\"t-multi-level\">Blogs</span>
                            </a>
                        </li>
                        <li class=\"nav-item\">
                            <a href=\"/manage/testimonial\" class=\"nav-link " . self::isActive("manage/testimonial") . "\">
                                <span class=\"menu-icon vendor-icon\"></span>
                                <span data-key=\"t-multi-level\">Testimonial</span>
                            </a>
                        </li>
                         <li class=\"nav-item\">
                            <a href=\"/manage/setting\" class=\"nav-link " . self::isActive("manage/setting") . "\">
                                <span class=\"menu-icon vendor-icon\"></span>
                                <span data-key=\"t-multi-level\">Setting</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
            <div class=\"sidebar-background\"></div>
        </div>";
    }

    private function isActive($menuUrl): ?string
    {

        if ($menuUrl == $this->currentRoute) {
            return 'active';
        } else {
            return null;
        }
    }

    private function isShow($menuUrlAr): ?string
    {
        if (isset($menuUrlAr[$this->currentRoute])) {
            return 'show';
        } else {
            return null;
        }
    }

    private function isTrue($menuUrlAr): ?string
    {

        if (isset($menuUrlAr[$this->currentRoute])) {
            return 'true';
        } else {
            return 'false';
        }
    }
}
