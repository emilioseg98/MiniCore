let tblClientes, tblLibros, tblPrestamos, tblMultas;
let idCliente;
document.addEventListener("DOMContentLoaded", function(){
    tblClientes = $('#tblClientes').DataTable({
        ajax: {
            url: 'http://localhost/MiniCore/Clientes/listar',
            dataSrc: ''
        },
        columns: [
            {
                'data' : 'id'
            },
            {
                'data' : 'ci'
            },
            {
                'data' : 'nombre'
            },
            {
                'data' : 'direccion'
            },
            {
                'data' : 'telefono'
            },
            {
                'data' : 'acciones'
            }
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',
     
                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                },
                //Botón para cvs
                {
                    extend: 'csvHtml5',
                    footer: true,
                    filename: 'Export_File_csv',
                    text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
                },
                {
                    extend: 'colvis',
                    text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
    });

    tblLibros = $('#tblLibros').DataTable({
        ajax: {
            url: 'http://localhost/MiniCore/Libros/listar',
            dataSrc: ''
        },
        columns: [
            {
                'data' : 'id'
            },
            {
                'data' : 'nombre'
            },
            {
                'data' : 'autor'
            },
            {
                'data' : 'editorial'
            },
            {
                'data' : 'acciones'
            }
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',
     
                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                },
                //Botón para cvs
                {
                    extend: 'csvHtml5',
                    footer: true,
                    filename: 'Export_File_csv',
                    text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
                },
                {
                    extend: 'colvis',
                    text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
    });

    tblPrestamos = $('#tblPrestamos').DataTable({
        ajax: {
            url: 'http://localhost/MiniCore/Prestamos/listar',
            dataSrc: ''
        },
        columns: [
            {
                'data' : 'id'
            },
            {
                'data' : 'codigo'
            },
            {
                'data' : 'cliente'
            },
            {
                'data' : 'libro'
            },
            {
                'data' : 'fechaInicio'
            },
            {
                'data' : 'fechaFin'
            },
            {
                'data' : 'fechaEntrega'
            },
            {
                'data' : 'estado'
            },
            {
                'data' : 'acciones'
            },
            {
                'data' : 'verificacion'
            },
            {
                'data' : 'calculoMulta'
            }
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',
     
                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                },
                //Botón para cvs
                {
                    extend: 'csvHtml5',
                    footer: true,
                    filename: 'Export_File_csv',
                    text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
                },
                {
                    extend: 'colvis',
                    text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
    });

    tblMultas = $('#tblMultas').DataTable({
        ajax: {
            url: 'http://localhost/MiniCore/Multas/listar',
            dataSrc: ''
        },
        columns: [
            {
                'data' : 'nombre'
            },
            {
                'data' : 'multaTotal'
            }
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',
     
                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                },
                //Botón para cvs
                {
                    extend: 'csvHtml5',
                    footer: true,
                    filename: 'Export_File_csv',
                    text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
                },
                {
                    extend: 'colvis',
                    text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
    });
})

function alertas(mensaje, icono){
    Swal.fire({
        position: 'center',
        icon: icono,
        title: mensaje,
        showConfirmButton: false,
        timer: 3000
      })
}

function frmCustomer(){
    document.getElementById("botoncito").innerHTML = "Nuevo Cliente";
    document.getElementById("title").innerHTML = "Registrar Cliente";
    document.getElementById("frmCustomer").reset();
    $("#nuevo_cliente").modal("show");
    document.getElementById("id").value = "";
}

function frmRegistrarCli(e){
    e.preventDefault();
    const ci = document.getElementById("ci");
    const nombre = document.getElementById("nombre");
    const telefono = document.getElementById("telefono");
    const direccion = document.getElementById("direccion");
    if(ci.value == "" || nombre.value == "" || telefono.value == "" || direccion.value == ""){
        /* clave.classList.remove("is-invalid");
        usuario.classList.add("is-invalid");
        usuario.focus(); */
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 3000
          })
    }else{
        const url = "http://localhost/MiniCore/Clientes/registrar";
        const frm = document.getElementById("frmCustomer");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                alertas(res.msg, res.icono);
                $("#nuevo_cliente").modal("hide");
                tblClientes.ajax.reload();
            }
        }
    }
}

function btnEditarCli(id){
    document.getElementById("botoncito").innerHTML = "Actualizar";
    document.getElementById("title").innerHTML = "Actualizar Cliente";
    const url = "http://localhost/MiniCore/Clientes/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("ci").value = res.ci;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("telefono").value = res.telefono;
            document.getElementById("direccion").value = res.direccion;
            $("#nuevo_cliente").modal("show");
        }
    }
}

function btnEliminarCli(id){
    Swal.fire({
        title: 'Estas seguro?',
        text: "El cliente se eliminará de forma permanente, Esta seguro de eliminar?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'SI!',
        cancelButtonText: "NO!"
      }).then((result) => {
        if (result.isConfirmed) {
            const url = "http://localhost/MiniCore/Clientes/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    alertas(res.msg, res.icono);
                    tblClientes.ajax.reload();
                }
            }
        }
      })
}

//Fin Clientes

function frmBook(){
    document.getElementById("botoncito").innerHTML = "Nuevo Libro";
    document.getElementById("title").innerHTML = "Registrar Libro";
    document.getElementById("frmBook").reset();
    $("#nuevo_libro").modal("show");
    document.getElementById("id").value = "";
}

function frmRegistrarLib(e){
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    const autor = document.getElementById("autor");
    const editorial = document.getElementById("editorial");
    if(nombre.value == "" || autor.value == "" || editorial.value == ""){
        /* clave.classList.remove("is-invalid");
        usuario.classList.add("is-invalid");
        usuario.focus(); */
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 3000
          })
    }else{
        const url = "http://localhost/MiniCore/Libros/registrar";
        const frm = document.getElementById("frmBook");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                alertas(res.msg, res.icono);
                $("#nuevo_libro").modal("hide");
                tblLibros.ajax.reload();
            }
        }
    }
}

function btnEditarLib(id){
    document.getElementById("botoncito").innerHTML = "Actualizar";
    document.getElementById("title").innerHTML = "Actualizar Libro";
    const url = "http://localhost/MiniCore/Libros/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("autor").value = res.autor;
            document.getElementById("editorial").value = res.editorial;
            $("#nuevo_libro").modal("show");
        }
    }
}

function btnEliminarLib(id){
    Swal.fire({
        title: 'Estas seguro?',
        text: "El libro se eliminará de forma permanente, Esta seguro de eliminar?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'SI!',
        cancelButtonText: "NO!"
      }).then((result) => {
        if (result.isConfirmed) {
            const url = "http://localhost/MiniCore/Libros/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    alertas(res.msg, res.icono);
                    tblLibros.ajax.reload();
                }
            }
        }
      })
}

//Fin Libros

function frmPrestamo(){
    document.getElementById("botoncito").innerHTML = "Nuevo prestamo";
    document.getElementById("title").innerHTML = "Registrar prestamo";
    document.getElementById("frmPrestamo").reset();
    $("#nuevo_prestamo").modal("show");
}

function frmRegistrarPr(e){
    e.preventDefault();
    const cliente = document.getElementById("cliente");
    const libro = document.getElementById("libro");
    const desde = document.getElementById("desde");
    const hasta = document.getElementById("hasta");
    if(cliente.value == "" || libro.value == "" || desde.value == "" || hasta.value == ""){
        /* clave.classList.remove("is-invalid");
        usuario.classList.add("is-invalid");
        usuario.focus(); */
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 3000
          })
    }else{
        const url = "http://localhost/MiniCore/Prestamos/registrar";
        const frm = document.getElementById("frmPrestamo");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                alertas(res.msg, res.icono);
                $("#nuevo_prestamo").modal("hide");
                tblLibros.ajax.reload();
            }
        }
    }
}

function btnEditarPr(id){
    document.getElementById("botoncito").innerHTML = "Actualizar";
    document.getElementById("title").innerHTML = "Actualizar Prestamo";
    const url = "http://localhost/MiniCore/Prestamos/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("codigo").value = res.codigo;
            document.getElementById("cliente").value = res.id_cliente;
            document.getElementById("libro").value = res.id_libro;
            document.getElementById("desde").value = res.fechaInicio;
            document.getElementById("hasta").value = res.fechaFin;
            $("#nuevo_prestamo").modal("show");
        }
    }
}

function btnEliminarPr(id){
    Swal.fire({
        title: 'Estas seguro?',
        text: "El prestamo se eliminará de forma permanente, Esta seguro de eliminar?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'SI!',
        cancelButtonText: "NO!"
      }).then((result) => {
        if (result.isConfirmed) {
            const url = "http://localhost/MiniCore/Prestamos/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    alertas(res.msg, res.icono);
                    tblLibros.ajax.reload();
                }
            }
        }
      })
}

function btnEntregarLibro(id){
    const url = "http://localhost/MiniCore/Prestamos/editar/"+id;
    idCliente = id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            $("#nuevo_entrega").modal("show");
        }
    }
}

function registrarLibro(e) {
    e.preventDefault();
    const entrega = document.getElementById("entrega");
    if(entrega.value == ""){
        alertas('Todos los campos son obligatorios', 'warning')
    }else{
        const url = "http://localhost/MiniCore/Prestamos/entregaLibro/"+ idCliente;
        console.log(idCliente);
        const frm = document.getElementById("frmEntrega");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                alertas(res.msg, res.icono);
                $("#nuevo_entrega").modal("hide");
                tblPrestamos.ajax.reload();
            }
        }
    }
}