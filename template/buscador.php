
<!DOCTYPE html>
<html>
<head>

  <title>Buscador PD</title>

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
          <li class="centros"><a href="/quienes_somos">QUIENES SOMOS</a></li>
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


<div class="modal fade" id="url-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
                    <p id="append" style="text-align:center;font-size:30px;">Será redirigido...</p>
                    <p id="contador" style="text-align:center;font-size:30px;"></p>
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

   <div class="form-group">
    <div class="col-xs-12 col-md-12 col-lg-12" style="padding-left:0px;padding-right:0px;">
     <!--<h3 style="color:#3BA9E0;font-family:'open-sans condensed bold';">Buscar:
     </h3>-->
     <div id="custom-search-input" style="margin-top:25px;">
      <div class="input-group col-xs-12 col-md-12 col-lg-12">
        <form action="/buscador/" method="GET" role="form">
          <div class="input-group">
          {% if bus == '' %}
          <input name="busqueda" type="text" class="form-control input-lg" placeholder="Ingrese búsqueda" />
          {% else %}
          <input name="busqueda" type="text" class="form-control input-lg" placeholder="{{bus}}" />
          {% endif %}               
               <!-- <span class="input-group-btn">
                    <button class="btn btn-info btn-lg" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                  </span>-->
                <span class="input-group-btn">
                <button class="btn btn-info btn-lg" type="submit" name="search">Buscar <i class="glyphicon glyphicon-search"></i></button>
          </span>
          </div>
                
              </div>
            </div>
          </div>
    </div>
</div>

<div class="col-xs-12 col-md-12 col-lg-12" style="background-color:#ffffff;padding-left: 15%;padding-right: 15%;padding-bottom: 2%;font-size:12px;">
  <div class="col-xs-12 col-md-12 col-lg-12" style="padding:0px;">
    <div class="col-xs-12 col-md-3 col-lg-3" style="margin-bottom:20px;padding:0px;">

          <div class="col-xs-12 col-md-12 col-lg-12" style="padding-left:0px;padding-right:0px;">
            <div class="col-xs-12 col-md-12 col-lg-12" style="padding-left:0px;padding-right:0px;">
             <h3 style="color:#3BA9E0;font-family:'open-sans condensed bold';margin:0;">FILTRO</h3>
             <div id="custom-search-input" style="margin-bottom:20px;">
              <div class="input-group col-xs-12 col-md-12 col-lg-12" style="padding-bottom:2%;">
                <select name="categoria" class="form-control">
                  <option value="CATEGORIA">CATEGORÍA</option>
                  <option value="Fronteras">FRONTERAS</option>
                  <option value="Salud">SALUD</option>
                  <option value="Economía">ECONOMÍA</option>
                  <option value="Elevación">ELEVACIÓN</option>
                  <option value="Medio ambiente">MEDIO AMBIENTE</option>
                  <option value="Agricultura">AGRICULTURA</option>
                  <option value="Información geocientífica">INFORMACIÓN GEOCIENTÍFICA</option>
                  <option value="Climatología">CLIMATOLOGÍA</option>
                  <option value="Imágenes satelitales">IMÁGENES SATELITALES</option>
                  <option value="Aguas terrestres">AGUAS TERRESTRES</option>
                  <option value="Inteligencia militar">INTELIGENCIA MILITAR</option>
                  <option value="Localización">LOCALIZACIÓN</option>
                  <option value="Oceanos">OCEANOS</option>
                  <option value="Biota">BIOTA</option>
                  <option value="Sociedad">SOCIEDAD</option>
                  <option value="Infraestructura">INFRAESTRUCTURA</option>
                  <option value="Transporte">TRANSPORTE</option>
                  <option value="Comunicaciones">TELECOMUNICACIONES</option>
                  <option value="Planificación catastro">PLANIFICACIÓN CATASTRO</option>
                </select>
              </div>
              <div class="input-group col-xs-12 col-md-12 col-lg-12">
                <select name="origen" class="form-control">
                  <option value="ORIGEN">ORIGEN</option>
                  <option value="CEDEUS">CEDEUS</option>
                  <option value="CIGIDEN">CIGIDEN</option>
                  <option value="OCUC">OCUC</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-md-12 col-lg-12" style="padding-right:0px;padding-left:0px;">
           <h3 style="color:#3BA9E0;font-family:'open-sans condensed bold';margin:0;">ORDEN</h3>
           <div id="custom-search-input" style="margin-bottom:20px;">
            <div class="input-group col-xs-12 col-md-12 col-lg-12" style="padding-bottom:2%;">
              <select name="orden" class="form-control">
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
        </div>
      </div>
          <button class="btn btn-info btn-lg" type="submit" name="filter" style="display:block;width:100%;">
            FILTRAR <i class="glyphicon glyphicon-search"></i>
          </button>
      </form>
     </div>
     <div class="col-xs-12 col-md-9 col-lg-9" style="padding:0px;">
     {% if content|length == 0 %}
        <div class="col-xs-12 col-md-12 col-lg-12" style="padding-bottom:10px;padding:0px;">
                <p style="font-size:13px;font-family:'open-sans semibold';text-align:center;padding-top:20px;">No hay resultados.</p>
        </div>
     {% endif %}      
       {% for item in content %}
       <div class="col-xs-12 col-md-12 col-lg-12" style="padding-bottom:10px;padding:0px;">
        <div class="col-xs-6 col-md-4 col-lg-4 search_image" style="padding:0px;">

          {%if item.categoria == "Fronteras"%}
             <img src="{% static "images/iconos100/fronteras.png" %}" alt="icono" >
             {%elif item.categoria == "Salud"%}
             <img src="{% static "images/iconos100/salud.png" %}" alt="icono" >
             {%elif item.categoria == "Economía"%}
             <img src="{% static "images/iconos100/economia.png" %}" alt="icono" >
             {%elif item.categoria == "Elevación"%}
             <img src="{% static "images/iconos100/elevacion.png" %}" alt="icono" >
             {%elif item.categoria == "Medio ambiente"%}
             <img src="{% static "images/iconos100/medio_ambiente.png" %}" alt="icono" >
             {%elif item.categoria == "Agricultura"%}
             <img src="{% static "images/iconos100/agricultura.png" %}" alt="icono" >
             {%elif item.categoria == "Información geocientífica"%}
             <img src="{% static "images/iconos100/informacion_geocientifica.png" %}" alt="icono" >
             {%elif item.categoria == "Climatología"%}
             <img src="{% static "images/iconos100/climatologia.png" %}" alt="icono" >
             {%elif item.categoria == "Imágenes satelitales"%}
             <img src="{% static "images/iconos100/imagenes_satelitales.png" %}" alt="icono" >
             {%elif item.categoria == "Inteligencia militar"%}
             <img src="{% static "images/iconos100/inteligencia_militar.png" %}" alt="icono" > 
             {%elif item.categoria == "Localización"%}
             <img src="{% static "images/iconos100/localizacion.png" %}" alt="icono" > 
             {%elif item.categoria == "Oceanos"%}
             <img src="{% static "images/iconos100/oceanos.png" %}" alt="icono" > 
             {%elif item.categoria == "Biota"%}
             <img src="{% static "images/iconos100/biota.png" %}" alt="icono" > 
             {%elif item.categoria == "Sociedad"%}
             <img src="{% static "images/iconos100/sociedad.png" %}" alt="icono" >    
             {%elif item.categoria == "Infraestructura"%}
             <img src="{% static "images/iconos100/infraestructura.png" %}" alt="icono" > 
             {%elif item.categoria == "Transporte"%}
             <img src="{% static "images/iconos100/transporte.png" %}" alt="icono" > 
             {%elif item.categoria == "Aguas terrestres"%}
             <img src="{% static "images/iconos100/aguas_terrestres.png" %}" alt="icono" > 
             {%elif item.categoria == "Telecomunicaciones"%}
             <img src="{% static "images/iconos100/telecomunicaciones.png" %}" alt="icono" > 
             {%elif item.categoria == "Planificación catastro"%}
             <img src="{% static "images/iconos100/planificacion_catastro.png" %}" alt="icono" >
             {%else%}
             <img src="{% static "images/iconos100/buscador.png" %}" alt="icono" > 

             {%endif%}

       </div>
       <div class="col-xs-12 col-md-8 col-lg-8" style="padding-top:20px;padding-left:0px;padding-right:0px;">

          {%if item.ide == "OCUC"%}
             <a href="http://ideocuc.cl/layers/{{item.workspace}}:{{item.name}}" data-toggle="modal" data-target="#url-modal" onclick="redirigiendoOcuc(this);contador=3;">
              <!--<img src="{% static 'images/rombo.png' %}" style="width: 4%;float: left;padding-right: 5px;"/>--><h4 style="font-size:18px;margin-top:0px;color:#000000;font-family:open-sans condensed bold;color:#000000;">{{item.titulo}}</h4>
             {%elif item.ide == "CEDEUS"%}
             <a href="http://datos.cedeus.cl/layers/{{item.workspace}}:{{item.name}}" data-toggle="modal" data-target="#url-modal" onclick="redirigiendoCedeus(this);contador=3;">
              <h4 style="font-size:18px;margin-top:0px;color:#000000;font-family:open-sans condensed bold;color:#000000;">{{item.titulo}}</h4>             
             {%elif item.ide == "CIGIDEN"%}
             <a href="http://ide.cigiden.cl/layers/{{item.workspace}}:{{item.name}}" data-toggle="modal" data-target="#url-modal" onclick="redirigiendoCigiden(this);contador=3;">
              <h4 style="font-size:18px;margin-top:0px;color:#000000;font-family:open-sans condensed bold;color:#000000;">{{item.titulo}}</h4>
             {%endif%}
              </a>

              <p style="font-size:13px;font-family:'open-sans semibold';">
              Capa desde 
              {%if item.ide == "CIGIDEN"%}
              <strong style="color:#ff5000;">
             {%elif item.ide == "OCUC"%}
              <strong style="color:#000000;">
             {%elif item.ide == "CEDEUS" %}
              <strong style="color:#337ab7;">
             {%endif%}
              {{item.ide}}</strong> , {{item.fecha}}</p>
              <p style="font-size:13px;font-family:'open-sans semibold';">{{item.abstract|slice:":200"}}
              {% if item.abstract|length > 200 %}
                ...
              {% endif %}
              </p>
                </div>
              </div>
              {%endfor%}

              <div class="col-xs-12 col-md-12 col-lg-12" style="text-align:center;">
              {% if categoria %}  
              {% if content.has_other_pages %}
              <ul class="pagination">
                {% if content.number == 1 %}
                <li class="disabled"><a href="?busqueda={{bus}}&categoria={{categoria}}&origen={{origen}}&orden={{orden}}&fecha={{fecha}}&page=1" style="color:rgb(119, 119, 119);"><i class="glyphicon glyphicon-fast-backward" style="font-size:12px;"></i></a></li>
                {% else %}
                <li><a href="?busqueda={{bus}}&categoria={{categoria}}&origen={{origen}}&orden={{orden}}&fecha={{fecha}}&page=1"><i class="glyphicon glyphicon-fast-backward" style="font-size:12px;"></i></a></li>
                {% endif %}
                {% if content.has_previous %}
                <li><a href="?busqueda={{bus}}&categoria={{categoria}}&origen={{origen}}&orden={{orden}}&fecha={{fecha}}&page={{ content.previous_page_number }}"><i class="glyphicon glyphicon-backward" style="font-size:12px;"></i></a></li>
                {% else %}
                <li class="disabled"><span><i class="glyphicon glyphicon-backward" style="font-size:12px;"></i></span></li>
                {% endif %}

                {% for pg in page_range %}
                {% if content.number == pg %}
                <li class="active"><span>{{ pg }} <span class="sr-only">(current)</span></span></li>
                {% else %}
                <li><a href="?busqueda={{bus}}&categoria={{categoria}}&origen={{origen}}&orden={{orden}}&fecha={{fecha}}&page={{ pg }}">{{ pg }}</a></li>
                {% endif %}
                {% endfor %}
                {% if content.has_next %}
                <li><a href="?busqueda={{bus}}&categoria={{categoria}}&origen={{origen}}&orden={{orden}}&fecha={{fecha}}&page={{ content.next_page_number }}"><i class="glyphicon glyphicon-forward" style="font-size:12px;"></i></a></li>
                {% else %}
                <li class="disabled"><span><i class="glyphicon glyphicon-forward" style="font-size:12px;"></i></span></li>
                {% endif %}
                {% if content.number == max_index %}
                <li class="disabled"><a href="?busqueda={{bus}}&categoria={{categoria}}&origen={{origen}}&orden={{orden}}&fecha={{fecha}}&page={{max_index}}" style="color:rgb(119, 119, 119);"><i class="glyphicon glyphicon-fast-forward" style="font-size:12px;"></i></a></li>
                {% else %}
                <li><a href="?busqueda={{bus}}&categoria={{categoria}}&origen={{origen}}&orden={{orden}}&fecha={{fecha}}&page={{max_index}}"><i class="glyphicon glyphicon-fast-forward" style="font-size:12px;"></i></a></li>
                {% endif %}
              </ul>
              {% endif %}
              {% else %}
              {% if content.has_other_pages %}
              <ul class="pagination">
                {% if content.number == 1 %}
                <li class="disabled"><a href="?page=1" style="color:rgb(119, 119, 119);"><i class="glyphicon glyphicon-fast-backward" style="font-size:12px;"></i></a></li>
                {% else %}
                <li><a href="?page=1"><i class="glyphicon glyphicon-fast-backward" style="font-size:12px;"></i></a></li>
                {% endif %}
                {% if content.has_previous %}
                <li><a href="?page={{ content.previous_page_number }}"><i class="glyphicon glyphicon-backward" style="font-size:12px;"></i></a></li>
                {% else %}
                <li class="disabled"><span><i class="glyphicon glyphicon-backward" style="font-size:12px;"></i></span></li>
                {% endif %}

                {% for pg in page_range %}
                {% if content.number == pg %}
                <li class="active"><span>{{ pg }} <span class="sr-only">(current)</span></span></li>
                {% else %}
                <li><a href="?page={{ pg }}">{{ pg }}</a></li>
                {% endif %}
                {% endfor %}
                {% if content.has_next %}
                <li><a href="?page={{ content.next_page_number }}"><i class="glyphicon glyphicon-forward" style="font-size:12px;"></i></a></li>
                {% else %}
                <li class="disabled"><span><i class="glyphicon glyphicon-forward" style="font-size:12px;"></i></span></li>
                {% endif %}
                {% if content.number == max_index %}
                <li class="disabled"><a href="?page={{max_index}}" style="color:rgb(119, 119, 119);"><i class="glyphicon glyphicon-fast-forward" style="font-size:12px;"></i></a></li>
                {% else %}
                <li><a href="?page={{max_index}}"><i class="glyphicon glyphicon-fast-forward" style="font-size:12px;"></i></a></li>
                {% endif %}
              </ul>
              {% endif %}
              {% endif %}
              </div>

            </div>
          </div>

          <div class="col-xs-12 col-md-12 col-lg-12 footer">


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
      var url="";

        function redirigiendoOcuc(item) {
          $("#append").html("Será redirigido a IDE-OCUC...");
          contador=0;
          url=item.href;
          revisando=setInterval(appendiendo, interval);
        }

        function redirigiendoCigiden(item) {
          $("#append").html("Será redirigido a IDE-CIGIDEN...");
          contador=0;
          url=item.href;
          revisando=setInterval(appendiendo, interval);
        }

        function redirigiendoCedeus(item) {
          $("#append").html("Será redirigido a IDE-CEDEUS...");
          contador=0;
          url=item.href;
          revisando=setInterval(appendiendo, interval);
        }


        var contador=3;

        var appendiendo = function() {

          if($('#url-modal').hasClass('in'))
          {

          $("#contador").html(contador);
          contador--;

          if (contador < 0)
          {
              clearInterval(revisando);
              contador=3;
              window.location.href = url;
           }
          
          }
        };


      var interval = 1000 * 1 * 1; // where X is your every X minutes

      
      </script>


</body>
</html>