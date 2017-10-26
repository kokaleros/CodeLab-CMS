<?php

    $payment_options = array(
            'Pouzećem',
            'Online - plaćeno',
            'Po dostavi',
            'Plaćeno',
            'Nije plaćeno'
    );

    //generate price

    $cijena = 0;

    $tezina = $shipment->paket_tezina;
    $garancija_isporuke = $shipment->garancija_isporuke;
    $dodatna_usluga = $shipment->dodatna_usluga;
    $cijena_odkupnine = $shipment->cijena_odkupnine;


    if($dodatna_usluga == 'Paket sa otkupninom (pouzećem)'){
        $cijena += 5;
        $cijena += $cijena_odkupnine;
    }

    if($garancija_isporuke == 'garancija_isporuke'){
        $cijena += 4.5;
    }

    if($tezina > 0){

        if($tezina >= 50){
            $cijena += 90;
        }
        else if($tezina >= 40){
            $cijena += 75;
        }
        else if($tezina >= 30){
            $cijena += 70;
        }
        else if($tezina >= 25){
            $cijena += 65;
        }
        else if($tezina >= 20){
            $cijena += 58;
        }
        else if($tezina >= 10){
            $cijena += 50;
        }else{
            $cijena += 40;
        }
    };


?>

<div class="panel-body no-padding-bottom">

    <!--O posiljci-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel invoice-grid">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="text-semibold no-margin-top">Informacije o pošiljci</h6>
                            <ul class="list list-unstyled">
                                <li>Posiljka #: &nbsp;<?php echo format_id($shipment->shipment_id) ?></li>
                                <li>Zahtjev kreiran: <span class="text-semibold"><?php echo date("j/m/Y", $shipment->vrijeme); ?></span></li>
                                <li>Kod za praćenje #: &nbsp;
                                    <a href="<?php echo base_url('tracking/'. $shipment->tracking_number)?>" target="_blank">
                                        <?php echo $shipment->tracking_number ?>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-sm-6">
                            <h6 class="text-semibold text-right no-margin-top"><?php echo $cijena; ?> HRK</h6>

                            <ul class="list list-unstyled text-right">
                                <li>Naplata posiljke: <span class="text-semibold">Placa posiljaoc</span></li>
                            </ul>

                            <ul class="list list-unstyled text-right">
                                <li>Nacin placanja: <span class="text-semibold">Paypal</span></li>
                                <li class="dropdown">
                                    Status: &nbsp;
                                    <a href="#" class="label bg-success-400 dropdown-toggle" data-toggle="dropdown">Paid <span class="caret"></span></a>
                                    <ul class="dropdown-menu dropdown-menu-right active">
                                        <li><a href="#"><i class="icon-alert"></i> Overdue</a></li>
                                        <li><a href="#"><i class="icon-alarm"></i> Pending</a></li>
                                        <li class="active"><a href="#"><i class="icon-checkmark3"></i> Paid</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#"><i class="icon-spinner2 spinner"></i> On hold</a></li>
                                        <li><a href="#"><i class="icon-cross2"></i> Canceled</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="panel-footer panel-footer-condensed">
                    <a class="heading-elements-toggle"><i class="icon-more"></i></a>

                    <div class="heading-elements">

                        <span class="heading-text">
                            <?php
                                if(get_last_note($shipment_notes) != false):
                            ?>
                            <span class="status-mark border-success position-left"></span>
                            Poslednje informacije:<span class="text-semibold">
                                    <?php echo get_last_note($shipment_notes); ?>
                                </span>
                            <?php endif; ?>
                        </span>

                        <ul class="list-inline list-inline-condensed heading-text pull-right">
                            <li><a href="#" class="text-default" data-toggle="modal" data-target="#invoice"><i class="icon-eye8"></i></a></li>
                            <li class="dropdown">
                                <a href="#" class="text-default dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i> <span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                <?php if($is_admin): ?>
                                    <li><a href="<?php echo base_url('shipments/notes/create/' . $shipment->shipment_id); ?>"><i class="icon-plus2"></i> Dodaj informacije</a></li>
                                <?php endif; ?>
                                    <li><a href="#notes"><i class="icon-file-download"></i> Sve informacije</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo base_url('shipments/edit/' . $shipment->shipment_id); ?>"><i class="icon-file-plus"></i> Uredi posiljku</a></li>
                                    <?php if($is_admin): ?>
                                    <li><a href="<?php echo base_url('shipments/delete/' . $shipment->shipment_id); ?>"><i class="icon-cross2"></i> Izbrisi posiljku</a></li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        </ul>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--O korisnicima-->
    <div class="row">
        <div class="col-md-6">
            <div class="panel invoice-grid">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="text-semibold no-margin-top">Pošiljatelj</h6>
                            <ul class="list list-unstyled">
                                <li><h4 class="text-semibold"><?php echo $shipment->posiljatelj_ime; ?></h4></li>
                                <li><span class="text-semibold"><?php echo $shipment->posiljatelj_adresa; ?>,</span></li>
                                <li style="padding-bottom: 20px;">
                                    <span class="text-semibold">
                                        <?php echo
                                            $shipment->posiljatelj_zip ." " .
                                            $shipment->posiljatelj_grad . ", " .
                                            $shipment->posiljatelj_drzavu; ?>
                                    </span>
                                </li>
                                <li>
                                    <i class="icon-phone" style="padding-right: 5px;"></i>
                                    <span class="text-semibold"><?php echo $shipment->posiljatelj_telefon; ?></span>
                                </li>
                                <li><i class="icon-envelop" style="padding-right: 5px;"></i>
                                    <span class="text-semibold">
                                        <a href="mailto:<?php echo $shipment->posiljatelj_email; ?>">
                                            <?php echo $shipment->posiljatelj_email; ?>
                                        </a>
                                    </span>
                                </li>
                            </ul>
                        </div>

                        <div class="col-sm-6">
                            <h6 class="text-semibold text-right no-margin-top no-margin-bottom">Predavanje posiljke</h6>
                            <p class="text-right no-margin-top"><?php echo $shipment->predavanje_posiljke; ?></p>
                            <?php if($shipment->predavanje_posiljke == 'U VINTAX express poslovnici'): ?>
                            <ul class="list list-unstyled text-right">
                                <li>Adresa: <span class="text-semibold"><?php echo $shipment->predavanje_u_poslovnicu; ?></span></li>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-6">
            <div class="panel invoice-grid">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="text-semibold no-margin-top">Primatelj</h6>
                            <ul class="list list-unstyled">
                                <li><h4 class="text-semibold"><?php echo $shipment->primatelj_ime; ?></h4></li>
                                <li><span class="text-semibold"><?php echo $shipment->primatelj_adresa; ?>,</span></li>
                                <li style="padding-bottom: 20px;">
                                    <span class="text-semibold">
                                        <?php echo
                                            $shipment->primatelj_zip ." " .
                                            $shipment->primatelj_grad . ", " .
                                            $shipment->primatelj_drzavu; ?>
                                    </span>
                                </li>
                                <li>
                                    <i class="icon-phone" style="padding-right: 5px;"></i>
                                    <span class="text-semibold"><?php echo $shipment->primatelj_telefon; ?></span>
                                </li>
                            </ul>
                        </div>

                        <div class="col-sm-6">
                            <h6 class="text-semibold text-right no-margin-top no-margin-bottom">Dostava posiljke</h6>
                            <p class="text-right no-margin-top"><?php echo $shipment->dostava_posiljke; ?></p>

                            <?php if($shipment->dostava_posiljke == 'U VINTAX express poslovnicu'): ?>
                                <ul class="list list-unstyled text-right">
                                    <li>Adresa: <span class="text-semibold"><?php echo $shipment->dostava_u_poslovnicu; ?></span></li>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel invoice-grid">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="text-semibold no-margin-top">Informacije o paketu</h6>
                            <ul class="list list-unstyled">
                                <li>Dimenzije:
                                    <h6 class="text-semibold no-margin-top">
                                        <?php
                                        echo $shipment->paket_sirina ."x" .
                                            $shipment->paket_duzina . "x" .
                                            $shipment->paket_visina
                                        ?>cm
                                    </h6></li>
                                <li>Tezina: <h6 class="text-semibold no-margin-top"><?php echo $shipment->paket_tezina; ?> kg</h6></li>
                            </ul>
                        </div>

                        <div class="col-sm-6">
                            <h6 class="text-semibold text-right no-margin-top no-margin-bottom">Napomena</h6>
                            <p class="text-right no-margin-top"><?php echo $shipment->posebne_napomene ?></p>
                            <br>
                            <h6 class="text-semibold text-right no-margin-top no-margin-bottom">Opis sadrzaja</h6>
                            <p class="text-right no-margin-top"><?php echo $shipment->opis_sadrzaja; ?></p>
                            <br>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--O paketu-->


<?php
if(isset($shipment_notes) && is_array($shipment_notes)): ?>

    <div id="notes" class="panel panel-body border-top-teal">
        <ul class="list-feed">

        <?php
        foreach ($shipment_notes as $note):
            ?>
            <li id="note-<?php echo $note->note_id; ?>" <?php print_note_status($note->status) ?>>
                <a href="#"><?php echo $note->name; ?></a> <?php echo $note->text; ?>
                <div class="text-muted"><?php echo $note->location; ?> | <?php echo date("M d, H:i",$note->time); ?></div>
            </li>
        <?php
        endforeach;
        ?>
        </ul>
    </div>

    <?php endif; ?>

</div>

<?php

function format_id($id= ''){

    if($id <10){
        $id = (string)"0000" . $id;
    }else if($id < 100){
        $id = (string)"000" . $id;
    }else if($id < 1000){
        $id = (string)"00" . $id;
    }else if($id < 10000){
        $id = (string)"0" . $id;
    }else{
        $id = $id;
    }

    return (string)$id;
}

function print_note_status($status){
    $status_css = "";
    if(!empty($status) && ($status == 'success' or $status == 'danger')){
        $status_css = 'class="border-' . $status . '-400"';
    }

    echo $status_css;
}

function get_last_note($notes){

    if(!empty($notes) && is_array($notes)){
        return date("Y/m/d | H:i", $notes[0]->time);
    }

    return false;
}

?>