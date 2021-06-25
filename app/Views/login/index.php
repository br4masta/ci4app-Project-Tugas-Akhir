<head>
    <?= $this->include('templates/header'); ?>
     <!-- Boostrap css -->
     <link type="text/css" rel="stylesheet" href="<?= base_url() ?>/assets/login/css/bootstrap.min.css" />
    <!-- CSS Sheet -->
    <link type="text/css" rel="stylesheet" href="<?= base_url() ?>/assets/login/css/style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- font google -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 form-container">
                <div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
                    <div class="logo mt-3 mb-3">
                        <img src="<?= base_url() ?>/assets/login/img/logo.png" style="height: 70px;" alt="">
                    </div>
                    <div class="heading mb-5 " style="font-family: Montserrat; font-weight: lighter; font-size: 20px;">
                        <h5>Login into your account</h5>
                    </div>
                    <?php if (session()->getFlashdata('msg')) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                    <?php endif; ?>
                    <form action="/Auth/login" method="POST">
                            <div class="form-input">
                                <span><i class="fa fa-user" aria-hidden="true"></i></span>
                                <input type="text" name="username" placeholder="username" required>
                            </div>
                            <div class="form-input">
                                <span><i class="fa fa-lock" aria-hidden="true"></i></span>
                                <input type="password" name="password" placeholder="password" required>
                            </div>
                            <div class="row mb-5">
                                <div class="col-6 d-flex">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cb1">
                                        <label for="cb1" class="custom-control-label">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="#">forget password</a>
                                </div>
                            </div>
                            <div class="submit">
                                <button type="submit" class="btn" style="font-family: Montserrat; font-size: normal; font-weight: bold;">Login</button>
                            </div><br>
                        </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 d-md-block image-container">
               
            </div>
        </div>
    </div>
</body>
<!-- Boostrap Script -->
<script src="<?= base_url() ?>/assets/login/js/jquery-3.4.1.min.js"></script>
<script src="<?= base_url() ?>/assets/login/js/popper.min.js"></script>
<script src="<?= base_url() ?>/assets/login/js/bootstrap.min.js"></script>

</html>