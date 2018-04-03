{% if request.session.user_name  %}
<!DOCTYPE html>
<html>
<head>

  <title>Admin</title>

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
            <li class="centros"><a href="/buscador/">BUSCADOR</a></li>
            <li class="centros"><a href="/#categoria">CATEGORÍAS</a></li>
            <li class="centros"><a href="#myModal" data-toggle="modal" data-target="#myModal">CONTACTO</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right" style="text-align:center;margin-right:0px;">
            <li style="border-bottom-color:#000000;" class="centros"><a href="http://ideocuc.cl">IDE-OCUC</a></li>
            <li style="border-bottom-color:#1F71b8;" class="centros"><a href="http://datos.cedeus.cl/">IDE-CEDEUS</a></li>
            <li style="border-bottom-color:#ff5000;" class="centros"><a href="http://ide.cigiden.cl/">IDE-CIGIDEN</a></li>
          </ul>
        </div><!--/.nav-collapse -->
    </nav>

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


<div class="col-xs-12 col-md-12 col-lg-12" style="background-color:#ffffff;padding-left: 15%;padding-right: 15%;padding-bottom: 2%;font-size:12px;">

  <div class="col-xs-12 col-md-12 col-lg-12" style="border-bottom-style:inset;border-bottom-color:#3ba9e0;padding-bottom:3%;padding-top:8%;">

    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <ul class="nav navbar-nav navbar-left">
          <li><a href="/user_admin/">Privacidad</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{sesion}}
              <span class="caret"></span></a>
              <ul class="dropdown-menu" style="left:0;">
                <li>
                   <form action="/user_admin_perfil/" method="post" style="text-align:center;">
                     {% csrf_token %}
                     <input type="hidden" name="user" value="{{sesion}}">
                      <button class="btn btn-default btn-xs" type="submit" name="editar" style="display:block;width:100%;border-radius:0px;border-color:#ffffff;">Editar perfil
                  </form>
                </li>
                <li>
                   <form action="/" method="post" style="text-align:center;">
                     {% csrf_token %}
                     <input type="hidden" name="cerrar" value="cerrar">
                      <button class="btn btn-default btn-xs" type="submit" name="submit" style="display:block;width:100%;border-radius:0px;border-color:#ffffff;">Cerrar Sesión
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
      <div class="col-xs-12 col-md-12 col-lg-12" style="padding:0;">

      <!--<form action="/user_admin/" method="post">
        {% csrf_token %}
        {{ form }}
      <input type="submit" value="Submit" />
    </form>-->
    <p>
      <strong>Total capas {{centro}}</strong>:{{t_centro}}
    </p>

    <form action="/user_admin/" method="post" style="text-align:center;">
      {% csrf_token %}
      <div class="input-group">
        <input name="find" type="text" class="form-control input-lg" placeholder="Filtrar capa..." />
        <span class="input-group-btn">
        <button class="btn btn-info btn-lg" type="submit" name="search" style="display:block;width:100%;">
          BUSCAR <i class="glyphicon glyphicon-search"></i>
        </button>
        </span>
      </div>
    </form>

  <table class="table table-bordered table-responsive">
    <thead >
      <tr>
        <th style="font-size:14px;text-align:center;" width="20%">NOMBRE</th>
        <th style="font-size:14px;text-align:center;">PRIVACIDAD</th>
        <th style="font-size:14px;text-align:center;">EDITAR</th>
      </tr>
    </thead>
    <tbody >
      {% for item in content %}
      <tr>
        <td width="30%">
          
          {%if item.ide == "OCUC"%}
             <a href="http://ideocuc.cl/layers/{{item.workspace}}:{{item.name}}">
             {%elif item.ide == "CEDEUS"%}
             <a href="http://datos.cedeus.cl/layers/{{item.workspace}}:{{item.name}}">             
             {%elif item.ide == "CIGIDEN"%}
             <a href="http://ide.cigiden.cl/layers/{{item.workspace}}:{{item.name}}">
             {%endif%}
           {{item.name}}</a>
        </td>
        {%if item.privacidad == "privado"%}
        <td width="10%" style="background-color: rgb(219, 137, 137); vertical-align: middle; text-align: center;">Privado</td>
        {%elif item.privacidad == "publico"%}        
        <td width="10%" style="background-color: rgb(110, 218, 94); vertical-align: middle; text-align: center;">Público</td>
        {%else%}
        <td width="10%" style="background-color: rgb(94, 165, 218); vertical-align: middle; text-align: center;">Oculto</td>
        {%endif%}

        <td width="60%">
          <form action="/user_admin/" method="post" style="text-align:center;">
            {% csrf_token %}
            <input type="hidden" name="nombre" value="{{item.name}}">
            <label class="radio-inline" style="width:25%;">
              <input type="radio" name="privacidad" value="publico">Público
            </label>
            <label class="radio-inline" style="width:25%;">
             <input type="radio" name="privacidad" value="privado">Privado
           </label>
           <!--<label class="radio-inline" style="width:25%;">
            <input type="radio" name="privacidad" value="oculto">Oculto
          </label>-->
          <button type="submit" value="Submit"  name="change" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
        </form>
      </td>
    </tr>
    {% endfor %}
  </tbody>
</table>

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
{% else %}
Debe iniciar sesion para ver el contenido
{% endif %}