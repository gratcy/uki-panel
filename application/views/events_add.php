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
                                <h4>Add New Events</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                <?php echo __get_error_msg(); ?>
                                    <form action="<?php echo site_url('events/add'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="form-group hide">
                                            <label>Faculty</label>
                                            <select name="faculty" class="form-control input-flat" placeholder="Input Flat ">
                                                <?php echo __get_faculity($this -> permission_lib -> sesresult['ufaculty'],2); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Event Date</label>
                                            <div class="col-lg-6">
                                            <label>From</label>
                                            <input type="text" id="datetimepicker" name="datefrom" class="form-control input-default " placeholder="Date Time (From)">
                                            </div>
                                            <div class="col-lg-6">
                                            <label>To</label>
                                            <input type="text" id="datetimepicker2" name="dateto" class="form-control input-default " placeholder="Date Time (To)">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Location</label>
                                            <input type="text" name="location" class="form-control input-default " placeholder="Location">
                                        </div>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" class="form-control input-default " placeholder="Title">
                                        </div>
                                        <div class="form-group">
                                            <label>Content</label>
                                        <textarea class="textarea_editor form-control" placeholder="Enter content ..." name="content"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Cover</label>
                                            <input type="file" id="gallery-photo-add" name="file" class="form-control">
                                            <br />
                                            <div class="gallery-preview"></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <?php echo __get_status(0,2); ?>
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