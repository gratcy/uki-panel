        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Events</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Events</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Events</h4>
                                <h6 class="card-subtitle">Show All Events</h6>
                                <?php if (__get_roles('EventsExecute')) : ?>
                                    <div class="col-6">
                                        <a href="<?php echo site_url('events/add'); ?>" class="btn btn-primary"><i class="icon-plus"></i> Add New</a>
                                    </div>
                                <?php endif; ?>
                                <div class="table-responsive m-t-40">
                                <?php echo __get_error_msg(); ?>
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Faculty</th>
                                                <th>Event Date</th>
                                                <th>Title</th>
                                                <th>Cover</th>
                                                <th>Created Date</th>
                                                <th>Created By</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($data as $k => $v) : ?>
                                                <tr>
                                                    <td><?php echo __get_faculity($v -> efaculty, 1);?></td>
                                                    <td><?php echo __get_date(strtotime($v -> edatefrom), 3) . ' / ' . __get_date(strtotime($v -> edateto), 3); ?></td>
                                                    <td><?php echo $v -> etitle;?></td>
                                                    <td><a href="<?php echo __get_upload_file($v -> ecover, 5);?>" target="_blank">View</a></td>
                                                    <td><?php echo __set_modification_log($v -> ecreatedby, 2, 1);?></td>
                                                    <td><?php echo __set_modification_log($v -> ecreatedby, 1, 1);?></td>
                                                    <td><?php echo __get_status($v -> estatus,1);?></td>
                                                    <td>
                                                        <?php if (__get_roles('EventsExecute')) : ?>
                                                          <a href="<?php echo site_url('events/edit/' . $v -> eid); ?>"><i class="fa fa-pencil"></i></a>
                                                          &nbsp;
                                                          <a href="<?php echo site_url('events/remove/' . $v -> eid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-remove"></i></a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->