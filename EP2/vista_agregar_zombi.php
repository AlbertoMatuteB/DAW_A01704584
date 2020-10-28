<?php include_once "util.php"?>

<div class="modal-content" >
    <h1>Agregar Nuevo Zombie</h1>
    <div class="col s12">
        <div class="row">
            <div class="input-field col s3">
                <input placeholder="nombre" id="nombre" type="varchar" class="validate" data-length="255" name="nombre">
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button class="btn waves-effect waves-light" id="btn-registrar-zombie" name="action">Registrar
        <i class="material-icons right">send</i>
    </button>
    <a href="#" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
</div>