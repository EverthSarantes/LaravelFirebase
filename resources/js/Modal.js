function guardarDatos() {
    var codigo = $('#codigo').val();
    var descripcion = $('#descript').val();
    var cantidad = $('#cant').val();
    
    $.ajax({
        url: '/nose-como-se-llamewe', 
        method: 'POST',
        data: {
            codigo: codigo,
            descripcion: descripcion,
            cantidad: cantidad,
            _token: '{{ csrf_token() }}' // Agrega el token aunque no se si Firebase funciona igual :b
        },
        success: function(response) {
            alert('Articulo agregado de manera exitosa');
            $('#miModal').modal('hide'); 
            $('#miFormulario')[0].reset(); 
        },
        error: function(xhr) {
            alert('Error al agregar un articulo');
        }
    });
}
function editarDatos() {
    //Aca de cabrones no se como haras el controlador pero te dejo hecho el metodo por cualquier peo
    var codigo = $('#codigo').val();
    var descripcion = $('#descript').val();
    var cantidad = $('#cant').val();
    
    $.ajax({
        url: '/nose-como-se-llamewe', 
        method: 'POST',
        data: {
            codigo: codigo,
            descripcion: descripcion,
            cantidad: cantidad,
            _token: '{{ csrf_token() }}' // Agrega el token aunque no se si Firebase funciona igual :b
        },
        success: function(response) {
            alert('Articulo agregado de manera exitosa');
            $('#miModal').modal('hide'); 
            $('#miFormulario')[0].reset(); 
        },
        error: function(xhr) {
            alert('Error al agregar un articulo');
        }
    });
}

document.getElementById('confirmarEliminar').addEventListener('click', function() {
    // nomas agrega las cosas del controlador wei :b
    alert('Elemento eliminado con éxito.');
    
    // Cierra el modal después de confirmar
    $('#miModal').modal('hide');
});