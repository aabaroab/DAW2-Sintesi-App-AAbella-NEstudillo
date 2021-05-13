<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <script src="https://cdn.tiny.cloud/1/h0eyqfi236byw3c9d1qhtktoermf6bzixitvp4963bg3p1nm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '#descripciollargaInfografia'
        });
    </script>

</head>

<body>

    <form  action="<?php echo base_url('practicaVideo') ?>" method="post" style="width: 50%; margin-left: 25%">
        <div class="form-group">
            <p>Titol:</p>
            <input type="text" class="form-control" id="titolInfografia" name="titolInfografia">
        </div>
        <div class="form-group">
            <p>Descripció Curata:</p>
            <textarea class="form-control" id="descripciocurtaInfografia" name="descripciocurtaInfografia"></textarea>
        </div>
        <div class="form-group">
            <p>Descripció Llarga:</p>
            <textarea id="descripciollargaInfografia" name="descripciollargaInfografia" class="form-control"></textarea>
        </div>
        <!------------------------------------------------------------------------------------->

        <script>
    tinymce.init({
      selector: 'descripciollargaInfografia',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
  </script>

        <!------------------------------------------------------------------------------------->

      <!--  <div class="form-group">
            <p>Link video:</p>
            <input type="text" class="form-control" id="linckVideo" name="linckVideo">
        </div>

        <div class="form-group">
            <p>Categoria:</p>
            <input type="email" class="form-control" id="EmailUsuari" name="EmailUsuari">
        </div>
        <div class="form-group">
            <p>Tags:</p>
            <input type="checkbox" id="tag" name="tag" value="Bike"><label for="tag">Mates</label><br>
        </div>-->

        <!--<div>
            <input type="text" id="fname" name="fname" style="width: 30%; margin-left: 28%;" autofocus="true" />
            <button id="botoCarrega">Cargar</button>
        </div><br />
        <div id="player" style="margin-left: 25%;"></div>
        <br />
        <input type="range" onclick="checkVolumen()" id="sound" style="margin-left: 35%;" />
        <button id="botoProva" onclick="ckeckProva()">Pause</button>
        <button id="botoProva" onclick="ckeckStop()">Guardar</button>-->
        <button type="submit" class="btn btn-primary btn-lg" style="width: 30%; margin-left: 30%">Crear</button>

    </form>
















    <!--
    <script>
        var tag = document.createElement('script');

        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        document.getElementById("player").style.visibility = 'hidden';


        var player;
        //Creem la funcio per cargar el video amb les mides que espesifiquem
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
                playerVars: {
                    'controls': 0
                },
                height: '360',
                width: '640',
                //Crrem els events 
                events: {
                    'onReady': ckeckProva,
                    'onStateChange': onPlayerStateChange
                }
            });
        }
        //Creem la funcio per agarar la id del video que sens passa per el input 
        function checkVideo() {
            var cadena = document.getElementById('fname').value;
            var cadena2 = (cadena.substr(32, (cadena.length - 1)));
            //cargem el video apartir de la id
            player.loadVideoById(cadena2);
            //Pausem el video al cargar el video
            player.stopVideo();
            //fem invisible el input i el boto 
            document.getElementById("fname").style.visibility = 'hidden';
            document.getElementById("botoCarrega").style.visibility = 'hidden';
            //fem visible el video
            document.getElementById("player").style.visibility = 'visible';

            var volumenRange = document.getElementById('sound').value
            player.setVolume(volumenRange);


            var value112 = localStorage.getItem(cadena2);

            if (value112 != null) {
                player.loadVideoById({
                    'videoId': cadena2,
                    'startSeconds': value112,
                });
                player.pauseVideo();

                document.getElementById("botoProva").innerHTML = "Start";

            }
        }

        function ckeckStop() {
            var cadena = document.getElementById('fname').value;
            var cadena2 = (cadena.substr(32, (cadena.length - 1)));

            localStorage.setItem(cadena2, (player.getCurrentTime()));
            var value112 = localStorage.getItem(cadena2);

            //fem visible el input i el boto 
            document.getElementById("fname").style.visibility = 'visible';
            document.getElementById("botoCarrega").style.visibility = 'visible';



        }

        var done = false;

        function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.PLAYING && !done) {
                done = true;
                document.getElementById("botoProva").innerHTML = "Pause";
            } else {
                done = false;
                document.getElementById("botoProva").innerHTML = "Start";
            }
        }

        //Creem la funcio per controlar el volumen
        function checkVolumen() {
            var volumenRange = document.getElementById('sound').value
            player.setVolume(volumenRange);
        }

        //inicialitzem la variable provabool a false
        var provabool = false;
        //creem la funcio ckeckProva per a canviar la funcio del boto del video 
        function ckeckProva() {
            //Si la variable provabool es false la funcio del boto es per pausar el video
            if (provabool == false) {
                //Pausem el vido que esta reproduin
                player.pauseVideo();
                //Canviem el valor de la variable provabool a true 
                provabool = true;
                //Canviem el nom que surtira per el boto, el nom canviar a Start
                document.getElementById("botoProva").innerHTML = "Start";
            }
            //Si la variable provabool es True la funcio del boto es per tornar a iniciar el video
            else if (provabool == true) {
                //Inicalitzem el video
                player.playVideo();
                //Canviem el valor de la variable provabool a false
                provabool = false;
                //Canviem el nom que surtira per el boto, el nom canviar a Pause
                document.getElementById("botoProva").innerHTML = "Pause";
            }
        }
    </script>-->
</body>

</html>