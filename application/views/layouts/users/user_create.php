<?php
$logged_user_id = $user['user_id'];

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

    <!-- Form horizontal -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"></h5>
        </div>

        <div class="panel-body">

            <?=
            form_open(base_url() . "users/create/", array('class'=>'form-horizontal'));
            ?>
                <fieldset class="content-group">
                    <legend class="text-bold">Uredi informacije</legend>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Korisnički podaci</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <?= form_input($username_field); ?>
                                    <span class="label label-block label-primary">Korisničko ime</span>
                                    <?= form_error('username'); ?>
                                </div>

                                <div class="col-md-6">
                                    <?= form_input($name_field); ?>
                                    <span class="label label-block label-primary">Ime i prezime</span>
                                    <?= form_error('name'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 50px;">
                        <label class="control-label col-lg-2"></label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <?= form_password($password_field); ?>
                                    <span class="label label-block" style="color: #000;">Lozinka</span>
                                    <?= form_error('password'); ?>
                                </div>

                                <div class="col-md-6">
                                    <?= form_password($password_conf); ?>
                                    <span class="label label-block"  style="color: #000;">Ponovi lozinku</span>
                                    <?= form_error('password_conf'); ?>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-lg-2">Lični podaci</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <?= form_input($tel_field); ?>
                                    <span class="label label-block label-info">Broj telefona</span>
                                    <?= form_error('telephone'); ?>
                                </div>

                                <div class="col-md-6">
                                    <?= form_input($email_field); ?>
                                    <span class="label label-block label-info">Email adresa</span>
                                    <?= form_error('email'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Lokacija</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <?= form_input($address_field); ?>
                                    <span class="label label-block label-info">Adresa</span>
                                    <?= form_error('address'); ?>
                                </div>

                                <div class="col-md-3">
                                    <?= form_input($city_field); ?>
                                    <span class="label label-block label-info">Grad</span>
                                    <?= form_error('city'); ?>
                                </div>

                                <div class="col-md-3">
                                    <?= form_input($country_field); ?>
                                    <span class="label label-block label-info">Drzava</span>
                                    <?= form_error('country'); ?>
                                </div>

                                <div class="col-md-2">
                                    <?= form_input($zip_code_field); ?>
                                    <span class="label label-block label-info">Postanski broj</span>
                                    <?= form_error('zip_code'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </fieldset>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">
                        Snimi <i class="icon-arrow-right14 position-right"></i>
                    </button>
                </div>
            <?= form_close(); ?>
        </div>
    </div>
    <!-- /form horizontal -->
