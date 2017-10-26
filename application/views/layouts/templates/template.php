<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//var_dump($data)
?>
<body class="navbar-top">

<?php
    //Load Navbar
    $this->load->view("parts/dashboard/navbar", array('user' => $data['user']));
?>

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <?php $this->load->view("parts/menu", $data); ?>
        <!-- /main sidebar -->

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
                <div class="page-header page-header-default border-bottom-lg border-bottom-primary" style="border-top: 1px solid #ddd; border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
                    <div class="page-header-content">
                        <div class="page-title">
                            <h5>
                                <i class="icon-arrow-left52 position-left"></i>
                                <span class="text-semibold"><?php echo isset($title) ? $title : 'Dashboard' ?></span>
<!--                                <small class="display-block">Large <code>bottom</code> border with custom color</small>-->
                            </h5>
                        </div>
                    </div>

                    <div class="breadcrumb-line"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                            <li class="active"><?php echo $data['header']['title']; ?></li>
                        </ul>

                        <ul class="breadcrumb-elements">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="icon-three-bars"></i>
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#"><i class="icon-inbox pull-right"></i> Action</a></li>
                                    <li><a href="#"><i class="icon-googleplus5 pull-right"></i> Another action</a></li>
                                    <li><a href="#"><i class="icon-grid-alt pull-right"></i> Something else</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="icon-spinner2 spinner pull-right"></i> One more line</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">

                <!-- Load messages -->
                <?php echo $data["messages"]; ?>

                <?php $this->load->view($data["load_view"], $data); ?>

            </div>
            <!-- /dashboard content -->

            <!-- Footer -->
            <div class="footer text-muted">
            <!-- &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>-->
            </div>
            <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

</body>
</html>
