<?php

namespace App\Models;

class DokanFooter
{
    function getHtml()
    {
        return "
            <footer class=\"footer\">
                <div class=\"container-fluid\">
                    <div class=\"row\">
                        <div class=\"col-sm-6\">
                            <script>document.write(new Date().getFullYear())</script>
                            © iglyphic.com.
                        </div>
                        <div class=\"col-sm-6\">
                            <div class=\"text-sm-end d-none d-sm-block\">
                                Design & Develop by Sourav Corporation
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <div class='notification hide-notification' id='notificationMsg'>

            </div>
        ";
    }
}
