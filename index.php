<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css<?php echo '?' . date("YmdHis") ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Diphylleia&display=swap" rel="stylesheet">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".btnNav").hover(function(){
                $(this).find(".btn1").addClass("hidden");
                $(this).find(".btn2").addClass("hidden2");
            }, function(){
                $(this).find(".btn1").removeClass("hidden");
                $(this).find(".btn2").removeClass("hidden2");
            });

            $('.sandwich').click(function() {
                $(this).toggleClass('active');
            });
        });
    </script>
    <title>Diego Sánchez - Portfolio</title>
</head>
<body>
    <div id="pagina">
        <nav id="navegador">
            <div id="brandNav">
                <h1><span id="nombre1">Diego  </span><span id="nombre2">Sánchez</span></h1>
            </div>
            <div id="menuNav">
                <div class="btnNav btnNav1">
                    <div class="btn1">Inicio</div>
                    <div class="btn2">Inicio</div>
                </div>
                
                <div class="btnNav btnNav2">
                    <div class="btn1">Proyectos</div>
                    <div class="btn2">Proyectos</div>
                </div>
                
                <div class="btnNav btnNav3">
                    <div class="btn1">Contacto</div>
                    <div class="btn2">Contacto</div>
                </div>
                
                <div class="btnNav btnNav4">
                    <div class="btn1">Light version</div>
                    <div class="btn2">Light version</div>
                </div>
            </div>
            <div id="menuToggle">
                <div class="sandwich">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </nav> 
    </div>

</body>
</html>