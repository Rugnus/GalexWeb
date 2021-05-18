// Как только страничка загрузилась 
window.onload = function () { 
    // проверяем поддерживает ли браузер FormData 
    if(!window.FormData) {
      alert("Браузер не поддерживает загрузку файлов на этом сайте");
    }
}

$(document).ready(function () {
    let item = document.getElementById('webdev');

    let itemSEO = document.getElementById('seo');
    
    let itemDesign = document.getElementById('design');
    
    let changeClass = item.addEventListener("click", function(e) {
        let active = document.getElementsByClassName('active');
        let itemActive = document.getElementsByClassName('item-active');
    
        let i;
        for (i = 0; i < active.length; i++) {
            active[i].classList.remove('active');
        }
        for (i = 0; i < itemActive.length; i++) {
            itemActive[i].classList.remove('item-active');
    
        }
        console.log(e.target);
        var acc = document.getElementById('web-block').classList.add('active');
        item.classList.add('item-active');
    });
    
    let changeSeoClass = itemSEO.addEventListener("click", function(e) {
        let active = document.getElementsByClassName('active');
        let itemActive = document.getElementsByClassName('item-active');
    
        let i;
        for (i = 0; i < active.length; i++) {
            active[i].classList.remove('active');
        }
        for (i = 0; i < itemActive.length; i++) {
            itemActive[i].classList.remove('item-active');
    
        }
        console.log(e.target);
        var acc = document.getElementById('seo-block').classList.add('active');
        itemSEO.classList.add('item-active');
    });
    
    let changeDesignClass = itemDesign.addEventListener("click", function(e) {
        let active = document.getElementsByClassName('active');
        let itemActive = document.getElementsByClassName('item-active');
    
        let i;
        for (i = 0; i < active.length; i++) {
            active[i].classList.remove('active');
        }
        for (i = 0; i < itemActive.length; i++) {
            itemActive[i].classList.remove('item-active');
    
        }
        console.log(e.target);
        var acc = document.getElementById('design-block').classList.add('active');
        itemDesign.classList.add('item-active');
    });

    // --------------------------ВАРИАНТ 4--------------------------
    document.getElementById('form').addEventListener('submit', function(evt){
        var http = new XMLHttpRequest(), f =this;
        var th = $(this);
        evt.preventDefault;
        http.open("POST", "send.php", true);
        http.onreadystatechange = function() {
            if(http.readyState == 4 && http.status == 200) {
                alert(http.responseText);
                if (http.responseText.indexOf(f.name.value ) == 0) {
                    th.trigger("reset");
                }
            }
        }
        http.onerror = function() {
            alert("Ошибка, попробуйте ещё раз!");
        }
        http.send(new FormData(f));
    }, false);

    $('#form').on('change', '.form__upload', function (e) {
        var file = e.target.files[0].name;
        $(this).next('.file-show').html(file);
      });

});

