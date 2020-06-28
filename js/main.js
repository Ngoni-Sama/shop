var cart = {}; // корзина
var start=0;

function init() {

    //вычитуем файл goods.json
    //$.getJSON("goods.json", goodsOut);
    if (localStorage.getItem('start')) {
        start = JSON.parse(localStorage.getItem('start'));}
    if (start==0) {
    $.post(
        "admin/core.php",
        {
            "action" : "loadGoods"
        },
        goodsOut,
        
    );
}
    if (start==1) {
        localStorage.getItem('name_f');
        name_f = JSON.parse(localStorage.getItem('name_f'));
        $.post(
        "admin/core.php",
        {
            "action" : "search",
            "name" : name_f
        },
        goodsOut,
    
        );
    }
}
    


function goodsOut(data) {
    // вывод на страницу
    data = JSON.parse(data);
    console.log(data);
    var out='';
    for (var key in data) {
        // out +='<div class="cart">';
        // out +='<p class="name">'+data[key].name+'</p>';
        // out += '<img src="images/'+data[key].img+'" alt="">';
        // out +='<div class="cost">'+data[key].cost+'</div>';
        // out +='<button class="add-to-cart">Купить</button>';
        // out +='</div>';
        //---------
      

        out +='<div class="cart">';
        out +=`<p class="name">${data[key].name}</p>`;
        out +=`<img src="images/${data[key].img}" alt="">`;
        out +=`<div>${data[key].description}`;
        out +=`<br>${data[key].weight} кг`;
        out +=`<br>${data[key].cost} руб`;
        out +=`<br>изг. ${data[key].made}`;
        out +=`<br>годен ${data[key].expiration}</div>`;
        out +=`<br><button class="add-to-cart" data-id="${key}">Купить</button>`;
        out +='</div>';
    }
    $('.goods-out').html(out);
    $('.add-to-cart').on('click', addToCart);
    
}

function addToCart() {
    //добавляем товар в корзину
    var id = $(this).attr('data-id');
    // console.log(id);
    if (cart[id]==undefined) {
        cart[id] = 1; //если в корзине нет товара - делаем равным 1
    }
    else {
        cart[id]++; //если такой товар есть - увеличиваю на единицу
    }
    showMiniCart();
    saveCart();
}

function saveCart() {
    //сохраняю корзину в localStorage
    localStorage.setItem('cart', JSON.stringify(cart)); //корзину в строку
}

function showMiniCart() {
    //показываю мини корзину
    var out="";
    for (var key in cart) {
        out += key +' --- '+ cart[key]+'<br>';
    }
    $('.mini-cart').html(out);
}

function loadCart() {
    //проверяю есть ли в localStorage запись cart
    if (localStorage.getItem('cart')) {
        // если есть - расширфровываю и записываю в переменную cart
        cart = JSON.parse(localStorage.getItem('cart'));
        showMiniCart();
    }
}

function search() {
    var start = 1;
    var name_f = $('#gsearch').val();
    localStorage.setItem('name_f', JSON.stringify(name_f));
    localStorage.setItem('start', JSON.stringify(start));
    }

$(document).ready(function () {
    init();
    loadCart();
    $('.search').on('click', search);
});
