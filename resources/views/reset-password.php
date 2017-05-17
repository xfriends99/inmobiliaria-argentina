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
                    <div class="col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4">
                        <section class="page-title">
                            <h1>Nueva contraseña</h1>
                        </section
                        <section>
                            <form class="form inputs-underline">
                                <div class="form-group">
                                    <label for="email">Completá con tu email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                </div>
                                <div class="form-group center">
                                    <button type="submit" class="btn btn-primary width-100">Enviarme una nueva contraseña</button>
                                </div>
                            </form>

                            <hr>

                            <p class="center">Si no tenés un usuario, <a href="#">Registrate ahora</a>.</p>
                        </section>
                    </div>
                </div>
            </div>
        </div>

        <?php include_once("footer.php")?>
    </div>
    
    <?php include_once("js.php")?>

</body>

