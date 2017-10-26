<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('add_shipment_rules'))
{
    function add_shipment_rules()
    {
        $rules = array(
            //sadrzaj
            "predavanje_posiljke" =>
                array(
                    "field" => "predavanje_posiljke",
                    "rules" => "required"
                ),

            "predavanje_u_poslovnicu" =>
                array(
                    "field" => "predavanje_u_poslovnicu",
                    "rules" => "callback_predavanje_posiljke"
                ),

            "dostava_posiljke" =>
                array(
                    "field" => "dostava_posiljke",
                    "rules" => "required"
                ),

            "dostava_u_poslovnicu" =>
                array(
                    "field" => "dostava_u_poslovnicu",
                    "rules" => "callback_dostava_posiljke"
                ),

            "ambalaza" =>
                array(
                    "field" => "ambalaza",
                    "rules" => "required"
                ),

            "opis_sadrzaja" =>
                array(
                    "field" => "opis_sadrzaja",
                    "rules" => "required|max_length[400]"
                ),

            "posebne_napomene" =>
                array(
                    "field" => "posebne_napomene",
                    "rules" => "required|max_length[400]"
                ),

            //Posiljaoc
            "posiljatelj_ime" =>
                array(
                    "field" => "posiljatelj_ime",
                    "label" => "ime pošiljatelja",
                    "rules" => "required|min_length[3]|max_length[40]"
                ),
            "posiljatelj_adresa" =>
                array(
                    "field" => "posiljatelj_adresa",
                    "label" => "adresa pošiljatelja",
                    "rules" => "required|min_length[3]|max_length[100]"
                ),
            "posiljatelj_grad" =>
                array(
                    "field" => "posiljatelj_grad",
                    "label" => "grad/mjesto pošiljatelja",
                    "rules" => "required|min_length[3]|max_length[100]"
                ),
            "posiljatelj_zip" =>
                array(
                    "field" => "posiljatelj_zip",
                    "label" => "drzava pošiljatelja",
                    "rules" => "required|min_length[3]|max_length[20]"
                ),
            "posiljatelj_drzavu" =>
                array(
                    "field" => "posiljatelj_drzavu",
                    "label" => "poštanski broj pošiljatelja",
                    "rules" => "required|min_length[3]|max_length[40]"
                ),
            "posiljatelj_telefon" =>
                array(
                    "field" => "posiljatelj_telefon",
                    "label" => "broj pošiljatelja",
                    "rules" => "required|min_length[6]|max_length[25]"
                ),
            "posiljatelj_email" =>
                array(
                    "field" => "posiljatelj_email",
                    "label" => "email pošiljatelja",
                    "rules" => "required|min_length[6]|max_length[100]|valid_email"
                ),


            //Primatelj
            "primatelj_ime" =>
                array(
                    "field" => "primatelj_ime",
                    "label" => "ime primatelja",
                    "rules" => "required|min_length[3]|max_length[40]"
                ),
            "primatelj_adresa" =>
                array(
                    "field" => "primatelj_adresa",
                    "label" => "adresa primatelja",
                    "rules" => "required|min_length[3]|max_length[100]"
                ),
            "primatelj_grad" =>
                array(
                    "field" => "primatelj_grad",
                    "label" => "grad/mjesto primatelja",
                    "rules" => "required|min_length[3]|max_length[100]"
                ),
            "primatelj_zip" =>
                array(
                    "field" => "primatelj_drzavu",
                    "label" => "drzava primatelja",
                    "rules" => "required|min_length[3]|max_length[20]"
                ),
            "primatelj_drzavu" =>
                array(
                    "field" => "primatelj_zip",
                    "label" => "poštanski broj primatelja",
                    "rules" => "required|min_length[3]|max_length[10]"
                ),
            "primatelj_telefon" =>
                array(
                    "field" => "primatelj_telefon",
                    "label" => "broj primatelja",
                    "rules" => "required|min_length[6]|max_length[25]"
                ),


            //dodatna usluga
            "dodatna_usluga" =>
                array(
                    "field" => "dodatna_usluga",
                    "label" => "broj primatelja",
                    "rules" => "required"
                ),

            "cijena_odkupnine" =>
                array(
                    "field" => "cijena_odkupnine",
                    "label" => "cijena odkupnine",
//                    "rules" => "integer|callback_cijena_odkupnine"
                ),

            "paket_visina" =>
                array(
                    "field" => "paket_visina",
                    "label" => "unesite visinu paketa u CM",
                    "rules" => "required|integer"
                ),

            "paket_sirina" =>
                array(
                    "field" => "paket_sirina",
                    "label" => "unesite širinu paketa u CM",
                    "rules" => "required|integer"
                ),

            "paket_duzina" =>
                array(
                    "field" => "paket_duzina",
                    "label" => "unesite dužinu paketa u CM",
                    "rules" => "required|integer"
                ),

            "paket_tezina" =>
                array(
                    "field" => "paket_tezina",
                    "label" => "unesite težinu paketa u kilogramima",
                    "rules" => "required|integer"
                )
        );

        return $rules;
    }

}

if ( ! function_exists('edit_shipment_rules'))
{
    function edit_shipment_rules()
    {
        $rules = array(
            //sadrzaj
            "predavanje_posiljke" =>
                array(
                    "field" => "predavanje_posiljke",
                    "rules" => "required"
                ),

            "predavanje_u_poslovnicu" =>
                array(
                    "field" => "predavanje_u_poslovnicu",
                    "rules" => "callback_predavanje_posiljke"
                ),

            "dostava_posiljke" =>
                array(
                    "field" => "dostava_posiljke",
                    "rules" => "required"
                ),

            "dostava_u_poslovnicu" =>
                array(
                    "field" => "dostava_u_poslovnicu",
                    "rules" => "callback_dostava_posiljke"
                ),

            "ambalaza" =>
                array(
                    "field" => "ambalaza",
                    "rules" => "required"
                ),

            "opis_sadrzaja" =>
                array(
                    "field" => "opis_sadrzaja",
                    "rules" => "required|max_length[400]"
                ),

            "posebne_napomene" =>
                array(
                    "field" => "posebne_napomene",
                    "rules" => "required|max_length[400]"
                ),

            //Posiljaoc
            "posiljatelj_ime" =>
                array(
                    "field" => "posiljatelj_ime",
                    "label" => "ime pošiljatelja",
                    "rules" => "required|min_length[3]|max_length[40]"
                ),
            "posiljatelj_adresa" =>
                array(
                    "field" => "posiljatelj_adresa",
                    "label" => "adresa pošiljatelja",
                    "rules" => "required|min_length[3]|max_length[100]"
                ),
            "posiljatelj_grad" =>
                array(
                    "field" => "posiljatelj_grad",
                    "label" => "grad/mjesto pošiljatelja",
                    "rules" => "required|min_length[3]|max_length[100]"
                ),
            "posiljatelj_zip" =>
                array(
                    "field" => "posiljatelj_zip",
                    "label" => "drzava pošiljatelja",
                    "rules" => "required|min_length[3]|max_length[20]"
                ),
            "posiljatelj_drzavu" =>
                array(
                    "field" => "posiljatelj_drzavu",
                    "label" => "poštanski broj pošiljatelja",
                    "rules" => "required|min_length[3]|max_length[40]"
                ),
            "posiljatelj_telefon" =>
                array(
                    "field" => "posiljatelj_telefon",
                    "label" => "broj pošiljatelja",
                    "rules" => "required|min_length[6]|max_length[25]"
                ),
            "posiljatelj_email" =>
                array(
                    "field" => "posiljatelj_email",
                    "label" => "email pošiljatelja",
                    "rules" => "required|min_length[6]|max_length[100]|valid_email"
                ),


            //Primatelj
            "primatelj_ime" =>
                array(
                    "field" => "primatelj_ime",
                    "label" => "ime primatelja",
                    "rules" => "required|min_length[3]|max_length[40]"
                ),
            "primatelj_adresa" =>
                array(
                    "field" => "primatelj_adresa",
                    "label" => "adresa primatelja",
                    "rules" => "required|min_length[3]|max_length[100]"
                ),
            "primatelj_grad" =>
                array(
                    "field" => "primatelj_grad",
                    "label" => "grad/mjesto primatelja",
                    "rules" => "required|min_length[3]|max_length[100]"
                ),
            "primatelj_zip" =>
                array(
                    "field" => "primatelj_drzavu",
                    "label" => "drzava primatelja",
                    "rules" => "required|min_length[3]|max_length[20]"
                ),
            "primatelj_drzavu" =>
                array(
                    "field" => "primatelj_zip",
                    "label" => "poštanski broj primatelja",
                    "rules" => "required|min_length[3]|max_length[10]"
                ),
            "primatelj_telefon" =>
                array(
                    "field" => "primatelj_telefon",
                    "label" => "broj primatelja",
                    "rules" => "required|min_length[6]|max_length[25]"
                ),


            //dodatna usluga
            "dodatna_usluga" =>
                array(
                    "field" => "dodatna_usluga",
                    "label" => "broj primatelja",
                    "rules" => "required"
                ),

            "cijena_odkupnine" =>
                array(
                    "field" => "cijena_odkupnine",
                    "label" => "cijena odkupnine",
//                    "rules" => "integer|callback_cijena_odkupnine"
                ),

            "paket_visina" =>
                array(
                    "field" => "paket_visina",
                    "label" => "unesite visinu paketa u CM",
                    "rules" => "required|integer"
                ),

            "paket_sirina" =>
                array(
                    "field" => "paket_sirina",
                    "label" => "unesite širinu paketa u CM",
                    "rules" => "required|integer"
                ),

            "paket_duzina" =>
                array(
                    "field" => "paket_duzina",
                    "label" => "unesite dužinu paketa u CM",
                    "rules" => "required|integer"
                ),

            "paket_tezina" =>
                array(
                    "field" => "paket_tezina",
                    "label" => "unesite težinu paketa u kilogramima",
                    "rules" => "required|integer"
                )
        );

        return $rules;
    }

}

/**
 * NOTES
 */

if ( ! function_exists('add_shipment_note_rules'))
{
    function add_shipment_note_rules()
    {
        $rules = array(
            //sadrzaj
            "name" =>
                array(
                    "field" => "name",
                    "rules" => "max_length[200]"
                ),

            "location" =>
                array(
                    "field" => "location",
                    "rules" => "required|min_length[5]|max_length[200]"
                ),

            "text" =>
                array(
                    "field" => "text",
                    "rules" => "required|min_length[5]|max_length[400]"
                ),

            "status" =>
                array(
                    "field" => "status",
                    "rules" => ""
                )
        );

        return $rules;
    }

}
