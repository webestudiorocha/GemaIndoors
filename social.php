<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$imagenes = new Clases\Imagenes();
$portfolio = new Clases\Portfolio();
$novedades = new Clases\Novedades();
$sliders = new Clases\Sliders();
$contenido= new Clases\Contenidos();
$template->set("title", TITULO . " | Redes Sociales");
$template->set("description", " " . TITULO);
$template->set("keywords", "" . TITULO);
$template->set("body", "header-fixed page no-sidebar header-style-2 topbar-style-1 menu-has-search");
$enviar = new Clases\Email();
$template->themeInit();
?>
<div id="wrapper" class="animsition">
    <div id="page" class="clearfix">
        <!-- Featured Title -->
        <div id="featured-title" class="featured-title clearfix text-center">
            <h1 style="padding-top: 60px !important;">Redes Sociales</h1>
        </div>
        <!-- End Featured Title -->

        <!-- Main Content -->
        <!-- Place <div> tag where you want the feed to appear -->
        <div id="curator-feed"><a href="https://curator.io" target="_blank" class="crt-logo crt-tag">Powered by Curator.io</a></div>
        <!-- The Javascript can be moved to the end of the html page before the </body> tag -->

        <!-- The Javascript can be moved to the end of the html page before the </body> tag -->
        <script type="text/javascript">
            /* curator-feed */
            (function(){
                var i, e, d = document, s = "script";i = d.createElement("script");i.async = 1;
                i.src = "https://cdn.curator.io/published/7eed3fd1-0633-432c-a472-97fbf7cdaf8b.js";
                e = d.getElementsByTagName(s)[0];e.parentNode.insertBefore(i, e);
            })();
        </script>


    </div><!-- /#page -->
</div><!-- /#wrapper -->
<?php $template->themeEnd(); ?>

