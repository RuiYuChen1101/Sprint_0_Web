function recuperarmedicion(cb) {
    // preparar la llamada remota
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        // callback for when the response arrives
        if (this.readyState == 4 && this.status == 200) {
            // this is the JSON text received from the call to
            // recuperarmedicion.php, parsed into a JSON object
            console.log("recibo: " + this.responseText);
            var resultado = JSON.parse(this.responseText);

            if (resultado.success == "1") {
                // Data was retrieved successfully
                cb(null, resultado);
            } else {
                // Error occurred on the server side
                cb("Error: " + resultado.message, null);
            }
        }
    };

    // call the remote file recuperarmedicion.php
    xmlhttp.open("GET", "../logica/recuperarmedicion.php", true);
    xmlhttp.send();
}
