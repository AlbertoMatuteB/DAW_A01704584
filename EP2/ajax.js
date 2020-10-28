function mostrarZombi() {
    $.post("vista_tabla.php").done(function(data) {
        $('mostarZombi').html(data);
    });
}

function mostrarEdicionEstado() {
    $.post("vista_agregar_estado.php").done(function(data) {
        let modalEstado = M.Modal.getInstance($('#modal-estado'));
        $('#modal-estado').html(data);
        modalEstado.open();
        let elems = document.querySelectorAll('select');
        let instances = M.FormSelect.init(elems);
        $('#btn-registrar-estado')[0].onclick = submitEstado;
    });
}

function mostrarEdicionZombie() {
    $.post("vista_agregar_zombi.php").done(function(data) {
        let modalZombi = M.Modal.getInstance($('#modal-zombi'));
        $('#modal-zombi').html(data);
        modalZombi.open();
        let elems = document.querySelectorAll('select');
        let instances = M.FormSelect.init(elems);
        $('#btn-registrar-zombi')[0].onclick = submitEstado;
    });
}

function submitEstado() {
    $.post("controlador_agregar_estado.php", {
        nombre: $('#nombre')[0].value,
        estado: $('#estado')[0].value
    }).done(function(data, status) {
        console.log(data);
        if (status === "success") {
            let modalEstado = M.Modal.getInstance($('#modal-estado'));
            modalEstado.close();
            mostrarEstados();
            icon = '<i class="material-icons">check</i>';
        } else {
            icon = '<i class="material-icons">clear</i>';
        }
        M.toast({ html: '<span>' + data + ' </span>' + icon });
    });
}

function submitZombie() {
    $.post("controlador_agregar_zombie.php", {
        nombre: $('#nombre')[0].value,
    }).done(function(data, status) {
        console.log(data);
        if (status === "success") {
            let modalNombre = M.Modal.getInstance($('#modal-zombi'));
            modalNombre.close();
            mostrarZombi();
            icon = '<i class="material-icons">check</i>';
        } else {
            icon = '<i class="material-icons">clear</i>';
        }
        M.toast({ html: '<span>' + data + ' </span>' + icon });
    });
}