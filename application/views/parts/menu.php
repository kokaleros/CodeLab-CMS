<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="#" class="media-left">
                    </a>
                    <div class="media-body">
                        <span class="media-heading text-semibold"><?php echo $user['full_name']; ?></span>
                        <div class="text-size-mini text-muted">
                            <i class="icon-pin text-size-small"></i> &nbsp;<?php echo $user['location_info']['city']; ?>, <?php echo $user['location_info']['country']; ?>
                        </div>
                    </div>

                    <div class="media-right media-middle">
                        <ul class="icons-list">
                            <li>
                                <a href="#"><i class="icon-cog3"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"></li>
                    <li class="active"><a href="<?php echo base_url(); ?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                    <li>
                        <a href="#"><i class="icon-users"></i> <span>Korisnici</span></a>
                        <ul>
                            <li><a href="<?php echo base_url('users/create'); ?>">Dodaj korisnika</a></li>
                            <li><a href="<?php echo base_url('users/'); ?>">Svi korisnici</a></li>
                            <li class="navigation-divider"></li>

                            <li><a href="#">Grupe korisnika</a></li>
                            <li><a href="#">Dodaj grupu</a></li>
                            <li class="navigation-divider"></li>

                            <li><a href="#">Dozvole</a></li>
                            <li><a href="#">Dodaj dozvolu</a></li>
                            <li><a href="#">Dozvole grupi</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="#"><i class="icon-stack2"></i> <span>Pošiljke</span></a>
                        <ul>
                            <li><a href="#">Sve pošiljke</a></li>
                            <li><a href="#">Dodaj pošiljku</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-gear"></i> <span>Moja podešavanja</span></a>
                        <ul>
                            <li><a href="#" id="layout1">Layout 1</a></li>
                            <li><a href="#" id="layout2">Layout 2 <span class="label bg-warning-400">Current</span></a></li>
                            <li><a href="#" id="layout3">Layout 3</a></li>
                            <li><a href="#" id="layout4">Layout 4</a></li>
                            <li><a href="#" id="layout5">Layout 5</a></li>
                            <li class="disabled"><a href="#" id="layout6">Layout 6 <span class="label label-transparent">Coming soon</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url('logout'); ?>"><i class="icon-exit"></i> <span>Odjava</span></a>
                    </li>

                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>