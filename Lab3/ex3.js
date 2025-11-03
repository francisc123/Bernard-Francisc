var num1 = 15;
var num2 = 20;
var num3 = 12;

var numere = [num1, num2, num3];

numere.sort(function(a, b) {
    return b - a; 
});

console.log(numere.join(", "));