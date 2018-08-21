        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Slideshow</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Slideshow</li>
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
                                <h4>Add New Slideshow</h4>
                            </div>
                            <h6 class="card-subtitle">Updated By <?php echo __set_modification_log($data[0] -> supdatedby, 1, 1);?> | Updated Date <?php echo __set_modification_log($data[0] -> supdatedby, 2, 1);?></h6>
                            <div class="card-body">
                                <div class="basic-form">
                                <?php echo __get_error_msg(); ?>
                                    <form action="<?php echo site_url('slideshow/edit'); ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <input type="hidden" name="oldfile" value="<?php echo $data[0] -> sfile; ?>">
                                        <div class="form-group">
                                            <label>Link (URL)</label>
                                            <input type="text" name="url" class="form-control input-default " value="<?php echo $data[0] -> surl; ?>" placeholder="Input Slideshow Link">
                                        </div>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" class="form-control input-default" value="<?php echo $data[0] -> stitle; ?>" placeholder="Input Slideshow Title">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter text ..." name="desc" style="height:100px"><?php echo $data[0] -> sdesc; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <?php echo __get_status($data[0] -> sstatus,4); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>File</label>
                                            <input type="file" id="slideshow-picture-add" name="file" class="form-control">
                                            <br />
                                            <div class="slideshow-preview"><img class="current-image-slideshow" src="<?php echo __get_upload_file($data[0] -> sfile,3); ?>"></div>
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