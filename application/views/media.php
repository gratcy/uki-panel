        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Media</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Media</li>
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
                                <h4 class="card-title">Media</h4>
                                <h6 class="card-subtitle">Show All Media</h6>
                                <div class="col-6">
                                    <a href="<?php echo site_url('media/add'); ?>" class="btn btn-primary"><i class="icon-plus"></i> Upload Media</a>
                                </div>
                                <div class="m-t-40">
                                <?php echo __get_error_msg(); ?>
                                    <div class="row">
                                    <?php foreach($data as $k => $v) : ?>
                                        <a href="<?php echo $v -> murl; ?>" target="_blank" title="<?php echo $v -> mname; ?>">
                                        <div class="col-3" style="border: 1px solid #ccc;margin: 5px"><img src="<?php echo $v -> murl; ?>" style="max-height: 180px"></div>
                                        </a>
                                    <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->