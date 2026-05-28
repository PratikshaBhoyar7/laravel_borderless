<?php
    $bwfLayout = app(\App\Support\BwfLayout::class);

    $pageTitle = trim($__env->yieldContent('title'));
    $pageTitleSuffix = str_contains($pageTitle, 'Borderless World Foundation')
        ? $pageTitle
        : ($pageTitle !== '' ? $pageTitle.' | Borderless World Foundation' : 'Careers | Borderless World Foundation');

    $careersCssPath = 'assets/css/careers.css';
    $careersCssFile = public_path($careersCssPath);
    if (is_file($careersCssFile)) {
        $careersCssPath .= '?v='.filemtime($careersCssFile);
    }

    ob_start();
?>
<?php echo $__env->yieldPushContent('styles'); ?>
<style id="bwf-careers-banner-fix">
    /* Careers pages: banner must not overlap fixed header on scroll */
    :root {
        --bwf-header-offset: 115px;
    }
    @media (max-width: 768px) {
        :root {
            --bwf-header-offset: 88px;
        }
    }
    body.bwf-careers-page-body header {
        z-index: 1100 !important;
    }
    .bwf-careers-page .bwf-header-spacer {
        display: block;
        height: var(--bwf-header-offset);
        width: 100%;
        flex-shrink: 0;
        pointer-events: none;
    }
    .bwf-careers-page .bwf-banner,
    .bwf-careers-page .bwf-banner.bwf-banner-inner,
    .bwf-careers-page .bwf-banner.careers-banner {
        position: relative !important;
        z-index: 0 !important;
        margin-top: 0 !important;
        min-height: 0 !important;
        height: auto !important;
        max-height: none !important;
        background-attachment: scroll !important;
        transform: none !important;
        isolation: auto !important;
    }
    .bwf-careers-page .bwf-banner.bwf-banner-inner {
        padding: 20px 20px 32px !important;
    }
    .bwf-careers-page .bwf-banner:not(.bwf-banner-inner) {
        min-height: 280px !important;
        padding: 32px 20px 48px !important;
    }
    .bwf-careers-page .bwf-banner-content {
        padding: 0 20px !important;
    }
    .bwf-careers-page .bwf-banner h1,
    .bwf-careers-page .bwf-banner p {
        animation: none !important;
        transform: none !important;
    }
</style>
<?php
    $pageExtraHead = ob_get_clean();

    $headerHtml = $bwfLayout->renderPartial('includes/header.php', array_merge($bwfLayout->defaultVariables(), [
        'page_title' => $pageTitleSuffix,
        'page_description' => trim($__env->yieldContent('description')) ?: 'Explore career opportunities at Borderless World Foundation.',
        'css_path' => 'assets/css/style.css',
        'page_css' => $careersCssPath,
        'page_js' => null,
        'page_extra_head' => $pageExtraHead,
        'body_class' => 'bwf-careers-page-body',
    ]));

    ob_start();
?>
<?php echo $__env->yieldPushContent('scripts'); ?>
<?php
    $pageExtraScripts = ob_get_clean();

    $footerHtml = $bwfLayout->renderPartial('includes/footer.php', array_merge($bwfLayout->defaultVariables(), [
        'page_extra_scripts' => $pageExtraScripts,
    ]));
?>

<?php echo $headerHtml; ?>


<div class="bwf-careers-page">
    <?php echo $__env->yieldContent('content'); ?>
</div>

<?php echo $footerHtml; ?><?php /**PATH C:\xampp\htdocs\Bwf-Backend\resources\views/layouts/bwf.blade.php ENDPATH**/ ?>