<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('user_register_rules'))
{
    function user_register_rules()
    {
        $rules = array(
            "name" =>
                array(
                    "field" => "name",
                    "label" => "ime",
                    "rules" => "required|min_length[3]|max_length[100]"
                ),
            "username" =>
                array(
                    "field" => "username",
                    "label" => "korisničko ime",
                    "rules" => "required|min_length[4]|max_length[20]|callback_username_exist"
                ),
            "email" =>
                array(
                    "field" => "email",
                    "label" => "email",
                    "rules" => "required|min_length[7]|max_length[100]|valid_email|callback_email_exist"
                ),
            "password" =>
                array(
                    "field" => "password",
                    "label" => "lozinka",
                    "rules" => "required|min_length[6]|max_length[32]"
                ),
            "password_conf" =>
                array(
                    "field" => "password_conf",
                    "label" => "ponovi lozinku",
                    "rules" => "required|min_length[6]|max_length[32]|matches[password]"
                ),

            //additional fields that are not required

            "telephone" =>
                array(
                    "field" => "telephone",
                    "label" => "Telefon",
                    "rules" => "max_length[25]"
                ),
            "address" =>
                array(
                    "field" => "address",
                    "label" => "Adresa",
                    "rules" => "max_length[100]"
                ),
            "city" =>
                array(
                    "field" => "telephone",
                    "label" => "Telefon",
                    "rules" => "max_length[100]"
                ),
            "country" =>
                array(
                    "field" => "country",
                    "label" => "Drzava",
                    "rules" => "max_length[100]"
                ),
            "zip_code" =>
                array(
                    "field" => "zip_code",
                    "label" => "Postanski broj",
                    "rules" => "max_length[10]"
                )
        );

        return $rules;
    }
}

if ( ! function_exists('user_login_rules')) {
    function user_login_rules()
    {
        //rules for fields
        $rules = array(
            "username" =>
                array(
                    "field" => "username",
                    "label" => "korisničko ime",
                    "rules" => "required|min_length[4]|max_length[20]"
                ),
            "password" =>
                array(
                    "field" => "password",
                    "label" => "lozinka",
                    "rules" => "required|min_length[6]|max_length[32]"
                )
        );

        return $rules;
    }
}

if ( ! function_exists('user_edit_rules')) {
    function user_edit_rules()
    {
        //rules for fields
        $rules = array(
            "name" =>
                array(
                    "field" => "name",
                    "label" => "ime",
                    "rules" => "required|min_length[3]|max_length[100]"
                ),
            "email" =>
                array(
                    "field" => "email",
                    "label" => "email",
                    "rules" => "required|min_length[7]|max_length[100]|valid_email"
                ),
            "password" =>
                array(
                    "field" => "password",
                    "label" => "lozinka",
                    "rules" => "required|min_length[6]|max_length[32]"
                ),
            "password_conf" =>
                array(
                    "field" => "password_conf",
                    "label" => "ponovi lozinku",
                    "rules" => "required|min_length[6]|max_length[32]|matches[password]"
                ),

            //additional fields that are not required

            "telephone" =>
                array(
                    "field" => "telephone",
                    "label" => "Telefon",
                    "rules" => "max_length[25]"
                ),
            "address" =>
                array(
                    "field" => "address",
                    "label" => "Adresa",
                    "rules" => "max_length[100]"
                ),
            "city" =>
                array(
                    "field" => "telephone",
                    "label" => "Telefon",
                    "rules" => "max_length[100]"
                ),
            "country" =>
                array(
                    "field" => "country",
                    "label" => "Drzava",
                    "rules" => "max_length[100]"
                ),
            "zip_code" =>
                array(
                    "field" => "zip_code",
                    "label" => "Postanski broj",
                    "rules" => "max_length[10]"
                )
        );

        return $rules;
    }
}

