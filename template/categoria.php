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
</head>
<body>

   <div id="wrapper">

  <div class="col-lg-12" style="background-color:#ffffff;padding-left: 15%;padding-right: 15%;font-size:12px;">

<ul class="topnav" id="myTopnav">
  <li><a class="active" href="/" style="padding:0;"><img src="{% static 'images/logos/iconos_logos-29.png' %}" alt="Plataforma" style="width:85%;"></a></li>
  <li><a href="/#">QUIENES SOMOS</a></li>
  <li><a href="/#categoria">CATEGORÍAS</a></li>
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
       <div class="form-group">
         <input type="password" class="form-control" id="telefono" placeholder="Teléfono*">
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
        <h2 style="font-family:'open-sans condensed bold';color:#3ba9e0;">{{cat}}</h2>
        <p>
          Consectetur adipiscing elit. Curabitur vel lacus vel dui interdum mollis eget et
          odio. Etiam malesuada sapien metus, pellentesque consectetur nibh dapibus
          a. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
          inceptos himenaeos. 
        </p>
      </div>
    </div>

    </div>

    <div class="col-md-12" style="background-color:#ffffff;padding-left: 15%;padding-right: 15%;padding-bottom: 2%;font-size:12px;">
      <div class="col-md-12" style="border-bottom-style:outset;border-bottom-color:#3BA9E0;padding:0px;">
      <div class="col-md-4" style="border-top-style:outset;border-top-color:#3BA9E0;">

      <form action="/categoria/" method="GET">
       <div class="form-group">
       <input type="hidden" name="cat" value="{{cat}}"/>
       <h3 style="color:#3BA9E0;font-family:'open-sans condensed bold';">ORDEN</h3>
        <div id="custom-search-input" style="margin-bottom:20px;">
            <div class="input-group col-md-12" style="padding-bottom:2%;">
                <select name="order" class="form-control">
                  <option value="titulo">ASC</option>
                  <option value="-titulo">DESC</option>
                </select>
            </div>
            <div class="input-group col-md-12">
                <select name="fecha" class="form-control">
                  <option value="fecha">MÁS ANTIGUO</option>
                  <option value="-fecha">MÁS NUEVO</option>
                </select>
            </div>
          </div>
       <h3 style="color:#3BA9E0;font-family:'open-sans condensed bold';">FILTRO</h3>
            <div class="input-group col-md-12">
                <select name="origen" class="form-control">
                  <option value="ORIGEN">ORIGEN</option>
                  <option value="CEDEUS">CEDEUS</option>
                  <option value="CIGIDEN">CIGIDEN</option>
                  <option value="OCUC">OCUC</option>
                </select>
            </div>
      <div class="col-lg-12" style="padding:0;padding-top:10px;">
      <button class="btn btn-info btn-lg" type="submit" style="display:block;width:100%;">
          BUSCAR <i class="glyphicon glyphicon-search"></i>
      </button>
      </div>
      </div>
      </form>

      </div>
      <div class="col-md-8">      

             {% for item in content %}<div class="col-md-12" style="padding-bottom:10px;"><div class="col-md-4" style="padding:0px;">

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
             {%elif item.categoria == "Información"%}
             <img src="{% static "images/iconos/iconos08_informacion.png" %}" alt="icono" style="width:100%;background-color:#EDEDED;">
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

             </div><div class="col-md-8">

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

      </div>
      </div>

        <div class="col-md-12" style="margin-top: 3%;">
        
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