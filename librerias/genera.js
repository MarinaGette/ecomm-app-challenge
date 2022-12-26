function load_data() {
    $.ajax({
        url: "Product/load_data",

        success: function(data) {
            //                "id": "3",
            //    "title": "Producto del Challenge",
            //    "price": "2000",
            //    "created_at": "2022-12-13 10:41"
            data = jQuery.parseJSON(data);
            var productosListado = [];
         

            for (var items in data) {
                var producto = {};
                producto.id = data[items].id;
                producto.title = data[items].title;
                producto.price = data[items].price;
                producto.created_at = data[items].created_at;
              ///  console.log(data[items].id);
              productosListado.push({producto});

            }

            data = productosListado;


            for (n = 0; n < data.length; n++) {
                var urlmodificar = 'Product/actualizar/' + data[n].producto.id;
                var urleliminar = 'Product/eliminar/' + data[n].producto.id;
                data[n].producto.edit = "<a href='" + urlmodificar + "' >Edit</a>"
                data[n].producto.delete = "<a href='" + urleliminar + "' >Delete</a>"

                delete  data[n].producto.id;
                tblAddRow("tblRegSalidas", "d_result_producto",
                    data[n].producto);

            }
        }
    });
}
function tblAddRow(tabla, donde, datos) {

    
    tblAddRow_core(tabla, donde, datos);

}

function tblAddRow_core(tabla, donde, datos) {
 
    // datos de cabecera
    var tbl_th = document.createElement("thead");
    var tbl_tb = document.createElement("tbody");
    var tbl_tr = document.createElement("tr");
    var tbl_td = document.createElement("td");

    if (!jQuery("#" + tabla).length) {
        
            jQuery("#" + donde).append(
                "<table  class='table table-striped' id=" + tabla + " ></table>");
       

        tbl_th = document.createElement("thead");
        tbl_tb = document.createElement("tbody");
        tbl_tr = document.createElement("tr");
        tbl_td = document.createElement("td");
        // se ponen los nombres columnas 
        for (var prop in datos) {
            if (datos.hasOwnProperty(prop) && typeof datos[prop] !== "function") {

                tbl_td = document.createElement("td");
               jQuery(tbl_td).html(prop.toUpperCase());
                tbl_tr.appendChild(tbl_td);
            }
        }

        tbl_th.appendChild(tbl_tr);
        jQuery("#" + tabla).append(tbl_th);
        jQuery("#" + tabla).append(tbl_tb);
    }
    // contenido de la tabla, fila
    tbl_tr = document.createElement("tr");
    for (var prop in datos) {
        if (datos.hasOwnProperty(prop) && typeof datos[prop] !== "function") {
            tbl_td = document.createElement("td");
            jQuery(tbl_td).html(datos[prop]);
            tbl_tr.appendChild(tbl_td);
        }
    }

    jQuery("#" + tabla + " > tbody").append(tbl_tr);
}
