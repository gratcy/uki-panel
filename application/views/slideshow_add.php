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
                            <div class="card-body">
                                <div class="basic-form">
                                <?php echo __get_error_msg(); ?>
                                    <form action="<?php echo site_url('slideshow/add'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Link (URL)</label>
                                            <input type="text" name="url" class="form-control input-default " placeholder="Input Slideshow Link">
                                        </div>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" class="form-control input-default " placeholder="Input Slideshow Title">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter text ..." name="desc" style="height:100px"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <?php echo __get_status(0,4); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>File</label>
                                            <input type="file" id="slideshow-picture-add" name="file" class="form-control">
                                            <br />
                                            <div class="slideshow-preview"></div>
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