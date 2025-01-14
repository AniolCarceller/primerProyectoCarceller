const apiUrl = "http://localhost/Wallafood/primerProyectoCarceller/api/api.php";
function crearTablaUsuarios() {
    fetch(apiUrl + "?action=panelAdministracion")
        .then(response => response.json())
        .then(data => {
            const tbody = document.querySelector('table tbody');
            tbody.innerHTML = Array.isArray(data) && data.length > 0
                ? data.map(user => `
                    <tr>
                        <td>${user.user_id}</td>
                        <td><input type="text" value="${user.nombre_apellidos}" id="nombre${user.user_id}"required /></td>
                        <td><input type="email" value="${user.correo}" required id="correo${user.user_id}"/></td>
                        <td><button onclick="updateUser(${user.user_id})">Editar</button></td>
                        <td><button onclick="deleteUser(${user.user_id})">Eliminar</button></td>
                    </tr>
                `).join('')
                : '<tr><td colspan="5">No hay usuarios disponibles.</td></tr>';
        })
        .catch(error => {
            console.error(error);
        });
}
function createUser() {
    const nombreApellidos = document.getElementById('nombreApellidos').value;
    const correo = document.getElementById('correo').value;
    const contraseña = document.getElementById('contraseña').value;

    fetch(apiUrl + "?action=insertUser", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `nombre_apellidos=${encodeURIComponent(nombreApellidos)}&correo=${encodeURIComponent(correo)}&contraseña=${encodeURIComponent(contraseña)}`
    })
    .then(() => {
        crearTablaUsuarios();
        document.getElementById('usuarioNuevo').reset();
    })
    .catch(error => {
        console.error(error);
    });
    
    crearTablaUsuarios();
}

function updateUser(userId) {
    const nombreApellidos = document.getElementById(`nombre${userId}`).value;
    const correo = document.getElementById(`correo${userId}`).value;

    fetch(apiUrl + "?action=updateUser", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `user_id=${userId}&nombre_apellidos=${encodeURIComponent(nombreApellidos)}&correo=${encodeURIComponent(correo)}`
    })
    .then(response => response.json())
    .then(result => {
        crearTablaUsuarios();
    })
    .catch(error => {
        console.error(error);
    });
}

function deleteUser(userId) {
    fetch(apiUrl + "?action=deleteUser", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `user_id=${userId}`
    })
    .then(response => response.json())
    .then(result => {
        crearTablaUsuarios();
    })
    .catch(error => {
        console.error(error);
    });
    crearTablaUsuarios();
}


function crearTablaPedidos() {
    fetch(apiUrl + "?action=panelPedidos")
        .then(response => response.json())
        .then(data => {
            const tbody = document.querySelector('table#pedidos tbody');
            tbody.innerHTML = Array.isArray(data) && data.length > 0
                ? data.map(pedido => `
                    <tr>
                        <td>${pedido.pedido_id}</td>
                        <td><input type="number" value="${pedido.user_id}" id="userid_${pedido.pedido_id}" required /></td>
                        <td><input type="text" value="${pedido.ubicacion}" id="ubicacion_${pedido.pedido_id}" required /></td>
                        <td><input type="number" value="${pedido.precio}" id="precio_${pedido.pedido_id}" required /></td>
                        <td><button onclick="updatePedido(${pedido.pedido_id})">Editar</button></td>
                        <td><button onclick="deletePedido(${pedido.pedido_id})">Eliminar</button></td>
                    </tr>

                `).join('')
                : '<tr><td colspan="6">No hay pedidos disponibles.</td></tr>';
        })
        .catch(error => {
            console.error(error);
        });
}

function createPedido() {
    const userId = document.getElementById('userid').value;
    const ubicacion = document.getElementById('ubicacionform').value;
    const precio = document.getElementById('precio').value;

    fetch(apiUrl + "?action=insertPedido", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `user_id=${encodeURIComponent(userId)}&ubicacion=${encodeURIComponent(ubicacion)}&precio=${encodeURIComponent(precio)}`
    })
    .then(() => {
        crearTablaPedidos();
        document.getElementById('pedidoNuevo').reset();
    })
    .catch(error => {
        console.error(error);
    });
}

function updatePedido(pedidoId) {
    const userId = document.getElementById(`userid_${pedidoId}`).value;
    const ubicacion = document.getElementById(`ubicacion_${pedidoId}`).value;
    const precio = document.getElementById(`precio_${pedidoId}`).value;

    fetch(apiUrl + "?action=updatePedido", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `pedido_id=${pedidoId}&user_id=${encodeURIComponent(userId)}&ubicacion=${encodeURIComponent(ubicacion)}&precio=${encodeURIComponent(precio)}`
    })
    .then(response => response.json())
    .then(result => {
        crearTablaPedidos();
    })
    .catch(error => {
        console.error(error);
    });
}

function deletePedido(pedidoId) {
    fetch(apiUrl + "?action=deletePedido", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `pedido_id=${pedidoId}`
    })
    .then(response => response.json())
    .then(result => {
        crearTablaPedidos();
    })
    .catch(error => {
        console.error(error);
    });
    crearTablaPedidos();
}

function crearTablaProductos() {
    fetch(apiUrl + "?action=panelProductos")
        .then(response => response.json())
        .then(data => {
            const tbody = document.querySelector('table#productos tbody');  
            tbody.innerHTML = Array.isArray(data) && data.length > 0
                ? data.map(producto => `
                    <tr>
                        <td>${producto.id_producto}</td>
                        <td><input type="text" value="${producto.nombre}" id="nombre_${producto.id_producto}" required /></td>
                        <td><input type="text" value="${producto.descripcion}" id="descripcion_${producto.id_producto}" required /></td>
                        <td><input type="text" value="${producto.ingredientes}" id="ingredientes_${producto.id_producto}" required /></td>
                        <td><input type="number" value="${producto.precio}" id="precioProducto_${producto.id_producto}" required /></td>
                        <td><input type="text" value="${producto.imagen}" id="imagen_${producto.id_producto}" required /></td>
                        <td><input type="text" value="${producto.tipo}" id="tipo_${producto.id_producto}" required /></td>
                        <td><button onclick="updateProducto(${producto.id_producto})">Editar</button></td>
                        <td><button onclick="deleteProducto(${producto.id_producto})">Eliminar</button></td>
                    </tr>
                `).join('')
                : '<tr><td colspan="10">No hay productos disponibles.</td></tr>';
        })
        .catch(error => {
            console.error(error);
        });
}

function createProducto() {
    const nombre = document.getElementById('nombre').value;
    const descripcion = document.getElementById('descripcion').value;
    const ingredientes = document.getElementById('ingredientes').value;
    const precio = document.getElementById('precioProducto').value;
    const imagen = document.getElementById('imagen').value;
    const tipo = document.getElementById('tipo').value;

    fetch(apiUrl + "?action=insertProducto", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `nombre=${encodeURIComponent(nombre)}&descripcion=${encodeURIComponent(descripcion)}&ingredientes=${encodeURIComponent(ingredientes)}&precio=${encodeURIComponent(precio)}&imagen=${encodeURIComponent(imagen)}&tipo=${encodeURIComponent(tipo)}`
    })
    .then(() => {
        crearTablaProductos();
        document.getElementById('productoNuevo').reset();
    })
    .catch(error => {
        console.error(error);
    });
}


function updateProducto(id_producto) {
    const nombre = document.getElementById(`nombre_${id_producto}`).value;
    const descripcion = document.getElementById(`descripcion_${id_producto}`).value;
    const ingredientes = document.getElementById(`ingredientes_${id_producto}`).value;
    const precio = document.getElementById(`precioProducto_${id_producto}`).value;
    const imagen = document.getElementById(`imagen_${id_producto}`).value;
    const tipo = document.getElementById(`tipo_${id_producto}`).value;
    fetch(apiUrl + "?action=updateProducto", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `id_producto=${id_producto}&nombre=${encodeURIComponent(nombre)}&descripcion=${encodeURIComponent(descripcion)}&ingredientes=${encodeURIComponent(ingredientes)}&precio=${encodeURIComponent(precio)}&imagen=${encodeURIComponent(imagen)}&tipo=${encodeURIComponent(tipo)}`
    })
    .then(() => {
        crearTablaProductos();
    })
    .catch(error => {
        console.error(error);
    });
}

function deleteProducto(id_producto) {
    fetch(apiUrl + "?action=deleteProducto", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `id_producto=${id_producto}`
    })
    .then(() => {
        crearTablaProductos();
    })
    .catch(error => {
        console.error(error);
    });
}
crearTablaProductos();
crearTablaUsuarios();
crearTablaPedidos();