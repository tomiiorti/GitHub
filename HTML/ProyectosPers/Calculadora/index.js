let operandoa = '';
let operandob = '';
let operacion = '';

function init(){
    const resultado = document.getElementById("resultado");

    function agregarNumero(numero) {
        resultado.textContent += numero;
    }

    function resetear() {
        operandoa = '';
        operandob = '';
        operacion = '';
        resultado.textContent = '';
    }

    function realizarOperacion() {
        const num1 = parseFloat(operandoa);
        const num2 = parseFloat(operandob);
        let res = 0;

        switch (operacion) {
            case '+': res = num1 + num2; break;
            case '-': res = num1 - num2; break;
            case '*': res = num1 * num2; break;
            case '/': res = num1 / num2; break;
        }

        resetear();
        resultado.textContent = res.toString();
    }

    function manejarOperacion(op) {
        if (operandoa === '') {
            operandoa = resultado.textContent;
            operacion = op;
            resultado.textContent = '';
        }
    }

    // Eventos para los botones de números y operaciones
    for (let i = 0; i <= 9; i++) {
        document.getElementById(i.toString()).addEventListener('click', () => {
            agregarNumero(i);
        });
    }

    document.getElementById('clear').addEventListener('click', () => {
        resetear();
    });

    document.getElementById('suma').addEventListener('click', () => {
        manejarOperacion('+');
    });

    document.getElementById('resta').addEventListener('click', () => {
        manejarOperacion('-');
    });

    document.getElementById('mult').addEventListener('click', () => {
        manejarOperacion('*');
    });

    document.getElementById('div').addEventListener('click', () => {
        manejarOperacion('/');
    });

    document.getElementById('igual').addEventListener('click', () => {
        operandob = resultado.textContent;
        realizarOperacion();
    });
    document.addEventListener('keydown', function(event) {
        const key = event.key;
        if (/[0-9]/.test(key)) {
            resultado.textContent += key;
        } else if (key === '+' || key === '-' || key === '*' || key === '/') {
            manejarOperacion(key);
        } else if (key === 'Enter') {
            operandob = resultado.textContent;
            resolver();
        } else if (key === 'Escape') {
            resetear();
        }
    });
}
