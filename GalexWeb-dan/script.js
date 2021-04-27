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

    // ОТПРАВКА ЗАЯВКИ
    $('#form').submit(function() {
        if (document.form.name.value == '' || document.form.phone.value == '') {
            valid = false;
            alert('Заполните все поля!');
            return valid;
        }
        $.ajax({
            type: "POST",
            // headers: {
            //     'Access-Control-Allow-Origin': '*'
            //  },
            url: "mail.php",
            dataType: "html",
            data: $(this).serialize(),
            beforeSend: load,
            success: load_success
        }).done(function() {
            $('.js-overlay-thank-you').fadeIn();
            $(this).find('input').val('');
            $('#form').trigger('reset');
        });
        console.log("Forma отправлена");
        return false;
    });
});

// ЗАКРЫТЬ ПОПАП "СПАСИБО"
$('.js-close-thank-you').click(function() {
    $('.js-overlay-thank-you').fadeOut();
});

$(document).mouseup(function(e) {
    var popup = $('.popup');
    if(e.target!=popup[0]&&popup.has(e.target).length === 0) {
        $('.js-overlay-thank-you').fadeOut();
    }
})

// $(function($) {
//     $('[name="phone"]').mask("+7(999) 999-9999");
// })