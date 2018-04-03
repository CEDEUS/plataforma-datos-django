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

  <!-- Login Core CSS -->
  <link href="{% static 'css/login.css' %}" rel="stylesheet">

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
            <li class="centros"><a href="#">QUIENES SOMOS</a></li>
            <li class="centros"><a href="#categoria">CATEGORÍAS</a></li>
            <li class="centros"><a href="#myModal" data-toggle="modal" data-target="#myModal">CONTACTO</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right" style="text-align:center;margin-right:0px;">
            <li style="border-bottom-color:#000000;" class="centros"><a href="ide.ocuc.cl">IDEOCUC</a></li>
            <li style="border-bottom-color:#1F71b8;" class="centros"><a href="http://datos.cedeus.cl/">IDECEDEUS</a></li>
            <li style="border-bottom-color:#ff5000;" class="centros"><a href="http://ide.cigiden.cl/">IDECIGIDEN</a></li>
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

    <div class="col-xs-12 col-md-12 col-lg-12" style="padding:0;">

          <div class="col-xs-12 col-md-4 col-lg-4">
          </div>
          <div class="col-xs-12 col-md-4 col-lg-4">
            <!--<form action="/login/" method="post">
              {% csrf_token %}
              <div class="form-login">
              <p style="text-align:center;">
                <img src="{% static 'images/logos/iconos_logos-21.png' %}" id="logo" alt="Plataforma">
              </p>
                <input type="text" name="userName" class="form-control input-sm chat-input" placeholder="Usuario" />
                </br>
                <input type="password" name="userPassword" class="form-control input-sm chat-input" placeholder="Contraseña" />
                </br>
                <div class="wrapper">
                  <button type="submit" value="Entrar"  name="submit" class="btn btn-primary">ENTRAR <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></button>
                </div>
              </div>
            </form>-->
      {% if respuesta == 'success'%}
        <div class="alert alert-success alert-dismissable fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>¡Éxito! </strong> Correo enviado con nueva clave.
        </div>
      {% elif respuesta == 'error' %}
        <div class="alert alert-danger alert-dismissable fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>¡Error! </strong>Usuario no existe.
        </div>
      {% elif respuesta == 'error2' %}
        <div class="alert alert-danger alert-dismissable fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>¡Error! </strong>Contraseña incorrecta.
        </div>
      {% elif respuesta == 'error3' %}
        <div class="alert alert-danger alert-dismissable fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>¡Error! </strong>Correo no existe, contacte soporte.
        </div>

      {% else %}

      {% endif %}


        <div id="form_principal">
        <form id="principal" method="post" action="/login/">
          {% csrf_token %}
              <div class="form-login">
              <p style="text-align:center;">
                <img src="{% static 'images/logos/iconos_logos-21.png' %}" id="logo" alt="Plataforma">
              </p>
                <input type="text" name="userName" class="form-control input-sm chat-input" placeholder="Usuario" required>
                </br>
                <input type="password" name="userPassword" class="form-control input-sm chat-input" placeholder="Contraseña" required>
                </br>
              
                 <div class="wrapper">
                  <button type="submit" value="Entrar"  name="submit" class="btn btn-primary">ENTRAR <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></button>
                  <div>
                  <button id="olvide_contrasena" type="button" class="btn btn-link">Olvidé mi contraseña</button>    
                  </div>
                 </div>
                </div>
        </form>
        </div>

        <div id="form_secundario" style="display:none;">
        <form id="secundario" method="post" action="/login/">
          {% csrf_token %}
              <div class="form-login">
              <p style="text-align:center;">
                <img src="{% static 'images/logos/iconos_logos-21.png' %}" id="logo" alt="Plataforma">
              </p>
              <p style="padding-left:1px;">Se enviará una nueva clave:</p>
                <input type="email" name="email" class="form-control input-sm chat-input" placeholder="Ingrese correo" required>
                </br>
                 <div class="wrapper">
                  <button type="submit" value="Entrar"  name="submit2" class="btn btn-primary">ENVIAR CORREO <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></button>
                  <div>
                  <button id="regresar" type="button" class="btn btn-link">Regresar, ya me acordé</button>    
                  </div>
                 </div>
                </div>
        </form>
        </div>


          </div>
          <div class="col-xs-12 col-md-4 col-lg-4">
          </div>
    </div>

<div class="col-xs-12 col-md-12 col-lg-12 footer">

  <!--<div class="col-xs-12 col-md-3 col-lg-3">
    <a href="#myTopnav"><img class="img-responsive logos" src="{% static 'images/logos/iconos_logos-21.png' %}" /></a>
  </div>-->

  <div class="col-xs-12 col-md-3 col-lg-3">
    <a href="http://www.uc.cl/"><p style="text-align:-webkit-center;"><img class="img-responsive logos" src="{% static 'images/logos/logo_uc.jpg' %}" id="logo_uc"/></p></a>
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

<script>

$('#olvide_contrasena').click( function () { 
  $('#form_principal').hide();
  $('#form_secundario').show();

});

$('#regresar').click( function () { 
  $('#form_principal').show();
  $('#form_secundario').hide();

});

</script>

</body>
</html>