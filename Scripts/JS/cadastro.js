const form = document.getElementById('formCad')
const username = document.getElementById('nomeUsuario')
const email = document.getElementById('email')
const password1 = document.getElementById('senha1')
const password2 = document.getElementById('senha2')
const botao = document.getElementById('btnConfirmar')

var password1Value = password1.value.trim()
var password2Value = password2.value.trim()

botao.addEventListener('onClick',(e)=>{
    e.preventDefault()
   
    verificarInputs()
})
form.addEventListener('submit',(e)=>{
    e.preventDefault()
    password1Value = password1.value.trim()
    password2Value = password2.value.trim()

    verificarInputs()
})

function verificarInputs(){
  
    if (password1Value === ''){
        errorMessagem(password2,"Preencha este Campo.")
    }
    else if (password1Value !== password2Value){
       errorMessagem(password2,"As Senhas Estão Diferentes")
    }
    else{
        //form.submit()
    }
}
function errorMessagem(input,mensagem){
    const formControl = input.parentElement;
   input.setCustomValidity(mensagem);

}

