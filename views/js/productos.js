//CAPTURAR CATEGORIA

$("#nuevaCategoria").change(function () {
    var idCategoria = $(this).val();

    var datos = new FormData();
    datos.append("idCategoria", idCategoria);

    $.ajax({
        url: "ajax/productosAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            if (!respuesta) {
                var nuevoCodigo = idCategoria + "001";
                $("#nuevoCodigo").val(nuevoCodigo);
            } else {
                var nuevoCodigo = Number(respuesta["codigo"]) + 1;
                $("#nuevoCodigo").val(nuevoCodigo);
            }
            // console.log("nuevoCodigo", nuevoCodigo);
        }
    });
});

$(document).on("click", ".btnActivarProducto", function () {
    var idProducto = $(this).attr("idProducto");
    var estadoProducto = $(this).attr("estadoProducto");

    var datos = new FormData();

    datos.append("activarId", idProducto);
    datos.append("activarProducto", estadoProducto);

    $.ajax({
        url: "ajax/ProductosAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            if (window.matchMedia("(max-width:767px)").matches) {
                swal({
                    title: "El producto ha sido actualizado",
                    type: "success",
                    confirmButtonText: "¡Cerrar!",
                    position: "bottom-right"
                }).then(result => {
                    if (result.value) {
                        window.location = "usuarios";
                    }
                });
            }
        }
    });

    if (estadoProducto == 0) {
        $(this).removeClass("btn-success");
        $(this).addClass("btn-danger");
        $(this).html("Desactivado");
        $(this).attr("estadoProducto", 1);
    } else {
        $(this).addClass("btn-success");
        $(this).removeClass("btn-danger");
        $(this).html("Activado");
        $(this).attr("estadoProducto", 0);
    }
});
// SUBIENDO LA FOTO DEL PRODUCTOS

$(".nuevaImagen").change(function () {
    var imagen = this.files[0];

    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
        $(".nuevaImagen").val("");

        swal({
            title: "Error al subir la foto",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
    } else if (imagen["size"] > 2000000) {
        $(".nuevaImagen").val("");

        swal({
            title: "Error al subir la foto",
            text: "¡La imagen no debe de pesar mas de 2 mb!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
    } else {
        var datosImagen = new FileReader();
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function (event) {
            var rutaImagen = event.target.result;
            $(".previsualizar2").attr("src", rutaImagen);
        });
    }
});

// EDITANDO LA FOTO DEL PRODUCTOS

$(".nuevaImagen").change(function () {
    var imagen = this.files[0];

    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
        $(".nuevaImagen").val("");

        swal({
            title: "Error al subir la foto",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
    } else if (imagen["size"] > 2000000) {
        $(".nuevaImagen").val("");

        swal({
            title: "Error al subir la foto",
            text: "¡La imagen no debe de pesar mas de 2 mb!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
    } else {
        var datosImagen = new FileReader();
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function (event) {
            var rutaImagen = event.target.result;
            $(".previsualizar").attr("src", rutaImagen);
        });
    }
});

//EDITAR PRODUCTO
$(document).on("click", ".btnEditarProducto", function () {
    var idProducto = $(this).attr("idProducto");
    // console.log(idProducto);
    var datos = new FormData();
    datos.append("idProducto", idProducto);

    $.ajax({
        url: "ajax/productosAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            //console.log(respuesta);

            var datosCategoria = new FormData();
            datosCategoria.append("idCategoria", respuesta["id_categoria"]);
            $.ajax({
                url: "ajax/categoriasAjax.php",
                method: "POST",
                data: datosCategoria,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {
                    //console.log(respuesta);
                    $("#editarCategoria").val(respuesta["id"]);
                    $("#editarCategoria").html(respuesta["categoria"]);
                }
            });
            $("#editarCodigo").val(respuesta["codigo"]);
            $("#editarDescripcion").val(respuesta["descripcion"]);
            $("#editarStock").val(respuesta["stock"]);
            $("#editarPrecioCompra").val(respuesta["precio_compra"]);
            $("#editarPrecioVenta").val(respuesta["precio_venta"]);
            if (respuesta["imagen"] != "") {
                $("#imagenActual").val(respuesta["imagen"]);
                $(".previsualizar").attr("src", respuesta["imagen"]);
            }
        }
    });
});

//BORRAR PRODUCTO

$(document).on("click", ".btnEliminarProducto", function () {
    var idProducto = $(this).attr("idProducto");
    var codigo = $(this).attr("codigo");
    var imagen = $(this).attr("imagen");
    console.log(idProducto);
    console.log(codigo);
    console.log(imagen);

    swal({
        title: "¿Está seguro de borrar el producto?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Borrar producto",
        position: "bottom-right"
    }).then(result => {
        if (result.value) {
            window.location =
                "index.php?ruta=productos&idProducto=" +
                idProducto +
                "&codigo=" +
                codigo +
                "&imagen=" +
                imagen;
        }
    });
});