<?php $__env->startSection('title', 'Careers'); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('careers.partials.banner', [
        'bannerTitle' => 'Careers at Borderless World Foundation',
        'bannerDescription' => 'Explore open positions and apply online. Join our team working to create lasting impact in healthcare, education, and community development.',
        'showBannerMeta' => true,
        'jobsCount' => $jobs->total(),
        'breadcrumbCurrent' => 'Careers',
    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php if(session('success')): ?>
        <div class="bwf-alert">
            <div class="bwf-alert-inner">
                <span><?php echo e(session('success')); ?></span>
                <button type="button" class="bwf-alert-close" onclick="this.closest('.bwf-alert').remove()" aria-label="Close">&times;</button>
            </div>
        </div>
    <?php endif; ?>

    <main class="careers-main">
        <section id="current-openings" class="openings-section">
            <div class="container">
                <div class="section-header">
                    <h2>Current Openings</h2>
                    <p class="section-subtitle">Explore opportunities to join our team. Click on any position to view details and apply.</p>
                </div>

                <form method="GET" action="<?php echo e(route('careers.index')); ?>" class="careers-filter-form">
                    <div class="filter-row">
                        <div class="form-group">
                            <label for="q">Search jobs</label>
                            <input type="text" name="q" id="q" value="<?php echo e(request('q')); ?>" placeholder="Job title, keyword...">
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <select name="location" id="location">
                                <option value="">All locations</option>
                                <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($loc); ?>" <?php if(request('location') === $loc): echo 'selected'; endif; ?>><?php echo e($loc); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id">
                                <option value="">All categories</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>" <?php if(request('category_id') == $category->id): echo 'selected'; endif; ?>>
                                        <?php echo e($category->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group careers-filter-actions">
                            <label>&nbsp;</label>
                            <div class="careers-filter-actions">
                                <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                <a href="<?php echo e(route('careers.index')); ?>" class="btn btn-outline btn-sm">Reset</a>
                            </div>
                        </div>
                    </div>
                </form>

                <?php if($jobs->isEmpty()): ?>
                    <div class="empty-careers">
                        <i class="fas fa-briefcase"></i>
                        <h3>No open positions right now</h3>
                        <p>Check back later for new opportunities.</p>
                    </div>
                <?php else: ?>
                    <p class="jobs-count"><?php echo e($jobs->total()); ?> position(s) available</p>
                    <div class="jobs-grid">
                        <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <article class="job-card">
                                <div class="job-card-header">
                                    <div class="job-title-section">
                                        <h3><a href="<?php echo e(route('careers.show', $job)); ?>"><?php echo e($job->title); ?></a></h3>
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
                                    <div class="job-summary">
                                        <p><?php echo e(Str::limit(strip_tags($job->short_description), 200)); ?></p>
                                    </div>
                                    <div class="job-details">
                                        <div class="detail-item">
                                            <i class="fas fa-calendar-alt"></i>
                                            <span>Posted <?php echo e($job->created_at->format('d M Y')); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="job-card-footer">
                                    <a href="<?php echo e(route('careers.show', $job)); ?>" class="btn btn-outline btn-sm">View Details</a>
                                    <a href="<?php echo e(route('careers.apply', $job)); ?>" class="btn btn-primary btn-sm">Apply Now</a>
                                </div>
                            </article>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <?php if($jobs->hasPages()): ?>
                        <div class="careers-pagination">
                            <?php echo e($jobs->links('vendor.pagination.bwf')); ?>

                        </div>
                    <?php endif; ?>

                    <div class="openings-note">
                        <i class="fas fa-info-circle"></i>
                        <p>We review every application carefully and will contact shortlisted candidates.</p>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.bwf', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Bwf-Backend\resources\views/careers/index.blade.php ENDPATH**/ ?>