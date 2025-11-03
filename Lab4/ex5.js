var a = 3
var b = 3
var c = 3

if(a + b > c && a + c > b && b + c > a)
    console.log("Laturile pot forma un triunghi")

if(a === b && b === c) 
    console.log("Triunghi echilateral")
else if(a === b || a === c || b === c) 
    console.log("Triunghi isoscel")
else 
    console.log("Triunghi oarecare")