<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
      data-sidebar-image="none" data-preloader="disable">
<head>
    <meta charset="utf-8"/>
    <title>Sign In | iglyphic.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Sign In | iglyphic.com" name="description"/>
    <meta content="Dokan" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <?= assetsCss("dokan") ?>

</head>

<body>

<section
    class="auth-page-wrapper-2 py-4 position-relative d-flex align-items-center justify-content-center min-vh-100 bg-light">
    <div class="container">
        <div class="row g-0">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="card mb-0 rounded-0 rounded-end border-0">
                    <div class="card-body p-4 p-sm-5 m-lg-4">
                        <div class="text-center mt-2">
                            <h5 class="text-primary fs-22">iglyphic.com</h5>
                            <p class="text-muted">Sign in</p>
                        </div>
                        <div class="p-2 mt-5">
                            <form method="post" action="/login-post">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" id="email" name="email"
                                               placeholder="Enter Email" value="" >
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="password">Password</label>
                                    <div class="position-relative auth-pass-inputgroup overflow-hidden">
                                        <div class="input-group">
                                            <input type="password" class="form-control pe-5 password-input"
                                                   placeholder="Enter password" name="password" id="password"
                                            value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button class="btn btn-primary w-100" type="submit">Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <div class="col-lg-3"></div>

        </div>
    </div>
</section>

<?= assetsJs("dokan") ?>

</body>

</html>
