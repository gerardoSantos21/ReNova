
function incrementQuantity() {
    var input = document.getElementById('cantidad');
    var valorActual = parseInt(input.value);
    
    var stockMaximo = parseInt(input.getAttribute('max')) || 100;

    if (valorActual < stockMaximo) {
        input.value = valorActual + 1;
    } else {
        alert("¡No puedes agregar más! Solo tenemos " + stockMaximo + " en stock.");
    }
}

function decrementQuantity() {
    var input = document.getElementById('cantidad');
    var valorActual = parseInt(input.value);

    if (valorActual > 1) {
        input.value = valorActual - 1;
    }
}