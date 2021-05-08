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