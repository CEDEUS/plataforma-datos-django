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

    <div class="col-md-12" style="border-bottom-style:inset;border-bottom-color:#3ba9e0;padding-bottom:3%;padding-top:3%;">
      
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">WebSiteName</a>
          </div>
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Page 1</a></li>
            <li><a href="#">Page 2</a></li>
            <li><a href="#">Page 3</a></li>
          </ul>
       </div>
      </nav>


    <div class="col-md-12">
    <h1>PERFIL</h1>

    <!--<div class="col-md-3">
    <img src="{% static 'images/male_user_icon.png' %}" alt="Plataforma" style="width:75%;">
    </div>-->
    <div class="col-md-12">
    <table class="table table-borderless">
    <tbody style="border-style:hidden;">
      <tr style="border-style:hidden;">
        <td><strong style="font-size:14px;">USUARIO:</strong></td>
        <td style="font-size:14px;">Ricardo Ardiles</td>
        <td><strong style="font-size:14px;">CENTRO:</strong></td>
        <td style="font-size:14px;"><strong style="color:#337ab7;">CEDEUS</strong></td>
      </tr>
      <tr style="border-style:hidden;">
        <td><strong style="font-size:14px;">CORREO:</strong></td>
        <td style="font-size:14px;">ricardo.ardilesg@gmail.com</td>
        <td><strong style="font-size:14px;">PERFIL:</strong></td>
        <td style="font-size:14px;">Administrador</td>
      </tr>
    </tbody>
  </table>
  <button type="button" class="btn btn-primary">Editar información</button>
  </div>
  <!--<button type="button" class="btn btn-primary">Editar</button>-->
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



</body>
</html>