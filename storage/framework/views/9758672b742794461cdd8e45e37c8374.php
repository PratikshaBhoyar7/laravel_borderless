<div class="bwf-header-spacer" aria-hidden="true"></div>
<section class="bwf-banner careers-banner<?php echo e(!empty($compactBanner) ? ' bwf-banner-inner' : ''); ?>">
    <div class="bwf-banner-breadcrumbs">
        <ul class="breadcrumb-list">
            <li><a href="<?php echo e(url('/')); ?>"><i class="fas fa-home"></i> Home</a></li>
            <li class="separator">/</li>
            <?php if(isset($breadcrumbParent)): ?>
                <li><a href="<?php echo e($breadcrumbParent['url']); ?>"><?php echo e($breadcrumbParent['label']); ?></a></li>
                <li class="separator">/</li>
            <?php endif; ?>
            <li><?php echo e($breadcrumbCurrent ?? 'Careers'); ?></li>
        </ul>
    </div>

    <div class="bwf-banner-content">
        <h1><?php echo e($bannerTitle ?? 'Careers at Borderless World Foundation'); ?></h1>
        <p><?php echo e($bannerDescription ?? 'Join our team and create lasting impact in healthcare, education, and community development.'); ?></p>
        <?php if(!empty($showBannerMeta) && isset($jobsCount)): ?>
            <div class="bwf-banner-meta">
                <div class="bwf-banner-meta-item">
                    <div class="meta-number"><?php echo e($jobsCount); ?></div>
                    <div class="meta-label">Open Positions</div>
                </div>
            </div>
        <?php endif; ?>
        <?php if(!empty($bannerCta)): ?>
            <div class="bwf-banner-cta">
                <?php echo $bannerCta; ?>

            </div>
        <?php endif; ?>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\Bwf-Backend\resources\views/careers/partials/banner.blade.php ENDPATH**/ ?>