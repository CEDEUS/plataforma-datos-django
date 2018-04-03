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
            <li class="centros"><a href="/#categoria">CATEGORÍAS</a></li>
            <li class="centros"><a href="/buscador/">BUSCADOR</a></li>
            <li class="centros"><a href="/">HOME</a></li>
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
          <a href="/"><img src="{% static 'images/logos/iconos_logos-28.png' %}" alt="Plataforma"></a>
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

    <div class="col-xs-12 col-md-12 col-lg-12" style="padding-bottom: 6%;padding-top: 2%;">
      <h2 style="font-family:'open-sans condensed bold';color:#3ba9e0;text-align:center;">¿Quiénes conforman Plataforma de Datos?</h2>
        <p style="font-family:'open-sans semibold';font-size:13px;text-align:justify;">
          Motivados por el deseo de desarrollar e implementar una Infraestructura de Datos Espaciales común entre los diferentes centros de investigación, que promueva la transferencia del conocimiento científico de excelencia hacia la sociedad y los tomadores de decisiones, a través de plataformas y metodologías innovadoras que faciliten los procesos de gestión del territorio, es que nace la idea de Plataforma de Datos entre: 
        </p>

    <div class="row">
        <div class="col-md-12" style="padding-top:10px;">
            <h2 style="font-family:'open-sans condensed bold';color:#3ba9e0;">CIGIDEN</h2>
            <p style="font-family:'open-sans semibold';font-size:13px;text-align:justify;">(Centro de Investigación para la Gestión Integrada de Riesgo de Desastres) es un centro de investigación multidisciplinaria de excelencia que tiene como misión desarrollar, integrar y transferir conocimiento científico, y formar capital humano avanzado que contribuya a reducir las consecuencias sociales de los eventos naturales extremos. Su misión es orientar las discusiones y decisiones que se deben adoptar frente a los desastres, mediante evidencia científica y técnica, que ayude a implementar mejoras que aumenten la resiliencia del país.</p>
            <p style="font-family:'open-sans semibold';font-size:13px;text-align:justify;">
CIGIDEN se forma gracias a la asociación de cuatro universidades (Pontificia Universidad Católica de Chile, Universidad Nacional Andrés Bello, Universidad Técnica Federico Santa María, y Universidad Católica del Norte) que nació en respuesta al llamado realizado por el programa FONDAP de CONICYT en su cuarto concurso nacional de Centros de Investigación en Áreas Prioritarias, para abordar la investigación acerca de los desastres y sus consecuencias. 
</p>
        </div>

        <div class="col-md-12" style="padding-top:10px;">
            <h2 style="font-family:'open-sans condensed bold';color:#3ba9e0;">CEDEUS</h2>
            <p style="font-family:'open-sans semibold';font-size:13px;text-align:justify;">(Centro de Desarrollo Urbano Sustentable) es un centro de investigación interdisciplinario financiado por CONICYT a través de su programa FONDAP. Se encuentra constituido por tres instituciones: la Pontificia Universidad Católica de Chile (UC) como institución patrocinante; la Universidad de Concepción (UdeC) como institución Asociada; y como colaborador internacional, el Center for Sustainable Urban Development (CSUD) perteneciente al Earth Institute de la Universidad de Columbia, en Estados Unidos.</p>
            <p style="font-family:'open-sans semibold';font-size:13px;text-align:justify;">
CEDEUS busca ser un espacio para la generación e intercambio de conocimientos basados en investigación, orientados a mejorar la calidad de vida de los habitantes de zonas urbanas en forma equitativa y sin dañar el medio ambiente. El objetivo principal es entender las dinámicas urbanas, los instrumentos y los procesos de toma de decisiones que permiten mejoras sostenidas y equitativas en los resultados de la calidad de vida, a través del reconocimiento de los límites biofísicos y de las demandas sociales en las ciudades chilenas.
</p>
        </div>

        <div class="col-md-12" style="padding-top:10px;">
            <h2 style="font-family:'open-sans condensed bold';color:#3ba9e0;">OCUC</h2>
            <p style="font-family:'open-sans semibold';font-size:13px;text-align:justify;">(Observatorio de Ciudades UC) es un Centro de Investigación Aplicada de estudios urbanos y territoriales de la Facultad de Arquitectura, Diseño y Estudios Urbanos. A su vez el OCUC se constituye en una plataforma de colaboración institucional para el desarrollo de proyectos e investigaciones que permitan la generación e implementación de políticas públicas urbanas en el país. </p>
            <p style="font-family:'open-sans semibold';font-size:13px;text-align:justify;">
OCUC tiene como objetivo perfeccionar la gestión urbana del país a través del desarrollo de metodologías, modelos y proyectos urbanos. Esta orientación tiene como principal foco las relaciones entre las instituciones locales y sectoriales. De esta manera, se plantea como objetivo el abordaje en profundidad de algunas temáticas de la Política Nacional de Desarrollo Urbano, y en propuestas específicas que dialoguen con la implementación de ésta en el territorio.
</p>
        </div>


    </div>

      <h2 style="font-family:'open-sans condensed bold';color:#3ba9e0;text-align:center;">¿Cómo funciona Plataforma de Datos?</h2>
        <p style="font-family:'open-sans semibold';font-size:13px;text-align:justify;">
          Plataforma de Datos es un servicio de catálogo que lista los recursos disponibles dentro de CIGIDEN, CEDEUS y OCUC relativos a sus datos geoespaciales. El catálogo se actualiza diariamente con las coberturas de información que se publican en los tres Centros.
        </p>

        <p style="font-family:'open-sans semibold';font-size:13px;text-align:justify;">
          Los resultados de la búsqueda mostrarán la categoría de información a la cual pertenece, el título del recurso, el Centro del cual es proviene el dato, y un breve resume que describe a la cobertura.
        </p>

        <p style="font-family:'open-sans semibold';font-size:13px;text-align:justify;">
          Una vez seleccionado el recurso deseado, Plataforma de Datos lo redirigirá hacia la página web de la IDE origen del dato geoespacial, desde donde podrá visualizarlo, consultar sus atributos y descargarlo en diferentes formatos.
        </p>

        <p style="font-family:'open-sans semibold';font-size:13px;text-align:justify;">
          Toda la información contenida en el catálogo de Plataforma de Datos es pública, por lo tanto no es necesario registrarse ni en Plataforma de Datos, ni en las IDE’s de los Centros para acceder a la información solicitada.
        </p>

        <p style="font-family:'open-sans semibold';font-size:13px;text-align:justify;">
          Ante cualquier duda sobre los datos o la plataforma en general, puede utilizar el formulario de contacto para para comunicarse con soporte o alguno de los Centros en particular, y resolver sus requerimientos.
        </p>

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