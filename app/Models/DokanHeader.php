<?php

namespace App\Models;

use App\Http\Controllers\Accounts\models\ModelBalance;
use Illuminate\Support\Facades\Auth;
use Sourav\SelectQuery;

class DokanHeader
{
    function getHtml()
    {
        return "
            <div class=\"top-tagbar\">
                <div class=\"w-100\">
                    <div class=\"row justify-content-between align-items-center\">
                        <div class=\"col-md-4 col-9\">
                            <div class=\"text-white-50 fs-13\">
                                <i class=\"bi bi-clock align-middle me-2\"></i> iglyphic.com
                            </div>
                        </div>
                        <div class=\"col-md-4 col-6 d-none d-lg-block\">
                            <div class=\"d-flex align-items-center justify-content-center gap-3 fs-13 text-white-50\">
                                <div>
                                    <i class=\"bi bi-envelope align-middle me-2\"></i> iglyphic.com
                                </div>

                            </div>
                        </div>
                        <div class=\"col-md-4 col-3\">

                        </div>
                    </div>
                </div>
            </div>

            <header id=\"page-topbar\">
                <div class=\"layout-width\">
                    <div class=\"navbar-header\">
                        <div class=\"d-flex\">
                            <!-- LOGO -->
                            <div class=\"navbar-brand-box horizontal-logo\">
                                <a href=\"index.html\" class=\"logo logo-dark\">
                                            <span class=\"logo-sm\">
                                                <img src=\"assets/images/logo.svg\" alt=\"\" height=\"22\">
                                            </span>
                                    <span class=\"logo-lg\">
                                                <img src=\"assets/images/logo.svg\" alt=\"\" height=\"25\">
                                            </span>
                                </a>

                                <a href=\"index.html\" class=\"logo logo-light\">
                                            <span class=\"logo-sm\">
                                                <img src=\"assets/images/logo.svg\" alt=\"\" height=\"22\">
                                            </span>
                                    <span class=\"logo-lg\">
                                                <img src=\"assets/images/logo.svg\" alt=\"\" height=\"25\">
                                            </span>
                                </a>
                            </div>

                            <button type=\"button\" class=\"btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger\"
                                    id=\"topnav-hamburger-icon\">
                                        <span class=\"hamburger-icon\">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </span>
                            </button>
                        </div>
                            <div class=\"dropdown ms-sm-3 header-item topbar-user\">
                                <button type=\"button\" class=\"btn\" id=\"page-header-user-dropdown\" data-bs-toggle=\"dropdown\"
                                    aria-haspopup=\"true\" aria-expanded=\"false\">
                                        <span class=\"d-flex align-items-center\">
                                            <div class=\"user-circle cursor-pointer user-view \">
                                                S
                                            </div>
                                            <span class=\"text-start ms-xl-2\">
                                                <span class=\"d-none d-xl-inline-block ms-1 fw-medium user-name-text\">".getUserInfo()['name']."</span>
                                            </span>
                                        </span>
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </header>

        ";
    }
}
