<?php require '../inc/_global/config.php'; ?>
<?php

// Control Access
$currentAddressLocation = 'user_data_new.php';

if (isset($_SESSION['user_id'])) {

    // $ac = AccessControl::find_by_page_name($currentAddressLocation);
    // if (isset($ac->id)) {
    //     $has_access = $ac->confirm_user_access($_SESSION['user_id']);
    // }

    $has_access = true;
    if ($has_access) {
        //Welcome To This Page
    } else {
        redirect_to('index.php');
    }
}

?>
<?php require PROJECT_PATH . '/inc/backend/config.php'; ?>
<?php require PROJECT_PATH . '/inc/_global/views/head_start.php'; ?>
<?php $dashboardLocation = 'index.php'; ?>
<?php $parentAddressLocation = 'user_manager.php'; ?>

<!-- Page JS Plugins CSS -->
<?php $zero->get_css('js/plugins/select2/css/select2.min.css'); ?>
<?php $zero->get_css('js/plugins/dropzone/dist/min/dropzone.min.css'); ?>

<?php require PROJECT_PATH . '/inc/_global/views/head_end.php'; ?>
<?php require PROJECT_PATH . '/inc/_global/views/page_start.php'; ?>

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Properties <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">Create,Edit and view all property informations.</small>
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">
                        <a class="link-fx" href="<?php echo $dashboardLocation ?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a class="link-fx" href="<?php echo $parentAddressLocation ?>">Property Manager</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        View Property
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">

    <div class="row">
        <div class="col-md-5 col-xl-3">
            <!-- Toggle Inbox Side Navigation -->
            <div class="d-md-none push">
                <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                <button type="button" class="btn btn-block btn-primary" data-toggle="class-toggle" data-target="#one-inbox-side-nav" data-class="d-none">
                    Menu
                </button>
            </div>
            <!-- END Toggle Inbox Side Navigation -->

            <!-- Inbox Side Navigation -->
            <div id="one-inbox-side-nav" class="d-none d-md-block push">
                <!-- Inbox Menu -->
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Menu</h3>

                    </div>
                    <div class="block-content">
                        <ul class="nav nav-pills flex-column font-size-sm push">
                            <li class="nav-item my-1">
                                <a class="nav-link d-flex justify-content-between align-items-center active" href="#">
                                    <span>
                                        <i class="fa fa-fw fa-plus mr-1"></i> New Property
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item my-1">
                                <a class="nav-link d-flex justify-content-between align-items-center" href="my_properties.php">
                                    <span>
                                        <i class="fa fa-fw fa-file-alt mr-1"></i> View All Properties
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item my-1">
                                <a class="nav-link d-flex justify-content-between align-items-center" href="#">
                                    <span>
                                        <i class="fa fa-fw fa-file-archive mr-1"></i> View Property
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END Inbox Menu -->
            </div>
            <!-- END Inbox Side Navigation -->
        </div>

        <div class="col-md-7 col-xl-9">
            <!-- Message List -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">My Property</h3>
                </div>
                <div class="block-content">
                    <div class="col">
                        <!-- Progress Wizard 2 -->
                        <div class="block">

                            <!-- Form -->
                            <form>
                                <!-- Steps Content -->
                                <div class="block-content block-content-full tab-content px-md-5" style="min-height: 314px;">
                                    <!-- Step 1 -->
                                    <div class="tab-pane" role="tabpanel">
                                        <div class="col-md-6">
                                            <!-- Slider with dots and white hover arrows -->
                                            <div class="block">
                                                <div class="block-header">
                                                    <h3 class="block-title">Property Image</h3>
                                                </div>
                                                <div class="js-slider slick-nav-white slick-nav-hover" data-dots="true" data-arrows="true">
                                                    <div>
                                                        <img class="img-fluid" src="assets/media/photos/photo7@2x.jpg" alt="">
                                                    </div>
                                                    <div>
                                                        <img class="img-fluid" src="assets/media/photos/photo8@2x.jpg" alt="">
                                                    </div>
                                                    <div>
                                                        <img class="img-fluid" src="assets/media/photos/photo9@2x.jpg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END Slider with dots and white hover arrows -->
                                        </div>
                                        <div class="form-group">
                                            <label for="wizard-progress2-propertyname">Property Name</label>
                                            <input class="form-control form-control-alt" type="text" id="wizard-progress2-propertyname" name="wizard-progress2-propertyname">
                                        </div>
                                        <div class="form-group">
                                            <label for="wizard-progress2-facilitytype">Facility Type</label>
                                            <select class="form-control form-control-alt" id="wizard-progress2-facilitytype" name="wizard-progress2-facilitytype">
                                                <option value="">Please select facility type</option>
                                                <?php
                                                $data = ["Residential", "Commercial", "House", "Land", "Hospital", "Industrial", "Office", "Mixed-Use", "Hospitality", "University", "School", "Special Use", "Warehouse"];
                                                foreach ($data as $type) {
                                                    echo '<option value="' . $type . '">' . $type . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="wizard-progress2-offertype">Offer Type</label>
                                            <select class="form-control form-control-alt" id="wizard-progress2-offertype" name="wizard-progress2-offertype">
                                                <option value="">Please select offer type</option>
                                                <?php
                                                $data = ["Sell", "Lease", "Rent", "Shortlet"];
                                                foreach ($data as $type) {
                                                    echo '<option value="' . $type . '">' . $type . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="wizard-progress2-facilitycondition">Facility Condition</label>
                                            <select class="form-control form-control-alt" id="wizard-progress2-facilitycondition" name="wizard-progress2-facilitycondition">
                                                <option value="">Please select facility condition</option>
                                                <?php
                                                $data = ["Under-Construction", "Completed", "New Project"];
                                                foreach ($data as $type) {
                                                    echo '<option value="' . $type . '">' . $type . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="wizard-progress2-propertyprice">Property Price</label>
                                            <input class="form-control form-control-alt" type="number" id="wizard-progress2-propertyprice" name="wizard-progress2-propertyprice">
                                        </div>
                                        <div class="form-group">
                                            <label for="wizard-progress2-rooms">Rooms</label>
                                            <input class="form-control form-control-alt" type="number" id="wizard-progress2-rooms" name="wizard-progress2-rooms">
                                        </div>
                                        <div class="form-group">
                                            <label for="wizard-progress2-floors">Floors</label>
                                            <input class="form-control form-control-alt" type="number" id="wizard-progress2-floors" name="wizard-progress2-floors">
                                        </div>
                                        <div class="form-group">
                                            <label for="wizard-progress2-bathrooms">Bath Rooms</label>
                                            <input class="form-control form-control-alt" type="number" id="wizard-progress2-bathrooms" name="wizard-progress2-bathrooms">
                                        </div>
                                        <div class="form-group">
                                            <label for="wizard-progress2-balcony">Balcony(s)</label>
                                            <input class="form-control form-control-alt" type="number" id="wizard-progress2-balcony" name="wizard-progress2-balcony">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox custom-control-primary">
                                                <input type="checkbox" class="custom-control-input" id="wizard-progress2-borehole" name="wizard-progress2-borehole">
                                                <label class="custom-control-label" for="wizard-progress2-borehole">Has Borehole</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox custom-control-primary">
                                                <input type="checkbox" class="custom-control-input" id="wizard-progress2-gym" name="wizard-progress2-gym">
                                                <label class="custom-control-label" for="wizard-progress2-gym">Has Gym</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox custom-control-primary">
                                                <input type="checkbox" class="custom-control-input" id="wizard-progress2-swimpool" name="wizard-progress2-swimpool">
                                                <label class="custom-control-label" for="wizard-progress2-swimpool">Has Swimming Pool</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox custom-control-primary">
                                                <input type="checkbox" class="custom-control-input" id="wizard-progress2-parkinglot" name="wizard-progress2-parkinglot">
                                                <label class="custom-control-label" for="wizard-progress2-parkinglot">Has Parking Lot</label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="wizard-progress2-ac">Air Conditioning (If any)</label>
                                            <input class="form-control form-control-alt" type="number" id="wizard-progress2-ac" name="wizard-progress2-ac">
                                        </div>
                                        <div class="form-group">
                                            <label for="wizard-progress2-wordrobe">Wordrobe(s)</label>
                                            <input class="form-control form-control-alt" type="number" id="wizard-progress2-wordrobe" name="wizard-progress2-wordrobe">
                                        </div>
                                        <div class="form-group">
                                            <label>Excision</label>
                                            <div class="custom-file">
                                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom-excision" name="example-file-input-custom-excision">
                                                <label class="custom-file-label" for="example-file-input-custom-excision">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Gasette</label>
                                            <div class="custom-file">
                                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom-gasette" name="example-file-input-custom-gasette">
                                                <label class="custom-file-label" for="example-file-input-custom-gasette">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Certificate of Ownership</label>
                                            <div class="custom-file">
                                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom-coo" name="example-file-input-custom-coo">
                                                <label class="custom-file-label" for="example-file-input-custom-coo">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Deed of Assignment</label>
                                            <div class="custom-file">
                                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom-doa" name="example-file-input-custom-doa">
                                                <label class="custom-file-label" for="example-file-input-custom-doa">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Governors Consent</label>
                                            <div class="custom-file">
                                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom-gc" name="example-file-input-custom-gc">
                                                <label class="custom-file-label" for="example-file-input-custom-gc">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Land Receipt</label>
                                            <div class="custom-file">
                                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom-lr" name="example-file-input-custom-lr">
                                                <label class="custom-file-label" for="example-file-input-custom-lr">Choose file</label>
                                            </div>
                                        </div>
                                        <hr>
                                        <h3>Plans & Drawings</h3>
                                        <hr>
                                        <div class="form-group">
                                            <label>Survey Plan</label>
                                            <div class="custom-file">
                                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom-sp" name="example-file-input-custom-sp">
                                                <label class="custom-file-label" for="example-file-input-custom-sp">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Drawings</label>
                                            <div class="custom-file">
                                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom-dwg" name="example-file-input-custom-dwg">
                                                <label class="custom-file-label" for="example-file-input-custom-dwg">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Floor Plans</label>
                                            <div class="custom-file">
                                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom-fp" name="example-file-input-custom-fp">
                                                <label class="custom-file-label" for="example-file-input-custom-fp">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Step 4 -->

                                </div>
                                <!-- END Steps Content -->
                            </form>
                            <!-- END Form -->
                        </div>
                        <!-- END Progress Wizard 2 -->
                    </div>
                </div>
            </div>
            <!-- END Message List -->
        </div>
    </div>
</div>
<!-- END Page Content -->

<?php require PROJECT_PATH . '/inc/_global/views/page_end.php'; ?>
<?php require PROJECT_PATH . '/inc/_global/views/footer_start.php'; ?>

<!-- Page JS Plugins -->
<?php $zero->get_js('js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js'); ?>
<?php $zero->get_js('js/plugins/select2/js/select2.full.min.js'); ?>
<?php $zero->get_js('js/plugins/jquery.maskedinput/jquery.maskedinput.min.js'); ?>
<?php $zero->get_js('js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js'); ?>
<?php $zero->get_js('js/plugins/dropzone/dropzone.min.js'); ?>
<?php $zero->get_js('js/plugins/jquery-bootstrap-wizard/bs4/jquery.bootstrap.wizard.min.js'); ?>
<?php $zero->get_js('js/plugins/jquery-validation/jquery.validate.min.js'); ?>
<?php $zero->get_js('js/plugins/jquery-validation/additional-methods.js'); ?>

<!-- Page JS Code -->
<?php $zero->get_js('js/pages/be_forms_wizard.min.js'); ?>

<!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Inputs + Ion Range Slider plugins) -->
<script>
    jQuery(function() {
        One.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider']);
    });
</script>

<?php require PROJECT_PATH . '/inc/_global/views/footer_end.php'; ?>