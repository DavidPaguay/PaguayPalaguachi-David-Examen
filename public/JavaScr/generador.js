function generador(){
    var numero = document.getElementById("numero").value;
    document.write(numero)
    if (numero == "") {
    document.getElementById("informacion").innerHTML = "";
    //document.write(numero);
    } else {
    if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        //document.write( this.status);
    if (this.readyState == 4 ) {
    document.write(numero);
    document.getElementById("informacion").innerHTML = this.responseText;
    }
    };
    //document.write(numero);
    xmlhttp.open("GET","./generador.php?numero="+numero,true);
    xmlhttp.send();
    }
    return false;
}
