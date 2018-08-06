        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a href="<?php echo site_url();?>"><i class="fa fa-tachometer"></i> Dashboard</a>
                        </li>
                        <li class="nav-label">Apps</li>
                        <li> <a href="<?php echo site_url('pages'); ?>"><i class="fa fa-book"></i><span class="hide-menu">Pages </span></a>
                        <li> <a class="has-arrow  " href="<?php echo site_url('posts'); ?>" aria-expanded="false"><i class="fa fa-pencil"></i><span class="hide-menu">Posts <span class="label label-rouded label-primary pull-right">3</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo site_url('posts'); ?>">All Posts</a></li>
                                <li><a href="<?php echo site_url('posts/add'); ?>">Add New</a></li>
                                <li><a href="<?php echo site_url('categories'); ?>">Categories</a></li>
                            </ul>
                        </li>
                        </li>
                        <li> <a href="<?php echo site_url('media'); ?>"><i class="fa fa-image"></i><span class="hide-menu">Media </span></a>
                        <li class="nav-label">Users</li>
                        <li> <a class="has-arrow  " href="<?php echo site_url('users'); ?>" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Users <span class="label label-rouded label-warning pull-right">3</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo site_url('users'); ?>">All Users</a></li>
                                <li><a href="<?php echo site_url('users/add'); ?>">Add New</a></li>
                                <li><a href="<?php echo site_url('users_groups'); ?>">Group</a></li>
                            </ul>
                        </li>
                        <li class="nav-label">EXTRA</li>
                        <li> <a href="<?php echo site_url('settings'); ?>"><i class="fa fa-cogs"></i><span class="hide-menu">Settings </span></a>
                        <li> <a href="<?php echo site_url('login/logout'); ?>" onclick="return confirm('<?php echo $this -> permission_lib -> sesresult['uemail']; ?>, are you sure you want to logout?');"><i class="fa fa-power-off"></i><span class="hide-menu">Logout </span></a>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->