<?php

    $payment_options = array(
            'Pouzećem',
            'Online - plaćeno',
            'Po dostavi',
            'Plaćeno',
            'Nije plaćeno'
    );

?>

<div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Lista posiljki</h5>
        </div>

        <div class="panel-body">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
            scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into
            electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
            Letraset sheets.
        </div>

        <table class="table datatable-basic">
            <thead>
            <tr>
                <th width="20px">#ID</th>
                <th>Od</th>
                <th>Do</th>
                <th>Datum</th>
                <th>Placanje</th>
                <th>Dimenzije paketa</th>
                <th>Tezina</th>
                <th width="50px">Status</th>
                <th class="text-center">Opcije</th>
            </tr>
            </thead>
            <tbody>

            <?php
            if(!empty($shipments) && is_array($shipments)):
            foreach ($shipments as $shipment):

                //genersi adresu dostavljanja
                $shipping_from_address = '';

                if($shipment->predavanje_posiljke == 'Kuriru na svojim vratima'){
                    $shipping_from_address = $shipment->posiljatelj_adresa . ', ' . $shipment->posiljatelj_grad;
                }else{
                    $shipping_from_address = $shipment->predavanje_u_poslovnicu;
                }


                //genersi adresu dostavljanja
                $shipping_to_address = '';

                if($shipment->dostava_posiljke == 'Na vrata primatelja'){
                    $shipping_to_address = $shipment->primatelj_adresa . ', ' . $shipment->primatelj_grad;
                }else{
                    $shipping_to_address = $shipment->dostava_u_poslovnicu;
                }
                ?>



                <tr>
                    <th><?php echo $shipment->shipment_id; ?></th>
                    <th><?php echo $shipping_from_address; ?></th>
                    <th><?php echo $shipping_to_address; ?></th>
                    <th title="<?php echo date('H:i', $shipment->vrijeme); ?>">
                        <?php echo date('j.n.Y', $shipment->vrijeme); ?>
                    </th>
                    <th>
                        <select data-id="1" class="form-control payment-info">
                            <?php foreach ($payment_options as $payment_option) : ?>
                                <option><?php echo $payment_option; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </th>
                    <th><?php echo $shipment->paket_duzina . 'x'. $shipment->paket_sirina . 'x' . $shipment->paket_visina; ?></th>
                    <th><?php echo $shipment->paket_tezina ?>kg</th>
                    <th><?php echo $shipment->status; ?></th>
                    <td class="text-center">
                        <ul class="icons-list">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="<?php echo base_url('shipments/view/' . $shipment->shipment_id) ?>">
                                            <i class="icon-user"></i> Pogledaj</a>
                                    </li>

                                    <li><a href="<?php echo base_url('shipments/edit/' . $shipment->shipment_id) ?>">
                                            <i class="icon-pencil7"></i> Uredi</a>
                                    </li>

                                    <li><a href="<?php echo base_url('shipments/delete/' . $shipment->shipment_id) ?>">
                                            <i class="icon-cross2"></i> Izbrisi</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </td>
                </tr>

            <?php
            endforeach;
            endif;
            ?>

<!---->
<!--            <tr>-->
<!--                <th>1</th>-->
<!--                <th>Vojvode Momcila 14, Banja Luka</th>-->
<!--                <th>Prve bokeske brigade 44, Herceg Novi</th>-->
<!--                <th>23.10.2017</th>-->
<!--                <th>-->
<!--                    <select data-id="1" class="form-control payment-info">-->
<!--                        --><?php //foreach ($payment_options as $payment_option) : ?>
<!--                            <option>--><?php //echo $payment_option; ?><!--</option>-->
<!--                        --><?php //endforeach; ?>
<!--                    </select>-->
<!--                </th>-->
<!--                <th>120x100x40</th>-->
<!--                <th>45kg</th>-->
<!--                <th>U transportu</th>-->
<!--                <td class="text-center">-->
<!--                    <ul class="icons-list">-->
<!--                        <li class="dropdown">-->
<!--                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
<!--                                <i class="icon-menu9"></i>-->
<!--                            </a>-->
<!---->
<!--                            <ul class="dropdown-menu dropdown-menu-right">-->
<!--                                <li><a href="#">-->
<!--                                        <i class="icon-user"></i> Pogledaj</a>-->
<!--                                </li>-->
<!---->
<!--                                <li><a href="#">-->
<!--                                        <i class="icon-pencil7"></i> Uredi</a>-->
<!--                                </li>-->
<!---->
<!--                                <li><a href="#">-->
<!--                                        <i class="icon-cross2"></i> Izbrisi</a>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </td>-->
<!--            </tr>-->
<!---->
<!--            <tr>-->
<!--                <th>2</th>-->
<!--                <th>Majke Jevrosime, Banja Luka</th>-->
<!--                <th>Cara Dusana 99, Beograd</th>-->
<!--                <th>20.10.2017</th>-->
<!--                <th>-->
<!---->
<!--                    <select data-id="2" class="form-control payment-info">-->
<!--                        --><?php //foreach ($payment_options as $payment_option) : ?>
<!--                            <option>--><?php //echo $payment_option; ?><!--</option>-->
<!--                        --><?php //endforeach; ?>
<!--                    </select>-->
<!---->
<!--                </th>-->
<!--                <th>70x50x20</th>-->
<!--                <th>2kg</th>-->
<!--                <th>Dostavljeno</th>-->
<!--                <td class="text-center">-->
<!--                    <ul class="icons-list">-->
<!--                        <li class="dropdown">-->
<!--                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
<!--                                <i class="icon-menu9"></i>-->
<!--                            </a>-->
<!---->
<!--                            <ul class="dropdown-menu dropdown-menu-right">-->
<!--                                <li><a href="#">-->
<!--                                        <i class="icon-user"></i> Pogledaj</a>-->
<!--                                </li>-->
<!---->
<!--                                <li><a href="#">-->
<!--                                        <i class="icon-pencil7"></i> Uredi</a>-->
<!--                                </li>-->
<!---->
<!--                                <li><a href="#">-->
<!--                                        <i class="icon-cross2"></i> Izbrisi</a>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </td>-->
<!--            </tr>-->

            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->


<script>

    $('.payment-info').change(function () {

        var attrs = $(this).data('id');
        var value = $(this).val();

        alert(attrs + " " + value);


        });


</script>