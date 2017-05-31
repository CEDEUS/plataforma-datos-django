<!DOCTYPE html>
<html>
<head>
    
    <title>Categorias</title>

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
  <script src="{% static 'js/jquery.twbsPagination.js' %}"></script>

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

  <div class="col-xs-12 col-md-12 col-lg-12" style="background-color:#ffffff;padding-left: 15%;padding-right: 15%;font-size:12px;">

<nav class="navbar navbar-default navbar-fixed-top" style="padding-left:15%;padding-right:15%;background-color:#ffffff;border-color:#ffffff;">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/" style="padding:0;height:50px;"><img src="{% static 'images/logos/iconos_logos-29.png' %}" alt="Plataforma" style="width:96%;"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav" style="text-align:center;">
            {% if request.session.user_name  %}
            <li class="centros"><a href="/user_admin/">ADMIN</a></li>
            {% endif%}
            <li class="centros"><a href="#" class="" role="" data-toggle="modal" data-target="#login-modal">CONTACTO</a></li>
            <li class="centros"><a href="/#categoria">CATEGORÍAS</a></li>
            <li class="centros"><a href="/buscador/">BUSCADOR</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right" style="text-align:center;margin-right:0px;">
            <li style="border-bottom-color:#000000;" class="centros"><a href="http://ide.ocuc.cl">IDE-OCUC</a></li>
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
          <img class="img-circle" id="img_logo" src="{% static 'images/logos/iconos_logos-29.png' %}">
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

  <div class="col-xs-12 col-md-12 col-lg-12 col_principal" style="background-color:#ffffff;padding-left: 15%;padding-right: 15%;padding-bottom: 2%;font-size:12px;">

    <div class="col-xs-12 col-md-12 col-lg-12" style="background-image: url('{% static 'images/fondo/fondo_home-27.png' %}');border-bottom-style:inset;border-bottom-color:#3ba9e0;padding-bottom:3%;">
      <div class="col-xs-6 col-md-3 col-lg-3">
        <img src="{% static 'images/logos/iconos_logos-28.png' %}" alt="Plataforma" style="width: 75%;padding-top:12%;">
      </div>

      <div class="col-xs-6 col-md-9 col-lg-9">
        <h2 style="font-family:'open-sans condensed bold';color:#3ba9e0;">{{cat}}</h2>
        <p style="font-size:18px;text-align:justify;">
          {{descripcion}}
        </p>
      </div>
    </div>

    </div>

    <div class="col-xs-12 col-md-12 col-lg-12" style="background-color:#ffffff;padding-left: 15%;padding-right: 15%;padding-bottom: 2%;font-size:12px;">
      <div class="col-xs-12 col-md-12 col-lg-12" style="border-bottom-style:outset;border-bottom-color:#3BA9E0;padding:0px;">
      <div class="col-xs-12 col-md-4 col-lg-4" style="border-top-style:outset;border-top-color:#3BA9E0;padding-bottom:2%;">

      <form action="/categoria/" method="GET">
       <div class="form-group">
       <input type="hidden" name="cat" value="{{cat}}"/>
       <h3 style="color:#3BA9E0;font-family:'open-sans condensed bold';">ORDEN</h3>
        <div id="custom-search-input" style="margin-bottom:20px;">
            <div class="input-group col-xs-12 col-md-12 col-lg-12" style="padding-bottom:2%;">
                <select name="order" class="form-control">
                  <option value="titulo">ASCENDENTE</option>
                  <option value="-titulo">DESCENDENTE</option>
                </select>
            </div>
            <div class="input-group col-xs-12 col-md-12 col-lg-12">
                <select name="fecha" class="form-control">
                  <option value="-fecha">MÁS RECIENTE</option>
                  <option value="fecha">MÁS ANTIGUO</option>
                </select>
            </div>
          </div>
       <h3 style="color:#3BA9E0;font-family:'open-sans condensed bold';">FILTRO</h3>
            <div class="input-group col-xs-12 col-md-12 col-lg-12">
                <select name="origen" class="form-control">
                  <option value="ORIGEN">ORIGEN</option>
                  <option value="CEDEUS">CEDEUS</option>
                  <option value="CIGIDEN">CIGIDEN</option>
                  <option value="OCUC">OCUC</option>
                </select>
            </div>
      <div class="col-xs-12 col-md-12 col-lg-12" style="padding:0;padding-top:10px;">
      <button class="btn btn-info btn-lg" type="submit" style="display:block;width:100%;">
          APLICAR <i class="glyphicon glyphicon-search"></i>
      </button>
      </div>
      </div>
      </form>

      </div>
      <div class="col-xs-12 col-md-8 col-lg-8">      

             {% for item in content %}
             <div class="col-xs-12 col-md-12 col-lg-12" style="padding-bottom:10px;">
             <div class="col-xs-6 col-md-4 col-lg-4" style="padding:0px;">

             {%if item.categoria == "Fronteras"%}
             <img src="{% static "images/iconos/Icono02_fronteras.png" %}" alt="icono" style="width:100%;background-color:#EDEDED;">
             {%elif item.categoria == "Salud"%}
             <img src="{% static "images/iconos/iconos09_salud.png" %}" alt="icono" style="width:100%;background-color:#EDEDED;">
             {%elif item.categoria == "Economia"%}
             <img src="{% static "images/iconos/iconos04_economia.png" %}" alt="icono" style="width:100%;background-color:#EDEDED;">
             {%elif item.categoria == "Elevación"%}
             <img src="{% static "images/iconos/iconos05_elevacion.png" %}" alt="icono" style="width:100%;background-color:#EDEDED;">
             {%elif item.categoria == "Medio ambiente"%}
             <img src="{% static "images/iconos/iconos06_mediambiente.png" %}" alt="icono" style="width:100%;background-color:#EDEDED;">
             {%elif item.categoria == "Agricultura"%}
             <img src="{% static "images/iconos/iconos07_agri.png" %}" alt="icono" style="width:100%;background-color:#EDEDED;">
             {%elif item.categoria == "Información geocientífica"%}
             <img src="{% static "images/iconos/iconos_logos-36.png" %}" alt="icono" style="width:100%;background-color:#EDEDED;">
             {%elif item.categoria == "Climatología"%}
             <img src="{% static "images/iconos/iconos03_meteorolo.png" %}" alt="icono" style="width:100%;background-color:#EDEDED;">
             {%elif item.categoria == "Imágenes satelitales"%}
             <img src="{% static "images/iconos/iconos10_imagesatelital.png" %}" alt="icono" style="width:100%;background-color:#EDEDED;">
             {%elif item.categoria == "Imágenes satelitales"%}
             <img src="{% static "images/iconos/iconos10_imagesatelital.png" %}" alt="icono" style="width:100%;background-color:#EDEDED;">
             {%elif item.categoria == "Inteligencia militar"%}
             <img src="{% static "images/iconos/iconos12_intmilitar.png" %}" alt="icono" style="width:100%;background-color:#EDEDED;">             
             {%elif item.categoria == "Localización"%}
             <img src="{% static "images/iconos/iconos13_localizacion.png" %}" alt="icono" style="width:100%;background-color:#EDEDED;"> 
             {%elif item.categoria == "Oceanos"%}
             <img src="{% static "images/iconos/iconos14_oceanos.png" %}" alt="icono" style="width:100%;background-color:#EDEDED;"> 
             {%elif item.categoria == "Biota"%}
             <img src="{% static "images/iconos/iconos20_biota.png" %}" alt="icono" style="width:100%;background-color:#EDEDED;"> 
             {%elif item.categoria == "Sociedad"%}
             <img src="{% static "images/iconos/iconos16_sociedad.png" %}" alt="icono" style="width:100%;background-color:#EDEDED;">    
             {%elif item.categoria == "Infraestructura"%}
             <img src="{% static "images/iconos/iconos17_infraestructura.png" %}" alt="icono" style="width:100%;background-color:#EDEDED;"> 
             {%elif item.categoria == "Transporte"%}
             <img src="{% static "images/iconos/iconos18_transporte.png" %}" alt="icono" style="width:100%;background-color:#EDEDED;"> 
             {%elif item.categoria == "Telecomunicaciones"%}
             <img src="{% static "images/iconos/iconos19_telecomunicaciones.png" %}" alt="icono" style="width:100%;background-color:#EDEDED;"> 
             {%elif item.categoria == "Planificación catastro"%}
             <img src="{% static "images/iconos/iconos15_planificacioncatastros.png" %}" alt="icono" style="width:100%;background-color:#EDEDED;"> 
             {%else%}
             <img src="{% static "images/iconos/Icono01_buscador.png" %}" alt="icono" style="width:100%;background-color:#EDEDED;"> 

             {%endif%}

             </div>
             <div class="col-xs-6 col-md-8 col-lg-8">

             {%if item.ide == "OCUC"%}
             <a href="http://ide.ocuc.cl/layers/{{item.workspace}}:{{item.name}}">
             {%elif item.ide == "CEDEUS"%}
             <a href="http://datos.cedeus.cl/layers/{{item.workspace}}:{{item.name}}">             
             {%elif item.ide == "CIGIDEN"%}
             <a href="http://ide.cigiden.cl/layers/{{item.workspace}}:{{item.name}}">
             {%endif%}

              <h4 style="margin-top:0px;color:#000000;font-family:open-sans condensed bold;">{{item.titulo}}</h4></a><p>Fuente: 
             {%if item.ide == "CIGIDEN"%}
              <strong style="color:#ff5000;">
             {%elif item.ide == "OCUC"%}
              <strong style="color:#000000;">
             {%elif item.ide == "CEDEUS" %}
              <strong style="color:#337ab7;">
             {%endif%}
             {{item.ide}}</strong><br>Categoría: <strong>{{item.categoria}}</strong><br>Descripción:<br>{{item.abstract}}<br>Fecha:{{item.fecha}}</p></div></div>{%endfor%}


{% if content.has_other_pages %}
                <ul class="pagination">
                  {% if content.number == 1 %}
                  <li class="disabled"><a href="?/categoria/?cat={{cat}}&order={{order}}&fecha={{fecha}}&origen={{origen}}&page=1" style="color:rgb(119, 119, 119);"><i class="glyphicon glyphicon-fast-backward" style="font-size:17px;"></i></a></li>
                  {% else %}
                    <li><a href="/categoria/?cat={{cat}}&order={{order}}&fecha={{fecha}}&origen={{origen}}&page=1"><i class="glyphicon glyphicon-fast-backward" style="font-size:17px;"></i></a></li>
                  {% endif %}
                  {% if content.has_previous %}
                    <li><a href="/categoria/?cat={{cat}}&order={{order}}&fecha={{fecha}}&origen={{origen}}&page={{ content.previous_page_number }}"><i class="glyphicon glyphicon-backward" style="font-size:17px;"></i></a></li>
                  {% else %}
                    <li class="disabled"><span><i class="glyphicon glyphicon-backward" style="font-size:17px;"></i></span></li>
                  {% endif %}
              
                  {% for pg in page_range %}
                    {% if content.number == pg %}
                      <li class="active"><span>{{ pg }} <span class="sr-only">(current)</span></span></li>
                    {% else %}
                      <li><a href="/categoria/?cat={{cat}}&order={{order}}&fecha={{fecha}}&origen={{origen}}&page={{ pg }}">{{ pg }}</a></li>
                    {% endif %}
                  {% endfor %}
                  {% if content.has_next %}
                    <li><a href="/categoria/?cat={{cat}}&order={{order}}&fecha={{fecha}}&origen={{origen}}&page={{ content.next_page_number }}"><i class="glyphicon glyphicon-forward" style="font-size:17px;"></i></a></li>
                  {% else %}
                    <li class="disabled"><span><i class="glyphicon glyphicon-forward" style="font-size:17px;"></i></span></li>
                  {% endif %}
                  {% if content.number == max_index %}
                  <li class="disabled"><a href="/categoria/?cat={{cat}}&order={{order}}&fecha={{fecha}}&origen={{origen}}&page={{max_index}}" style="color:rgb(119, 119, 119);"><i class="glyphicon glyphicon-fast-forward" style="font-size:17px;"></i></a></li>
                  {% else %}
                    <li><a href="/categoria/?cat={{cat}}&order={{order}}&fecha={{fecha}}&origen={{origen}}&page={{max_index}}"><i class="glyphicon glyphicon-fast-forward" style="font-size:17px;"></i></a></li>
                  {% endif %}
                </ul>
{% endif %}


      </div>
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

</div>


<script type="text/javascript">
var a=$('#oculto').html();

var cont=1;
    $('.sync-pagination').twbsPagination({
        totalPages: 2,
        onPageClick: function (evt, page) {
            $('#con').html(a);
            cont++;
        }
    });
</script>




</body>
</html>