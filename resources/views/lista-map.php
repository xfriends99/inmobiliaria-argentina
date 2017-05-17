<!DOCTYPE html>

<html lang="es">
    <head>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta property="og:title" content="">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:description" content="">
        <meta property="og:site_name" content="">
        <meta property="og:image" content="">
        <meta property="og:image:secure_url" content="">
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:width" content="200">
        <meta property="og:image:height" content="200">
        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="@">
        <meta name="twitter:title" content="">
        <meta name="twitter:description" content="">
        <meta name="twitter:image" content="">
        <meta property="twitter:account_id" content="">
        <?php include_once("head.php")?>
    </head>

    <body>
    <div class="page-wrapper">
        
        <?php include_once("header.php")?>

        <div id="page-content">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Pages</a></li>
                    <li class="active">Contact</li>
                </ol>
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <aside class="sidebar">
                            <!--FILTROS-->
                            <?php include_once("filtros.php")?>
                            <!--FILTROS-->
                        </aside>
                    </div>

                    <div class="col-md-9 col-sm-8 hidden-xs hidden-sm">
                        <div class="search-results-controls clearfix">
                            <div class="pull-right">
                                <a href="lista-grid.php" class="circle-icon"><i class="fa fa-th"></i></a>
                                <a href="lista-row.php" class="circle-icon"><i class="fa fa-bars"></i></a>
                                <a href="lista-map.php" class="circle-icon active"><i class="fa fa-map-marker"></i></a>
                            </div>
                        </div>
                        <div class="hero-section full-screen has-map has-sidebar margin-top-15px">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52563.438528227074!2d-58.45603504550885!3d-34.5734283494581!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb59c771eb933%3A0x6b3113b596d78c69!2sPalermo%2C+CABA!5e0!3m2!1ses!2sar!4v1492179657148" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php include_once("footer.php")?>
    
    </div>

    <?php include_once("js.php")?>

</body>

