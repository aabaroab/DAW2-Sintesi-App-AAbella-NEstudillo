var idForm = "formCanva";
var imgInput = "imagenFinal";
var	idmyCanva = "myCanva";
var imgFinal = document.getElementById(imgInput);
var colorDeFondo = '#fff';
var altoCanvas = document.getElementById("myCanva").offsetHeight;
var anchoCanvas=document.getElementById("myCanva").offsetWidth;

y=0;
function changeTypeLine(){y=0;}
function changeTypeFullCircle(){y=1;}
function changeTypeBorderCircle(){y=2;}
function changeTypeFullRect(){y=3;}
function changeTypeBorderRect(){y=4;}
function changeTypeText(){y=5;}
function changeTypeClearRect(){y=6;}




let canvasElem = document.querySelector("canvas");    
i=0;

canvasElem.addEventListener("mouseup", function(e) 
{ 
    if(y==0){
        getLine(canvasElem, e);
    }else if(y==1){
        getFullCircle(canvasElem, e);
    }else if(y==2){
        getBorderCircle(canvasElem, e);
    }else if(y==3){
        getFullRect(canvasElem, e);
    }else if(y==4){
        getBorderRect(canvasElem, e);
    }else if(y==5){
        getText(canvasElem, e);
    }else if(y==6){
        getClearRect(canvasElem, e);
    }
}); 


let Line = class {
    constructor(){
        this.p1=null;
        this.p2=null;
    }
    
    setp1(p1){
        this.p1=p1;
    }
    
    setp2(p2){
        this.p2=p2;
    }
    
}

let Circle = class {
    constructor(){
        this.center=null;
        this.radius=null;
    }
    
    setcenter(center){
        this.center=center;
    }
    
    setradius(radius){
        this.radius=radius;
    }
    
}

let Rectangle = class {
    constructor(){
        this.p1=null;
        this.p2=null;
    }
    
    setp1(p1){
        this.p1=p1;
    }
    
    setp2(p2){
        this.p2=p2;
    }
    
}

let Texto = class {
    constructor(){
        this.p1=null;
    }
    
    setp1(p1){
        this.p1=p1;
    }
}

let Point = class {
    constructor(x, y){
        this.x=x;
        this.y=y;
    }
}

/**************************************************************************************/

var c = document.getElementById("myCanva");
var ctx = c.getContext("2d");
ctx.fillStyle=colorDeFondo;
var linea= null;
var circulo;

function getLine(canvas, event){	
    var point;
    var rect = canvas.getBoundingClientRect();
    if(linea === null){
        linea = new Line();
        point = new Point(event.clientX - rect.left, event.clientY - rect.top)
        linea.setp1(point);
        ctx.moveTo(linea.p1.x, linea.p1.y);
        
    }else{
        point = new Point(event.clientX - rect.left, event.clientY - rect.top)
        linea.setp2(point);
        ctx.lineTo(linea.p2.x, linea.p2.y);  
        ctx.stroke();   
        linea = null;
    
    }
}



var circulo= null;
var rectangulo;


function getFullCircle(canvas, event){
    var rect = canvas.getBoundingClientRect();
    var point;
    if(circulo===null){
        circulo = new Circle();
        point = new Point(event.clientX - rect.left, event.clientY - rect.top)
        circulo.setcenter(point);
        ctx.beginPath();
        
    }else{
        point = new Point(event.clientX - rect.left, event.clientY - rect.top)
        var radio = Math.floor(Math.hypot((circulo.center.x - point.x), (circulo.center.y - point.y)));
        circulo.setradius(radio);
        ctx.fillStyle = "black";
        ctx.arc(circulo.center.x ,circulo.center.y, circulo.radius, 0, 2 * Math.PI);
        ctx.fill();
        ctx.stroke();
        console.log(circulo)
        circulo = null;
    }                    
}

function getBorderCircle(canvas, event){
    var rect = canvas.getBoundingClientRect();
    var point;
    if(circulo===null){
        circulo = new Circle();
        point = new Point(event.clientX - rect.left, event.clientY - rect.top)
        circulo.setcenter(point);
        ctx.beginPath();
        
    }else{
        point = new Point(event.clientX - rect.left, event.clientY - rect.top)
        var radio = Math.floor(Math.hypot((circulo.center.x - point.x), (circulo.center.y - point.y)));
        circulo.setradius(radio);
        ctx.arc(circulo.center.x ,circulo.center.y, circulo.radius, 0, 2 * Math.PI);
        ctx.stroke();
        console.log(circulo)
        circulo = null;
    } 
}

var rectangulo = null;
var texto;
function getFullRect(canvas, event){
    var point;
    var altura;
    var anchura;
    var rect = canvas.getBoundingClientRect();
    if (rectangulo===null){
        rectangulo = new Rectangle();
        point = new Point(event.clientX - rect.left, event.clientY - rect.top);
        rectangulo.setp1(point);
        ctx.beginPath();
    }else{
        point = new Point(event.clientX - rect.left, event.clientY - rect.top);
        rectangulo.setp2(point);
        anchura = rectangulo.p1.x - rectangulo.p2.x;
        altura = rectangulo.p1.y - rectangulo.p2.y;
        ctx.fillStyle = "black";
        ctx.fillRect(rectangulo.p2.x, rectangulo.p2.y, anchura, altura);
        ctx.stroke();
        rectangulo = null;
    }
}

function getBorderRect(canvas, event){
    var point;
    var altura;
    var anchura;
    var rect = canvas.getBoundingClientRect();
    if (rectangulo===null){
        rectangulo = new Rectangle();
        point = new Point(event.clientX - rect.left, event.clientY - rect.top);
        rectangulo.setp1(point);
        ctx.beginPath();
    }else{
        point = new Point(event.clientX - rect.left, event.clientY - rect.top);
        rectangulo.setp2(point);
        anchura = rectangulo.p1.x - rectangulo.p2.x;
        altura = rectangulo.p1.y - rectangulo.p2.y;
        ctx.rect(rectangulo.p2.x, rectangulo.p2.y, anchura, altura);
        ctx.stroke();
        rectangulo = null;
    }
}

var texto = null;

function getText(canvas, event){
    var point;
    var rect = canvas.getBoundingClientRect();
    texto = new Texto();
    point = new Point(event.clientX - rect.left, event.clientY - rect.top);
    texto.setp1(point);
    ctx.fillStyle = "Black";
    ctx.font = "14px Arial";
    ctx.fillText("Test", texto.p1.x, texto.p1.y);
}

function getClearRect(canvas, event){
    var point;
    var altura;
    var anchura;
    var rect = canvas.getBoundingClientRect();
    if (rectangulo===null){
        rectangulo = new Rectangle();
        point = new Point(event.clientX - rect.left, event.clientY - rect.top);
        rectangulo.setp1(point);
        ctx.beginPath();
    }else{
        point = new Point(event.clientX - rect.left, event.clientY - rect.top);
        rectangulo.setp2(point);
        anchura = rectangulo.p1.x - rectangulo.p2.x;
        altura = rectangulo.p1.y - rectangulo.p2.y;
        ctx.clearRect(rectangulo.p2.x, rectangulo.p2.y, anchura, altura);
        rectangulo = null;
    }
}

function cleanCanva(){
    ctx=document.getElementById("myCanva").getContext('2d');
    ctx.fillStyle=colorDeFondo;
    ctx.fillRect(0,0,anchoCanvas,altoCanvas);
}
function saveImage(){
    imgFinal.value=document.getElementById("myCanva").toDataURL('image/png');
    document.forms[idForm].submit();
}