<?php
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(0);

$dokanHeader = new \App\Models\DokanHeader();
$dokanSidebar = new \App\Models\DokanSidebar();
$dokanFooter = new \App\Models\DokanFooter();
$dokanBackToTopBtn = new \App\Models\DokanBackToTopBtn();

/* @var array $blogsAllAr */
/* @var array $categoryAllAr */

$sl = 1;
$tr = "";
foreach ($blogsAllAr as $det_ar) {
    $tr .= "
        <tr>
            <td>" . $sl++ . "</td>
            <td>" . $categoryAllAr[$det_ar['category']]['title'] . "</td>
            <td>" . $det_ar['title'] . "</td>
            <td>" .nl2br( $det_ar['description']) . "</td>
            <td>" . date("d-m-Y", $det_ar['publish_date']) . "</td>
            <td><img style=\"width:50px\" src=\"" . $det_ar['image_url'] . "\"></td>
            <td>
                <a href=\"/manage/blog-update/" . $det_ar['id'] . "\" class=\"btn btn-sm btn-primary\" data-id=\"" . $det_ar['id'] . "\">Edit</a>
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
    <title>Blog List | iglyphic.com</title>
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
                            <h4 class="mb-sm-0">Blog List</h4>

                            <div class="page-title-right d-sm-flex">
                                <div class="me-2"></div>
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
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th scope="col">Description</th>
                                            <th>Publish Date</th>
                                            <th>Image</th>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="form" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <div>
                                <label for="title" class="form-label">Title</label>
                                <textarea class="form-control" name="title" id="title"
                                          placeholder="Enter Product Title"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div>
                                <label for="sub_title" class="form-label">Sub Title</label>
                                <input type="text" class="form-control" name="sub_title" id="sub_title"
                                       placeholder="Enter Sub Title">
                            </div>
                        </div>
                        <div class="col-12">
                            <div>
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description"></textarea>
                            </div>
                        </div>
                        <div class="col-4">
                            <div>
                                <label for="publish_date" class="form-label">Publish Date</label>
                                <input type="date" class="form-control" name="publish_date" id="publish_date">
                            </div>
                        </div>
                        <div class="col-6">
                            <div>
                                <label for="tags" class="form-label">Tags</label>
                                <input type="text" class="form-control" name="tags" id="tags"
                                       placeholder="Enter Tags">
                            </div>
                        </div>
                        <div class="col-6">
                            <div>
                                <label for="image_url" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image_url" id="image_url">
                            </div>
                        </div>
                        <div class="col-6">
                            <div>
                                <label for="sub_title" class="form-label">Category</label>
                                <select class="form-select" name="category" id="category">
                                    <option value="">Select Category</option>
                                    <?= \Sourav\SelectOption::getOptionM($categoryAllAr, "title", "id", null) ?>
                                </select>
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
<script src="/assets/ckeditor5-1/build/ckeditor.js"></script>
<script src="/assets/ckeditor5-1/ckfinder/ckfinder.js"></script>

<script>

    $('#createNew').on('click', function () {
        let $modal = $('#productModal').modal('show');
        let $title = $modal.find('.modal-title');
        let $form = $modal.find('form');

        $title.html('Add New Blog');
        $form.trigger('reset').attr('action', "/manage/blog-create").attr('data-mode', 'create');

        return false;
    });
    /* Classic Editor*/
    ClassicEditor
        .create(document.querySelector('#description'), {
            fontSize: {
                options: [
                    'default',
                    21,
                    22,
                    23,
                    24,
                    25,
                    26,
                    27,
                    28,
                    29,
                    30,
                    31,
                    32,
                    33,
                    34,
                    35
                ]
            },
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'underline',
                    'link',
                    'horizontalLine',
                    'fontSize',
                    'alignment',
                    'bulletedList',
                    'numberedList',
                    'blockQuote',
                    'fontColor',
                    'fontBackgroundColor',
                    'specialCharacters',
                    'removeFormat',
                    '|',
                    'ckfinder',
                    'uploadImage',
                    'htmlEmbed',
                    'sourceEditing',
                    'undo',
                    'redo',
                    '|',
                    'outdent',
                    'indent',
                    'insertTable'
                ]
            },
            language: 'en',
            image: {
                toolbar: [
                    'imageTextAlternative',
                    'imageStyle:inline',
                    'imageStyle:block',
                    'imageStyle:side',
                    'linkImage',
                    'toggleImageCaption',
                ]
            },
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells',
                    'tableCellProperties',
                    'tableProperties'
                ]
            },
            title: false,
            ckfinder: {
                uploadUrl: '/manage/blog-image',

                options: {
                    resourceType: 'Images',
                    disableObjectResizing: true,
                },
            },
        })
        .then(editor => {
            console.log(editor);

        })
        .catch(error => {
            console.log(error);
        });

    $('#deleteForm').ajaxFormSubmit();

    $('.remove').on('click', function () {

        let $modal = $('#deleteModal').modal('show');
        let $form = $modal.find('form');
        let id = $(this).attr('data-id');

        $form.trigger('reset').attr('action', "/manage/blog-remove/" + id + "").attr('data-mode', 'create');

        return false;
    });
</script>

</body>


</html>
