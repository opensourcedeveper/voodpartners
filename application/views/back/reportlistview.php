<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Administration | Tryangle </title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url().'assets/' ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url().'assets/' ?>bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url().'assets/' ?>bower_components/Ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url().'assets/' ?>dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo base_url().'assets/' ?>dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?php echo base_url().'assets/' ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <script src="<?php echo base_url().'assets/' ?>bower_components/jquery/dist/jquery.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <?php if ($this->session->userdata('logged_in') == 'Admin'): ?>
                <a href="<?php echo base_url() . 'dashboard/Admin' ?>" class="logo">
                <?php else: ?>
                    <a href="<?php echo base_url() . 'dashboard/User' ?>" class="logo">
                    <?php endif ?>
                    <span class="logo-mini"><b>Tryangle </b></span>
                    <span class="logo-lg"><b>Tryangle</b> Reports</span>
                </a>
                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo base_url() . 'assets/' ?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?php echo $this->session->userdata('name') ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo base_url() . 'assets/' ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                        <p>
                                            <?php echo $this->session->userdata('name') ?>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <a href="<?php echo base_url() . 'logout/Admin' ?>" class="btn btn-default btn-flat">Log out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <?php if ($this->session->userdata('logged_in') == 'Admin'): ?>
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-chevron-circle-right"></i>
                                <span>Users</span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>list/member"><i class="fa fa-circle-o"></i>List Users</a></li>
                                <li><a href="<?php echo base_url(); ?>add/member"><i class="fa fa-circle-o"></i> Add Users</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-chevron-circle-right"></i>
                                <span>Publisher</span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>list/publisher"><i class="fa fa-circle-o"></i> List Publisher</a></li>
                                <li><a href="<?php echo base_url(); ?>add/publisher"><i class="fa fa-circle-o"></i> Add Publisher</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-chevron-circle-right"></i>
                                <span>Category</span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>list/category"><i class="fa fa-circle-o"></i> List Category</a></li>
                                <li><a href="<?php echo base_url(); ?>add/category"><i class="fa fa-circle-o"></i> Add Category</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-chevron-circle-right"></i>
                                <span>Regions</span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>list/region"><i class="fa fa-circle-o"></i> List Regions</a></li>
                                <li><a href="<?php echo base_url(); ?>add/region"><i class="fa fa-circle-o"></i> Add Regions</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-chevron-circle-right"></i>
                                <span>Site Content</span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>pages/services"><i class="fa fa-circle-o"></i> Services</a></li>
                                <li><a href="<?php echo base_url(); ?>pages/policy"><i class="fa fa-circle-o"></i> Privercy Policy</a></li>
                                <li><a href="<?php echo base_url(); ?>pages/terms"><i class="fa fa-circle-o"></i> Terms and Conditions</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php else: ?>
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-chevron-circle-right"></i>
                                <span>Reports</span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>list/report"><i class="fa fa-circle-o"></i>List Reports</a></li>
                                <li><a href="<?php echo base_url(); ?>add/report"><i class="fa fa-circle-o"></i> Add Report</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-chevron-circle-right"></i>
                                <span>Press Release</span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>list/press_release"><i class="fa fa-circle-o"></i> List Press Release</a></li>
                                <li><a href="<?php echo base_url(); ?>add/press_release"><i class="fa fa-circle-o"></i> Add Press Release</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-chevron-circle-right"></i>
                                <span>Blog</span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>list/blog"><i class="fa fa-circle-o"></i> List Blog</a></li>
                                <li><a href="<?php echo base_url(); ?>add/blog"><i class="fa fa-circle-o"></i> Add Blog</a></li>
                            </ul>
                        </li>
                        <!-- Excel Export -->
                        <li>
                            <a href="<?php echo base_url(); ?>user/createXLS"><i class="fa fa-circle-o"></i> Excel Export</a>

                        </li>
                    </ul>
                <?php endif ?>
            </section>
        </aside>
        <div class="content-wrapper">
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><?php echo "Report List" ?></h3>
                                <div class="pull-right">
                                    <a class="btn btn-primary" href="<?php echo base_url() . 'upload/' . $title ?>"> <i class="fa fa-upload"></i> Upload Excel</a>
                                </div> 
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="posts">
                                    <thead>
                                        <th>Id</th>
                                        <th>title</th>
                                        <th>Category</th>
                                        <th>Publisher</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </thead>				
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
            <!-- jQuery 3.1.1 -->
        <script src="<?php echo base_url() . 'assets/' ?>plugins/jQuery/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#posts').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "<?php echo base_url('report/viewlist') ?>",
                        "dataType": "json",
                        "type": "POST",
                        "data": {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'}
                    },
                    "columns": [
                        {"data": "id"},
                        {"data": "title"},
                        {"data": "name"},
                        {"data": "publisher_name"},
                        {"data": "created_at"},
                        {"data": "action"}
                    ]
                });
            });
        </script>
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 0.4.0
            </div>
            <strong>Copyright &copy; 2018-2020 <a href="#">Tryangle </a>.</strong> All rights reserved.
        </footer>
            <div class="control-sidebar-bg"></div>
        </div>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="<?php echo base_url().'assets/' ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url().'assets/' ?>dist/js/adminlte.min.js"></script>
        <script src="<?php echo base_url().'assets/' ?>dist/js/demo.js"></script>
    </body>
</html>