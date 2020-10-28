<?php
include '_header.html';
require_once 'util.php';
?>
    <header>
    </header>

<main>

    <?php include '_navbar.html'; ?>
    <div class="container">
        <div id="modal-incidente" class="modal" style="overflow: visible"></div>
    </div>

        <div class="container">

            <a class="right btn-floating btn-large waves-effect waves-light red" id="btn-agrega-zombi"><i class="material-icons">add</i></a>
            <h3>Personas por la Ética en el Trato de los Zombis (PETZ)</h3>

            <div id="mostarZombi"></div>

        </div>

    </main>
<br><br>

<?php include '_footer.html'; ?>
<script>
    $(document).ready(function() {
        $('#modal-zombi').modal();
    });
    document.getElementById("btn-agrega-zombi").addEventListener("click", mostrarEdicionZombi)
</script>
<script>
    $(document).ready(function() {
        $('#modal-estado').modal();
    });
    document.getElementById("btn-agrega-estado").addEventListener("click", mostrarEdicionEstado)
</script>
<script>mostrarzombi();</script>