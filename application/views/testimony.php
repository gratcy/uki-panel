        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Testimonial</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Testimonial</li>
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
                                <h4 class="card-title">Testimonial</h4>
                                <h6 class="card-subtitle">Show All Testimonial</h6>
                                <?php if (__get_roles('TestimonyExecute')) : ?>
                                    <div class="col-6">
                                        <a href="<?php echo site_url('testimony/add'); ?>" class="btn btn-primary"><i class="icon-plus"></i> Add New</a>
                                    </div>
                                <?php endif; ?>
                                <div class="table-responsive m-t-40">
                                <?php echo __get_error_msg(); ?>
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Faculty</th>
                                                <th>Full Name</th>
                                                <th>Current Company</th>
                                                <th>Created Date</th>
                                                <th>Created By</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($data as $k => $v) : ?>
                                                <tr>
                                                    <td><?php echo __get_faculity($v -> tfaculty, 1);?></td>
                                                    <td><?php echo $v -> tname;?></td>
                                                    <td><?php echo $v -> tcompany;?></td>
                                                    <td><?php echo __set_modification_log($v -> tcreatedby, 2, 1);?></td>
                                                    <td><?php echo __set_modification_log($v -> tcreatedby, 1, 1);?></td>
                                                    <td><?php echo __get_status($v -> tstatus,1);?></td>
                                                      <td>
                                                        <?php if (__get_roles('TestimonyExecute')) : ?>
                                                              <a href="<?php echo site_url('testimony/edit/' . $v -> tid); ?>"><i class="fa fa-pencil"></i></a>
                                                              &nbsp;
                                                              <a href="<?php echo site_url('testimony/remove/' . $v -> tid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-remove"></i></a>
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