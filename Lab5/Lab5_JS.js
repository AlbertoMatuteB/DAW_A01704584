let myInput = document.getElementById("psw");
let letter = document.getElementById("letter");
let capital = document.getElementById("capital");
let number = document.getElementById("number");
let length = document.getElementById("length");
let special = document.getElementById("special");
let myMatch = document.getElementById("confpsw");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
//myInput.onblur = function() {
//    document.getElementById("message").style.display = "none";
//}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
    // Validate lowercase letters
    let lowerCaseLetters = /[a-z]/g;
    if (myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
    } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
    }

    // Validate capital letters
    let upperCaseLetters = /[A-Z]/g;
    if (myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
    } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
    }

    // Validate numbers
    let numbers = /[0-9]/g;
    if (myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
    } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
    }

    // Validate special characters
    let specialCharacters = /[!-/:-@[-`{-~]/g;
    if (myInput.value.match(specialCharacters)) {
        special.classList.remove("invalid");
        special.classList.add("valid");
    } else {
        special.classList.remove("valid");
        special.classList.add("invalid");
    }

    // Validate length
    if (myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
    } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
    }

    // Validate both passwords match
    let pair = myInput.value
    if (document.getElementById("confpsw").value === document.getElementById("psw").value) {
        match.classList.remove("invalid");
        match.classList.add("valid");
    } else {
        match.classList.remove("valid");
        match.classList.add("invalid");
    }
}

let aItem = 0;
let bItem = 0;
let cItem = 0;
let aStr = "";
let bStr = "";
let cStr = "";
let resultado = 0;
let rStr = "";

function carrito(item, add) {
    if (item == 0 && add == 0 && aItem > 0) {
        aItem--;
        aStr = "" + aItem;
        document.getElementById("cantidad1").innerHTML = "Cantidad: " + aStr;
    }
    if (item == 0 && add == 1) {
        aItem++;
        aStr = "" + aItem;
        document.getElementById("cantidad1").innerHTML = "Cantidad: " + aStr;
    }
    if (item == 1 && add == 0 && bItem > 0) {
        bItem--;
        bStr = "" + bItem;
        document.getElementById("cantidad2").innerHTML = "Cantidad: " + bStr;
    }
    if (item == 1 && add == 1) {
        bItem++;
        bStr = "" + bItem;
        document.getElementById("cantidad2").innerHTML = "Cantidad: " + bStr;
    }
    if (item == 2 && add == 0 && cItem > 0) {
        cItem--;
        cStr = "" + cItem;
        document.getElementById("cantidad3").innerHTML = "Cantidad: " + cStr;
    }
    if (item == 2 && add == 1) {
        cItem++;
        cStr = "" + cItem;
        document.getElementById("cantidad3").innerHTML = "Cantidad: " + cStr;
    }
    if (item == 3 && add == 0) {
        resultado = (aItem * 150 + bItem * 100000 + cItem * 10000) * 1.16;
        rStr = "" + resultado;
        document.getElementById("checkout").innerHTML = "Total: " + rStr;
    }
    return 0;
}

function inverso() {
    let entrada = document.getElementById("pInv").value;

    entrada = entrada + ""; // string("entrada, ej: 12345")
    document.getElementById("resultadoInv").innerHTML = entrada.split("").reverse("").join("");
    //split: divide el string en caracteres ej:[12345] = [1][2][3][4][5]...
    //reverse: invierte los valores en cada seccion del array
    //join: junta los valores del arreglo en un solo string
}