        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Gallery</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Gallery</li>
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
                                <h4 class="card-title">Gallery</h4>
                                <h6 class="card-subtitle">Show All Gallery</h6>
                                <?php if (__get_roles('GalleryExecute')) : ?>
                                    <div class="col-6">
                                        <a href="<?php echo site_url('gallery/add'); ?>" class="btn btn-primary"><i class="icon-plus"></i> Add New</a>
                                    </div>
                                <?php endif; ?>
                                <div class="table-responsive m-t-40">
                                <?php echo __get_error_msg(); ?>
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Faculty</th>
                                                <th>Category</th>
                                                <th>Title</th>
                                                <th>Created Date</th>
                                                <th>Created By</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($data as $k => $v) : ?>
                                                <tr>
                                                    <td><?php echo __get_faculity($v -> gfaculty, 1);?></td>
                                                    <td><?php echo $v -> cname;?></td>
                                                    <td><?php echo $v -> gtitle;?></td>
                                                    <td><?php echo __set_modification_log($v -> gcreatedby, 2, 1);?></td>
                                                    <td><?php echo __set_modification_log($v -> gcreatedby, 1, 1);?></td>
                                                    <td><?php echo __get_status($v -> gstatus,1);?></td>
                                                    <td>
                                                        <?php if (__get_roles('GalleryExecute')) : ?>
                                                          <a href="<?php echo site_url('gallery/edit/' . $v -> gid); ?>"><i class="fa fa-pencil"></i></a>
                                                          &nbsp;
                                                          <a href="<?php echo site_url('gallery/remove/' . $v -> gid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-remove"></i></a>
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