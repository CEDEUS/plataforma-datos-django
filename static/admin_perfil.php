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
            <li class="centros"><a href="#">QUIENES SOMOS</a></li>
            <li class="centros"><a href="#categoria">CATEGORÍAS</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right" style="text-align:center;margin-right:0px;">
            <li style="border-bottom-color:#000000;" class="centros"><a href="ide.ocuc.cl">IDEOCUC</a></li>
            <li style="border-bottom-color:#1F71b8;" class="centros"><a href="http://datos.cedeus.cl/">IDECEDEUS</a></li>
            <li style="border-bottom-color:#ff5000;" class="centros"><a href="http://ide.cigiden.cl/">IDECIGIDEN</a></li>
          </ul>
        </div><!--/.nav-collapse -->
    </nav>
</div>

  <div class="col-xs-12 col-md-12 col-lg-12 col_principal" style="background-color:#ffffff;padding-left: 15%;padding-right: 15%;padding-bottom: 2%;font-size:12px;">
    <div class="col-xs-12 col-md-12 col-lg-12" style="border-bottom-style:inset;border-bottom-color:#3ba9e0;padding-bottom:3%;padding-top:3%;">
      
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <ul class="nav navbar-nav navbar-left">
          <li><a href="/user_admin/">Privacidad</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{user.usuario}}
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


    <div class="col-xs-12 col-md-12 col-lg-12">
      {% if respuesta == 'success'%}
        <div class="alert alert-success alert-dismissable fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>¡Éxito! </strong> información modificada correctamente.
        </div>
      {% elif respuesta == 'error' %}
        <div class="alert alert-danger alert-dismissable fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>¡Error! </strong>contraseña inválida.
        </div>
      {% elif respuesta == 'error2' %}
        <div class="alert alert-danger alert-dismissable fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>¡Error! </strong>Contraseña nueva no coincide.
        </div>
      {% else %}

      {% endif %}
    <!--<div class="col-md-3">
    <img src="{% static 'images/male_user_icon.png' %}" alt="Plataforma" style="width:75%;">
    </div>-->
    <div class="col-xs-12 col-md-2 col-lg-2">
    </div>
    <div class="col-xs-12 col-md-8 col-lg-8">

        <!-- Begin # Login Form -->
        <div id="form_principal">
        <form id="principal" method="post" action="/user_admin_perfil/">
          {% csrf_token %}
          <div class="form-group">
                <p style="margin-bottom:0px;margin-top:10px;margin-left:1px;">Usuario:</p>
                   <input name="name" class="form-control" type="text" value="{{user.usuario}}" required>
                   <input name="user_sesion" class="form-control" type="hidden" value="{{user.usuario}}" required>
                <p style="margin-bottom:0px;margin-top:10px;margin-left:1px;">Correo:</p>   
                   <input name="email" class="form-control" type="text" value="{{user.correo}}" required>
                   <br>
                   <input name="password" class="form-control" type="password" placeholder="Ingrese clave para editar" required>
          </div>
                 <div>
                     <button type="submit" name="editar1" class="btn btn-primary btn-md btn-block">Editar</button>
                 </div>
        </form>
                <div>
                  <button id="cambiar_contrasena" type="button" class="btn btn-link">Cambiar contraseña</button>    
                </div>
      </div>

        <div id="form_password" style="display:none;">
        <form id="password_form" method="post" action="/user_admin_perfil/">
          {% csrf_token %}
          <div class="form-group">
                
                   <input name="password" class="form-control" type="password" placeholder="Ingrese contraseña actual" required>
                   <input name="user_sesion" class="form-control" type="hidden" value="{{user.usuario}}" required>
                   <br>
                   <input name="password1" class="form-control" type="password" placeholder="Ingrese nueva contraseña" required>
                   <br>
                   <input name="password2" class="form-control" type="password" placeholder="Repita nueva contraseña" required>
          </div>
                 <div>
                     <button type="submit" name="editar2" class="btn btn-primary btn-md btn-block">Editar</button>
                 </div>
        </form>
                <div>
                  <button id="volver_atras" type="button" class="btn btn-link">Regresar a perfil</button>    
                </div>
      </div>

    </div>
    <div class="col-xs-12 col-md-2 col-lg-2">
    </div>


    </div>

    </div>




<div class="col-md-12" style="padding-top:2%;border-top-color: #3ba9e0;">

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

<script>

$('#cambiar_contrasena').click( function () { 
  $('#form_principal').hide();
  $('#form_password').show();

});

$('#volver_atras').click( function () { 
  $('#form_principal').show();
  $('#form_password').hide();

});

</script>


</body>
</html>
{% else %}
Debe iniciar sesion para ver el contenido
{% endif %}