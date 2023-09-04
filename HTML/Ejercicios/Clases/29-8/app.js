let nombre = prompt("¿Como te llamas?"); // string
console.log(nombre);

let apellido = prompt("¿Tu apellido?"); // string
console.log(apellido);

let usname = prompt("Nombre de usuario?"); // string
console.log(usname);

let edad = prompt("Tu edad?"); // string
console.log(parseInt(edad));

let correo = prompt("¿Tu correo?"); // string
console.log(correo);

let mayEdad = prompt("¿Sos mayor de edad?"); // string
console.log(mayEdad === "true");

let sueldo = prompt("¿Cual es tu sueldo?"); // string
console.log(parseFloat(sueldo));

let gastos = prompt("¿Cuantos gastos tenes?"); // string
console.log(parseFloat(gastos));

console.log(nombre + " " + apellido); // Concatenación de strings
console.log("Dinero disponible:", parseFloat(sueldo) - parseFloat(gastos)); // Cálculo de diferencia
