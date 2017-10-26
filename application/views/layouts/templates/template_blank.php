<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//get css and style attribute for content element
$content_style = isset($data['content_attrs']['style']) && !empty($data['content_attrs']['style']) ? $data['content_attrs']['style'] : '';
$content_class = isset($data['content_attrs']['class']) && !empty($data['content_attrs']['class']) ? $data['content_attrs']['class'] : '';
?>
<body>

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content <?php echo $content_class; ?>" style="<?php echo $content_style; ?>">

                <!-- Load messages -->
                <?php echo $data["messages"]; ?>

                <?php $this->load->view($data["load_view"], $data); ?>

            </div>
            <!-- /dashboard content -->

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
