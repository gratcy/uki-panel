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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Edit Events</h4>
                            </div>
                            <h6 class="card-subtitle">Updated By <?php echo __set_modification_log($data[0] -> eupdatedby, 1, 1);?> | Updated Date <?php echo __set_modification_log($data[0] -> eupdatedby, 2, 1);?></h6>

                            <div class="card-body">
                                <div class="basic-form">
                                <?php echo __get_error_msg(); ?>
                                    <form action="<?php echo site_url('events/edit'); ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <div class="form-group hide">
                                            <label>Faculty</label>
                                            <select name="faculty" class="form-control input-flat" placeholder="Input Flat ">
                                                <?php echo __get_faculity($data[0] -> efaculty,2); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Event Date</label>
                                            <div class="col-lg-6">
                                            <label>From</label>
                                            <input type="text" id="datetimepicker" name="datefrom" class="form-control input-default " placeholder="Date Time" value="<?php echo date('Y/m/d H:i', strtotime($data[0] -> edatefrom)); ?>">
                                            </div>
                                            <div class="col-lg-6">
                                            <label>To</label>
                                            <input type="text" id="datetimepicker2" name="dateto" class="form-control input-default " placeholder="Date Time" value="<?php echo date('Y/m/d H:i', strtotime($data[0] -> edateto)); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Location</label>
                                            <input type="text" name="location" class="form-control input-default " placeholder="Location" value="<?php echo $data[0] -> elocation; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" class="form-control input-default " placeholder="Title" value="<?php echo $data[0] -> etitle; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Content</label>
                                        <textarea class="textarea_editor form-control" placeholder="Enter content ..." name="content"><?php echo $data[0] -> econtent; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Cover</label>
                                            <input type="file" id="gallery-photo-add" name="file" class="form-control">
                                            <br />
                                            <img class="gallery-current" src="<?php echo __get_upload_file($data[0] -> ecover, 5); ?>">
                                            <br />
                                            <div class="gallery-preview"></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <?php echo __get_status($data[0] -> estatus,2); ?>
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

