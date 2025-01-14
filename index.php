<?php
include './include/function-update.php';
$pageTitle = "Home";
$SubPageTitle = "";
$SubPage = false;

// Path to your PowerPoint file
$pptxFile = './newPresentation.pptx';
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="<?= $modeTheme ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Add Icons -->
    <?php include './include/common-scripts.php' ?>

    <title><?= $pageTitle ?> | <?= $SiteTitle ?></title>
</head>

<body id="body" class="<?= $bodyColorClass ?>">
    <div class="container-fluid">
        <div class="row">
            <?php include './include/header.php' ?>

            <!-- Right Content Container -->
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4" id="site-content">
                <div class="container-fluid mt-3">
                    <!-- Breadcrumb with Icons -->
                    <?php include './include/breadcrumb.php' ?>
                </div>

                <div id="index-content"></div>
            </main>

        </div>

    </div>

    <?php include './include/footer.php' ?>
    <!-- Preloader -->
    <div id="preloader">
        <div id="filler"></div>
    </div>


    <div class="loading-popup" id="loading-popup"></div>
    <!-- Add Scripts -->

    <?php include './include/footer-scripts.php' ?>
    <script src="./assets/js/home-1.1.js"></script>
</body>

</html>