function table_generator() {
    let entrada = prompt("ingrese un numero", "0");

    while (isNaN(entrada)) {
        entrada = prompt("asegurate que es un numero");
    }
    let table = "";
    table = table.concat("<table>");
    for (let i = 1; i <= entrada; i++) {
        table = table.concat("<tr>");
        table = table.concat("<td>" + i + "</td>");
        table = table.concat("<td>" + i ** 2 + "</td>");
        table = table.concat("<td>" + i ** 3 + "</td>");
        table = table.concat("</tr>");
    }

    table = table.concat("</table>");
    document.getElementById("problema1").innerHTML = table;
}

function sumatoria() {
    valorMaximo = 100;
    numeroA = Math.floor(Math.random() * valorMaximo);
    numeroB = Math.floor(Math.random() * valorMaximo);
    resultado = numeroA + numeroB;
    let entrada = prompt("Cual es el resultado de: " + numeroA + " + " + numeroB);
    let startTime = new Date();

    while ((isNaN(entrada) || entrada != resultado) && entrada != null) {

        let error = "";

        if (isNaN(entrada)) {
            error = "Ingresa un valor numerico, ";
        } else {
            error = "Resultado incorrecto, ";
        }

        entrada = prompt(error + "\n Cual es el resultado de: " + numeroA + " + " + numeroB);
    }

    if (entrada == resultado) {
        let tiempoFinal = (new Date() - startTime) / 1000;
        alert("Correcto! " + numeroA + " + " + numeroB + " = " + resultado + ", " + "te tardaste: " + tiempoFinal + " segundos en responderlo!");
    }

}

function contador() {
    let arregloNumeros = [];
    for (let i = 0; i < 100; i++) {
        arregloNumeros[i] = Math.floor(Math.random() * 100 - Math.random() * 100);
    }
    let table = "";
    table = table.concat("<table>");
    for (let i = 0; i < 100; i += 10) {
        table = table.concat("<tr>");
        table = table.concat("<td>" + arregloNumeros[i] + "</td>");
        table = table.concat("<td>" + arregloNumeros[i + 1] + "</td>");
        table = table.concat("<td>" + arregloNumeros[i + 2] + "</td>");
        table = table.concat("<td>" + arregloNumeros[i + 3] + "</td>");
        table = table.concat("<td>" + arregloNumeros[i + 4] + "</td>");
        table = table.concat("<td>" + arregloNumeros[i + 5] + "</td>");
        table = table.concat("<td>" + arregloNumeros[i + 6] + "</td>");
        table = table.concat("<td>" + arregloNumeros[i + 7] + "</td>");
        table = table.concat("<td>" + arregloNumeros[i + 8] + "</td>");
        table = table.concat("<td>" + arregloNumeros[i + 9] + "</td>");
        table = table.concat("</tr>");
    }

    table = table.concat("</table>");


    let negativos = 0;
    let positivos = 0;
    let ceros = 0;

    for (let i = 0; i < 100; i++) {
        if (arregloNumeros[i] < 0) {
            negativos++;
        }
        if (arregloNumeros[i] > 0) {
            positivos++;
        }
        if (arregloNumeros[i] == 0) {
            ceros++;
        }
    }

    table = table.concat("En el arreglo hay: \n " + negativos + " negativos, " + positivos + " positivos, " + ceros + " ceros ");

    document.getElementById("problema3").innerHTML = table;
}

function promedio() {
    let size = 5

    let matriz = [];

    for (let i = 0; i < size; i++) {

        matriz[i] = new Array(size);

    }

    for (let i = 0; i < size; i++) {
        for (let j = 0; j < size; j++) {
            matriz[i][j] = Math.floor(Math.random() * (10));
        }
    }
    let table = "";
    let promedioAr = "";
    let promedioCol = "";
    let promedioFin = 0;
    table = table.concat("<table>");
    for (let i = 0; i < size; i++) {
        table = table.concat("<tr>");
        promedioAr = 0;

        for (let j = 0; j < size; j++) {
            promedioAr += matriz[i][j];
            table = table.concat("<td>" + matriz[i][j] + "</td>");
        }

        table = table.concat("<td>" + "</td>");
        table = table.concat("<td>" + (promedioAr / size) + "</td>");
        promedioFin += promedioAr / size;
        table = table.concat("</tr>");
    }

    table = table.concat("</table>");
    table = table.concat("Promedio final de la matriz: " + promedioFin / size);

    document.getElementById("problema4").innerHTML = table;
}

/** 
function inverso() {
    let entrada = prompt("Ingrese un numero");

    while (isNaN(entrada)) {
        entrada = prompt("asegurate que es un numero");
    }

    entrada = entrada + ""; // string("entrada, ej: 12345")
    alert(entrada.split("").reverse("").join(""));
    //split: divide el string en caracteres ej:[12345] = [1][2][3][4][5]...
    //reverse: invierte los valores en cada seccion del array
    //join: junta los valores del arreglo en un solo string
}
*/

function inverso() {
    let entrada = prompt("Ingrese un numero");

    while (isNaN(entrada)) {
        entrada = prompt("asegurate que es un numero");
    }

    let numInvertido = 0;
    do {
        numInvertido = numInvertido * 10 + (entrada % 10)
        entrada = Math.floor(entrada / 10)
    } while (entrada > 0)
    alert(numInvertido);

}

function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('problema5').innerHTML =
        h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}

function checkTime(i) {
    if (i < 10) { i = "0" + i }; //esto para agregar un cero despues de un numero menor a 10 ej: 09, 05, 02...
    return i;
}