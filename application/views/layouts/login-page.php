<?php

$username_field = array(
    "name"          => "username",
    "value"         => set_value("username"),
    "placeholder"   => "Korisničko ime",
    "class"         => "form-control",
    "minlength"     => "4",
    "maxlength"     => "20",
    "required"      => "true"
);

$password_field = array(
    "name"          => "password",
    "value"         => set_value("password"),
    "placeholder"   => "Lozinka",
    "class"         => "form-control",
    "minlength"     => "6",
    "maxlength"     => "32",
    "required"      => "true"
);

?>

<body class="login-container">

<!-- Page container -->
<div class="page-container" style="margin-top:0px !important;">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper" style="vertical-align: middle;">

            <!-- Content area -->
            <div class="content">

                <?php
                    $alert_message  = $this->session->flashdata('message');
                    $alert_class    = $this->session->flashdata('message-flag');
                    if( !empty($alert_message) ):
                ?>

                <div class="alert <?php echo $alert_class ?> no-border" style="max-width: 760px; margin: 0 auto; margin-bottom: 30px;">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><?php echo $alert_message ?></span>
                </div>

                <?php endif; ?>

                <!-- Simple login form -->
                <?= form_open(base_url("login")); ?>

                    <div class="panel panel-body login-form">

                        <div class="text-center">
                            <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                            <h5 class="content-group">Prijava na sistem <small class="display-block">Unesite vaše pristupne podatke</small></h5>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <?= form_input($username_field); ?>
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                            <?= form_error('username'); ?>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <?= form_password($password_field); ?>
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                            <?= form_error('password'); ?>
                        </div>

                            <?php if(isset($login_error)): ?>
                            <div style="text-align: center; padding-bottom: 10px;">
                                <?= $login_error ?>
                            </div>
                            <?php endif; ?>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Prijavi se <i class="icon-circle-right2 position-right"></i></button>
                        </div>

                        <div class="text-center">
                            <a href="<?php echo base_url('register') ?>">Novi nalog</a><br>
                            <a href="#">Zaboravili ste lozinku?</a>
                        </div>
                    </div>

                    <?= form_close(); ?>
                <!-- /simple login form -->


               <?php $this->load->view('parts/login/login-footer.php'); ?>

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

</body>
</html>
