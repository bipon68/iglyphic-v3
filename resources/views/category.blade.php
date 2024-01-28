<?php
$dokanHeader = new \App\Models\DokanHeader();
$dokanSidebar = new \App\Models\DokanSidebar();
$dokanFooter = new \App\Models\DokanFooter();
$dokanBackToTopBtn = new \App\Models\DokanBackToTopBtn();

/* @var array $categoryAllAr */

$sl = 1;
$tr = "";
foreach ($categoryAllAr as $det_ar) {
    $tr .= "
        <tr>
            <td>" . $sl++ . "</td>
            <td>" . $det_ar['type'] . "</td>
            <td>" . $det_ar['title'] . "</td>
            <td>" . $det_ar['description'] . "</td>
            <td><img style=\"width:50px\" src=\"" . $det_ar['image_url'] . "\"></td>
            <td>
                <button type=\"button\" class=\"btn btn-sm btn-primary update\" data-id=\"" . $det_ar['id'] . "\">Edit</button>
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
    <title>Products History | iglyphic.com</title>
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
                                            <th style="width: 50px">Type</th>
                                            <th>Category Name</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Icon</th>
                                            <th style="width: 50px;text-align: center">Action</th>
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
                                <label for="title" class="form-label">Category Type</label>
                               <select class="form-select" name="type" id="type">
                                   <option value="">Select Type</option>
                                   <option value="product">Product</option>
                                   <option value="blog">Blog</option>
                               </select>

                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="title" class="form-label">Category Name</label>
                                <input type="text" class="form-control" name="title" id="title"
                                       placeholder="Enter Category Name">
                                <div id="productList"></div>

                            </div>
                        </div><!--end col-->

                        <div class="col-xxl-12">
                            <div>
                                <label for="vendor" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description"
                                          placeholder="Enter Description"></textarea>
                            </div>
                        </div><!--end col-->
                        <div class="col-12">
                            <div>
                                <label for="image_url" class="form-label">Product Image</label>
                                <input type="file" class="form-control" name="image_url" id="image_url">
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

<!--start back-to-top-->
<?= $dokanBackToTopBtn->getHtml() ?>
    <!--end back-to-top-->

<?= assetsJs("dokan") ?>

<script>
    $('#createNew').on('click', function () {
        let $modal = $('#productModal').modal('show');
        let $title = $modal.find('.modal-title');
        let $form = $modal.find('form');

        $title.html('Add New Category');
        $form.trigger('reset').attr('action', "/manage/category-create").attr('data-mode', 'create');

        return false;
    });
    $('.update').on('click', function () {
        let $modal = $('#productModal').modal('show');
        let $title = $modal.find('.modal-title');
        let $form = $modal.find('form');
        let id = $(this).attr('data-id');

        $title.html('Update Category');
        $form.trigger('reset').attr('action', "/manage/category-update/" + id + "").attr('data-mode', 'create');
        let token = $('input[name="_token"]').attr('value');
        $.post('/manage/category-json/' + id + '', {_token: token}, function (data) {
            $('#type').val(data['type']);
            $('#title').val(data['title']);
            $('#description').val(data['description']);
        }, "json");
        return false;
    });

    $('#form').ajaxFormSubmit();

</script>

</body>


</html>
