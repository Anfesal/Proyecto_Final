function carFunction(marcador) {
    let baseDeDatos = [
        { id: 1, nombre: 'MUG LENTE CAMARA', precio: 25000, imagen: 'img/termo.jpeg' },
        { id: 2, nombre: 'LAMPARA PIÑA', precio: 13000, imagen: 'img/termoS.jpeg' },
        { id: 3, nombre: 'LLAVERO GOT', precio: 10000, imagen: 'img/termo.jpeg' },
        { id: 4, nombre: 'LAMPARA LUNA', precio: 23000, imagen: 'img/termo.jpeg' },
        { id: 5, nombre: 'MUG CALAVERA', precio: 32000, imagen: 'img/termo.jpeg' },
        { id: 6, nombre: 'ENCENDEDOR GRANADA', precio: 15000, imagen: 'img/termo.jpeg' },
        { id: 7, nombre: 'RECEPTOR BLUETOOTH', precio: 22000, imagen: 'img/termo.jpeg' },
        { id: 8, nombre: 'PARLANTE BLUETOOTH', precio: 30000, imagen: 'img/termo.jpeg' },
        { id: 9, nombre: 'BOMBILLO PARLANTE', precio: 35000, imagen: 'img/termo.jpeg' },
        { id: 10, nombre: 'MATA ZANCUDOS', precio: 23000, imagen: 'img/termo.jpeg' },
        { id: 11, nombre: 'AURICULARES BLUETOOTH', precio: 49000, imagen: 'img/termo.jpeg' },
        { id: 12, nombre: 'MUG CALAVERA', precio: 49000, imagen: 'img/termo.jpeg' },
        { id: 13, nombre: 'MUG LENTE CAMARA', precio: 49000, imagen: 'img/termo.jpeg' },
        { id: 14, nombre: 'LAMPARA LUNA', precio: 49000, imagen: 'img/termo.jpeg' },
        { id: 15, nombre: 'ESFERA LABERINTO', precio: 49000, imagen: 'img/termo.jpeg' },
        { id: 16, nombre: 'LLAVERO GUANTE THANOS', precio: 49000, imagen: 'img/termo.jpeg' }
    ]

    let m = marcador;
    let $carrito = document.querySelector('#carrito');
    let $total = document.querySelector('#total');
    anyadirCarrito(m);

    function anyadirCarrito(id_marc) {

        carrito.push(id_marc);
        calcularTotal();
        renderizarCarrito();
    }

    function calcularTotal() {

        total = 0;
        for (let item of carrito) {
            let miItem = baseDeDatos.filter(function(itemBaseDatos) {
                return itemBaseDatos['id'] == item;
            });
            total = total + miItem[0]['precio'];
        }
        $total.textContent = total;
    }

    function renderizarCarrito() {

        $carrito.textContent = '';
        let carritoSinDuplicados = [...new Set(carrito)];
        carritoSinDuplicados.forEach(function(item, indice) {

            let miItem = baseDeDatos.filter(function(itemBaseDatos) {
                return itemBaseDatos['id'] == item;
            });
            let numeroUnidadesItem = carrito.reduce(function(total, itemId) {
                return itemId === item ? total += 1 : total;
            }, 0);

            let miNodo = document.createElement('li');
            miNodo.classList.add('list-group-item', 'text-right', 'mx-2');
            miNodo.textContent = `${numeroUnidadesItem} x ${miItem[0]['nombre']} - ${miItem[0]['precio']}€`;
            // Boton de borrar
            let miBoton = document.createElement('button');
            miBoton.classList.add('btn', 'btn-danger', 'mx-5');
            miBoton.textContent = 'X';
            miBoton.style.marginLeft = '1rem';
            miBoton.setAttribute('item', item);
            miBoton.addEventListener('click', borrarItemCarrito);

            miNodo.appendChild(miBoton);
            $carrito.appendChild(miNodo);
        })
    }

    function borrarItemCarrito() {
        console.log()
        let id = this.getAttribute('item');

        carrito = carrito.filter(function(carritoId) {
            return carritoId !== id;
        });

        renderizarCarrito();

        calcularTotal();
    }
}