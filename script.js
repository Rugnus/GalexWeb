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