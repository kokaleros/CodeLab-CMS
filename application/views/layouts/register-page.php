<?php

$name_field = array(
    "name"          => "name",
    "value"         => set_value("name"),
    "placeholder"   => "Vaše ime",
    "class"         => "form-control",
    "minlength"     => "3",
    "maxlength"     => "100",
    "required"      => "true"
);

$username_field = array(
    "name"          => "username",
    "value"         => set_value("username"),
    "placeholder"   => "izaberite korisničko ime",
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

$password_conf = array(
    "name"          => "password_conf",
    "value"         => set_value("password_conf"),
    "placeholder"   => "Ponovi lozinku",
    "class"         => "form-control",
    "minlength"     => "6",
    "maxlength"     => "32",
    "required"      => "true"
);

$tel_field = array(
    "name"          => "telephone",
    "value"         => set_value("telephone"),
    "placeholder"   => "Broj telefona",
    "class"         => "form-control",
    "minlength"     => "6",
    "maxlength"     => "25"
);

$email_field = array(
    "name"          => "email",
    "value"         => set_value("email"),
    "placeholder"   => "Vaša email adresa",
    "class"         => "form-control",
    "minlength"     => "7",
    "maxlength"     => "100",
    "required"      => "true"
);

$address_field = array(
    "name"          => "address",
    "value"         => set_value("address"),
    "placeholder"   => "Vaša adresa",
    "class"         => "form-control",
    "minlength"     => "0",
    "maxlength"     => "100"
);

$city_field = array(
    "name"          => "city",
    "value"         => set_value("city"),
    "placeholder"   => "Grad",
    "class"         => "form-control",
    "minlength"     => "0",
    "maxlength"     => "100"
);

$country_field = array(
    "name"          => "country",
    "value"         => set_value("country"),
    "placeholder"   => "Država",
    "class"         => "form-control",
    "minlength"     => "0",
    "maxlength"     => "100"
);

$zip_code_field = array(
    "name"          => "zip_code",
    "value"         => set_value("zip_code"),
    "placeholder"   => "Postanski broj",
    "class"         => "form-control",
    "minlength"     => "0",
    "maxlength"     => "10"
);

?>

<body class="login-container">

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <!-- Registration form -->
                <?= form_open(base_url('login/register')); ?>
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3">
                            <div class="panel registration-form">
                                <div class="panel-body">
                                    <div class="text-center">
                                        <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
                                        <h5 class="content-group-lg">Novi korisnik <small class="display-block">Popunite formular</small></h5>
                                    </div>

                                    <!-- Licne informacije -->
                                    <div class="form-group has-feedback">
                                        <?= form_input($username_field); ?>
                                        <div class="form-control-feedback">
                                            <i class="icon-user-plus text-muted"></i>
                                        </div>
                                        <?= form_error('username'); ?>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <?= form_input($name_field); ?>
                                                <div class="form-control-feedback">
                                                    <i class="icon-user-check text-muted"></i>
                                                </div>
                                                <?= form_error('name'); ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <?= form_input($tel_field); ?>
                                                <div class="form-control-feedback">
                                                    <i class="icon-phone text-muted"></i>
                                                </div>
                                                <?= form_error('telephone'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <?= form_password($password_field); ?>

                                                <div class="form-control-feedback">
                                                    <i class="icon-user-lock text-muted"></i>
                                                </div>
                                            </div>
                                            <?= form_error('password'); ?>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <?= form_password($password_conf); ?>

                                                <div class="form-control-feedback">
                                                    <i class="icon-user-lock text-muted"></i>
                                                </div>
                                                <?= form_error('password_conf'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <?= form_input($email_field); ?>
                                                <div class="form-control-feedback">
                                                    <i class="icon-mention text-muted"></i>
                                                </div>
                                                <?= form_error('email'); ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6"></div>
                                    </div>
                                    <!-- / Licne informacije -->

                                    <div class="row">
                                        <div class="col-md-12">
                                            <hr>
                                        </div>
                                    </div>

                                    <!--Adresa i ostale informacije-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <?= form_input($address_field); ?>
                                                <div class="form-control-feedback">
                                                    <i class="icon-pin-alt text-muted"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <?= form_input($city_field); ?>
                                                <div class="form-control-feedback">
                                                    <i class="icon-pin text-muted"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <?= form_input($country_field); ?>
                                                <div class="form-control-feedback">
                                                    <i class="icon-map text-muted"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <?= form_input($zip_code_field); ?>
                                                <div class="form-control-feedback">
                                                    <i class="icon-user-lock text-muted"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


<!--                                    <div class="form-group">-->
<!--                                        <div class="checkbox">-->
<!--                                            <label>-->
<!--                                                <input type="checkbox" class="styled" checked="checked">-->
<!--                                                Send me <a href="#">test account settings</a>-->
<!--                                            </label>-->
<!--                                        </div>-->
<!---->
<!--                                        <div class="checkbox">-->
<!--                                            <label>-->
<!--                                                <input type="checkbox" class="styled" checked="checked">-->
<!--                                                Subscribe to monthly newsletter-->
<!--                                            </label>-->
<!--                                        </div>-->
<!---->
<!--                                        <div class="checkbox">-->
<!--                                            <label>-->
<!--                                                <input type="checkbox" class="styled">-->
<!--                                                Accept <a href="#">terms of service</a>-->
<!--                                            </label>-->
<!--                                        </div>-->
<!--                                    </div>-->

                                    <div class="text-right">
<!--                                        <button type="reset" class="btn btn-link"><i class="icon-arrow-left13 position-left"></i> Reset</button>-->
                                        <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-10"><b><i class="icon-plus3"></i></b> Create account</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?= form_close(); ?>
                <!-- /registration form -->


                <!-- Footer -->
                <?php $this->load->view('parts/login/login-footer.php'); ?>
                <!-- /footer -->

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
