// Autor: Ricardo Daniel Quiroga
// l2radamanthys@gmail.com



//ruta del servidor soap con el que se conectara la APP
//requiere que el servidor tenga habilitado CORS
//MPI
//var server_address = "http://:127.0.0.1:90/test";
//local
var server_address = "http://127.0.0.1/proyectos/SimpleSOAPServer/server.php?wsdl";


// Crea un tag xml del tipo <field>value</field>
function makeTag(field, value) {
	tag = "<" + field + ">" + value + "</" + field + ">";
	return tag;
}



//Genera un documento XML para ser enviado
function makeSOAPMessage(content) {
	//deprecated
}



//Convierte una imagen a string formateado en base64
// @path string: ruta donde esta almacenada la imagen
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
    return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
}



function convertFileToBase64() {
	//pass
}