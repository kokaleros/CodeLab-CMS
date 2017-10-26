<?php

$f_predavanje_posiljke = array(
        "name"          => "predavanje_posiljke",
        "required"      => "true",
        "class"         => "styled"
);

$f_vintax_poslovnice = array(
    "name"          => "predavanje_u_poslovnicu",
    "class"         => "styled"
);

$f_dostava_posiljke = array(
    "name"          => "dostava_posiljke",
    "required"      => "true",
    "class"         => "styled"
);

$f_vintax_poslovnice_dostava = array(
    "name"          => "dostava_u_poslovnicu",
    "class"         => "styled"
);

$f_ambalaza = array(
    "name"          => "ambalaza",
    "required"      => "true",
    "class"         => "styled"
);

$cb_amalaza= array(
    'name'          => 'vintax_ambalaza',
    'checked'       => false
);

$ta_opis_sadrzaja = array(
    "name"          => "opis_sadrzaja",
    "value"         => set_value('opis_sadrzaja'),
    "required"      => "true",
    "class"         => "form-control",
    "rows"          => "5",
    "cols"          => "5",
    "maxlength"     => "400"
);

$ta_napomena = array(
    "name"          => "posebne_napomene",
    "value"         => set_value('posebne_napomene'),
    "required"      => "true",
    "class"         => "form-control",
    "rows"          => "5",
    "cols"          => "5",
    "maxlength"     => "400"
);

// o posiljatelju
//posiljatelj_ime
$pos_ime = array(
    "name"          => "posiljatelj_ime",
    "value"         => set_value('posiljatelj_ime'),
    "placeholder"   => "Unesite ime pošiljatelja",
    "class"         => "form-control",
    "required"      => "true",
    "maxlength"     => "40",
    "minlength"     => "3"
);

$pos_adresa = array(
    "name"          => "posiljatelj_adresa",
    "value"         => set_value('posiljatelj_adresa'),
    "placeholder"   => "Unesite adresu pošiljatelja",
    "class"         => "form-control",
    "required"      => "true",
    "maxlength"     => "100",
    "minlength"     => "3"
);

$pos_grad = array(
    "name"          => "posiljatelj_grad",
    "value"         => set_value('posiljatelj_grad'),
    "placeholder"   => "Unesite grad/mjesto pošiljatelja",
    "class"         => "form-control",
    "required"      => "true",
    "maxlength"     => "100",
    "minlength"     => "3"
);

$pos_drzavu = array(
    "name"          => "posiljatelj_drzavu",
    "value"         => set_value('posiljatelj_drzavu'),
    "placeholder"   => "Unesite državu pošiljatelja",
    "class"         => "form-control",
    "required"      => "true",
    "maxlength"     => "50",
    "minlength"     => "1"
);

$pos_postanski_broj = array(
    "name"          => "posiljatelj_zip",
    "value"         => set_value('posiljatelj_zip'),
    "placeholder"   => "Unesite poštanski broj pošiljatelja",
    "class"         => "form-control",
    "required"      => "true",
    "maxlength"     => "10",
    "minlength"     => "3"
);

$pos_telefon = array(
    "name"          => "posiljatelj_telefon",
    "value"         => set_value('posiljatelj_telefon'),
    "placeholder"   => "Unesite telefonski broj pošiljatelja",
    "class"         => "form-control",
    "required"      => "true",
    "maxlength"     => "25",
    "minlength"     => "6"
);

$pos_email = array(
    "name"          => "posiljatelj_email",
    "value"         => set_value('posiljatelj_email'),
    "placeholder"   => "Unesite email pošiljatelja",
    "type"          => "email",
    "class"         => "form-control",
    "required"      => "true",
    "maxlength"     => "100",
    "minlength"     => "6"
);


// o primatelju
//primatelj_ime
$prim_ime = array(
    "name"          => "primatelj_ime",
    "value"         => set_value('primatelj_ime'),
    "placeholder"   => "Unesite ime primatelja",
    "class"         => "form-control",
    "required"      => "true",
    "maxlength"     => "40",
    "minlength"     => "3"
);

$prim_adresa = array(
    "name"          => "primatelj_adresa",
    "value"         => set_value('primatelj_adresa'),
    "placeholder"   => "Unesite adresu primatelja",
    "class"         => "form-control",
    "required"      => "true",
    "maxlength"     => "100",
    "minlength"     => "3"
);

$prim_grad = array(
    "name"          => "primatelj_grad",
    "value"         => set_value('primatelj_grad'),
    "placeholder"   => "Unesite grad/mjesto primatelja",
    "class"         => "form-control",
    "required"      => "true",
    "maxlength"     => "100",
    "minlength"     => "3"
);

$prim_drzavu = array(
    "name"          => "primatelj_drzavu",
    "value"         => set_value('primatelj_drzavu'),
    "placeholder"   => "Unesite državu primatelja",
    "class"         => "form-control",
    "required"      => "true",
    "maxlength"     => "50",
    "minlength"     => "1"
);

$prim_postanski_broj = array(
    "name"          => "primatelj_zip",
    "value"         => set_value('primatelj_zip'),
    "placeholder"   => "Unesite poštanski broj primatelja",
    "class"         => "form-control",
    "required"      => "true",
    "maxlength"     => "10",
    "minlength"     => "3"
);

$prim_telefon = array(
    "name"          => "primatelj_telefon",
    "value"         => set_value('primatelj_telefon'),
    "placeholder"   => "Unesite poštanski broj primatelja",
    "class"         => "form-control",
    "required"      => "true",
    "maxlength"     => "25",
    "minlength"     => "6"
);

//submit
$f_submit = array(
    "name"  => "submit",
    "value" => "Pošalji",
    "class" => "btn btn-primary"
);

//dodatna usluga
$rf_dodatna_usluga = array(
    "name"          => "dodatna_usluga",
    "required"      => "true",
    "class"         => "styled",
    "onchange"      => "do_calculation()"
);

$f_cijena_odkupnine = array(
    "name"          => "cijena_odkupnine",
    "value"         => set_value('cijena_odkupnine') == '' ? 0 : set_value('cijena_dokupnine'),
    "placeholder"   => "400",
    "class"         => "form-control",
    "maxlength"     => "5",
    "minlength"     => "0",
    "type"          => "number",
    "onchange"      => "do_calculation()",
    "onkeyup"       =>  "do_calculation()"
);

$cb_garancija = array(
    'name'          => "garancija_isporuke",
    'checked'       => false,
    'value'         => "garancija_isporuke",
    "onchange"      => "do_calculation()"
);

//dimenzije paketa
$f_paket_visina = array(
    "name"          => "paket_visina",
    "value"         => set_value('paket_visina'),
    "placeholder"   => "10",
    "class"         => "form-control",
    "maxlength"     => "3",
    "minlength"     => "1",
    "type"          => "number"
);

//dimenzije paketa
$f_paket_sirina = array(
    "name"          => "paket_sirina",
    "value"         => set_value('paket_sirina'),
    "placeholder"   => "10",
    "class"         => "form-control",
    "maxlength"     => "3",
    "minlength"     => "1",
    "type"          => "number"
);


//dimenzije paketa
$f_paket_duzina = array(
    "name"          => "paket_duzina",
    "value"         => set_value('paket_duzina'),
    "placeholder"   => "10",
    "class"         => "form-control",
    "maxlength"     => "3",
    "minlength"     => "1",
    "type"          => "number"
);

//dimenzije paketa
$f_paket_tezina = array(
    "name"          => "paket_tezina",
    "value"         => set_value('paket_tezina') == '' ? 0 : set_value('paket_tezina'),
    "placeholder"   => "10",
    "class"         => "form-control",
    "maxlength"     => "3",
    "minlength"     => "1",
    "type"          => "number",
    "onchange"      => "do_calculation()",
    "onkeyup"       =>  "do_calculation()"
);

?>
<!-- Form horizontal -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Osnovni podaci</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <!--<p class="content-group-lg">Examples of standard form controls supported in an example form layout. Individual form controls automatically receive some global styling. All textual <code>&lt;input></code>, <code>&lt;textarea></code>, and <code>&lt;select></code> elements with <code>.form-control</code> are set to <code>width: 100%;</code> by default. Wrap labels and controls in <code>.form-group</code> for optimum spacing. Labels in horizontal form require <code>.control-label</code> class.</p>-->

            <?= form_open(base_url('shipments/create'), array('class'=> 'form-horizontal'));?>
                <fieldset class="content-group">

                    <div class="form-group pt-15">
                        <label class="text-semibold col-lg-2">Želim predati pošiljku *</label>
                        <div class="col-lg-8">
                            <div class="radio">
                                <label>
                                    <?php echo form_radio($f_predavanje_posiljke, 'Kuriru na svojim vratima', set_radio("predavanje_posiljke", "Kuriru na svojim vratima")); ?>
                                    Kuriru na svojim vratima
                                </label>
                            </div>

                            <div class="radio">
                                <label>
                                    <?php echo form_radio($f_predavanje_posiljke, 'U VINTAX express poslovnici', set_radio("predavanje_posiljke", "U VINTAX express poslovnici")); ?>
                                    U VINTAX express poslovnici
                                </label>
                            </div>

                            <?php echo form_error('predavanje_posiljke'); ?>
                        </div>
                    </div>

                    <div class="form-group pt-15 vintax_poslovnice" style="display: none">
                        <label class="text-semibold col-lg-2">Vintax poslovnice*</label>
                        <div class="col-lg-8">

                            <div class="radio">
                                <label>
                                    <?php
                                    echo form_radio($f_vintax_poslovnice, 'Zagreb (Savska cesta 84 - poslovni centar na 1. katu zgrade Peveca)', set_radio("predavanje_u_poslovnicu", "Savska cesta 84 - poslovni centar na 1. katu zgrade Peveca"));
                                    ?>
                                    Zagreb (Savska cesta 84 - poslovni centar na 1. katu zgrade Peveca)
                                </label>
                            </div>

                            <div class="radio">
                                <label>
                                    <?php echo form_radio($f_vintax_poslovnice, 'Slavonski Brod (Ulica Nikole Zrinskog 46A)', set_radio("predavanje_u_poslovnicu", "Slavonski Brod (Ulica Nikole Zrinskog 46A")); ?>
                                    Slavonski Brod (Ulica Nikole Zrinskog 46A)
                                </label>
                            </div>

                            <?php echo form_error('predavanje_u_poslovnicu'); ?>
                        </div>
                    </div>

                    <div class="form-group pt-15">
                        <label class="text-semibold col-lg-2">Želim dostavu *</label>
                        <div class="col-lg-8">
                            <div class="radio">
                                <label>
                                    <?php echo form_radio($f_dostava_posiljke, 'Na vrata primatelja',  set_radio("dostava_posiljke", "Na vrata primatelja")); ?>
                                    Na vrata primatelja
                                </label>
                            </div>

                            <div class="radio">
                                <label>
                                    <?php echo form_radio($f_dostava_posiljke, 'U VINTAX express poslovnicu',  set_radio("dostava_posiljke", "U VINTAX express poslovnicu")); ?>
                                    U VINTAX express poslovnicu
                                </label>
                            </div>

                            <?php echo form_error('dostava_posiljke'); ?>

                        </div>
                    </div>

                    <div class="form-group pt-15 vintax_poslovnice_dostava" style="display: none">
                        <label class="text-semibold col-lg-2">Vintax poslovnice*</label>
                        <div class="col-lg-8">

                            <div class="radio">
                                <label>
                                    <?php echo form_radio($f_vintax_poslovnice_dostava, 'Zagreb (Savska cesta 84 - poslovni centar na 1. katu zgrade Peveca)', false); ?>
                                    Zagreb (Savska cesta 84 - poslovni centar na 1. katu zgrade Peveca)
                                </label>
                            </div>

                            <div class="radio">
                                <label>
                                    <?php echo form_radio($f_vintax_poslovnice_dostava, 'Slavonski Brod (Ulica Nikole Zrinskog 46A)', false); ?>
                                    Slavonski Brod (Ulica Nikole Zrinskog 46A)
                                </label>
                            </div>

                            <?php echo form_error('dostava_u_poslovnicu'); ?>

                        </div>
                    </div>

                    <div class="form-group pt-15">
                        <label class="text-semibold col-lg-2">Ambalaža *</label>
                        <div class="col-lg-8">
                            <div class="radio">
                                <label>
                                    <?php echo form_radio($f_ambalaza, 'Imam svoju ambalažu za dostavu', set_radio("ambalaza", "Imam svoju ambalažu za dostavu")); ?>
                                    Imam svoju ambalažu za dostavu
                                </label>
                            </div>

                            <div class="radio">
                                <label>
                                    <?php echo form_radio($f_ambalaza, 'Želim VINTAX ambalažu za dostavu', set_radio("ambalaza", "Imam svoju ambalažu za dostavu")); ?>
                                    Želim VINTAX ambalažu za dostavu
                                </label>
                            </div>
                        </div>

                        <?php echo form_error('ambalaza'); ?>

                    </div>

                    <div class="form-group vintax_ambalaza" style="display: none;">
                        <label class="control-label col-lg-2">VINTAX ambalaža za dostavu*</label>
                        <div class="col-lg-10">

                            <div class="checkbox">
                                <label>
                                    <div>
										<span class="checked">
                                            <?php echo form_checkbox($cb_amalaza, 'Koverta s mjehurićima M (srednja)', false); ?>
										</span>
                                    </div>
                                    Koverta s mjehurićima M (srednja
                                </label>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <div>
										<span class="checked">
                                            <?php echo form_checkbox($cb_amalaza, 'Koverta s mjehurićima S (mala)', false); ?>
										</span>
                                    </div>
                                    Koverta s mjehurićima S (mala)
                                </label>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <div>
										<span class="checked">
                                            <?php echo form_checkbox($cb_amalaza, 'XL-velika kartonska kutija (velika)', false); ?>
										</span>
                                    </div>
                                    XL-velika kartonska kutija (velika)
                                </label>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <div>
										<span class="checked">
                                            <?php echo form_checkbox($cb_amalaza, 'M-kartonska kutija (srednja)', false); ?>
										</span>
                                    </div>
                                    M-kartonska kutija (srednja)
                                </label>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <div>
										<span class="checked">
                                            <?php echo form_checkbox($cb_amalaza, 'S-kartonska kutija (mala)', false); ?>
										</span>
                                    </div>
                                    S-kartonska kutija (mala)
                                </label>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <div>
										<span class="checked">
                                            <?php echo form_checkbox($cb_amalaza, 'Tuljak kartonska kutija', false); ?>
										</span>
                                    </div>
                                    Tuljak kartonska kutija
                                </label>
                            </div>

                            <?php echo form_error('vintax_ambalaza'); ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Opis sadržaja paketa *</label>
                        <div class="col-lg-10">
                            <?php echo form_textarea($ta_opis_sadrzaja); ?>
                            <?php echo form_error('opis_sadrzaja'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Posebne napomene dostavljaču: *</label>
                        <div class="col-lg-10">
                            <?php echo form_textarea($ta_napomena); ?>
                            <?php echo form_error('posebne_napomene'); ?>
                        </div>
                    </div>

                </fieldset>

                          <fieldset class="content-group">
                <legend class="text-bold">Podaci o pošiljatelju</legend>

                <div class="form-group">
                    <label class="control-label col-lg-2">Ime i prezime</label>
                    <div class="col-lg-10">
                        <?php echo form_input($pos_ime); ?>
                        <?php echo form_error('posiljatelj_ime'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Adresa</label>
                    <div class="col-lg-10">
                        <?php echo form_input($pos_adresa); ?>
                        <?php echo form_error('posiljatelj_adresa'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Grad</label>
                    <div class="col-lg-10">
                        <?php echo form_input($pos_grad); ?>
                        <?php echo form_error('posiljatelj_grad'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Drzava</label>
                    <div class="col-lg-10">
                        <?php echo form_input($pos_drzavu); ?>
                        <?php echo form_error('posiljatelj_drzava'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Postanski broj</label>
                    <div class="col-lg-10">
                        <?php echo form_input($pos_postanski_broj); ?>
                        <?php echo form_error('posiljatelj_broj'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Kontakt telefon / mobitel</label>
                    <div class="col-lg-10">
                        <?php echo form_input($pos_telefon); ?>
                        <?php echo form_error('posiljatelj_telefon'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Email</label>
                    <div class="col-lg-10">
                        <?php echo form_input($pos_email); ?>
                        <?php echo form_error('posiljatelj_email'); ?>
                    </div>
                </div>

            </fieldset>


            <fieldset class="content-group">
                <legend class="text-bold">Podaci o Primatelju</legend>

                <div class="form-group">
                    <label class="control-label col-lg-2">Ime i prezime</label>
                    <div class="col-lg-10">
                        <?php echo form_input($prim_ime); ?>
                        <?php echo form_error('primatelj_ime'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Adresa</label>
                    <div class="col-lg-10">
                        <?php echo form_input($prim_adresa); ?>
                        <?php echo form_error('primatelj_adresa'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Grad/Mjesto</label>
                    <div class="col-lg-10">
                        <?php echo form_input($prim_grad); ?>
                        <?php echo form_error('primatelj_grad'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Postanski broj</label>
                    <div class="col-lg-10">
                        <?php echo form_input($prim_postanski_broj); ?>
                        <?php echo form_error('primatelj_zip'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Drzava</label>
                    <div class="col-lg-10">
                        <?php echo form_input($prim_drzavu); ?>
                        <?php echo form_error('primatelj_drzava'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Kontakt telefon / mobitel</label>
                    <div class="col-lg-10">
                        <?php echo form_input($prim_telefon); ?>
                        <?php echo form_error('primatelj_telefon'); ?>
                    </div>
                </div>

            </fieldset>

                <!-- Dodatna usluga-->
                <fieldset class="content-group">
                    <legend class="text-bold dodatna_usluga">Dodatna usluga</legend>

                    <div class="form-group pt-15">
                        <label class="text-semibold col-lg-2">Dodatna usluga</label>
                        <div class="col-lg-8">
                            <div class="radio">
                                <label>
                                    <?php echo form_radio($rf_dodatna_usluga, 'Paket sa otkupninom (pouzećem)', set_radio('dodatna_usluga', 'Paket sa otkupninom (pouzećem)')); ?>
                                    Paket sa otkupninom (pouzećem)
                                </label>
                            </div>

                            <div class="radio">
                                <label>
                                    <?php echo form_radio($rf_dodatna_usluga, 'Paket bez otkupnine', set_radio('dodatna_usluga', 'Paket bez otkupnine'));?>
                                    Paket bez otkupnine
                                </label>
                            </div>

                            <?php echo form_error('dodatna_usluga'); ?>
                        </div>
                    </div>

                    <div class="form-group cijena_odkupnine" style="display:none;">
                        <label class="text-semibold control-label col-lg-2">Cijena odkupnine</label>
                        <div class="col-lg-10">
                            <?php echo form_input($f_cijena_odkupnine); ?>
                            <?php echo form_error('cijena_odkupnine'); ?>
                        </div>
                    </div>

                    <div class="form-group garancija_isporuke">
                        <label class="text-semibold control-label col-lg-2">Garancija isporuke paketa</label>
                        <div class="col-lg-10">
                            <div class="checkbox">
                                <label>
                                    <div>
                                        <span class="checked">
                                            <?php echo form_checkbox($cb_garancija); ?>
                                        </span>
                                    </div>
                                    Garancija isporuke paketa (+4,50 KN)
                                </label>
                            </div>
                            <p>Prednost dodatne usluge je da ako prijevoz plaća primatelj, a primatelj odbije preuzimanje paketa, pošiljatelju će se napatiti dostava paketa samo u jednom smjeru, a ne u dva smjera (dostava natrag).
                                Ako primatelj ne bude kod kuće prilikom dostave paketa, obavit ćemo tri puta ponovnu dostavu potpuno besplatno.</p>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="content-group">
                    <legend class="text-bold">Dimenzije paketa</legend>

                    <div class="row col-md-offset-2" style="margin-bottom: 40px;">

                        <div class="col-md-3">
                            <?php echo form_input($f_paket_sirina); ?>
                            <div class="label-block text-center">
                                <span class="label label-primary">Širina (u cm)</span>
                                <?php echo form_error('paket_sirina'); ?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <?php echo form_input($f_paket_duzina); ?>
                            <div class="label-block text-center">
                                <span class="label label-primary">Dužina (u cm)</span>
                                <?php echo form_error('paket_duzina'); ?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <?php echo form_input($f_paket_visina); ?>
                            <div class="label-block text-center">
                                <span class="label label-primary">Visina (u cm)</span>
                                <?php echo form_error('paket_visina'); ?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <?php echo form_input($f_paket_tezina); ?>
                            <div class="label-block text-center">
                                <span class="label label-primary">Tezina paketa (u kg)</span>
                                <?php echo form_error('paket_tezina'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group pt-15">
                        <label class="text-semibold col-lg-2">PRIJEVOZ PLAĆA *</label>
                        <div class="col-lg-8">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="stacked-radio-left" class="styled">
                                    Primatelj
                                </label>
                            </div>

                            <div class="radio">
                                <label>
                                    <input type="radio" name="stacked-radio-left" class="styled" checked="checked">
                                    Posiljatelj
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group pt-15">
                        <label class="text-semibold col-lg-2">Pošiljatelj *</label>
                        <div class="col-lg-8">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="stacked-radio-left" class="styled">
                                    Plaćanje karticom - Visa, MasterCad...
                                </label>
                            </div>

                            <div class="radio">
                                <label>
                                    <input type="radio" name="stacked-radio-left" class="styled" checked="checked">
                                    Plaćanje PayPal
                                </label>
                            </div>
                        </div>
                    </div>

                </fieldset>

            <fieldset class="content-group">
                <legend class="text-bold">Ukupno</legend>
                <h1 class="total_price">0</h1>
            </fieldset>

                <div class="text-right">
                    <?php echo form_submit($f_submit); ?>
                </div>
            <?= form_close(); ?>
        </div>
    </div>
    <!-- /form horizontal -->

    <script type="text/javascript">

        var price = 0;


        //prikazi polja skrivena polja u radio buttons!
        if($("input[name=predavanje_posiljke]:checked").val() == "U VINTAX express poslovnici"){
            $(".vintax_poslovnice").show();
        }

        if($("input[name=dostava_posiljke]:checked").val() == "U VINTAX express poslovnicu"){
            $(".vintax_poslovnice_dostava").show();
        }




        //Zelim predati posiljku
        $('input[name=predavanje_posiljke').change(function () {
            if(this.value == 'U VINTAX express poslovnici'){
                //show next radio button!
                $('.vintax_poslovnice').show();
                set_input_field_required('.vintax_poslovnice');

            }else{
                $('.vintax_poslovnice').hide();
                set_input_field_required('.vintax_poslovnice', false);
            }

        });

        //Zelim dostaviti posiljku
        $('input[name=dostava_posiljke').change(function () {
            if(this.value == 'U VINTAX express poslovnicu'){
                //show next radio button!
                $('.vintax_poslovnice_dostava').show();
                set_input_field_required('.vintax_poslovnice_dostava');

            }else{
                $('.vintax_poslovnice_dostava').hide();
                set_input_field_required('.vintax_poslovnice_dostava', false);
            }

        });

        //Zelim dostaviti posiljku
        $('input[name=ambalaza').change(function () {
            if(this.value == 'Želim VINTAX ambalažu za dostavu'){
                //show next radio button!
                $('.vintax_ambalaza').show();
                set_input_field_required('.vintax_ambalaza');

            }else{
                $('.vintax_ambalaza').hide();
                set_input_field_required('.vintax_ambalaza', false);
            }

        });

        //Zelim dostaviti posiljku
        $('input[name=dodatna_usluga').change(function () {
            if(this.value == 'Paket sa otkupninom (pouzećem)'){
                //show next radio button!
                $('.cijena_odkupnine').show();
                set_input_field_required('.cijena_odkupnine');

            }else{
                $('.cijena_odkupnine').hide();
                set_input_field_required('.cijena_odkupnine', false);
            }

        });

        function set_input_field_required(element, show = true)
        {
            var input_fields = $(element + ' input');
            if(input_fields.length > 0){
                $(input_fields[0]).prop('required', show);
            }
        }

        //get rates!
        function do_calculation(){
            //reset price
            price = 0;

            if( $('input[name=garancija_isporuke]').is(':checked') == true){
                //update price
                price += parseFloat(4.5);
            }

            if($('input[name=dodatna_usluga').val() == "Paket sa otkupninom (pouzećem)"){
                var cijena_odkupnine = $('input[name=cijena_odkupnine]').val();

                cijena_odkupnine = parseFloat(cijena_odkupnine);
                price += 5; // naplata opcije za odkupninu
                price += cijena_odkupnine;
            }

            //Dodaj u cijenu tezinu paketa
            //nadji tezinu
            var tezinaPaketa = $('input[name=paket_tezina').val();

            if(tezinaPaketa > 0){

                if(tezinaPaketa >= 50){
                    price += 90;
                }
                else if(tezinaPaketa >= 40){
                    price += 75;
                }
                else if(tezinaPaketa >= 30){
                    price += 70;
                }
                else if(tezinaPaketa >= 25){
                    price += 65;
                }
                else if(tezinaPaketa >= 20){
                    price += 58;
                }
                else if(tezinaPaketa >= 10){
                    price += 50;
                }else{
                    price += 40;
                }
            };

            //update total calculation
            $('.total_price').text(price.toString());
        }

    </script>

    <!-- Footer -->
    <div class="footer text-muted">
        &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
    </div>
    <!-- /footer -->