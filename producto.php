<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
//Clases
$cod = isset($_GET["cod"]) ? $_GET["cod"] : '';
$producto = new Clases\Productos();
$producto->set("cod", $cod);
$productoData = $producto->view();
$imagenes = new Clases\Imagenes();
$filter = array("cod='" . $productoData['cod'] . "'");
$imagenes_data = $imagenes->view();
$imagenes_array = $imagenes->list($filter);
$categoria = new Clases\Categorias();
$categoria->set("cod", $productoData['categoria']);
$categoriaData = $categoria->view();
$template = new Clases\TemplateSite();
$template->set("title", TITULO . " | " . ucfirst(strip_tags($productoData['titulo'])));
$template->set("imagen", LOGO);
$template->set("favicon", LOGO);
$template->set("keywords", strip_tags($productoData['keywords']));
$template->set("description", ucfirst(substr(strip_tags($productoData['desarrollo']), 0, 160)));
$template->set("body", "header-fixed page no-sidebar header-style-2 topbar-style-1 menu-has-search");
$template->themeInit();
?>

<div id="wrapper" class="animsition">
    <div id="page" class="clearfix">


        <!-- Featured Title -->
        <div id="featured-title" class="featured-title clearfix text-center">
            <h1 style="padding-top: 60px !important;"> <?php echo $productoData['titulo']; ?></h1>
        </div>
        <!-- End Featured Title -->

        <!-- Main Content -->
        <div id="main-content" class="site-main clearfix">
            <div id="content-wrap">
                <div id="site-content" class="site-content clearfix">
                    <div id="inner-content" class="inner-content-wrap">
                        <div class="page-content">
                            <!-- PROJECT DETAIL -->
                            <div class="row-project-detail">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="themesflat-spacer clearfix" data-desktop="60" data-mobile="60" data-smobile="60"></div>
                                            <div class="detail-inner-wrap">
                                                <div class="detail-info">
                                                    <div class="content-info">
                                                        <div class="themesflat-headings style-2 clearfix">
                                                            <h2 class="heading line-height-62">Detalle del Producto</h2>
                                                            <div class="sep has-width w80 accent-bg clearfix">
                                                            </div>
                                                        </div>
                                                        <ul class="list-info has-icon icon-left">
                                                            <li><span class="text">Precio <span class="icon"><i class="fa fa-usd"></i></span></span><span class="right"><?= ucfirst($productoData["precio"]) ?></span></li>
                                                            <li><span class="text">Precio descuento <span class="icon"><i class="fa fa-tag"></i></span></span><span class="right"><a href="#"></a><a href="#"><?= ucfirst($productoData['precio_descuento']); ?></a></span></li>
                                                            <li><span class="text">Medidas <span class="icon"><i class="fa fa-search"></i></span></span><span class="right"><?= ucfirst($productoData['var2']); ?></span></li>
                                                            <li><span class="text">Material <span class="icon"><i class="fa fa-gavel "></i></span></span><span class="right"><?= ucfirst($productoData['var1']); ?></span></li>
                                                        </ul>
                                                    </div><!-- /.content-info -->

                                                    <div class="themesflat-spacer clearfix" data-desktop="46" data-mobile="35" data-smobile="35"></div>

                                                </div>
                                                <div class="detail-gallery">
                                                    <div class="themesflat-spacer clearfix" data-desktop="21" data-mobile="21" data-smobile="21"></div>
                                                    <div class="themesflat-gallery style-2 has-arrows arrow-center arrow-circle offset-v-82 has-thumb w185 clearfix" data-gap="0" data-column="1" data-column2="1" data-column3="1" data-auto="false">

                                                         <div class="owl-carousel owl-theme">
                                                             <?php for ($i = 0; $i < count($imagenes_array); $i++) { ?>
                                                            <div class="gallery-item" >

                                                                <div class="inner">
                                                                    <div class="thumb" style="background: url(<?= URL ?>/<?= $imagenes_array[$i]['ruta'] ?>)center/cover;">
                                                                        <img src="<?= URL ?>/<?= $imagenes_array[$i]['ruta'] ?>" alt="Image">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                             <?php } ?>

                                                         </div>
                                                     </div><!-- /.themesflat-cousel-box -->
                                                    <div class="themesflat-spacer clearfix" data-desktop="40" data-mobile="40" data-smobile="40"></div>     
                                                    <div class="flat-content-wrap style-3 clearfix">
                                                        <div class="sep has-width w60 accent-bg  clearfix"></div>
                                                        <p class="margin-top-28"><?= ucfirst($productoData['desarrollo']); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="themesflat-spacer clearfix" data-desktop="58" data-mobile="60" data-smobile="60"></div>
                                        </div>
                                    </div><!-- /.row -->

                                </div><!-- /.container -->
                            </div>
                            <!-- END PROJECT DETAIL -->
                        </div><!-- /.page-content -->
                                            
                    </div><!-- /#inner-content -->
                </div><!-- /#site-content -->
            </div><!-- /#content-wrap -->
        </div><!-- /#main-content -->


    </div><!-- /#page -->
</div><!-- /#wrapper -->
<?php $template->themeEnd(); ?>
