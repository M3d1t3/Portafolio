<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/estilos.css<?php echo '?' . date("YmdHis") ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Diphylleia&display=swap" rel="stylesheet">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
    <script src="https://kit.fontawesome.com/7316561214.js" crossorigin="anonymous"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script>
        $(document).ready(function(){
            $("#body").addClass("fondoNegro");
            //Cerrar ventanas iniciales
            $("#bloque_proyectos").hide();
            $("#bloque_contacto").hide();
            $("#bloque_resumen").hide();

            //Control del color de la pantalla
            let color = 0;

            //Añadir color al navegador cuando no se está en inicio
            function addColorNav(){
                    if(color==0){
                        $("#navegador").addClass("fondoNegro");
                    }else{
                        $("#navegador").addClass("fondoBlanco");
                    }
                }
            function removeColorNav(){
                if(color==0){
                        $("#navegador").removeClass("fondoNegro");
                    }else{
                        $("#navegador").removeClass("fondoBlanco");
                    }
            }


            //Control de la pagina seleccionada. Inicio=1, proyectos=2, contacto=3
            let pagina = 1;

            //Control del cambio de pantalla
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

            //Control de click en los botones del menu
            $(".btnProyectos").click(function(){
                if(pagina!=2){
                    $("#bloque_cortina").show();
                    cambiarCortina();
                    setTimeout(() => {
                        $("#bloque_principal").hide();
                        $("#bloque_contacto").hide();
                        $("#bloque_proyectos").show();
                        $("#redesSociales").show();
                        $("#bloque_resumen").hide();
                        addColorNav();
                    }, 500);
                    setTimeout(function() {
                        cambiarCortina();
                    }, 500);
                    setTimeout(function() {
                        $("#bloque_cortina").hide();
                    }, 2000);
                }
                pagina = 2;
                $("#menuDesplegable").hide();
                $("#navegador").removeClass('fondoNegro');
                iniciarVideos();
            });

            $(".btnInicio").click(function(){
                if(pagina!=1){
                    $("#bloque_cortina").show();
                    cambiarCortina();
                    setTimeout(() => {
                        $("#bloque_principal").show();
                        $("#bloque_contacto").hide();
                        $("#bloque_proyectos").hide();
                        $("#redesSociales").show();
                        $("#bloque_resumen").hide();
                    }, 500);
                    setTimeout(function() {
                        cambiarCortina();
                    }, 500);
                    setTimeout(function() {
                        $("#bloque_cortina").hide();
                    }, 2000);
                }
                pagina = 1;
                $("#menuDesplegable").hide();
                $("#navegador").removeClass('fondoNegro');
            });
            $(".btnContacto").click(function(){
                if(pagina!=3){
                    $("#bloque_cortina").show();
                    cambiarCortina();
                    setTimeout(() => {
                        $("#bloque_principal").hide();
                        $("#bloque_contacto").show();
                        $("#bloque_proyectos").hide();
                        $("#redesSociales").hide();
                        $("#bloque_resumen").hide();
                        addColorNav();
                    }, 500);
                    setTimeout(function() {
                        cambiarCortina();
                    }, 500);
                    setTimeout(function() {
                        $("#bloque_cortina").hide();
                    }, 2000);
                }
                pagina = 3;
                $("#menuDesplegable").hide();
                $("#navegador").removeClass('fondoNegro');
            });
            $(".btnLight").click(function(){
                if(pagina!=4){
                    $("#bloque_cortina").show();
                    reiniciarBarras();
                    cambiarCortina();
                    setTimeout(() => {
                        $("#bloque_principal").hide();
                        $("#bloque_contacto").hide();
                        $("#bloque_proyectos").hide();
                        $("#redesSociales").show();
                        $("#bloque_resumen").show();
                        addColorNav();
                    }, 500);
                    setTimeout(function() {
                        cambiarCortina();
                    }, 500);
                    setTimeout(function() {
                        $("#bloque_cortina").hide();
                    }, 2000);
                }
                pagina = 4;
                $("#menuDesplegable").hide();
                cargarBarras();
            });

            


            //Control de el efecto hover en los botones de menu
            $(".btnNav").hover(function(){
                $(this).find(".btn1").addClass("hidden");
                $(this).find(".btn2").addClass("hidden2");
            }, function(){
                $(this).find(".btn1").removeClass("hidden");
                $(this).find(".btn2").removeClass("hidden2");
            });

            //Control de click en el menu sandwich
            $('.sandwich').click(function() {
                $(this).toggleClass('active');
                $("#menuDesplegable").slideToggle();
                $("#navegador").toggleClass('fondoNegro');
            });

            /*Control de las barras de progreso de resumen*/
            function cargarBarras(){
                $("#barraHtml").animate({ width: '95%' }, 4000);
                $("#barraJs").animate({ width: '75%' }, 4000);
                $("#barraJquery").animate({ width: '90%' }, 4000);
                $("#barraAjax").animate({ width: '90%' }, 4000);
                $("#barraPhp").animate({ width: '75%' }, 4000);
                $("#barraCss").animate({ width: '90%' }, 4000);
                $("#barraMysql").animate({ width: '90%' }, 4000);
                $("#barraBoot").animate({ width: '70%' }, 4000);
                $("#barraGithub").animate({ width: '80%' }, 4000);
                $("#barraNpm").animate({ width: '85%' }, 4000);
                $("#barraNode").animate({ width: '50%' }, 4000);
            }

            function reiniciarBarras(){
                $("#barraHtml").css('width','0%');
                $("#barraJs").css('width','0%');
                $("#barraJquery").css('width','0%');
                $("#barraAjax").css('width','0%');
                $("#barraPhp").css('width','0%');
                $("#barraCss").css('width','0%');
                $("#barraMysql").css('width','0%');
                $("#barraBoot").css('width','0%');
                $("#barraGithub").css('width','0%');
                $("#barraNpm").css('width','0%');
                $("#barraNode").css('width','0%');
            }

            /*Controles de video*/
            function iniciarVideos(){
                //Parar videos
                $("#video1")[0].currentTime = 0;
                $("#video2")[0].currentTime = 0;
                //Iniciar videos
                $("#video1")[0].play();
                $("#video2")[0].play();
            }

            $("#video1").click(function(){
                location.href = 'https://www.diegosanchez.digital/social';
            });
            $("#video2").click(function(){
                location.href = 'https://www.diegosanchez.digital/escalon';
            });


            //Enviar correo con el formulario
            $("#btnCorreo").click(function(event){
                event.preventDefault();
                let nombre = $("#nombreCorreo").val();
                let correo = $("#mailCorreo").val();
                let mensajeCorreo = $("#mensajeCorreo").val();

                if (nombre !== '' && correo !== '' && mensajeCorreo !== '') {
                // Envía una solicitud AJAX al archivo enviarCorreo.php
                $.ajax({
                    url: 'enviarCorreo.php',
                    method: 'POST',
                    data: {
                        nombre: nombre,
                        correo: correo,
                        mensaje: mensajeCorreo
                    },
                    success: function(response) {
                        // Maneja la respuesta del servidor
                        $("#nombreCorreo").val("");
                        $("#mailCorreo").val("");
                        $("#mensajeCorreo").val("");
                        Swal.fire('Mensaje enviado correctamente');
                    },
                    error: function(xhr, status, error) {
                        // Maneja los errores de la solicitud AJAX
                        Swal.fire('Hay un error en el envío del mensaje');
                    }
                });
                } else {
                    // Muestra un mensaje de error o realiza alguna otra acción
                    console.log('Por favor completa todos los campos');
                    Swal.fire('Todos los campos son obligatorios');
                }
            });
        });
    </script>
    <title>Diego Sánchez - Portfolio</title>
</head>


<body id="body">
        <!--Bloque principal de la portada------------->
        <div id="bloque_principal">
                <div id="cuadrilatero">
                    <div id="foto">
                        <img id="imagenMia" src="TUMA.jpg" alt="">
                    </div>
                </div>
                <div id="cuadrado_fijo">
                    <h1 id="textoFijo">Hola, mi nombre es <span>Diego Sánchez</span>. Soy desarrollador Full Stack residiendo en España.</h1>
                </div>
                <div id="cuadrado_movil">
                    <h1 id=textoMovil></h1>
                </div>
        </div>
        <!--Bloque de contacto------------------------------------->
        <div id="bloque_contacto">
            <div class="clearfix" id="contacto_info">
                <div class="titulo_info">
                    <h1>Información de contacto</h1>
                </div>
                <div id="bloque_whatsapp" class="info">
                    <div class="logo">
                        <a href="https://wa.me/622055278" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                    <div class="info_contenido">
                        <h1>+34 622055278</h1>
                    </div>
                </div>
                <div id="bloque_mail" class="info">
                    <div class="logo">
                        <a href="mailto:sanchezpomares1306@gmail.com" target="_blank" rel="noopener noreferrer">
                            <i class="far fa-envelope"></i>
                        </a>
                    </div>
                    <div class="info_contenido">
                        <h1 href="mailto:sanchezpomares1306@gmail.com">sanchezpomares1306@gmail.com</h1>
                    </div>
                </div>
            </div>
            <form action="" id="contacto_form">
                <div class="titulo_info">
                    <h1>Formulario de contacto</h1>
                </div>
                <input id="nombreCorreo" class="form" type="text" placeholder="Nombre">
                <input id="mailCorreo" class="form" type="text" placeholder="Email">
                <textarea class="form" name="" id="mensajeCorreo" cols="30" rows="10" placeholder="Mensaje"></textarea>
                <button id="btnCorreo">Enviar mensaje</button>
            </form>
        </div>
        <!--Bloque de proyectos--------------------------------------->
        <div id="bloque_proyectos">
            <div id="contenedor_proyectos">
                <div class="proyecto">
                    <video id="video1" src="videoSocial.mkv"></video>
                    <div class="tituloProyecto">
                        <h1>Red social</h1><a href="https://github.com/M3D1T3/Social" target="_blank"><i class="fab fa-github"></i></a>
                    </div>
                </div>
                <div class="proyecto">
                    <video id="video2" src="videoEscalon.mkv"></video>
                    <div class="tituloProyecto">
                        <h1>Gestión de vehículos</h1><a href="https://github.com/M3D1T3/escalon" target="_blank"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!--Bloque de resumen de conocimientos--------------------------->
        <div id="bloque_resumen">
            <div id="contenedor_resumen">
                <div class="resumen">
                    <img src="html.png" alt="">
                    <div class="porcentaje">
                        <div id="barraHtml" class="barra"></div>
                    </div>
                </div>
                <div class="resumen">
                    <img src="js.png" alt="">
                    <div class="porcentaje">
                        <div id="barraJs" class="barra"></div>
                    </div>
                </div>
                <div class="resumen">
                    <img src="jquery.png" alt="">
                    <div class="porcentaje">
                        <div id="barraJquery" class="barra"></div>
                    </div>
                </div>
                <div class="resumen">
                    <img src="ajax.png" alt="">
                    <div class="porcentaje">
                        <div id="barraAjax" class="barra"></div>
                    </div>
                </div>
                <div class="resumen">
                    <img src="php.jpg" alt="">
                    <div class="porcentaje">
                        <div id="barraPhp" class="barra"></div>
                    </div>
                </div>
                <div class="resumen">
                    <img src="css3.png" alt="">
                    <div class="porcentaje">
                        <div id="barraCss" class="barra"></div>
                    </div>
                </div>
                <div class="resumen">
                    <img src="mysql.jpg" alt="">
                    <div class="porcentaje">
                        <div id="barraMysql" class="barra"></div>
                    </div>
                </div>
                <div class="resumen">
                    <img src="bootstrap.png" alt="">
                    <div class="porcentaje">
                        <div id="barraBoot" class="barra"></div>
                    </div>
                </div>
                <div class="resumen">
                    <img src="github.png" alt="">
                    <div class="porcentaje">
                        <div id="barraGithub" class="barra"></div>
                    </div>
                </div>
                <div class="resumen">
                    <img src="node.png" alt="">
                    <div class="porcentaje">
                        <div id="barraNode" class="barra"></div>
                    </div>
                </div>
            </div>
        </div>

        <!--Bloque de redes sociales de la derecha---------------------->
        <div id="redesSociales">
            <a href="https://github.com/M3D1T3" target="_blank"><i class="fab fa-github"></i></a>
            <a href="https://linkedin.com/in/diego-sánchez-pomares-080b75146" target="_blank"><i class="fab fa-linkedin"></i></a>
            <a href="mailto:tucorreo@example.com" target="_blank" rel="noopener noreferrer"><i class="far fa-envelope"></i></a>
            <a href="https://wa.me/622055278" target="_blank" rel="noopener noreferrer"><i class="fab fa-whatsapp"></i></a>
        </div>
        <!--Bloque de navegacion---------------------------------------->
        <nav id="navegador">
            <div id="brandNav">
                <h1><span id="nombre1">Diego  </span><span id="nombre2">Sánchez</span></h1>
            </div>
            <div id="menuNav">
                <div class="btnNav btnInicio">
                    <div class="btn1">Inicio</div>
                    <div class="btn2">Inicio</div>
                </div>
                
                <div class="btnNav btnProyectos">
                    <div class="btn1">Proyectos</div>
                    <div class="btn2">Proyectos</div>
                </div>
                
                <div class="btnNav btnLight">
                    <div class="btn1"><span id="light">Resumen</span></div>
                    <div class="btn2"><span id="light2">Resumen</span></div>
                </div>

                <div class="btnNav btnContacto">
                    <div class="btn1">Contacto</div>
                    <div class="btn2">Contacto</div>
                </div>
                
                
            </div>
            <div id="menuToggle">
                <div class="sandwich">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div id="menuDesplegable">
                    <div class="btnNav btnInicio" style="margin-left:auto;margin-right:auto;border-bottom:1px solid grey; padding:3px">
                        <div class="btn1">Inicio</div>
                        <div class="btn2">Inicio</div>
                    </div>
                    
                    <div class="btnNav btnProyectos" style="margin-left:auto;margin-right:auto;border-bottom:1px solid grey; padding:3px">
                        <div class="btn1">Proyectos</div>
                        <div class="btn2">Proyectos</div>
                    </div>

                    <div class="btnNav btnLight" style="margin-left:auto;margin-right:auto;border-bottom:1px solid grey; padding:3px">
                        <div class="btn1">Resumen</div>
                        <div class="btn2">Resumen</div>
                    </div>
                    
                    <div class="btnNav btnContacto" style="margin-left:auto;margin-right:auto;border-bottom:1px solid grey; padding:3px">
                        <div class="btn1">Contacto</div>
                        <div class="btn2">Contacto</div>
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

                /*Funcion de cambio de color de la pagina***********************/
                function cambiarColor(){
                    alert("Funciona");

                    if(color==0){
                        //Cambiamos a light version
                        $("#body").removeClass("fondoNegro");
                        $("#body").addClass("fondoBlanco");


                        color = 1
                    }else{
                        //Cambiamos a dark version
                        $("#body").removeClass("fondoBlanco");
                        $("#body").addClass("fondoNegro");


                        color = 0;
                    }
                }

                
       </script> 
</body>
</html>