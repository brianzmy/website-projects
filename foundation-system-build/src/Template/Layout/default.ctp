<?php echo $this->element('header');?>
     <!-- Start Header Top Area -->
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="logo-area">
                            <a href="http://www.artsearch.com.au/tprojects/admin/index"><?php echo $this->Html->image("logo_transparent.png",[
                                'width' => '200px'
                            ]) ?></a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="header-top-menu">
                            <ul class="nav navbar-nav notika-top-nav">
                            <li><?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout']) ?></li>



                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Top Area -->


        <!-- Main Menu area start-->
            <div class="main-menu-area mg-tb-30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                                <li class="active"><a href="http://www.artsearch.com.au/tprojects/admin/index"><i class="notika-icon notika-house"></i> Home</a>
                                </li>
                                <li><a data-toggle="tab" href="#artists"><i class="notika-icon notika-menus"></i> Artists</a>
                                </li>
                                <li><a data-toggle="tab" href="#galleries"><i class="notika-icon notika-menus"></i> Galleries</a>
                                </li>
                                <li><a data-toggle="tab" href="#clients"><i class="notika-icon notika-menus"></i> Clients</a>
                                </li>
                                <li><a data-toggle="tab" href="#admin"><i class="notika-icon notika-menus"></i> Admin</a>
                                </li>
                            </ul>
                            <div class="tab-content custom-menu-content">
                                <div id="artists" class="tab-pane notika-tab-menu-bg animated flipInX">
                                    <ul class="notika-main-menu-dropdown">
                                        <li><?= $this->Html->link('Add Artists', ['controller' => 'Artists', 'action' => 'add']) ?>
                                        </li>
                                        <li><?= $this->Html->link('View Artists', ['controller' => 'Artists', 'action' => 'index']) ?>
                                        </li>
                                        <li><?= $this->Html->link('Invite Artists', ['controller' => 'Email', 'action' => 'generate_link'])?>
                                        </li>
                                    </ul>
                                </div>
                                <div id="galleries" class="tab-pane notika-tab-menu-bg animated flipInX">
                                    <ul class="notika-main-menu-dropdown">
                                        <li><?= $this->Html->link('Add Galleries', ['controller' => 'Galleries', 'action' => 'add']) ?>
                                        </li>
                                        <li><?= $this->Html->link('View Galleries', ['controller' => 'Galleries', 'action' => 'index']) ?>
                                        </li>
                                        <li><?= $this->Html->link('Invite Galleries', ['controller' => 'Email', 'action' => 'galleryemail'])?>
                                        </li>
                                    </ul>
                                </div>
                                <div id="clients" class="tab-pane notika-tab-menu-bg animated flipInX">
                                    <ul class="notika-main-menu-dropdown">
                                        <li><?= $this->Html->link('View Clients', ['controller' => 'users', 'action' => 'view'])?>
                                        </li>
                                        <li><?= $this->Html->link('Invite Clients', ['controller' => 'Email', 'action' => 'clientemail'])?>
                                        </li>

                                    </ul>
                                </div>

                                <div id="admin" class="tab-pane notika-tab-menu-bg animated flipInX">
                                    <ul class="notika-main-menu-dropdown">
                                        <li><?= $this->Html->link('Add New Admin', ['controller' => 'users', 'action' => 'addadmin'])?>
                                        </li>
                                        <li><?= $this->Html->link('View Admins', ['controller' => 'users', 'action' => 'listadmins'])?>
                                        </li>

                                    </ul>
                                </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main Menu area End-->

    <?php echo $this->fetch('content');?>
