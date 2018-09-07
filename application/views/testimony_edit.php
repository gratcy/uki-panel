        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Testimony</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Testimony</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Edit Testimony</h4>
                            </div>
                            <h6 class="card-subtitle">Updated By <?php echo __set_modification_log($data[0] -> tupdatedby, 1, 1);?> | Updated Date <?php echo __set_modification_log($data[0] -> tupdatedby, 2, 1);?></h6>
                            <div class="card-body">
                                <div class="basic-form">
                                <?php echo __get_error_msg(); ?>
                                    <form action="<?php echo site_url('testimony/edit'); ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <div class="form-group hide">
                                            <label>Faculty</label>
                                            <select name="faculty" class="form-control input-flat" placeholder="Input Flat ">
                                                <?php echo __get_faculity($data[0] -> tfaculty,2); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" name="name" class="form-control input-default " placeholder="Input Default" value="<?php echo $data[0] -> tname; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Current Company</label>
                                            <input type="text" name="company" class="form-control input-default " placeholder="Input Default" value="<?php echo $data[0] -> tcompany; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Testimony</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter text ..." name="testimony" style="height:100px"><?php echo $data[0] -> ttestimony; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Photo</label>
                                            <input type="file" id="gallery-photo-add" name="file" class="form-control">
                                            <br />
                                            <img class="gallery-current" src="<?php echo __get_upload_file($data[0] -> tphoto, 4); ?>">
                                            <br />
                                            <div class="gallery-preview"></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <?php echo __get_status($data[0] -> tstatus,4); ?>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-info">Submit <i class="fa fa-save"></i></button>
                                            <button type="button" class="btn btn-secondary" onclick="location.href='javascript:history.go(-1);'">Back <i class="fa fa-arrow-circle-left"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->