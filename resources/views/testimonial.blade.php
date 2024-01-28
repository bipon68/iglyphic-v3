<?php
$dokanHeader = new \App\Models\DokanHeader();
$dokanSidebar = new \App\Models\DokanSidebar();
$dokanFooter = new \App\Models\DokanFooter();
$dokanBackToTopBtn = new \App\Models\DokanBackToTopBtn();

/* @var array $testimonialAllAr */

$sl = 1;
$tr = "";
foreach ($testimonialAllAr as $det_ar) {
    $tr .= "
        <tr>
            <td>" . $sl++ . "</td>
            <td>" . $det_ar['user_name'] . "</td>
            <td>" . $det_ar['comment'] . "</td>
            <td>" . $det_ar['point'] . "</td>
            <td>
                <button type=\"button\" class=\"btn btn-sm btn-primary update\" data-id=\"" . $det_ar['id'] . "\">Edit</button>
                                <button type=\"button\" class=\"btn btn-sm btn-danger remove\" data-id=\"" . $det_ar['id'] . "\">Remove</button>

            </td>
        </tr>
    ";
}
?>

    <!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
      data-sidebar-image="none" data-preloader="disable">
<head>

    <meta charset="utf-8"/>
    <title>Testimonial List | iglyphic.com</title>
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
                            <h4 class="mb-sm-0">Category List</h4>

                            <div class="page-title-right d-sm-flex">
                                <button type="button" class="btn btn-sm btn-success" id="createNew">Create New</button>
                            </div>

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
                                            <th style="width: 50px">SL</th>
                                            <th>User Name</th>
                                            <th scope="col">Comment</th>
                                            <th scope="col">Point</th>
                                            <th style="width: 150px;text-align: center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="tableSearchData">
                                        <?= $tr ?>
                                        </tbody>
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
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                <label for="user_name" class="form-label">User Name</label>
                                <input type="text" class="form-control" name="user_name" id="user_name"
                                       placeholder="Enter User Name">
                            </div>
                        </div><!--end col-->

                        <div class="col-xxl-12">
                            <div>
                                <label for="comment" class="form-label">Comment</label>
                                <textarea class="form-control" name="comment" id="comment"
                                          placeholder="Enter Comment"></textarea>
                            </div>
                        </div><!--end col-->
                        <div class="col-12">
                            <div>
                                <label for="point" class="form-label">Point</label>
                                <input type="text" class="form-control" name="point" id="point" placeholder="Point Out of 5">
                            </div>
                        </div>
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
<div id="deleteModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" action="" method="post" id="deleteForm">
            @csrf

            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="NotificationModalbtn-close"></button>
            </div>
            <div class="modal-body p-md-5">
                <div class="text-center">
                    <div class="text-danger">
                        <i class="bi bi-trash display-4"></i>
                    </div>
                    <div class="mt-4 fs-15">
                        <h4 class="mb-1">Are you sure ?</h4>
                        <p class="text-muted mx-4 mb-0">Are you sure you want to remove this ?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
                </div>
            </div>

        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!--start back-to-top-->
<?= $dokanBackToTopBtn->getHtml() ?>
    <!--end back-to-top-->

<?= assetsJs("dokan") ?>

<script>
    $('#createNew').on('click', function () {
        let $modal = $('#productModal').modal('show');
        let $title = $modal.find('.modal-title');
        let $form = $modal.find('form');

        $title.html('Add New Testimonial');
        $form.trigger('reset').attr('action', "/manage/testimonial-create").attr('data-mode', 'create');

        return false;
    });
    $('.update').on('click', function () {
        let $modal = $('#productModal').modal('show');
        let $title = $modal.find('.modal-title');
        let $form = $modal.find('form');
        let id = $(this).attr('data-id');

        $title.html('Update Testimonial');
        $form.trigger('reset').attr('action', "/manage/testimonial-update/" + id + "").attr('data-mode', 'create');
        let token = $('input[name="_token"]').attr('value');
        $.post('/manage/testimonial-json/' + id + '', {_token: token}, function (data) {
            $('#user_name').val(data['user_name']);
            $('#point').val(data['point']);
            $('#comment').val(data['comment']);
        }, "json");
        return false;
    });
    $('.remove').on('click', function () {

        let $modal = $('#deleteModal').modal('show');
        let $form = $modal.find('form');
        let id = $(this).attr('data-id');

        $form.trigger('reset').attr('action', "/manage/testimonial-remove/" + id + "").attr('data-mode', 'create');

        return false;
    });
    $('#form').ajaxFormSubmit();
    $('#deleteForm').ajaxFormSubmit();

</script>

</body>


</html>
