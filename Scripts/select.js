import controller from 'Controller/UsuarioController.php';
async function atualizar(){
let selectcad = document.getElementById("estados");

    var opcaoTexto = selectcad.options[selectcad.selectedIndex].text;
    var opcaoValor = selectcad.options[selectcad.selectedIndex].value;
    //console.log(opcaoTexto)
    console.log(opcaoValor+" "+opcaoTexto);

    fetch('Controller/UsuarioController.php?idEstado='+opcaoValor,{
        method: 'get',
    })
        
}