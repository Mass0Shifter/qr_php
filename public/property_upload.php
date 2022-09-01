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
<?php $zero->get_css('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'); ?>
<?php $zero->get_css('js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css'); ?>
<?php $zero->get_css('js/plugins/select2/css/select2.min.css'); ?>
<?php $zero->get_css('js/plugins/ion-rangeslider/css/ion.rangeSlider.css'); ?>
<?php $zero->get_css('js/plugins/ion-rangeslider/css/ion.rangeSlider.skinHTML5.css'); ?>
<?php $zero->get_css('js/plugins/dropzone/dist/min/dropzone.min.css'); ?>

<?php require PROJECT_PATH . '/inc/_global/views/head_end.php'; ?>
<?php require PROJECT_PATH . '/inc/_global/views/page_start.php'; ?>

<?php

$message = "";
$good_message = true;


if (isset($_POST['submit'])) {

    $property_name              = $_POST['wizard-progress2-propertyname'];
    $facility_type              = $_POST['wizard-progress2-facilitytype'];
    $offer_type                 = $_POST['wizard-progress2-offertype'];
    $facility_condition         = $_POST['wizard-progress2-facilitycondition'];
    $property_price             = $_POST['wizard-progress2-propertyprice'];
    $rooms                      = $_POST['wizard-progress2-rooms'];
    $floors                     = $_POST['wizard-progress2-floors'];
    $bathrooms                  = $_POST['wizard-progress2-bathrooms'];
    $balcony                    = $_POST['wizard-progress2-balcony'];
    $borehole                   = $_POST['wizard-progress2-borehole'];
    $gym                        = $_POST['wizard-progress2-gym'];
    $swimpool                   = $_POST['wizard-progress2-swimpool'];
    $parkinglot                 = $_POST['wizard-progress2-parkinglot'];
    $ac                         = $_POST['wizard-progress2-ac'];
    $wordrobe                   = $_POST['wizard-progress2-wordrobe'];
    $doc_excision               = $_FILES['example-file-input-custom-excision'];
    print_r($_FILES);
    // $doc_gasette                = $_FILES['example-file-input-custom-gasette'];
    // $doc_coo                    = $_FILES['example-file-input-custom-coo'];
    // $doc_doa                    = $_FILES['example-file-input-custom-doa'];
    // $doc_gc                     = $_FILES['example-file-input-custom-gc'];
    // $doc_lr                     = $_FILES['example-file-input-custom-lr'];
    // $doc_sp                     = $_FILES['example-file-input-custom-sp'];
    // $doc_dwg                    = $_FILES['example-file-input-custom-dwg'];
    // $doc_fp                     = $_FILES['example-file-input-custom-fp'];
    // $img_1                      = $_FILES['example-file-input-custom-image-1'];
    // $img_2                      = $_FILES['example-file-input-custom-image-2'];
    // $img_3                      = $_FILES['example-file-input-custom-image-3'];
    $created_by_id              = $_SESSION['user_id'];

    $uploads = [
        $doc_excision,
        // $doc_gasette,
        // $doc_coo,
        // $doc_doa,
        // $doc_gc,
        // $doc_lr,
        // $doc_sp,
        // $doc_dwg,
        // $doc_fp,
        // $img_1,
        // $img_2,
        // $img_3
    ];
    // Upload Documnets 
    require PROJECT_PATH . '/public/file_upload.php';

    // foreach ($uploads as $upload) {
    //     $uplinked = null;
    //     $uplinked = fileUpload($upload, $property_name);
    //     $new_file = new LuzFile();
    //     $new_file->src = $uplinked;
    // }

    $new_property = new Property();
    $new_property->property_name        = $property_name;
    $new_property->facility_type        = $facility_type;
    $new_property->offer_type           = $offer_type;
    $new_property->facility_condition   = $facility_condition;
    $new_property->property_price       = $property_price;
    $new_property->rooms                = $rooms;
    $new_property->floors               = $floors;
    $new_property->bathrooms            = $bathrooms;
    $new_property->balcony              = $balcony;
    $new_property->borehole             = $borehole;
    $new_property->gym                  = $gym;
    $new_property->swimpool             = $swimpool;
    $new_property->parkinglot           = $parkinglot;
    $new_property->ac                   = $ac;
    $new_property->wordrobe             = $wordrobe;
    $new_property->doc_excision         = fileUpload($doc_excision, $property_name);
    // $new_property->doc_gasette          = fileUpload($doc_excision, $property_name);$doc_gasette;
    // $new_property->doc_coo = fileUpload($doc_coo, $property_name);
    // $new_property->doc_doa = fileUpload($doc_doa, $property_name);
    // $new_property->doc_gc = fileUpload($doc_gc, $property_name);
    // $new_property->doc_lr = fileUpload($doc_lr, $property_name);
    // $new_property->doc_sp = fileUpload($doc_sp, $property_name);
    // $new_property->doc_dwg = fileUpload($doc_dwg, $property_name);
    // $new_property->img_1 = fileUpload($img_1, $property_name);
    // $new_property->img_2 = fileUpload($img_2, $property_name);
    // $new_property->img_3 = fileUpload($img_3, $property_name);
    $new_property->created_by_id = $created_by_id;

    if ($new_property->create()) {
        redirect_to('my_properties.php');
    } else {
        $message = "Property Not Created. Check Form.";
        $good_message = false;
    }
} else {
    $message                    = "";
    $property_name              = "";
    $facility_type              = "";
    $offer_type                 = "";
    $facility_condition         = "";
    $property_price             = "";
    $rooms                      = "";
    $floors                     = "";
    $bathrooms                  = "";
    $balcony                    = "";
    $borehole                   = "";
    $gym                        = "";
    $swimpool                   = "";
    $parkinglot                 = "";
    $ac                         = "";
    $wordrobe                   = "";
    $doc_excision               = "";
    // $doc_gasette                = "";
    // $doc_coo                    = "";
    // $doc_doa                    = "";
    // $doc_gc                     = "";
    // $doc_lr                     = "";
    // $doc_sp                     = "";
    // $doc_dwg                    = "";
    // $doc_fp                     = "";
}
?>

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
                        Create/Edit Property
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
                                        <i class="fa fa-fw fa-file-archive mr-1"></i> Edit Property
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
                    <h3 class="block-title">Create New Property</h3>
                </div>
                <div class="block-content">
                    <div class="col">
                        <!-- Progress Wizard 2 -->
                        <div class="js-wizard-simple block block">
                            <!-- Wizard Progress Bar -->
                            <div class="progress rounded-0" data-wizard="progress" style="height: 8px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <!-- END Wizard Progress Bar -->

                            <!-- Step Tabs -->
                            <ul class="nav nav-tabs nav-tabs-alt nav-justified" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#wizard-progress2-step1" data-toggle="tab">1. Type</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#wizard-progress2-step2" data-toggle="tab">2. Image Upload</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#wizard-progress2-step3" data-toggle="tab">2. More Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#wizard-progress2-step4" data-toggle="tab">3. Additionals</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#wizard-progress2-step5" data-toggle="tab">4. Documents</a>
                                </li>
                            </ul>
                            <!-- END Step Tabs -->

                            <!-- Form -->
                            <form action="" method="POST">
                                <!-- Steps Content -->
                                <div class="block-content block-content-full tab-content px-md-5" style="min-height: 314px;">
                                    <!-- Step 1 -->
                                    <div class="tab-pane active" id="wizard-progress2-step1" role="tabpanel">
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
                                            <input class="form-control form-control-alt" type="number" id="wizard-progress2-propertyprice" name="wizard-progress2-propertyprice" value="0">
                                        </div>
                                    </div>
                                    <!-- END Step 1 -->

                                    <!-- Step 2 -->
                                    <div class="tab-pane" id="wizard-progress2-step2" role="tabpanel">
                                        <h3>Upload Property Image</h3>
                                        <p>
                                            Recommended Image size
                                            Aspect Ratio : 16:8
                                            Resolution : 1080 x 720
                                        </p>
                                        <hr>
                                        <div class="form-group">
                                            <label>Main Image</label>
                                            <div class="custom-file">
                                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom-image-1" name="example-file-input-custom-image-1">
                                                <label class="custom-file-label" for="example-file-input-custom-image-1">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Second Image</label>
                                            <div class="custom-file">
                                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom-image-2" name="example-file-input-custom-image-2">
                                                <label class="custom-file-label" for="example-file-input-custom-image-2">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Third Image</label>
                                            <div class="custom-file">
                                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom-image-3" name="example-file-input-custom-image-3">
                                                <label class="custom-file-label" for="example-file-input-custom-image-3">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Step 2 -->

                                    <!-- Step 3 -->
                                    <div class="tab-pane" id="wizard-progress2-step3" role="tabpanel">
                                        <div class="form-group">
                                            <label for="wizard-progress2-rooms">Rooms</label>
                                            <input class="form-control form-control-alt" type="number" id="wizard-progress2-rooms" name="wizard-progress2-rooms" value="0">
                                        </div>
                                        <div class="form-group">
                                            <label for="wizard-progress2-floors">Floors</label>
                                            <input class="form-control form-control-alt" type="number" id="wizard-progress2-floors" name="wizard-progress2-floors" value="0">
                                        </div>
                                        <div class="form-group">
                                            <label for="wizard-progress2-bathrooms">Bath Rooms</label>
                                            <input class="form-control form-control-alt" type="number" id="wizard-progress2-bathrooms" name="wizard-progress2-bathrooms" value="0">
                                        </div>
                                        <div class="form-group">
                                            <label for="wizard-progress2-balcony">Balcony(s)</label>
                                            <input class="form-control form-control-alt" type="number" id="wizard-progress2-balcony" name="wizard-progress2-balcony" value="0">
                                        </div>
                                    </div>
                                    <!-- END Step 3 -->

                                    <!-- Step 4 -->
                                    <div class="tab-pane" id="wizard-progress2-step4" role="tabpanel">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox custom-control-primary">
                                                <input type="checkbox" checked class="custom-control-input" id="wizard-progress2-borehole" name="wizard-progress2-borehole">
                                                <label class="custom-control-label" for="wizard-progress2-borehole">Has Borehole</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox custom-control-primary">
                                                <input type="checkbox" checked class="custom-control-input" id="wizard-progress2-gym" name="wizard-progress2-gym">
                                                <label class="custom-control-label" for="wizard-progress2-gym">Has Gym</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox custom-control-primary">
                                                <input type="checkbox" checked class="custom-control-input" id="wizard-progress2-swimpool" name="wizard-progress2-swimpool">
                                                <label class="custom-control-label" for="wizard-progress2-swimpool">Has Swimming Pool</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox custom-control-primary">
                                                <input type="checkbox" checked class="custom-control-input" id="wizard-progress2-parkinglot" name="wizard-progress2-parkinglot">
                                                <label class="custom-control-label" for="wizard-progress2-parkinglot">Has Parking Lot</label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="wizard-progress2-ac">Air Conditioning (If any)</label>
                                            <input class="form-control form-control-alt" type="number" id="wizard-progress2-ac" name="wizard-progress2-ac" value="0">
                                        </div>
                                        <div class="form-group">
                                            <label for="wizard-progress2-wordrobe">Wordrobe(s)</label>
                                            <input class="form-control form-control-alt" type="number" id="wizard-progress2-wordrobe" name="wizard-progress2-wordrobe" value="0">
                                        </div>
                                    </div>
                                    <!-- END Step 4 -->

                                    <!-- Step 5 -->
                                    <div class="tab-pane" id="wizard-progress2-step5" role="tabpanel">
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
                                    <!-- END Step 5 -->

                                </div>
                                <!-- END Steps Content -->

                                <!-- Steps Navigation -->
                                <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom">
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="button" class="btn btn-secondary" data-wizard="prev">
                                                <i class="fa fa-angle-left mr-1"></i> Previous
                                            </button>
                                        </div>
                                        <div class="col-6 text-right">
                                            <button type="button" class="btn btn-secondary" data-wizard="next">
                                                Next <i class="fa fa-angle-right ml-1"></i>
                                            </button>
                                            <button name="submit" type="submit" class="btn btn-primary d-none" data-wizard="finish">
                                                <i class="fa fa-check mr-1"></i> Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Steps Navigation -->
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