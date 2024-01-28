<?php

namespace App\Models;

use Sourav\SelectQuery;

class TemplateHeroSection
{
    function getHtml()
    {
        $select = new SelectQuery("setting");
        $select->setQuery("select * from setting where 1");
        $settingAr = $select->getQueues('type');
        return "
            <section class=\"hero__area hero__height hero__height-2 grey-bg-3 d-flex align-items-center\"
             data-background=\"/assets/frontend/img/hero/sl2-bg.png\">
                <div class=\"container\">
                    <div class=\"row justify-content-center\">
                        <div class=\"col-xxl-9 col-xl-10 col-lg-11 col-md-12 col-sm-12\">
                            <div class=\"hero__content hero__content-white text-center\">
                                <h2 class=\"hero__title\">
                                    " . $settingAr['heroText']['value'] . "
                                </h2>
                                <p>
                                    " . $settingAr['heroSubText']['value'] . "
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

        ";
    }
}
