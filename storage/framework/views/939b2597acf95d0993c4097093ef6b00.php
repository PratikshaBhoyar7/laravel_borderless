

<?php $__env->startSection('title', $job->title); ?>

<?php $__env->startSection('description', Str::limit(strip_tags($job->short_description), 160)); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('careers.partials.banner', [
        'compactBanner' => true,
        'bannerTitle' => $job->title,
        'bannerDescription' => Str::limit(strip_tags($job->short_description), 200),
        'breadcrumbParent' => ['url' => route('careers.index'), 'label' => 'Careers'],
        'breadcrumbCurrent' => Str::limit($job->title, 50),
    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main class="careers-main">
        <section class="job-detail-section">
            <div class="container">
                <?php if(session('success')): ?>
                    <div class="bwf-alert" style="margin-bottom: 30px;">
                        <div class="bwf-alert-inner">
                            <span><?php echo e(session('success')); ?></span>
                        </div>
                    </div>
                <?php endif; ?>

                <article class="job-card job-detail-page-card">
                    <?php if($job->image): ?>
                        <div class="job-detail-image">
                            <img src="<?php echo e($job->imageUrl()); ?>" alt="<?php echo e($job->title); ?>">
                        </div>
                    <?php endif; ?>

                    <div class="job-card-header">
                        <div class="job-title-section">
                            <h1><?php echo e($job->title); ?></h1>
                            <?php if($job->category): ?>
                                <span class="job-badge"><?php echo e($job->category->name); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="job-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <span><?php echo e($job->location); ?></span>
                        </div>
                    </div>

                    <div class="job-card-body">
                        <div class="job-details">
                            <div class="detail-item">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Posted <?php echo e($job->created_at->format('d M Y')); ?></span>
                            </div>
                            <?php if($job->category): ?>
                                <div class="detail-item">
                                    <i class="fas fa-tag"></i>
                                    <span><?php echo e($job->category->name); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if($job->short_description): ?>
                            <div class="job-summary">
                                <p><?php echo e($job->short_description); ?></p>
                            </div>
                        <?php endif; ?>

                        
                        <div class="job-description-full job-description-visible">
                            <div class="job-content-html">
                                <?php echo $job->content; ?>

                            </div>
                        </div>
                    </div>

                    <div class="job-card-footer">
                        <a href="<?php echo e(route('careers.index')); ?>" class="btn btn-outline btn-sm">Back to openings</a>
                        <a href="<?php echo e(route('careers.apply', $job)); ?>" class="btn btn-primary btn-sm">
                            Apply Now <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
            </div>
        </section>

        <?php if($relatedJobs->isNotEmpty()): ?>
            <section class="related-jobs-section">
                <div class="container">
                    <div class="section-header">
                        <h2>Related positions</h2>
                    </div>
                    <div class="jobs-grid">
                        <?php $__currentLoopData = $relatedJobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <article class="job-card">
                                <div class="job-card-header">
                                    <div class="job-title-section">
                                        <h3><a href="<?php echo e(route('careers.show', $related)); ?>"><?php echo e($related->title); ?></a></h3>
                                        <?php if($related->category): ?>
                                            <span class="job-badge"><?php echo e($related->category->name); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="job-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span><?php echo e($related->location); ?></span>
                                    </div>
                                </div>
                                <div class="job-card-body">
                                    <div class="job-summary">
                                        <p><?php echo e(Str::limit(strip_tags($related->short_description), 120)); ?></p>
                                    </div>
                                </div>
                                <div class="job-card-footer">
                                    <a href="<?php echo e(route('careers.show', $related)); ?>" class="btn btn-outline btn-sm">View Details</a>
                                    <a href="<?php echo e(route('careers.apply', $related)); ?>" class="btn btn-primary btn-sm">Apply Now</a>
                                </div>
                            </article>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.bwf', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Bwf-Backend\resources\views/careers/show.blade.php ENDPATH**/ ?>