const btnOpenCreateVaga = document.querySelector(".btnOpenCreateVaga");
const conteinerCreateVaga = document.querySelector(".conteinerCreateVaga");
const closeCreateVaga = document.querySelector(".closeCreateVaga");
const btnViewList = document.getElementsByClassName("btnViewList");
const contentListViewGeral = document.getElementsByClassName("contentListViewGeral");

const openMaxInfo = document.getElementsByClassName("openMaxInfo");
const viewInfoExtraAndOptions = document.getElementsByClassName("viewInfoExtraAndOptions");

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

for (var i = 0; i < btnViewList.length; i++) {
    (function(index) {
      btnViewList[index].addEventListener('click', function() {
        if(contentListViewGeral[index].style.display == "block") {
            contentListViewGeral[index].style.display = "none";
        } else {
            contentListViewGeral[index].style.display = "block";
        }
      });
    })(i);
}

for (var i = 0; i < openMaxInfo.length; i++) {
    (function(index) {
      openMaxInfo[index].addEventListener('click', function() {
        if(viewInfoExtraAndOptions[index].style.display == "flex") {
            viewInfoExtraAndOptions[index].style.display = "none";
        } else {
            viewInfoExtraAndOptions[index].style.display = "flex";
        }
      });
    })(i);
}