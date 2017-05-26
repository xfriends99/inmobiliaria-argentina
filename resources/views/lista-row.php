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

                    <div class="col-md-9 col-sm-8">
                        <section class="page-title">
                            <h1>XXXX resultados</h1>
                        </section>

                        <section>
                            <div class="search-results-controls clearfix">
                                <div class="pull-left">
                                    <a href="lista-grid.php" class="circle-icon"><i class="fa fa-th"></i></a>
                                    <a href="lista-row.php" class="circle-icon active"><i class="fa fa-bars"></i></a>
                                    <a href="lista-map.php" class="circle-icon hidden-sm hidden-xs"><i class="fa fa-map-marker"></i></a>
                                </div>

                                <div class="pull-right">
                                    <div class="input-group inputs-underline min-width-150px">
                                        <select class="form-control selectpicker" name="sort">
                                            <option value="">Ordernar por</option>
                                            <option value="1">Menor precio</option>
                                            <option value="2">Mayor precio</option>
                                            <option value="3">Más recientes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section>
                            <!--PROPIEDAD-->
                            <div class="item item-row" data-id="1" data-latitude="40.72807182" data-longitude="-73.85735035">
                                <a href="propiedad.php">
                                    <div class="image bg-transfer">
                                        <figure>3 ambientes</figure>
                                        <img src="assets/img/items/1.jpg" alt="">
                                    </div>
                                    <div class="map hidden-xs hidden-sm"></div>
                                    <div class="description description-row">
                                        <div class="label label-default">Tipo de Operación</div>
                                        <div class="label label-default bg-green text-white">Apto Crédito</div>
                                        <h3>Nombre de la propiedad</h3>
                                        <address class="hidden-sm"><i class="fa fa-map-marker"></i> Dirección</address>
                                        <p class="hidden-xs hidden-sm">Descripción description description-row description description-row description description-row description description-row</p>
                                    </div>
                                </a>
                                <div class="controls-more-inmo">
                                    <div class="element"><img src="http://www.redplataforma.com.ar/img/logo-light.png" alt=""></div>                                
                                </div>
                                <div class="controls-more-pricing">
                                    <h6>U$S 1.220.000</h6>                                
                                </div>
                            </div>
                            <!--PROPIEDAD-->
                        </section>

                        <section>
                            <div class="center">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li class="disabled previous">
                                            <a href="#" aria-label="Previous">
                                                <i class="arrow_left"></i>
                                            </a>
                                        </li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li class="active"><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li class="next">
                                            <a href="#" aria-label="Next">
                                                <i class="arrow_right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </section>
                    </div>
                    <!--end col-md-9-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </div>
        
        <?php include_once("footer.php")?>

    </div>

    <?php include_once("js.php")?>

</body>

