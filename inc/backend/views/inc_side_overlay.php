<?php
/**
 * backend/views/inc_side_overlay.php
 *
 * Author: pixelcave
 *
 * The side overlay of each page (Backend pages)
 *
 */
?>
<!-- Side Overlay-->
<aside id="side-overlay" class="font-size-sm">
    <!-- Side Header -->
    <div class="content-header border-bottom">
        <!-- User Avatar -->
        <a class="img-link mr-1" href="javascript:void(0)">
            <img class="img-avatar img-avatar32" height="32" width="32" src="<?php echo PUB_IMG_PATH."\\staff\\"?>dd02.jpg" alt="">
        </a>
        <!-- END User Avatar -->

        <!-- User Info -->
        <div class="ml-2">
            <a class="link-fx text-dark font-w600" href="javascript:void(0)">Extreme Ebube</a>
        </div>
        <!-- END User Info -->

        <!-- Close Side Overlay -->
        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
        <a class="ml-auto btn btn-sm btn-dual" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
            <i class="fa fa-fw fa-times text-danger"></i>
        </a>
        <!-- END Close Side Overlay -->
    </div>
    <!-- END Side Header -->

    <!-- Side Content -->
    <div class="content-side">
        <!-- Side Overlay Tabs -->
        <div class="block block-transparent pull-x pull-t">
            <ul class="nav nav-tabs nav-tabs-alt nav-justified" data-toggle="tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#so-overview">
                        <i class="fa fa-fw fa-coffee text-gray mr-1"></i> Overview
                    </a>
                </li>
            </ul>
            <div class="block-content tab-content overflow-hidden">
                <!-- Overview Tab -->
                <div class="tab-pane pull-x fade fade-left show active" id="so-overview" role="tabpanel">
                    <!-- Activity -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Recent Activity</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                            </div>
                        </div>
                        <div class="block-content">
                            <!-- Activity List -->
                            <ul class="nav-items mb-0">
                                <li>
                                    <a class="text-dark media py-2" href="javascript:void(0)">
                                        <div class="mr-3 ml-2">
                                            <i class="si si-wallet text-success"></i>
                                        </div>
                                        <div class="media-body">
                                            <div class="font-w600">New sale ($15)</div>
                                            <div class="text-success">Admin Template</div>
                                            <small class="text-muted">3 min ago</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-dark media py-2" href="javascript:void(0)">
                                        <div class="mr-3 ml-2">
                                            <i class="si si-pencil text-info"></i>
                                        </div>
                                        <div class="media-body">
                                            <div class="font-w600">You edited the file</div>
                                            <div class="text-info">
                                                <i class="fa fa-file-text"></i> Documentation.doc
                                            </div>
                                            <small class="text-muted">15 min ago</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-dark media py-2" href="javascript:void(0)">
                                        <div class="mr-3 ml-2">
                                            <i class="si si-close text-danger"></i>
                                        </div>
                                        <div class="media-body">
                                            <div class="font-w600">Project deleted</div>
                                            <div class="text-danger">Line Icon Set</div>
                                            <small class="text-muted">4 hours ago</small>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <!-- END Activity List -->
                        </div>
                    </div>
                    <!-- END Activity -->

                    <!-- Online Friends -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Online Staffs</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                            </div>
                        </div>
                        <div class="block-content">
                            <!-- Users Navigation -->
                            <ul class="nav-items mb-0">
                                <li>
                                    <a class="media py-2" href="javascript:void(0)">
                                        <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                            <?php $zero->get_avatar(0, 'female', 48); ?>
                                            <span class="overlay-item item item-tiny item-circle border border-2x border-white bg-success"></span>
                                        </div>
                                        <div class="media-body">
                                            <div class="font-w600"><?php $zero->get_name('female'); ?></div>
                                            <div class="font-w400 text-muted">Copywriter</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="media py-2" href="javascript:void(0)">
                                        <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                            <?php $zero->get_avatar(0, 'male', 48); ?>
                                            <span class="overlay-item item item-tiny item-circle border border-2x border-white bg-success"></span>
                                        </div>
                                        <div class="media-body">
                                            <div class="font-w600"><?php $zero->get_name('male'); ?></div>
                                            <div class="font-w400 text-muted">Web Developer</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="media py-2" href="javascript:void(0)">
                                        <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                            <?php $zero->get_avatar(0, 'female', 48); ?>
                                            <span class="overlay-item item item-tiny item-circle border border-2x border-white bg-success"></span>
                                        </div>
                                        <div class="media-body">
                                            <div class="font-w600"><?php $zero->get_name('female'); ?></div>
                                            <div class="font-w400 text-muted">Web Designer</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="media py-2" href="javascript:void(0)">
                                        <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                            <?php $zero->get_avatar(0, 'female', 48); ?>
                                            <span class="overlay-item item item-tiny item-circle border border-2x border-white bg-warning"></span>
                                        </div>
                                        <div class="media-body">
                                            <div class="font-w600"><?php $zero->get_name('female'); ?></div>
                                            <div class="font-w400 text-muted">Photographer</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="media py-2" href="javascript:void(0)">
                                        <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                            <?php $zero->get_avatar(0, 'male', 48); ?>
                                            <span class="overlay-item item item-tiny item-circle border border-2x border-white bg-warning"></span>
                                        </div>
                                        <div class="media-body">
                                            <div class="font-w600"><?php $zero->get_name('male'); ?></div>
                                            <div class="font-w400 text-muted">Graphic Designer</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <!-- END Users Navigation -->
                        </div>
                    </div>
                    <!-- END Online Friends -->
                </div>
                <!-- END Overview Tab -->
            </div>
        </div>
        <!-- END Side Overlay Tabs -->
    </div>
    <!-- END Side Content -->
</aside>
<!-- END Side Overlay -->
