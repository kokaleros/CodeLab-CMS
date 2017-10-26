<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('add_shipment_fields'))
{
    function add_shipment_fields()
    {
        $settings = array(

            "f_predavanje_posiljke " => array(
                "name" => "predavanje_posiljke",
                "required" => "true",
                "class" => "styled"
            ),

            "f_vintax_poslovnice " => array(
                "name" => "predavanje_u_poslovnicu",
                "class" => "styled"
            ),

            "f_dostava_posiljke " => array(
                "name" => "dostava_posiljke",
                "required" => "true",
                "class" => "styled"
            ),

            "f_vintax_poslovnice_dostava " => array(
                "name" => "dostava_u_poslovnicu",
                "class" => "styled"
            ),

            "f_ambalaza " => array(
                "name" => "ambalaza",
                "required" => "true",
                "class" => "styled"
            ),

            "cb_amalaza" => array(
                'name' => 'vintax_ambalaza',
                'checked' => false
            ),

            "ta_opis_sadrzaja " => array(
                "name" => "opis_sadrzaja",
                "value" => set_value('opis_sadrzaja'),
                "required" => "true",
                "class" => "form-control",
                "rows" => "5",
                "cols" => "5",
                "maxlength" => "400"
            ),

            "ta_napomena " => array(
                "name" => "posebne_napomene",
                "value" => set_value('posebne_napomene'),
                "required" => "true",
                "class" => "form-control",
                "rows" => "5",
                "cols" => "5",
                "maxlength" => "400"
            ),

            "pos_ime " => array(
                "name" => "posiljatelj_ime",
                "value" => set_value('posiljatelj_ime'),
                "placeholder" => "Unesite ime pošiljatelja",
                "class" => "form-control",
                "required" => "true",
                "maxlength" => "40",
                "minlength" => "3"
            ),

            "pos_adresa " => array(
                "name" => "posiljatelj_adresa",
                "value" => set_value('posiljatelj_adresa'),
                "placeholder" => "Unesite adresu pošiljatelja",
                "class" => "form-control",
                "required" => "true",
                "maxlength" => "100",
                "minlength" => "3"
            ),

            "pos_grad " => array(
                "name" => "posiljatelj_grad",
                "value" => set_value('posiljatelj_grad'),
                "placeholder" => "Unesite grad/mjesto pošiljatelja",
                "class" => "form-control",
                "required" => "true",
                "maxlength" => "100",
                "minlength" => "3"
            ),

            "pos_drzavu " => array(
                "name" => "posiljatelj_drzavu",
                "value" => set_value('posiljatelj_drzavu'),
                "placeholder" => "Unesite državu pošiljatelja",
                "class" => "form-control",
                "required" => "true",
                "maxlength" => "50",
                "minlength" => "1"
            ),

            "pos_postanski_broj " => array(
                "name" => "posiljatelj_zip",
                "value" => set_value('posiljatelj_zip'),
                "placeholder" => "Unesite poštanski broj pošiljatelja",
                "class" => "form-control",
                "required" => "true",
                "maxlength" => "10",
                "minlength" => "3"
            ),

            "pos_telefon " => array(
                "name" => "posiljatelj_telefon",
                "value" => set_value('posiljatelj_telefon'),
                "placeholder" => "Unesite poštanski broj pošiljatelja",
                "class" => "form-control",
                "required" => "true",
                "maxlength" => "25",
                "minlength" => "6"
            ),

            "pos_email " => array(
                "name" => "posiljatelj_email",
                "value" => set_value('posiljatelj_email'),
                "placeholder" => "Unesite email pošiljatelja",
                "type" => "email",
                "class" => "form-control",
                "required" => "true",
                "maxlength" => "100",
                "minlength" => "6"
            ),

            "prim_ime " => array(
                "name" => "primatelj_ime",
                "value" => set_value('primatelj_ime'),
                "placeholder" => "Unesite ime primatelja",
                "class" => "form-control",
                "required" => "true",
                "maxlength" => "40",
                "minlength" => "3"
            ),

            "prim_adresa " => array(
                "name" => "primatelj_adresa",
                "value" => set_value('primatelj_adresa'),
                "placeholder" => "Unesite adresu primatelja",
                "class" => "form-control",
                "required" => "true",
                "maxlength" => "100",
                "minlength" => "3"
            ),

            "prim_grad " => array(
                "name" => "primatelj_grad",
                "value" => set_value('primatelj_grad'),
                "placeholder" => "Unesite grad/mjesto primatelja",
                "class" => "form-control",
                "required" => "true",
                "maxlength" => "100",
                "minlength" => "3"
            ),

            "prim_drzavu " => array(
                "name" => "primatelj_drzavu",
                "value" => set_value('primatelj_drzavu'),
                "placeholder" => "Unesite državu primatelja",
                "class" => "form-control",
                "required" => "true",
                "maxlength" => "50",
                "minlength" => "1"
            ),

            "prim_postanski_broj " => array(
                "name" => "primatelj_zip",
                "value" => set_value('primatelj_zip'),
                "placeholder" => "Unesite poštanski broj primatelja",
                "class" => "form-control",
                "required" => "true",
                "maxlength" => "10",
                "minlength" => "3"
            ),

            "prim_telefon " => array(
                "name" => "primatelj_telefon",
                "value" => set_value('primatelj_telefon'),
                "placeholder" => "Unesite poštanski broj primatelja",
                "class" => "form-control",
                "required" => "true",
                "maxlength" => "25",
                "minlength" => "6"
            ),

            "f_submit " => array(
                "name" => "submit",
                "value" => "Pošalji",
                "class" => "btn btn-primary"
            ),

            "rf_dodatna_usluga " => array(
                "name" => "dodatna_usluga",
                "required" => "true",
                "class" => "styled"
            ),

            "f_cijena_odkupnine " => array(
                "name" => "cijena_odkupnine",
                "type" => "number",
                "value" => set_value('cijena_odkupnine') == '' ? 0 : set_value('cijena_dokupnine'),
                "placeholder" => "400",
                "class" => "form-control",
                "minlength" => "0",
                "maxlength" => "5",
                "onchange" => "do_calculation()",
                "onkeyup" => "do_calculation()"
            ),

            "cb_garancija " => array(
                'name' => "garancija_isporuke",
                'checked' => false,
                'value' => "garancija_isporuke",
                "onchange" => "do_calculation()"
            ),

            "f_paket_visina " => array(
                "name" => "paket_visina",
                "type" => "number",
                "value" => set_value('paket_visina'),
                "placeholder" => "10",
                "class" => "form-control",
                "minlength" => "1",
                "maxlength" => "3"
            ),

            "f_paket_sirina " => array(
                "name" => "paket_sirina",
                "type" => "number",
                "value" => set_value('paket_sirina'),
                "placeholder" => "10",
                "class" => "form-control",
                "minlength" => "1",
                "maxlength" => "3"
            ),

            "f_paket_duzina " => array(
                "name" => "paket_duzina",
                "value" => set_value('paket_duzina'),
                "placeholder" => "10",
                "class" => "form-control",
                "minlength" => "1",
                "maxlength" => "3",
                "type" => "number"
            ),

            "f_paket_tezina " => array(
                "name" => "paket_tezina",
                "value" => set_value('paket_tezina') == '' ? 0 : set_value('paket_tezina'),
                "placeholder" => "10",
                "class" => "form-control",
                "minlength" => "1",
                "maxlength" => "3",
                "type" => "number",
                "onchange" => "do_calculation()",
                "onkeyup" => "do_calculation()"
            )
        );

        return $settings;
    }

}

