<?php
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(0);

$dokanHeader = new \App\Models\DokanHeader();
$dokanSidebar = new \App\Models\DokanSidebar();
$dokanFooter = new \App\Models\DokanFooter();
$dokanBackToTopBtn = new \App\Models\DokanBackToTopBtn();

/* @var array $settingAr */


?>

    <!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
      data-sidebar-image="none" data-preloader="disable">
<head>

    <meta charset="utf-8"/>
    <title>Setting | iglyphic.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="iglyphic.com" name="description"/>
    <link rel="shortcut icon" href="/assets/images/favicon.ico">

    <?= assetsCss("dokan") ?>

</head>

<body>

<!-- Begin page -->
<div id="layout-wrapper">

    <?= $dokanHeader->getHtml() ?>
        <!-- ========== App Menu ========== -->
    <?= $dokanSidebar->getHtml() ?>

        <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Setting List</h4>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle mb-0">
                                        <thead>
                                        <tr>
                                            <th>Contact Number</th>
                                            <th>
                                                <input type="text" class="form-control change-type" data-id="contact" placeholder="Type Contact" value="<?=$settingAr['contact']['value']?>" >
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Email Address</th>
                                            <th>
                                                <input type="text" class="form-control change-type" data-id="email" placeholder="Type Contact" value="<?=$settingAr['email']['value']?>">
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <th>
                                                <input type="text" class="form-control change-type" data-id="address" placeholder="Type Address" value="<?=$settingAr['address']['value']?>">
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Google Map Location</th>
                                            <th>
                                                <textarea class="form-control change-type" data-id="gmap" placeholder="Type Google Map Embeded Location">
                                                    <?=$settingAr['gmap']['value']?>
                                                </textarea>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Facebook Page Link</th>
                                            <th>
                                                <input type="text" class="form-control change-type" data-id="fbLink" placeholder="Type Facebook Page Link" value="<?=$settingAr['fbLink']['value']?>">
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Twitter Page Link</th>
                                            <th>
                                                <input type="text" class="form-control change-type" data-id="twLink" placeholder="Type Twitter Page Link" value="<?=$settingAr['twLink']['value']?>">
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Instagram Page Link</th>
                                            <th>
                                                <input type="text" class="form-control change-type" data-id="instaLink" placeholder="Type Instagram Page Link" value="<?=$settingAr['instaLink']['value']?>">
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Pinterest Page Link</th>
                                            <th>
                                                <input type="text" class="form-control change-type" data-id="pinLink" placeholder="Type Pinterest Page Link" value="<?=$settingAr['pinLink']['value']?>">
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>About Us</th>
                                            <th>
                                                <textarea type="text" class="form-control change-type" data-id="about" placeholder="Type About Us Text"><?=nl2br($settingAr['about']['value'])?></textarea>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Hero Text</th>
                                            <th>
                                                <textarea type="text" class="form-control change-type" data-id="heroText" placeholder="Type Hero Text"><?=nl2br($settingAr['heroText']['value'])?></textarea>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Hero Sub Text</th>
                                            <th>
                                                <textarea type="text" class="form-control change-type" data-id="heroSubText" placeholder="Type Hero Sub Text"><?=nl2br($settingAr['heroSubText']['value'])?></textarea>
                                            </th>
                                        </tr>
                                        </thead>
                                        @csrf
                                    </table>
                                </div>
                            </div>
                        </div><!-- end card -->
                    </div> <!-- end col -->
                </div>
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <?= $dokanFooter->getHtml() ?>
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!--start back-to-top-->
<?= $dokanBackToTopBtn->getHtml() ?>
    <!--end back-to-top-->

<?= assetsJs("dokan") ?>

<script>

    $('.change-type').on('change', function () {
        let token = $('input[name="_token"]').attr('value');
        let type = $(this).attr('data-id');
        let typeValue = $(this).val();

        $.post('/manage/setting/post/', {_token: token,type,typeValue}, function (data) {
            console.log(data)
        }, "json");
        return false;
    });

    //$('#form').ajaxFormSubmit();

</script>

</body>


</html>
