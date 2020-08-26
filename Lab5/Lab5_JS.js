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

//when the user clicks the confirm password field, show the message box
myMatch.onfocus = function() {
    document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
}
myMatch.onblur = function() {
    document.getElementById("message").style.display = "none";
}

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


}


// When the user starts to type something inside the confirm password field
myMatch.onkeyup = function() {

    // Validate both passwords match

    if (myMatch.value === myInput.value) {
        match.classList.remove("invalid");
        match.classList.add("valid");
    } else {
        match.classList.remove("valid");
        match.classList.add("invalid");
    }
}


//Caso tienda virtual

let aItem = 0;
let bItem = 0;
let cItem = 0;
let aStr = "";
let bStr = "";
let cStr = "";
let resultado = 0;
let rStr = "";

//funcion que maneja todos los movimientos de la tienda, ya sea aumentar, reducir, y calcular el costo total
//item 0: chamarra - $5000
//item 1: lentes de sol - $2000
//item 2: cachito del avion - $500
//item 3: le dice a la funcion que el usuario quiere saber cuanto es el total de su carrito, incluido el iva
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
        resultado = (aItem * 5000 + bItem * 2000 + cItem * 500) * 1.16;
        rStr = "" + resultado;
        document.getElementById("checkout").innerHTML = "Total: " + "$" + rStr;
    }
    return 0;
}


//una funcion que invierte un string, desde una palabra, hasta un bello poema, chequenlo.
/**
Dammit I'm mad.
Evil is a deed as I live.
God, am I reviled? I rise, my bed on a sun, I melt.
To be not one man emanating is sad. I piss.
Alas, it is so late. Who stops to help?
Man, it is hot. I'm in it. I tell.
I am not a devil. I level "Mad Dog".
Ah, say burning is, as a deified gulp,
In my halo of a mired rum tin.
I erase many men. Oh, to be man, a sin.
Is evil in a clam? In a trap?
No. It is open. On it I was stuck.
Rats peed on hope. Elsewhere dips a web.
Be still if I fill its ebb.
Ew, a spider… eh?
We sleep. Oh no!
Deep, stark cuts saw it in one position.
Part animal, can I live? Sin is a name.
Both, one… my names are in it.
Murder? I'm a fool.
A hymn I plug, deified as a sign in ruby ash,
A Goddam level I lived at.
On mail let it in. I'm it.
Oh, sit in ample hot spots. Oh wet!
A loss it is alas (sip). I'd assign it a name.
Name not one bottle minus an ode by me:
"Sir, I deliver. I'm a dog"
Evil is a deed as I live.
Dammit I'm mad.
 */
function inverso() {
    let entrada = document.getElementById("pInv").value;

    if (entrada == "") {
        alert("Escriba algo primero");
    }
    entrada = entrada + ""; // string("entrada, ej: 12345")
    document.getElementById("resultadoInv").innerHTML = entrada.split("").reverse("").join("");
    //split: divide el string en caracteres ej:[12345] = [1][2][3][4][5]...
    //reverse: invierte los valores en cada seccion del array
    //join: junta los valores del arreglo en un solo string
}