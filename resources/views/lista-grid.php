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
                                    <a href="lista-grid.php" class="circle-icon active"><i class="fa fa-th"></i></a>
                                    <a href="lista-row.php" class="circle-icon"><i class="fa fa-bars"></i></a>
                                    <a href="lista-map.php" class="circle-icon hidden-xs hidden-sm"><i class="fa fa-map-marker"></i></a>
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
                            <div class="row">
                                <!--PROPIEDAD-->
                                <div class="col-md-4 col-sm-6">
                                    <div class="item" data-id="1">
                                        <a href="propiedad.php">
                                            <div class="description description-grid">
                                                <div class="label label-default">Operación</div>
                                                <div class="label label-default bg-green">Apto Crédito</div>
                                                <h3>Dueño Alquila Studio Amueblado en Complejo Art Maria</h3>
                                                <address><i class="fa fa-map-marker"></i> Dirección</address>
                                            </div>
                                            <div class="image bg-transfer">
                                                <img src="assets/img/items/2.jpg" alt="">
                                            </div>
                                        </a>
                                        <div class="additional-info">
                                            <div class="rating-passive"><span class="reviews">3 ambientes</span></div>
                                            <div class="controls-more"><a href="#">U$S 20.000</a></div>
                                        </div>
                                    </div>
                                </div>
                                <!--PROPIEDAD-->
                            </div>
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
                </div>
            </div>
        </div>

        <?php include_once("footer.php")?>
    
    </div>


    <?php include_once("js.php")?>

</body>

