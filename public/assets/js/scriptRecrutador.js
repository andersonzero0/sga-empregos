const btnOpenCreateVaga = document.querySelector(".btnOpenCreateVaga");
const conteinerCreateVaga = document.querySelector(".conteinerCreateVaga");
const closeCreateVaga = document.querySelector(".closeCreateVaga");
const btn_desc = document.getElementById("btn_desc");

btnOpenCreateVaga.addEventListener('click', () => {
    if(conteinerCreateVaga.style.display == "none") {
        conteinerCreateVaga.style.display = "block";
        btnOpenCreateVaga.style.display = "none";
    }
})

closeCreateVaga.addEventListener('click', () => {
    if(conteinerCreateVaga.style.display == "block") {
        conteinerCreateVaga.style.display = "none";
        btnOpenCreateVaga.style.display = "block";
    }
})