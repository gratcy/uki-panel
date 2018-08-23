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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Update Gallery</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                <?php echo __get_error_msg(); ?>
                                    <form action="<?php echo site_url('gallery/edit'); ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <div class="form-group hide">
                                            <label>Faculty</label>
                                            <select name="faculty" class="form-control input-flat" placeholder="Input Flat ">
                                                <?php echo __get_faculity($data[0] -> gfaculty,2); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select name="category" class="form-control input-flat" placeholder="Input Flat ">
                                                <?php echo $categories; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" class="form-control input-default " placeholder="Input Default" value="<?php echo $data[0] -> gtitle; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Content</label>
                                        <textarea class="textarea_editor form-control" rows="15" placeholder="Enter text ..." name="content" style="height:450px"><?php echo $data[0] -> gcontent; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>File</label>
                                            <input type="file" id="gallery-photo-add" name="file" class="form-control">
                                            <br />
                                            <img class="gallery-current" src="<?php echo __get_upload_file($data[0] -> gfile, 2); ?>">
                                            <br />
                                            <div class="gallery-preview"></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <?php echo __get_status($data[0] -> gstatus,2); ?>
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