var a = 25
var b = 16
var c = 25
var d = 16

if(a > 0 && b > 0 && c > 0 && d > 0 && a === c && b === d) {
    console.log("Cele 4 numere pot reprezenta laturile unui dreptunghi")
    var arie = a * b
    console.log("Arie: " + arie)
    var perimetru = a + b + c + d
    console.log("Perimetru: " + perimetru)
}   
else
    console.log("Cele 4 numere nu pot reprezenta laturile unui dreptunghi")