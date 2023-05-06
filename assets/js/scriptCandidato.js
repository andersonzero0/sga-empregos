const btn_desc = document.getElementsByClassName('btn_desc');
const descricaoContent = document.getElementsByClassName('descricaoContent');

for (var i = 0; i < btn_desc.length; i++) {
    (function(index) {
      btn_desc[index].addEventListener('click', function() {
        if(descricaoContent[index].style.display == "block") {
            descricaoContent[index].style.display = "none";
        } else {
            descricaoContent[index].style.display = "block";
        }
      });
    })(i);
}