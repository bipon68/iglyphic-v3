<?php
$dokanHeader = new \App\Models\DokanHeader();
$dokanSidebar = new \App\Models\DokanSidebar();
$dokanFooter = new \App\Models\DokanFooter();
$dokanBackToTopBtn = new \App\Models\DokanBackToTopBtn();

?>

    <!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
      data-sidebar-image="none" data-preloader="disable">
<head>

    <meta charset="utf-8"/>
    <title>User Password | iglyphic.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Dokan" name="description"/>
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
                            <h4 class="mb-sm-0">Password Change</h4>
                        </div>
                    </div>
                </div>


                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="/user-change-password/post" id="form" method="post" class="row">
                                    @csrf

                                    <div class="col-12 col-lg-3 col-xl-3 col-md-6 mb-3">
                                        <div class="position-relative auth-pass-inputgroup overflow-hidden">
                                            <div class="input-group">
                                                <input type="password" class="form-control pe-5 password-input"
                                                       placeholder="Enter password" name="old_password" id="password">
                                            </div>
                                            <button
                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                type="button" id="password-addon">
                                                <img style="width: 16px;" src="/assets/images/icons/eye-icon.svg" alt="Eye" >
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-xl-3 col-md-6 mb-3">
                                        <div class="position-relative auth-pass-inputgroup overflow-hidden">
                                            <div class="input-group">
                                                <input type="password" class="form-control pe-5 password-input"
                                                       placeholder="Enter password" name="new_password" id="password">
                                            </div>
                                            <button
                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                type="button" id="password-addon"><img style="width: 16px;" src="/assets/images/icons/eye-icon.svg" alt="Eye" >
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-xl-3 col-md-6 mb-3">
                                        <div class="position-relative auth-pass-inputgroup overflow-hidden">
                                            <div class="input-group">
                                                <input type="password" class="form-control pe-5 password-input"
                                                       placeholder="Enter password" name="re_new_password" id="password">
                                            </div>
                                            <button
                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                type="button" id="password-addon"><img style="width: 16px;" src="/assets/images/icons/eye-icon.svg" alt="Eye" >
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-1 col-xl-1 col-md-6 mb-3">
                                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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

<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                <label for="firstName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Enter Full Name">
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Contact Number</label>
                                <input type="text" class="form-control" id="lastName" placeholder="Enter Contact Number">
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Email</label>
                                <input type="text" class="form-control" id="lastName" placeholder="Enter Email">
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="emailInput" class="form-label">Password</label>
                                <input type="password" class="form-control" id="emailInput" placeholder="Enter Address">
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="emailInput" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="emailInput" placeholder="Enter Address">
                            </div>
                        </div><!--end col-->

                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>

<!--start back-to-top-->
<?= $dokanBackToTopBtn->getHtml() ?>
    <!--end back-to-top-->


<?= assetsJs("dokan") ?>

<script>
    $('#createNew').on('click', function () {
        let $modal = $('#userModal').modal('show');
        let $title = $modal.find('.modal-title');
        let $form = $modal.find('form');

        $title.html('Add New Customer');
        $form.trigger('reset').attr('action', "manage/jobseeker/{sl}/experience/create").attr('data-mode', 'create');

        return false;
    });
</script>
</body>


</html>
