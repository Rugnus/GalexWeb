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
    $('#form').submit(function(e) { // проверка на пустоту заполненных полей. Атрибут html5 — required не подходит (не поддерживается Safari)
        e.preventDefault();
        e.stopPropagation();
        if (document.form.name.value == '' || document.form.phone.value == '' ) {
			valid = false;
			return valid;
		}
		$.ajax({
			type: "POST",
			url: "mail.php",
			data: $(this).serialize(),
            success: function() {
                console.log("Message send");
                $('.js-overlay-thank-you').fadeIn();
                $(this).find('input').val('');
                $('#form').trigger('reset');
            },
		});
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