function carFunction(marcador, add) {
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
    let i_d = add;

    let $carrito = document.querySelector('#carrito');
    let $total = document.querySelector('#total');



    anyadirCarrito(m);

    function anyadirCarrito(id_marc) {
        if (i_d !== false) {
            if (i_d == "#a1") {
                cont_bt += 1;
                cont_btt = cont_bt;
            }
            if (i_d == "#a2") {
                cont_bt2 += 1;
                cont_btt = cont_bt2;
            }
            if (i_d == "#a3") {
                cont_bt3 += 1;
                cont_btt = cont_bt3;
            }
            if (i_d == "#a4") {
                cont_bt4 += 1;
                cont_btt = cont_bt4;
            }
            if (i_d == "#a5") {
                cont_bt5 += 1;
                cont_btt = cont_bt5;
            }
            if (i_d == "#a6") {
                cont_bt6 += 1;
                cont_btt = cont_bt6;
            }
            if (i_d == "#a7") {
                cont_bt7 += 1;
                cont_btt = cont_bt7;
            }
            if (i_d == "#a8") {
                cont_bt8 += 1;
                cont_btt = cont_bt8;
            }
            if (i_d == "#a9") {
                cont_bt9 += 1;
                cont_btt = cont_bt9;
            }
            if (i_d == "#a10") {
                cont_bt10 += 1;
                cont_btt = cont_bt10;
            }
            if (i_d == "#a11") {
                cont_bt11 += 1;
                cont_btt = cont_bt11;
            }

            let $a1 = document.querySelector(i_d);
            $a1.textContent = '';
            let element = document.createElement("a");
            element.classList.add('list-group-item', 'text-center', 'mx-2');
            element.textContent = `${cont_btt} Elementos añadidos`;
            $a1.appendChild(element);
        }
        //let elementContent = document.createTextNode("dsafsadads");
        //element.appendChild(elementContent);
        // let currentA = document.getElementById("a1");
        //document.body.insertBefore(element, currentA);

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

            miNodo.textContent = ` ${numeroUnidadesItem} x ${miItem[0]['nombre']} - ${miItem[0]['precio']}`;



            // Boton de borrar
            let miBoton = document.createElement('button');
            miBoton.classList.add('btn', 'btn-danger', 'mx-5');
            miBoton.textContent = 'X';
            miBoton.style.marginLeft = '1rem';
            miBoton.setAttribute('item', item);
            miBoton.addEventListener('click', borrarItemCarrito);

            miNodo.appendChild(miBoton);
            localStorage.b = $carrito.appendChild(miNodo);

        })
    }

    function borrarItemCarrito() {
        console.log()
        let id = this.getAttribute('item');

        carrito = carrito.filter(function(carritoId) {
            if (carritoId == id) {
                return false;
            } else return true;
        });

        renderizarCarrito();

        calcularTotal();
    }
}