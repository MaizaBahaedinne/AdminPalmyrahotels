
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from spark.bootlab.io/pages-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 Jan 2022 10:12:59 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Modern, flexible and responsive Bootstrap 5 admin &amp; dashboard template">
    <meta name="author" content="Bootlab">

    <title>Spark - Bootstrap 5 Admin &amp; Dashboard Template</title>

    <!-- PICK ONE OF THE STYLES BELOW -->
    <!-- <link href="<?php echo base_url() ?>assets/css/modern.css" rel="stylesheet"> -->
    <!-- <link href="<?php echo base_url() ?>assets/css/classic.css" rel="stylesheet"> -->
    <!-- <link href="<?php echo base_url() ?>assets/css/dark.css" rel="stylesheet"> -->
    <!-- <link href="<?php echo base_url() ?>assets/css/light.css" rel="stylesheet"> -->

    <!-- BEGIN SETTINGS -->
    <!-- You can remove this after picking a style -->
    <style>
        body {
            opacity: 0;
        }
    </style>
    <script src="<?php echo base_url() ?>assets/js/settings.js"></script>
    <!-- END SETTINGS -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120946860-7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-120946860-7');
</script></head>
<!-- SET YOUR THEME -->

<body class="theme-blue">
    <div class="splash active">
        <div class="splash-icon"></div>
    </div>

    <main class="main h-100 w-100">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Welcome back</h1>
                            <p class="lead">
                                Sign in to your account to continue
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <div class="text-center">
                                        <img src="<?php echo base_url() ?>assets/img/avatars/avatar.jpg" alt="Linda Miller" class="img-fluid rounded-circle" width="132" height="132" />
                                    </div>
                                    <form action="<?php echo base_url() ?>Login/loginMe" method='post' >
                                        <div class="mb-3">
                                            <label>Email</label>
                                            <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email"  required />
                                        </div>
                                        <div class="mb-3">
                                            <label>Password</label>
                                            <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" required />
                                            <small>
                                                <a href="pages-reset-password.html">Forgot password?</a>
                                            </small>
                                        </div>
                                        <div>
                                            <div class="form-check align-items-center">
                                                <input id="customControlInline" type="checkbox" class="form-check-input" value="remember-me" name="remember-me"
                                                    checked>
                                                <label class="form-check-label text-small" for="customControlInline">Remember me next time</label>
                                            </div>
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" href="dashboard-default.html" class="btn btn-lg btn-primary">Sign in</button>
                                            <!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <svg width="0" height="0" style="position:absolute">
        <defs>
            <symbol viewBox="0 0 512 512" id="ion-ios-pulse-strong">
                <path
                    d="M448 273.001c-21.27 0-39.296 13.999-45.596 32.999h-38.857l-28.361-85.417a15.999 15.999 0 0 0-15.183-10.956c-.112 0-.224 0-.335.004a15.997 15.997 0 0 0-15.049 11.588l-44.484 155.262-52.353-314.108C206.535 54.893 200.333 48 192 48s-13.693 5.776-15.525 13.135L115.496 306H16v31.999h112c7.348 0 13.75-5.003 15.525-12.134l45.368-182.177 51.324 307.94c1.229 7.377 7.397 11.92 14.864 12.344.308.018.614.028.919.028 7.097 0 13.406-3.701 15.381-10.594l49.744-173.617 15.689 47.252A16.001 16.001 0 0 0 352 337.999h51.108C409.973 355.999 427.477 369 448 369c26.511 0 48-22.492 48-49 0-26.509-21.489-46.999-48-46.999z">
                </path>
            </symbol>
        </defs>
    </svg>
    <script src="<?php echo base_url() ?>assets/js/app.js"></script>

</body>


<!-- Mirrored from spark.bootlab.io/pages-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 Jan 2022 10:12:59 GMT -->
</html>