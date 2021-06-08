<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" >
                    <fieldset>
                        <legend class="text-center header">Contingut</legend>
                        <?php foreach ($news_item as $news_item2) : ?>

                            <table style="width:100%; margin-top:2%; border: 1px solid black">
                                <tr style="border: 1px solid black" class="col-md-12 text-center">
                                    <th>
                                        <h5 class="col-md-1 text-center">Titol:</h5>
                                    </th>
                                    <th class="col-md-10">
                                        <!-- <div class="col-md-1 col-md-offset-2 text-center"></div> -->
                                        <input type="text" id="modificartitul" name="modificartitul" value="<?php echo $news_item2['titul']; ?>">
                                    </th>
                                </tr>

                                <tr style="border: 1px solid black">
                                    <th>
                                        <h5 class="col-md-1  text-center">Descripció Curta:</h5>
                                    </th>
                                    <th class="col-md-1  text-center">
                                        <!-- <div class="col-md-1 col-md-offset-2 text-center"></div> -->
                                        <input type="text" id="modificardescripcio" name="modificardescripcio" value="<?php echo $news_item2['descripcio']; ?>">
                                    </th>
                                </tr>

                                <tr style="border: 1px solid black">
                                    <th>
                                        <h5 class="col-md-1  text-center">Descripció Llarga:</h5>
                                    </th>
                                    <th class="col-md-1 col-md-offset-2 text-center">
                                        <!-- <div class="col-md-1 col-md-offset-2 text-center"></div> -->
                                        <input type="text" id="modificarexplicacio" name="modificarexplicacio" value="<?php echo $news_item2['explicacio']; ?>">
                                    </th>
                                </tr>

                                <tr style="border: 1px solid black">
                                    <th>
                                        <h5 class="col-md-1 ">Tags:</h5>
                                    </th>
                                    <th class="col-md-1 col-md-offset-2 text-center">

                                        <?php foreach ($nomtags as $totselstags) : ?>
                                            <h5><?php  $totselstags['nom']; ?></h5>
                                        <?php endforeach; ?>

                                        <?php $query = $this->db->get('tags');

                                        foreach ($query->result() as $row) { ?>



                                            <?php if ($row->nom == $totselstags['nom']) { ?>
                                                <?php //print_r($row->nom);
                                                //die; 
                                                ?>
                                                <?php //foreach ($nomtags as $nomtagsfinal) :
                                                ?>
                                                    <input type="checkbox" id="tag" checked="checked" name="tagsphp[]"> <label for="tag" id="taglabel"> <?php echo $row->nom; ?></label><br>
                                                <?php //endforeach;
                                                ?>

                                            <?php } else { ?>
                                                <input type="checkbox" id="tag" name="tagsphp[]" value="<?php echo $row->nom; ?>"> <label for="tag" id="taglabel"> <?php echo $row->nom; ?></label><br>
                                            <?php } ?>


                                        <?php } ?>

                                    </th>
                                </tr>


                                <!-- <tr style="border: 1px solid black">
                                    <th>
                                        <h5 class="col-md-1  text-center">Video:</h5>
                                    </th>
                                    <th class="col-md-1 col-md-offset-2 text-center">
                                    <a class="btn btn-primary btn-lg center" type="submit" onclick="checkVideo()" id="botoCarrega">Veure</a>
                                    </th>
                                </tr> -->

                                <tr style="border: 1px solid black">
                                    <th>
                                        <h5 class="col-md-1  text-center">Video:</h5>
                                    </th>
                                    <th class="col-md-1 col-md-offset-2 text-center">
                                    <input type="text" id="modificarlink" name="modificarlink" value="<?php echo $news_item2['material']; ?>">
                                    </th>
                                </tr>


                                <tr style="border: 1px solid black">
                                    <th>
                                        <h5 class="col-md-1  ">Fichers Extra:</h5>
                                    </th>
                                    <th>

                                    </th>
                                </tr>

                                

                            </table>
                        <?php endforeach; ?>
                        <button type="submit" class="btn btn-primary btn-lg" style="margin-left: 50%; margin-top: 2%">Enviar</button>

                        <!-- <a class="btn btn-primary btn-lg center" type="submit" name="submit" style="margin-left: 50%;" href="<?php //echo base_url('videos'); 
                                                                                                                                    ?>">Tornar</a> -->
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<div>
    <input type="text" id="fname" name="fname" value="<?php echo $news_item2['material']; ?>" style="width: 30%; margin-left: 28%;" autofocus="true" hidden=true/>
</div>
<div id="player" style="margin-left: 30%; margin-top:5%"></div>
<br />


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
</script>