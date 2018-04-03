<!DOCTYPE html>
<html>
<head>

  <title>PD</title>

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

  <!-- modal -->
  <link href="{% static 'css/modal.css' %}" rel="stylesheet">
  <script src="{% static 'js/modal.js' %}"></script>


<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//observatorio.cedeus.cl/analytics/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '5']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//observatorio.cedeus.cl/analytics/piwik.php?idsite=5" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->

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
  <div class="col-xs-12 col-md-12 col-lg-12" style="background-color:#ffffff;padding-left: 15%;padding-right: 15%;font-size:12px;">

<nav class="navbar navbar-default navbar-fixed-top" style="padding-left:15%;padding-right:15%;background-color:#ffffff;border-color:#ffffff;">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--<a class="navbar-brand" href="/" style="padding:0;height:50px;"><img src="{% static 'images/logos/iconos_logos-29.png' %}" alt="Plataforma" style="width:96%;"></a>-->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav" style="text-align:center;">
            {% if request.session.user_name  %}
            <li class="centros"><a href="/user_admin/">ADMIN</a></li>
            {% endif%}
            <li class="centros"><a href="#" class="" role="" data-toggle="modal" data-target="#login-modal">CONTACTO</a></li>
            <li class="centros"><a href="#categoria">CATEGORÍAS</a></li>
            <li class="centros"><a href="/quienes_somos">QUIENES SOMOS</a></li>
            <!--<li class="centros"><a href="#">QUIENES SOMOS</a></li>-->
          </ul>
          <ul class="nav navbar-nav navbar-right" style="text-align:center;margin-right:0px;">
            <li style="border-bottom-color:#000000;" class="centros"><a href="http://ideocuc.cl">IDE-OCUC</a></li>
            <li style="border-bottom-color:#1F71b8;" class="centros"><a href="http://datos.cedeus.cl/">IDE-CEDEUS</a></li>
            <li style="border-bottom-color:#ff5000;" class="centros"><a href="http://ide.cigiden.cl/">IDE-CIGIDEN</a></li>
          </ul>
        </div><!--/.nav-collapse -->
    </nav>

<!-- Modal -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" align="center">
          <img class="img-circle" id="img_logo" src="{% static 'images/logos/iconos_logos-28.png' %}">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          </button>
        </div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                
                    <!-- Begin # Login Form -->
                    <form id="login-form" method="post" action="/send_email">
                    <div class="modal-body">
                <div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg">Complete el formulario de contacto</span>
                            </div>
                <input id="name" class="form-control" type="text" placeholder="Nombre*" required>
                <input id="email" class="form-control" type="text" placeholder="Email de contacto*" required>
                <p style="margin-bottom:0px;margin-top:10px;margin-left:1px;">Motivo:</p>
                <select class="form-control" id="motivo" required>
                  <option>Consultas</option>
                  <option>Felicitaciones</option>
                  <option>Reclamos</option>
                  <option>Sugerencias</option>
                  <option>Otro</option>
                </select>
                <p style="margin-bottom:0px;margin-top:10px;margin-left:1px;">Dirigido a:</p>
                <select class="form-control" id="to" required>
                  <option>Soporte</option>
                  <option>CEDEUS</option>
                  <option>CIGIDEN</option>
                  <option>OCUC</option>
                </select>
                <input id="subject" class="form-control" type="text" placeholder="Asunto*" required>
                <p style="margin-bottom:0px;margin-top:10px;margin-left:1px;">Mensaje:</p>
                <textarea id="message" class="form-control" rows="5" required></textarea>
                  </div>
                <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>
                            </div>
                  <div>
                            </div>
                </div>
                    </form>
                    <!-- End # Login Form -->       
                </div>
                <!-- End # DIV Form -->
                
      </div>
    </div>
  </div>
<!--modal-->
</div>
  </div>


  <div class="col-xs-12 col-md-12 col-lg-12 col_principal" style="background-color:#ffffff;padding-left: 15%;padding-right: 15%;padding-bottom: 2%;font-size:12px;">

    <div class="col-xs-12 col-md-12 col-lg-12 quienes_somos" style="background-image: url('{% static 'images/fondo/fondo_home-27.png' %}');">
      <div class="col-xs-12 col-md-3 col-lg-3">
        <p style="text-align:center;">
          <img src="{% static 'images/logos/iconos_logos-28.png' %}" alt="Plataforma">
        </p>
      </div>

      <div class="col-xs-12 col-md-9 col-lg-9">
        <h2 style="font-family:'open-sans condensed bold';color:#3ba9e0;">¿Qué es Plataforma de Datos?</h2>
        <p style="font-family:'open-sans semibold';font-size:13px;">
          Plataforma de Datos es un catálogo que reúne y organiza la información geoespacial que se desarrolla y difunde a través de las Infraestructuras de Datos Espaciales de CEDEUS, OCUC y CIGIDEN.
        </p>
        <p style="font-family:'open-sans semibold';font-size:13px;">
          Su objetivo es poner a disposición de la comunidad información geoespacial de calidad que promueva y sustente los procesos de toma de decisiones a nivel público y privado, la planificación urbana y regional, el desarrollo sustentable, la gestión del riesgo de desastres de origen natural, el fortalecimiento de la resiliencia, la adaptación al cambio climático, así como cualquier otro fenómeno que tenga una expresión en el territorio.
        </p>
        
      </div>
    </div>

    <div class="col-xs-12 col-md-12 col-lg-12" style="padding-bottom: 6%;padding-top: 3%;" id="categoria">

      <div class="col-xs-12 col-md-12 col-lg-12" style="padding:0;">
      <div class="col-xs-12 col-md-1 col-lg-1">
      </div>
      <div class="col-xs-12 col-md-10 col-lg-10">  

      <div class="col-lg-3 col-md-3 col-xs-12" style="margin-top:26px;">
        <div class="buscador"><a title="Image 1" href="/buscador/"><img class="thumbnail img-responsive" src="{% static 'images/iconos300/iconos_logos-29.png' %}" style="width:100%;"></a>
        <p class="nombre_categoria_buscador">BUSCADOR</p></div>
      </div>

        {% for categoria in categorias %}

        <div class="col-lg-3 col-md-3 col-xs-12" style="margin-top:26px;">
          <div class="categorias"><a title="Image 1" href="/categoria/?cat={{categoria.nombre}}&order=titulo&fecha=-fecha"><img class="thumbnail img-responsive" src="{{categoria.imagen.url}}" style="width:100%;"></a>
          <p class="nombre_categoria">{{categoria.nombre}}</p></div>
        </div>

        {% endfor %}

      </div>
      <div class="col-md-1">
      </div>

      </div><!-- fin categorias-->

<!--
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
      </div>
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
      </div>
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
      </div>
    </div>


    <nav>
      <ul class="control-box pager" style="text-align:center;">
        <li><a data-slide="prev" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-left"></i></a></li>
        <li><a data-slide="next" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-right"></i></li>
      </ul>
    </nav>

  </div> 
 
</div> -->

</div>


<div class="col-xs-12 col-md-12 col-lg-12 footer">

  <!--<div class="col-xs-12 col-md-3 col-lg-3">
    <a href="#myTopnav"><img class="img-responsive logos" src="{% static 'images/logos/iconos_logos-21.png' %}" /></a>
  </div>-->

  <div class="col-xs-12 col-md-3 col-lg-3">
    <a href="http://www.uc.cl/"><p style="text-align:-webkit-center;"><img class="img-responsive logos" src="{% static 'images/logos/iconos_logos-22.png' %}" id="logo_uc"/></p></a>
  </div>

  <div class="col-xs-4 col-md-3 col-md-3">
    <a href="http://ocuc.cl/"><p style="text-align:-webkit-center;"><img class="img-responsive logos" src="{% static 'images/logos/iconos_logos-23.png' %}" id="logo_ocuc"/></p></a>
  </div>
  <div class="col-xs-4 col-md-3 col-md-3">
    <a href="http://www.cigiden.cl/"><p style="text-align:-webkit-center;"><img class="img-responsive logos" src="{% static 'images/logos/iconos_logos-24.png' %}" id="logo_cigiden"/></p></a>
  </div>

  <div class="col-xs-4 col-md-3 col-md-3">
    <a href="http://www.cedeus.cl/"><p style="text-align:-webkit-center;"><img class="img-responsive logos" src="{% static 'images/logos/iconos_logos-25.png' %}" id="logo_cedeus"/></p></a>
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