<?php
$logged_user_id = $user['user_id'];
?>

    <!-- Form horizontal -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"></h5>
        </div>

        <div class="panel-body">

            <form class="form-horizontal" action="#">
                <fieldset class="content-group">
                    <legend class="text-bold">Informacije o korisniku</legend>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Korisnički podaci</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="<?php echo $profil->name; ?>" disabled>
                                    <span class="label label-block label-primary">Ime i prezime</span>
                                </div>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="<?php echo $profil->username; ?>" disabled>
                                    <span class="label label-block label-primary">Korisničko ime</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Lični podaci</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="<?php echo $profil->telephone; ?>" disabled>
                                    <span class="label label-block label-info">Broj telefona</span>
                                </div>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="<?php echo $profil->email; ?>" disabled>
                                    <span class="label label-block label-info">Email adresa</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Lokacija</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" value="<?php echo $profil->address; ?>">
                                    <span class="label label-block label-info">Adresa</span>
                                </div>

                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="<?php echo $profil->city; ?>">
                                    <span class="label label-block label-info">Grad</span>
                                </div>

                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="<?php echo $profil->country; ?>">
                                    <span class="label label-block label-info">Drzava</span>
                                </div>

                                <div class="col-md-2">
                                    <input type="text" class="form-control" value="<?php echo $profil->zip_code; ?>">
                                    <span class="label label-block label-info">Postanski broj</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="margin-top: 30px;">
                        <label class="control-label col-lg-2">Status</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-12 label-block">
                                    <?php $status = get_account_status($profil->active, $profil->last_login); ?>
                                    <input type="text" class="form-control" value="<?php echo $status['message']; ?>" disabled>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-lg-2">Login log</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="<?php echo date("j.n.Y  H:i", $profil->created); ?>">
                                    <span class="label label-block" style="color: #000;">Account created</span>
                                </div>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="<?php echo date("j.n.Y  H:i", $profil->last_login); ?>">
                                    <span class="label label-block" style="color: #000;">Last login</span>
                                </div>

                            </div>
                        </div>
                    </div>

                </fieldset>

                <div class="text-right">
                    <a type="button" href="<?php echo base_url('users'); ?>" class="btn btn-primary">
                        Lista korisnika <i class="icon-arrow-right14 position-right"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
    <!-- /form horizontal -->


<?php
function get_account_status($active, $last_login = '')
{
    $code = '';

    if ($active == 0) {
        $code = 'Nepotvrđen';
        $css = 'label-danger';
    } else if ($active == 1 && empty($last_login)) {
        $code = 'Neaktivan';
        $css = 'label-info';
    } else {
        $code = 'Aktivan';
        $css = 'label-success';
    }

    return array(
        'message' => $code,
        'class' => $css
    );
}

?>