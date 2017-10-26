<?php

$f_name = array(
    "name" => "name",
    "value" => set_value('name'),
    "required" => "false",
    "class" => "styled form-control",
    "maxlength" => "200"
);

$f_text = array(
    "name" => "text",
    "value" => set_value('text'),
    "required" => "true",
    "class" => "form-control",
    "rows" => "5",
    "cols" => "5",
    "maxlength" => "400"
);

$f_lokacija = array(
    "name" => "location",
    "value" => set_value('location'),
    "required" => "true",
    "class" => "styled form-control",
    "minlength" => "5",
    "maxlength" => "200"
);

$f_status = array(
    "name" => "status",
    "class" => "styled form-control"
);

//submit
$f_submit = array(
    "name"  => "submit",
    "value" => "Snimi",
    "class" => "btn btn-primary"
);
?>
<!-- Form horizontal -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Podaci o paketu</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">

            <?= form_open(base_url('shipments/notes/create/'. $shipment_id), array('class'=> 'form-horizontal'));?>


            <fieldset class="content-group">

                <div class="form-group">
                    <label class="control-label col-lg-2">Naziv</label>
                    <div class="col-lg-10">
                        <?php echo form_input($f_name); ?>
                        <?php echo form_error('name'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Lokacija</label>
                    <div class="col-lg-10">
                        <?php echo form_input($f_lokacija); ?>
                        <?php echo form_error('location'); ?>
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-lg-2">Tekst: *</label>
                        <div class="col-lg-10">
                            <?php echo form_textarea($f_text); ?>
                            <?php echo form_error('text'); ?>
                        </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Status</label>
                    <div class="col-lg-10">
                        <?php echo form_input($f_status); ?>
                        <?php echo form_error('status'); ?>
                    </div>
                </div>

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