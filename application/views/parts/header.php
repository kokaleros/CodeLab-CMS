<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo !empty($title) ?  $title . " | " : ''; ?>LabSystem</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <?php echo link_tag('assets/css/icons/icomoon/styles.css'); ?>
    <?php echo link_tag('assets/css/bootstrap.css'); ?>
    <?php echo link_tag('assets/css/core.css'); ?>
    <?php echo link_tag('assets/css/components.css'); ?>
    <?php echo link_tag('assets/css/colors.css'); ?>

<?php if(!empty($css) && is_array($css)): ?>
    <!-- Additional CSS -->
    <?php
        foreach ($css as $file):
    echo link_tag('assets/css/colors.css') . PHP_EOL;
        endforeach;
     endif; ?>
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/visualization/d3/d3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/headroom/headroom.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/headroom/headroom_jquery.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/dashboard.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/layout_navbar_hideable.js"></script>
    <!-- /theme JS files -->

</head>
