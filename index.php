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
    <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
    <script>
        $(document).ready(function(){
            //Control del color de la pantalla
            let color = 0;

            //Control del click en la pantalla para el cambio de cortin
            function cambiarCortina() {
                if (interval) {
                // Si hay un intervalo en ejecución, revertir el efecto
                revertirEfectoCortina();
                clearInterval(interval); // Limpiar el intervalo actual
                interval = null; // Restablecer la variable del intervalo
                } else {
                // Si no hay intervalo en ejecución, iniciar el efecto
                interval = iniciarEfectoCortina();
                }
            };

            cambiarCortina();
            $("#bloque_cortina").hide();

            $(".btnNav").click(function(){
                $("#bloque_cortina").show();
                cambiarCortina();
                setTimeout(function() {
                    cambiarCortina();
                }, 500);
                setTimeout(function() {
                    $("#bloque_cortina").hide();
                }, 2000); // Ajusta el tiempo según la duración del efecto de la cortina
            });

            $(".btnNav").hover(function(){
                $(this).find(".btn1").addClass("hidden");
                $(this).find(".btn2").addClass("hidden2");
            }, function(){
                $(this).find(".btn1").removeClass("hidden");
                $(this).find(".btn2").removeClass("hidden2");
            });

            $('.sandwich').click(function() {
                $(this).toggleClass('active');
                $("#menuDesplegable").slideToggle();
                $("#navegador").toggleClass('fondoNegro');
            });
        });
    </script>
    <title>Diego Sánchez - Portfolio</title>
</head>


<body>
        <!--Bloque principal donde se encuentra el contenido cambiante------------->
        <div id="bloque_principal">
                <div id="cuadrilatero">
                    <div id="foto">
                        <img src="TUMA.jpg" alt="">
                    </div>
                </div>
                <div id="cuadrado_fijo">
                    <h1 id="textoFijo">Hola, mi nombre es <span>Diego Sánchez</span>. Soy desarrollador Full Stack residiendo en España.</h1>
                </div>
                <div id="cuadrado_movil">
                    <h1 id=textoMovil></h1>
                </div>
        </div>
        <!--Bloque de navegacion---------------------------------------->
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
                <div id="menuDesplegable">
                    <div class="btnNav btnNav1" style="margin-left:auto;margin-right:auto;border-bottom:1px solid grey; padding:3px">
                        <div class="btn1">Inicio</div>
                        <div class="btn2">Inicio</div>
                    </div>
                    
                    <div class="btnNav btnNav2" style="margin-left:auto;margin-right:auto;border-bottom:1px solid grey; padding:3px">
                        <div class="btn1">Proyectos</div>
                        <div class="btn2">Proyectos</div>
                    </div>
                    
                    <div class="btnNav btnNav3" style="margin-left:auto;margin-right:auto;border-bottom:1px solid grey; padding:3px">
                        <div class="btn1">Contacto</div>
                        <div class="btn2">Contacto</div>
                    </div>
                    
                    <div class="btnNav btnNav4" style="margin-left:auto;margin-right:auto;border-bottom:1px solid grey; padding:3px">
                        <div class="btn1">Light version</div>
                        <div class="btn2">Light version</div>
                    </div>
                </div>
            </div>
        </nav> 
        <!--Bloque de la cortina que sobresale por encima de todo lo demás------------>
        <div id="bloque_cortina">
            <div class="cortina" id="cortina1"></div>
            <div class="cortina" id="cortina2"></div>
            <div class="cortina" id="cortina3"></div>
            <div class="cortina" id="cortina4"></div>
            <div class="cortina" id="cortina5"></div>
            <div class="cortina" id="cortina6"></div>
            <div class="cortina" id="cortina7"></div>
            <div class="cortina" id="cortina8"></div>
            <div class="cortina" id="cortina9"></div>
            <div class="cortina" id="cortina10"></div>
        </div>



        
       <script>
        new TypeIt("#textoMovil", {
            speed: 65,
            waitUntilVisible: true,
            loop: true
            })
            .type("Soy amante del <span>desarrollo web</span> y de la programación en general.", { delay: 600 })
            .delete()
            .type("",{delay:600})
            .type("Hago desarrollos <span>front-end</span> con CSS, Bootstrap, Javascript + Jquery.", { delay: 600 })
            .delete()
            .type("",{delay:600})
            .type("Mis desarrollos <span>back-end</span> se basan en Apis PHP, Mysql y Ajax.", {delay:600})
            .delete()
            .type("",{delay:600})
            .type("Otros <span>frameworks</span> y <span>control de versiones</span> con Git (Github)", {delay:600})
            .delete()
            .type("",{delay:600})
            .go();

            //Control de la cortina
            function iniciarEfectoCortina() {
                let contador = 1;

                let interval = setInterval(function cortina() {
                    if (contador == 1) {
                    $("#cortina1").addClass("hidden");
                    $("#cortina5").addClass("hidden2");
                    } else if (contador == 2) {
                    $("#cortina8").addClass("hidden");
                    $("#cortina2").addClass("hidden2");
                    } else if (contador == 3) {
                    $("#cortina4").addClass("hidden");
                    $("#cortina10").addClass("hidden2");
                    } else if (contador == 4) {
                    $("#cortina9").addClass("hidden");
                    $("#cortina3").addClass("hidden2");
                    } else if (contador == 5) {
                    $("#cortina6").addClass("hidden");
                    $("#cortina7").addClass("hidden2");
                    }
                    contador++;

                    if (contador > 5) {
                    clearInterval(interval);
                    }
                }, 300);

                return interval; // Devuelve el identificador del intervalo
                }

                //Funcion que cambia la cortina de posicion
                function revertirEfectoCortina() {
                $(".hidden").each(function() {
                    $(this).removeClass("hidden");
                    $(this).css("transform", "");
                });

                $(".hidden2").each(function() {
                    $(this).removeClass("hidden2");
                    $(this).css("transform", "");
                });
                }

                let interval = null;
       </script> 
</body>
</html>