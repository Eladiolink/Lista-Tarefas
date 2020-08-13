function validation(tag1, tag2, tipo) {
    const elemento1 = document.getElementById(tag1);
    const elemento2 = document.getElementById(tag2);
    const logs = document.getElementById('logs');
    const btn = document.getElementById('btn');


    elemento2.addEventListener('keyup', () => {

        logs.className = "mt-3 bg-danger px-2";
        logs.style.borderRadius = "5px"

        if (tipo == 'nome') {
            if (elemento1.value == elemento2.value) {
                logs.innerHTML = "coloque um Sobrenome válido";
                btn.disabled = true;
            } else {
                logs.innerHTML = "";
                btn.disabled = false;
            }
        } else {
            if (elemento1.value != elemento2.value && elemento2.value.length > 5) {
                logs.innerHTML = "As senhas devem ser indênticas";
                btn.disabled = true
            } else {
                logs.innerHTML = "";
                btn.disabled = false
            }
        }
    })

    elemento1.addEventListener('keyup', () => {
        if (elemento1.value.length <= 7 && tipo == 'senha') {
            logs.style.borderRadius = "5px";
            logs.className = "mt-3 bg-warning px-2";
            logs.innerHTML = 'A senha deve ter no mínimo 8 caracteres';
            btn.disabled = true
        } else {
            logs.innerHTML = "";
            btn.disabled = false
        }
    })

}

function checkbox() {
    const termos = document.getElementById('termos');
    const form = document.getElementById('form');
    const logs = document.getElementById('logs');
    const submitBtn = document.getElementById('btn');
    logs.className = "mt-3 bg-danger px-2";
    logs.style.borderRadius = "5px"
    
    submitBtn.addEventListener("click",(event)=>{
        event.preventDefault();
    });
        submitBtn.addEventListener('click', () => {
        console.log('Entrou aqui mano ó')
        if (termos.checked == true) {
            console.log('submit');
            form.submit();
        } else {
            console.log('No submit');
            logs.innerHTML = "Deve-se Ler e concordar com os termos de serviço";
        }
    })


}



validation("nome", "sobrenome", 'nome');
validation("senha", "c_senha", 'senha');

