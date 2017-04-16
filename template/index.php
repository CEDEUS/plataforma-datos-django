<!DOCTYPE html>
<html>
<head>

  <title>Integración IDES</title>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {% load static %}
  <!-- Bootstrap Core CSS -->
  <link href="{% static 'css/bootstrap.min.css' %}" rel="stylesheet">

  <!-- IDES Core CSS -->
  <link href="{% static 'css/ides.css' %}" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="{% static 'css/metisMenu.min.css' %}" rel="stylesheet">

  <!-- Timeline CSS -->
  <link href="{% static 'css/timeline.css' %}" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{% static 'css/sb-admin-2.css' %}" rel="stylesheet">
  <link href="{% static 'css/bootstrap-select.css' %}" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="{% static 'css/font-awesome.min.css' %}" rel="stylesheet" type="text/css">



  <link href="{% static 'css/carousel.css' %}" rel="stylesheet" type="text/css">    

  <!-- jQuery -->
  <script src="{% static 'js/jquery.min.js' %}"></script>
  <script src="{% static 'js/bootstrap-select.js' %}"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="{% static 'js/bootstrap.min.js' %}"></script>

  <!-- Metis Menu Plugin JavaScript -->
  <script src="{% static 'js/metisMenu.min.js' %}"></script>


  <script src="{% static 'js/prettify.min.js' %}"></script>
  <link rel="stylesheet" href="{% static 'css/prettify.min.css' %}">

  <link rel="stylesheet" href="{% static 'css/leaflet.css' %}" />
  <script src="{% static 'js/leaflet.js' %}"></script>
  <script src="{% static 'js/togeojson.js' %}"></script>
  <script src="{% static 'js/l.control.geosearch.js' %}"></script>
  <script src="{% static 'js/l.geosearch.provider.openstreetmap.js' %}"></script>
  <link rel="stylesheet" href="{% static 'css/l.geosearch.css' %}" />

  <script src="{% static 'js/leaflet-pip.js' %}"></script>

</head>
<body>

 <div id="wrapper">

<!--
  <div class="col-md-12" style="background-color:#ffffff;padding-left: 15%;padding-top: 2%;padding-right: 15%;border-bottom-style: inset;padding-bottom: 2%;">
    <div class="col-md-6" style="padding-left:0px;">
      <img src="../images/logos/iconos_logos-21.png" alt="Plataforma" style="float:left;padding-top:1%;">
    </div>
    <div class="col-md-6" style="padding-right:0px;">
      <img src="../images/logos/iconos_logos-22.png" alt="UC"  style="float:right;">
    </div>
  </div>
-->
  <div class="col-lg-12" style="background-color:#ffffff;padding-left: 15%;padding-right: 15%;font-size:12px;">

<ul class="topnav" id="myTopnav">
  <li><a class="active" href="/" style="padding:0;"><img src="{% static 'images/logos/iconos_logos-29.png' %}" alt="Plataforma" style="width:85%;"></a></li>
  <li><a href="#">QUIENES SOMOS</a></li>
  <li><a href="#categoria">CATEGORÍAS</a></li>
  <li><a href="#myModal" data-toggle="modal" data-target="#myModal">CONTACTO</a></li>
  <li class="icon">
    <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">☰</a>
  </li>
  <li style="border-bottom-color:#000000;" class="centros"><a href="ide.ocuc.cl">IDEOCUC</a></li>
  <li style="border-bottom-color:#1F71b8;" class="centros"><a href="http://datos.cedeus.cl/">IDECEDEUS</a></li>
  <li style="border-bottom-color:#ff5000;" class="centros"><a href="http://ide.cigiden.cl/">IDECIGIDEN</a></li>
</ul>
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">FORMULARIO DE CONTACTO</h4>
      </div>
      <div class="modal-body">
        <h3 style="color:#3BA9E0;font-family:'open-sans condensed bold';">CONTACTO</h3>
       <div class="form-group">
         <input type="text" class="form-control" id="nombre" placeholder="Nombre completo*:">
       </div>
       <div class="form-group">
         <input type="password" class="form-control" id="email" placeholder="E-mail*">
       </div>
       <div class="form-group">
         <input type="password" class="form-control" id="asunto" placeholder="Asunto*">
       </div>
  
        <h3 style="color:#3BA9E0;font-family:'open-sans condensed bold';">MENSAJE</h3>
         <div class="form-group">
           <textarea class="form-control" rows="5"></textarea>
         </div>
  
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" style="border:0;font- size:22px;color:#3BA9E0;font-family:'open-sans condensed bold';" data-dismiss="modal">CERRAR</button>
        <button type="submit" class="btn btn-default" style="border:0;font- size:22px;color:#3BA9E0;font-family:'open-sans condensed bold';">ENVIAR<i class="glyphicon   glyphicon-chevron-right"></i></button>
      </div>
    </div>
  </div>
</div>



  </div>


  <div class="col-md-12" style="background-color:#ffffff;padding-left: 15%;padding-right: 15%;padding-bottom: 2%;font-size:12px;">

    <div class="col-md-12" style="background-image: url('{% static 'images/fondo/fondo_home-27.png' %}');border-bottom-style:inset;border-bottom-color:#3ba9e0;padding-bottom:3%;">
      <div class="col-md-3">
        <img src="{% static 'images/logos/iconos_logos-28.png' %}" alt="Plataforma" style="width: 75%;padding-top:12%;">
      </div>

      <div class="col-md-9">
        <h2 style="font-family:'open-sans condensed bold';color:#3ba9e0;">QUIENES SOMOS</h2>
        <p style="font-family:'open-sans semibold';font-size:14px;">
          Plataforma de Datos es un catálogo que reúne y organiza la información geoespacial que se desarrolla y difunde a través de las Infraestructuras de Datos Espaciales de CEDEUS, OCUC y CIGIDEN.
        </p>
        <p style="font-family:'open-sans semibold';font-size:14px;">
          Su objetivo es poner a disposición de la comunidad información geoespacial de calidad que promueva y sustente los procesos de toma de decisiones a nivel público y privado, la planificación urbana y regional, el desarrollo sustentable, la gestión del riesgo de desastres de origen natural, el fortalecimiento de la resiliencia, la adaptación al cambio climático, así como cualquier otro fenómeno que tenga una expresión en el territorio.
        </p>
      </div>
    </div>

    <div class="col-md-12" style="padding-bottom: 6%;padding-top: 6%;" id="categoria">

      <div class="col-md-12" style="padding:0;">
      <div class="col-md-1">
      </div>
      <div class="col-md-10">  
      <div class="col-lg-3 col-sm-4 col-xs-6"><div class="buscador"><a title="Image 1" href="/buscador/"><img class="thumbnail img-responsive" src="{% static 'images/iconos/Icono01_buscador.png' %}" style="width:100%;"></a>
      <p style="border-top-style: outset;border-top-color: #3ba9e0;margin-top: 0px;margin-bottom: 0px;color: #3ba9e0;font-family: 'Open Sans Condensed Bold'; text-align: -webkit-center;margin-left: 15%;margin-right: 15%;">BUSCADOR</p></div></div>

      <div class="col-lg-3 col-sm-4 col-xs-6"><div class="categorias"><a title="Image 1" href="/categoria/?cat=Fronteras&order=titulo&fecha=fecha"><img class="thumbnail img-responsive" src="{% static 'images/iconos/Icono02_fronteras.png' %}" style="width:100%;"></a>
      <p style="border-top-style: outset;border-top-color: #ffffff;margin-top: 0px;margin-bottom: 0px;color: #ffffff;font-family: 'Open Sans Condensed Bold';text-align: -webkit-center;margin-left: 15%;margin-right: 15%;">FRONTERAS</p></div></div>

      <div class="col-lg-3 col-sm-4 col-xs-6"><div class="categorias"><a title="Image 1" href="/categoria/?cat=Salud&order=titulo&fecha=fecha"><img class="thumbnail img-responsive" src="{% static 'images/iconos/iconos09_salud.png' %}" style="width:100%;"></a>
      <p style="border-top-style: outset;border-top-color: #ffffff;margin-top: 0px;margin-bottom: 0px;color: #ffffff;font-family: 'Open Sans Condensed Bold';text-align: -webkit-center;margin-left: 15%;margin-right: 15%;">SALUD</p></div></div>

      <div class="col-lg-3 col-sm-4 col-xs-6"><div class="categorias"><a title="Image 1" href="/categoria/?cat=Economía&order=titulo&fecha=fecha"><img class="thumbnail img-responsive" src="{% static 'images/iconos/iconos04_economia.png' %}" style="width:100%;"></a>
      <p style="border-top-style: outset;border-top-color: #ffffff;margin-top: 0px;margin-bottom: 0px;color: #ffffff;font-family: 'Open Sans Condensed Bold';text-align: -webkit-center;margin-left: 15%;margin-right: 15%;">ECONOMÍA</p></div></div>

      <div class="col-lg-3 col-sm-4 col-xs-6"><div class="categorias"><a title="Image 1" href="/categoria/?cat=Elevación&order=titulo&fecha=fecha"><img class="thumbnail img-responsive" src="{% static 'images/iconos/iconos05_elevacion.png' %}" style="width:100%;"></a>
      <p style="border-top-style: outset;border-top-color: #ffffff;margin-top: 0px;margin-bottom: 0px;color: #ffffff;font-family: 'Open Sans Condensed Bold';text-align: -webkit-center;margin-left: 15%;margin-right: 15%;">ELEVACIÓN</p></div></div>

      <div class="col-lg-3 col-sm-4 col-xs-6"><div class="categorias"><a title="Image 1" href="/categoria/?cat=Medio%20ambiente&order=titulo&fecha=fecha"><img class="thumbnail img-responsive" src="{% static 'images/iconos/iconos06_mediambiente.png' %}" style="width:100%;"></a>
      <p style="border-top-style: outset;border-top-color: #ffffff;margin-top: 0px;margin-bottom: 0px;color: #ffffff;font-family: 'Open Sans Condensed Bold';text-align: -webkit-center;margin-left: 15%;margin-right: 15%;">MEDIO AMBIENTE</p></div></div>

      <div class="col-lg-3 col-sm-4 col-xs-6"><div class="categorias"><a title="Image 1" href="/categoria/?cat=Agricultura&order=titulo&fecha=fecha"><img class="thumbnail img-responsive" src="{% static 'images/iconos/iconos07_agri.png' %}" style="width:100%;"></a>
      <p style="border-top-style: outset;border-top-color: #ffffff;margin-top: 0px;margin-bottom: 0px;color: #ffffff;font-family: 'Open Sans Condensed Bold';text-align: -webkit-center;margin-left: 15%;margin-right: 15%;">AGRICULTURA</p></div></div>

      <div class="col-lg-3 col-sm-4 col-xs-6"><div class="categorias"><a title="Image 1" href="/categoria/?cat=Información&order=titulo&fecha=fecha"><img class="thumbnail img-responsive" src="{% static 'images/iconos/iconos08_informacion.png' %}" style="width:100%;"></a>
      <p style="border-top-style: outset;border-top-color: #ffffff;margin-top: 0px;margin-bottom: 0px;color: #ffffff;font-family: 'Open Sans Condensed Bold';text-align: -webkit-center;margin-left: 15%;margin-right: 15%;">INFORMACIÓN</p></div></div>

      <div class="col-lg-3 col-sm-4 col-xs-6"><div class="categorias"><a title="Image 1" href="/categoria/?cat=Climatología&order=titulo&fecha=fecha"><img class="thumbnail img-responsive" src="{% static 'images/iconos/iconos03_meteorolo.png' %}" style="width:100%;"></a>
      <p style="border-top-style: outset;border-top-color: #ffffff;margin-top: 0px;margin-bottom: 0px;color: #ffffff;font-family: 'Open Sans Condensed Bold';text-align: -webkit-center;margin-left: 15%;margin-right: 15%;">CLIMATOLOGÍA</p></div></div>

      <div class="col-lg-3 col-sm-4 col-xs-6"><div class="categorias"><a title="Image 1" href="/categoria/?cat=Imágenes%20satelitales&order=titulo&fecha=fecha"><img class="thumbnail img-responsive" src="{% static 'images/iconos/iconos10_imagesatelital.png' %}" style="width:100%;"></a>
      <p style="border-top-style: outset;border-top-color: #ffffff;margin-top: 0px;margin-bottom: 0px;color: #ffffff;font-family: 'Open Sans Condensed Bold';text-align: -webkit-center;margin-left: 14%;margin-right: 14%;">IMÁGENES SATELITALES</p></div></div>

      <div class="col-lg-3 col-sm-4 col-xs-6"><div class="categorias"><a title="Image 1" href="/categoria/?cat=Aguas%20terrestres&order=titulo&fecha=fecha"><img class="thumbnail img-responsive" src="{% static 'images/iconos/iconos10_imagesatelital.png' %}" style="width:100%;"></a>
      <p style="border-top-style: outset;border-top-color: #ffffff;margin-top: 0px;margin-bottom: 0px;color: #ffffff;font-family: 'Open Sans Condensed Bold';text-align: -webkit-center;margin-left: 15%;margin-right: 15%;">AGUAS TERRESTRES</p></div></div>

      <div class="col-lg-3 col-sm-4 col-xs-6"><div class="categorias"><a title="Image 1" href="/categoria/?cat=Inteligencia%20militar&order=titulo&fecha=fecha"><img class="thumbnail img-responsive" src="{% static 'images/iconos/iconos12_intmilitar.png' %}" style="width:100%;"></a>
      <p style="border-top-style: outset;border-top-color: #ffffff;margin-top: 0px;margin-bottom: 0px;color: #ffffff;font-family: 'Open Sans Condensed Bold';text-align: -webkit-center;margin-left: 15%;margin-right: 15%;">INTELIGENCIA MILITAR</p></div></div>

      <div class="col-lg-3 col-sm-4 col-xs-6"><div class="categorias"><a title="Image 1" href="/categoria/?cat=Localización&order=titulo&fecha=fecha"><img class="thumbnail img-responsive" src="{% static 'images/iconos/iconos13_localizacion.png' %}" style="width:100%;"></a>
      <p style="border-top-style: outset;border-top-color: #ffffff;margin-top: 0px;margin-bottom: 0px;color: #ffffff;font-family: 'Open Sans Condensed Bold';text-align: -webkit-center;margin-left: 15%;margin-right: 15%;">LOCALIZACIÓN</p></div></div>

      <div class="col-lg-3 col-sm-4 col-xs-6"><div class="categorias"><a title="Image 1" href="/categoria/?cat=Oceanos&order=titulo&fecha=fecha"><img class="thumbnail img-responsive" src="{% static 'images/iconos/iconos14_oceanos.png' %}" style="width:100%;"></a>
      <p style="border-top-style: outset;border-top-color: #ffffff;margin-top: 0px;margin-bottom: 0px;color: #ffffff;font-family: 'Open Sans Condensed Bold';text-align: -webkit-center;margin-left: 15%;margin-right: 15%;">OCEANOS</p></div></div>

      <div class="col-lg-3 col-sm-4 col-xs-6"><div class="categorias"><a title="Image 1" href="/categoria/?cat=Biota&order=titulo&fecha=fecha"><img class="thumbnail img-responsive" src="{% static 'images/iconos/iconos20_biota.png' %}" style="width:100%;"></a>
      <p style="border-top-style: outset;border-top-color: #ffffff;margin-top: 0px;margin-bottom: 0px;color: #ffffff;font-family: 'Open Sans Condensed Bold';text-align: -webkit-center;margin-left: 15%;margin-right: 15%;">BIOTA</p></div></div>

      <div class="col-lg-3 col-sm-4 col-xs-6"><div class="categorias"><a title="Image 1" href="/categoria/?cat=Sociedad&order=titulo&fecha=fecha"><img class="thumbnail img-responsive" src="{% static 'images/iconos/iconos16_sociedad.png' %}" style="width:100%;"></a>
      <p style="border-top-style: outset;border-top-color: #ffffff;margin-top: 0px;margin-bottom: 0px;color: #ffffff;font-family: 'Open Sans Condensed Bold';text-align: -webkit-center;margin-left: 15%;margin-right: 15%;">SOCIEDAD</p></div></div>

      <div class="col-lg-3 col-sm-4 col-xs-6"><div class="categorias"><a title="Image 1" href="/categoria/?cat=Estructura&order=titulo&fecha=fecha"><img class="thumbnail img-responsive" src="{% static 'images/iconos/iconos17_infraestructura.png' %}" style="width:100%;"></a>
      <p style="border-top-style: outset;border-top-color: #ffffff;margin-top: 0px;margin-bottom: 0px;color: #ffffff;font-family: 'Open Sans Condensed Bold';text-align: -webkit-center;margin-left: 15%;margin-right: 15%;">INFRAESTRUCTURA</p></div></div>

      <div class="col-lg-3 col-sm-4 col-xs-6"><div class="categorias"><a title="Image 1" href="/categoria/?cat=Transporte&order=titulo&fecha=fecha"><img class="thumbnail img-responsive" src="{% static 'images/iconos/iconos18_transporte.png' %}" style="width:100%;"></a>
      <p style="border-top-style: outset;border-top-color: #ffffff;margin-top: 0px;margin-bottom: 0px;color: #ffffff;font-family: 'Open Sans Condensed Bold';text-align: -webkit-center;margin-left: 15%;margin-right: 15%;">TRANSPORTE</p></div></div>

      <div class="col-lg-3 col-sm-4 col-xs-6"><div class="categorias"><a title="Image 1" href="/categoria/?cat=Telecomunicaciones&order=titulo&fecha=fecha"><img class="thumbnail img-responsive" src="{% static 'images/iconos/iconos19_telecomunicaciones.png' %}" style="width:100%;"></a>
      <p style="border-top-style: outset;border-top-color: #ffffff;margin-top: 0px;margin-bottom: 0px;color: #ffffff;font-family: 'Open Sans Condensed Bold';text-align: -webkit-center;margin-left: 15%;margin-right: 15%;">TELECOMUNICACIONES</p></div></div>

      <div class="col-lg-3 col-sm-4 col-xs-6"><div class="categorias"><a title="Image 1" href="/categoria/?cat=Planificación%20catastro&order=titulo&fecha=fecha"><img class="thumbnail img-responsive" src="{% static 'images/iconos/iconos15_planificacioncatastros.png' %}" style="width:100%;"></a>
      <p style="border-top-style: outset;border-top-color: #ffffff;margin-top: 0px;margin-bottom: 0px;color: #ffffff;font-family: 'Open Sans Condensed Bold';text-align: -webkit-center;margin-left: 10%;margin-right: 10%;">PLANIFICACIÓN CATASTRO</p></div></div>
      </div>
      <div class="col-md-1">
      </div>

      </div><!-- fin categorias-->


<div class="col-lg-12" >
  <div class="carousel slide" id="myCarousel">
    <div class="carousel-inner" style="width:96%;">
      <div class="item active">
        <ul class="thumbnails">
          <li class="col-sm-4">
            <div class="fff">
              <div class="thumbnail">
                <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
              </div>
              <div class="caption">
                <h4 style="font-weight:bold;">Loremp Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.</h4>
                <p>fuente: <strong style="color:#ff5000;">CIGIDEN</strong></p>
              </div>
            </div>
          </li>
          <li class="col-sm-4">
            <div class="fff">
              <div class="thumbnail">
                <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
              </div>
              <div class="caption">
                <h4 style="font-weight:bold;">Loremp Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.</h4>
                <p>fuente: <strong style="color:#1F71b8;">CEDEUS</strong></p>
              </div>
            </div>
          </li>
          <li class="col-sm-4">
            <div class="fff">
              <div class="thumbnail">
                <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
              </div>
              <div class="caption">
                <h4 style="font-weight:bold;">Loremp Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.</h4>
                <p>fuente: <strong style="color:#000000;">OCUC</strong></p>
              </div>
            </div>
          </li>
        </ul>
      </div><!-- /Slide1 --> 
      <div class="item">
        <ul class="thumbnails">
          <li class="col-sm-4">
            <div class="fff">
              <div class="thumbnail">
                <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
              </div>
              <div class="caption">
                <h4 style="font-weight:bold;">Loremp Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.</h4>
                <p>fuente: <strong style="color:#ff5000;">CIGIDEN</strong></p>
              </div>
            </div>
          </li>
          <li class="col-sm-4">
            <div class="fff">
              <div class="thumbnail">
                <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
              </div>
              <div class="caption">
                <h4 style="font-weight:bold;">Loremp Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.</h4>
                <p>fuente: <strong style="color:#1F71b8;">CEDEUS</strong></p>
              </div>
            </div>
          </li>
          <li class="col-sm-4">
            <div class="fff">
              <div class="thumbnail">
                <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
              </div>
              <div class="caption">
                <h4 style="font-weight:bold;">Loremp Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.</h4>
                <p>fuente: <strong style="color:#000000;">OCUC</strong></p>
              </div>
            </div>
          </li>
        </ul>
      </div><!-- /Slide2 --> 
      <div class="item">
        <ul class="thumbnails">
          <li class="col-sm-4">
            <div class="fff">
              <div class="thumbnail">
                <a href="#"><img src="../images/img_360_240.png" alt=""></a>
              </div>
              <div class="caption">
                <h4 style="font-weight:bold;">Loremp Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.</h4>
                <p>fuente: <strong style="color:#ff5000;">CIGIDEN</strong></p>
              </div>
            </div>
          </li>
          <li class="col-sm-4">
            <div class="fff">
              <div class="thumbnail">
                <a href="#"><img src="../images/img_360_240.png" alt=""></a>
              </div>
              <div class="caption">
                <h4 style="font-weight:bold;">Loremp Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.</h4>
                <p>fuente: <strong style="color:#1F71b8;">CEDEUS</strong></p>
              </div>
            </div>
          </li>
          <li class="col-sm-4">
            <div class="fff">
              <div class="thumbnail">
                <a href="#"><img src="../images/img_360_240.png" alt=""></a>
              </div>
              <div class="caption">
                <h4 style="font-weight:bold;">Loremp Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.</h4>
                <p>fuente: <strong style="color:#000000;">OCUC</strong></p>
              </div>
            </div>
          </li>
        </ul>
      </div><!-- /Slide3 --> 
    </div>

<!--
    <nav>
      <ul class="control-box pager" style="text-align:center;">
        <li><a data-slide="prev" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-left"></i></a></li>
        <li><a data-slide="next" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-right"></i></li>
      </ul>
    </nav>-->
    <!-- /.control-box -->   
  </div><!-- /#myCarousel -->
</div>


</div>


<div class="col-md-12" style="border-top-style:outset;padding-top:2%;border-top-color: #3ba9e0;">

  <div class="col-md-3">
    <a href="#myTopnav"><img class="img-responsive logos" src="{% static 'images/logos/iconos_logos-21.png' %}" /></a>
  </div>

  <div class="col-md-1">
    <a href="http://www.uc.cl/"><img class="img-responsive logos" src="{% static 'images/logos/iconos_logos-22.png' %}" /></a>
  </div>

  <div class="col-md-3">
    <a href="http://ocuc.cl/"><img class="img-responsive logos" src="{% static 'images/logos/iconos_logos-23.png' %}" /></a>
  </div>
  <div class="col-md-3">
    <a href="http://www.cigiden.cl/"><img class="img-responsive logos" src="{% static 'images/logos/iconos_logos-24.png' %}" /></a>
  </div>

  <div class="col-md-2">
    <a href="http://www.cedeus.cl/"><img class="img-responsive logos" src="{% static 'images/logos/iconos_logos-25.png' %}" /></a>
  </div>

</div>





</div>


<!--wrapper-->
</div>


<script>
$(function() {
  $('a[href=categoria]').on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top}, 500, 'linear');
  });
});
</script>



</body>
</html>