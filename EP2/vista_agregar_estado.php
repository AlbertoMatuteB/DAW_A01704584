<?php include_once "util.php"?>

<div class="modal-content" >
    <h1>Agregar Nuevo estado</h1>
    <div class="col s12">
        <div class="row">
            <div class="input-field col s12">
                <select id="nombre" name="nombre">
                    <option selected disabled value = "">Seleccione un zombi:
                    </option>
                    <?= getOpciones('id_zombi', 'nombre', 'zombis') ?>
                </select>
                <label for="zombi">zombi:</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <select id="tipoIn" name="tipoIn">
                    <option selected disabled value = "">Seleccione el estado actual:
                    </option>
                    <?= getOpciones('id_estado', 'nombreEstado', 'estado') ?>
                </select>
                <label for="tipoIn">Estado actual:</label>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button class="btn waves-effect waves-light" id="btn-registrar-estado" name="action">Registrar
        <i class="material-icons right">send</i>
    </button>
    <a href="#" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
</div>