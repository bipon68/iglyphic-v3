<?php
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(0);

$dokanHeader = new \App\Models\DokanHeader();
$dokanSidebar = new \App\Models\DokanSidebar();
$dokanFooter = new \App\Models\DokanFooter();
$dokanBackToTopBtn = new \App\Models\DokanBackToTopBtn();

/* @var array $blogAr */
/* @var array $categoryAllAr */

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
                            <h4 class="mb-sm-0">Blog Update</h4>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <form action="/manage/blog-update/<?=$blogAr['id']?>/post" method="post" id="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <div>
                                                <label for="title" class="form-label">Title</label>
                                                <textarea class="form-control" name="title" id="title"
                                                          placeholder="Enter Product Title"><?=$blogAr['title']?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div>
                                                <label for="sub_title" class="form-label">Sub Title</label>
                                                <input type="text" class="form-control" name="sub_title" id="sub_title"
                                                       placeholder="Enter Sub Title" value="<?=$blogAr['sub_title']?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div>
                                                <label for="description" class="form-label">Description</label>
                                                <textarea class="form-control" name="description" id="description"><?=$blogAr['description']?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div>
                                                <label for="publish_date" class="form-label">Publish Date</label>
                                                <input type="date" class="form-control" name="publish_date" id="publish_date" value="<?=date("Y-m-d",$blogAr['publish_date'])?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <label for="tags" class="form-label">Tags</label>
                                                <input type="text" class="form-control" name="tags" id="tags"
                                                       placeholder="Enter Tags" <?=$blogAr['tags']?>>
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
                                                    <?= \Sourav\SelectOption::getOptionM($categoryAllAr, "title", "id",$blogAr['category']) ?>
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
<script src="/assets/ckeditor5-1/build/ckeditor.js"></script>
<script src="/assets/ckeditor5-1/ckfinder/ckfinder.js"></script>

<script>
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

    //$('#form').ajaxFormSubmit();

</script>

</body>


</html>
