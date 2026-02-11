<div class="sidebar hide-scroll">

    <div class="sidebar-header d-flex align-items-center px-3 position-relative">
        <div class="min-h-22px overflow-hidden">
            <a href="<?php echo e(session('login_as') == "admin" ? route("admin.dashboard") : route("app.dashboard")); ?>">
                <div class="logo-small">
                    <img src="<?php echo e(url( get_option("website_logo_dark", asset('public/img/logo-dark.png')) )); ?>" class="max-w-180 max-h-35">
                </div>
                <div class="logo-large">
                    <img src="<?php echo e(url( get_option("website_logo_brand_dark", asset('public/img/logo-brand-dark.png')) )); ?>" class="max-w-180 max-h-35">
                </div>
            </a>
        </div>

        <div class="sidebar-toggle bg-light">
            <a href="javascript:void(0)" class="d-flex align-items-center justify-content-center border-1 px-2 rounded size-24 fs-14 d-block text-gray-500"><i class="fa-duotone fa-arrow-right-to-line"></i></a>
        </div>
    </div>

    <div class="menu d-flex flex-column align-items-lg-center flex-row-auto" id="accordionMenu">
        
        <?php if( isset( $sidebar['top'] ) ): ?>
            <div class="menu-top d-flex flex-column flex-column-fluid w-100 mb-2">

                <?php
                    $current_tab = 0;
                ?>

                <?php $__currentLoopData = $sidebar['top']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php if( $current_tab == 0 && isset( $value['tab_name'] ) ): ?>
                        <div class="menu-item pt-2">
                            <div class="menu-heading"><span><?php echo e(__($value['tab_name'])); ?></span></div>
                        </div>
                    <?php endif; ?>
                
                    <?php if($value['tab_id'] != $current_tab && $current_tab): ?>
                        <div class="menu-item h-1 bg-gray-200 my-2"> </div>

                        <?php if( isset( $value['tab_name'] ) ): ?>
                        <div class="menu-item pt-2">
                            <div class="menu-heading"><span><?php echo e(__($value['tab_name'])); ?></span></div>
                        </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php 
                        $current_tab = $value['tab_id'];
                    ?>

                    <?php if(!isset($value['sub_menu'])): ?>
                        <div class="menu-item">
                            <a class="menu-link flex-grow-1 align-items-center <?php echo e(menu_active($value['uri']) ? 'text-primary' : ''); ?>" href="<?php echo e(url( $value['uri'] )); ?>">
                                <div class="menu-icon fs-18 <?php echo e(menu_active($value['uri']) ? 'text-primary' : 'text-gray-900'); ?>">
                                    <i class="<?php echo e($value['icon']); ?>" <?php echo Core::sidebarColor(); ?>></i>
                                </div>
                                <div class="menu-title d-flex align-items-center flex-grow-1 fs-14 fw-5 text-truncate" <?php echo menu_active($value['uri']) ? Core::sidebarColor() : ''; ?>>
                                    <div class="text-truncate">
                                        <?php echo e(__($value['name'])); ?>

                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php else: ?>
                        <?php
                            $sub_menus = $value['sub_menu'];
                            $is_sub_active = false;
                            foreach($sub_menus as $sub_menu) {
                                if(menu_active($sub_menu['uri'])) {
                                    $is_sub_active = true;
                                    break;
                                }
                            }
                        ?>
                        <div class="menu-item">
                            <div class="menu-link flex-grow-1 align-items-center collapsed <?php echo e($is_sub_active ? 'text-primary' : ''); ?>" data-bs-toggle="collapse" data-bs-target="#menu-<?php echo e($key); ?>">
                                <div class="menu-icon fs-18 <?php echo e($is_sub_active ? 'text-primary' : 'text-gray-900'); ?>">
                                    <i class="<?php echo e($value["icon"]); ?>" <?php echo Core::sidebarColor(); ?>></i>
                                </div>
                                <div class="menu-title d-flex align-items-center flex-grow-1 fs-14 fw-5" <?php echo $is_sub_active ? Core::sidebarColor() : ''; ?>>
                                    <?php echo e(__($value["name"])); ?>

                                </div>
                                <div class="menu-arrow">
                                    <i class="fa-duotone fa-plus menu-item-show"></i>
                                    <i class="fa-duotone fa-minus menu-item-hide"></i>
                                </div>
                            </div>

                            <div  id="menu-<?php echo e($key); ?>" class="menu-accordion accordion-collapse collapse <?php echo e($is_sub_active ? 'show' : ''); ?>" data-bs-parent="#accordionMenu">
                                <?php $__currentLoopData = $sub_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="menu-item">
                                    <a class="menu-link <?php echo e(menu_active($sub_menu['uri']) ? 'active text-primary' : ''); ?>" href="<?php echo e(url($sub_menu['uri'])); ?>">
                                        <span class="menu-bullet"></span>
                                        <span class="menu-title d-flex align-items-center flex-grow-1 fs-13"><?php echo e(__($sub_menu['name'])); ?></span>
                                    </a>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                    <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        <?php endif; ?>

        <?php if( isset( $sidebar['bottom'] ) ): ?>
            <div class="menu-bottom d-flex flex-column flex-column-fluid w-100 mt-auto">

                <?php $__currentLoopData = $sidebar['bottom']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="menu-item">
                        <a href="<?php echo e(url( $value['uri'] )); ?>" class="menu-link flex-grow-1 align-items-center">
                            <div class="menu-icon text-gray-600 fs-18">
                                <i class="<?php echo e($value['icon']); ?>" <?php echo Core::sidebarColor(); ?>></i>
                            </div>
                            <div class="menu-title d-flex align-items-center flex-grow-1 fs-14 fw-5" <?php echo menu_active($value['uri']) ? Core::sidebarColor() : ''; ?>>
                                <?php echo e(__($value['name'])); ?>

                            </div>
                        </a>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     
                <?php $__currentLoopData = \Core::getSidebarBlocks(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sidebarItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="sidebar-blocks">
                        <?php
                            $isVisible = $sidebarItem['visible'] ?? fn() => true;
                        ?>
                        <?php if($isVisible()): ?>
                            <?php echo is_callable($sidebarItem['item']) ? $sidebarItem['item']() : $sidebarItem['item']; ?>

                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        <?php endif; ?>
    </div>

</div><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/resources/themes/app/pico/resources/views/partials/sidebar.blade.php ENDPATH**/ ?>