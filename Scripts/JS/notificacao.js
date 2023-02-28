
const button = document.querySelector("button")
button.addEventListener("click",()=>{
    Notification.requestPermission().then(perm =>{
        alert(perm)
        if (perm === "granted"){
            new Notification("Teste Notificação",{
                body: "Isso é um Teste",
            })
        } 
    })
})