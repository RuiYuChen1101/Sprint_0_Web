// ---------------------------------------------------
//
// versión fake de una función de la lógica
//
// recuperarmedicion() ->   error:Texto | (id:Int, temperatura:Double, co2:Double)
//
// error:Texto | (id:Int, temperatura:Double, co2:Double) : devuelto via callback( err, res )
//
// ---------------------------------------------------
function recuperarmedicion(cb) {
   
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        
        if (this.readyState == 4 && this.status == 200) {       

            var resultado = JSON.parse(this.responseText);
            if (resultado.success == "1") {
                
                cb(null, resultado);
            } else {
               
                cb("Error: " + resultado.message, null);
            }
        }
    };

    xmlhttp.open("GET", "../logica/recuperarmedicion.php", true);
    xmlhttp.send();
}
