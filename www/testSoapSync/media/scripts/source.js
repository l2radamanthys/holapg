// Autor: Ricardo Daniel Quiroga
// l2radamanthys@gmail.com



//ruta del servidor soap con el que se conectara la APP
//requiere que el servidor tenga habilitado CORS
var server_address = "http://:127.0.0.1:90/test";



// Crea un tag xml del tipo <field>value</field>
function makeTag(field, value) {
	tag = "<" + field + ">" + value + "</" + field + ">";
	return tag;
}



//Genera un documento XML para ser enviado
function makeSOAPMessage(content) {
	//deprecated
}



//convierte una imagen a string formateado en base64
function convertImageToBase64(path) {
    console.log("<br>img-upl: " + path);
    var img = new Image();
    img.src = path;
    var canvas = document.createElement("canvas");
    canvas.width = img.width;
    canvas.height = img.height;
    var ctx = canvas.getContext("2d");
    ctx.drawImage(img, 0, 0);
    var dataURL = canvas.toDataURL("image/png");
    $("#log").append("<br>img-upl: base64 generated");
    return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");            
}



function convertFileToBase64() {
	//pass 
}