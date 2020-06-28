function init() {
    $.post(
        "core.php",
        {
            "action" : "init"
        },
        showGoods
    );
}

function showGoods(data) {
    data = JSON.parse(data);
    console.log(data);
    var out='<select>';
    out +='<option data-id="0">Новый товар</option>';
    for (var id in data) {
        out +=`<option data-id="${id}">${data[id].name}</option>`;
    }
    out +='</select>';
    $('.goods-out').html(out);
    $('.goods-out select').on('change', selectGoods);

}

function selectGoods() {
    var id = $('.goods-out select option:selected').attr('data-id');
    console.log(id);
    $.post(
        "core.php",
        {
            "action" : "selectOneGoods",
            "gid": id
        },
        function(data) {
            data = JSON.parse(data);
            $('#gname').val(data.name);
            $('#gcost').val(data.cost);
            $('#gdescr').val(data.description);
            $('#gorder').val(data.ord);
            $('#gimg').val(data.img);
            $('#gweight').val(data.weight);
            $('#gmade').val(data.made);
            $('#gexp').val(data.expiration);
            $('#gtype').val(data.type);
            $('#gid').val(data.id);
        }
        
    );
}

function deleteGoods() {
    var id = $('#gid').val();
    if (id!='') {
        $.post(
            "core.php",
            {
                "action" : "deleteGoods",
                "id" : id
            },
            function (data) {
                if (data==1) {
                    alert('Запись удалена');
                    init();
                }
                else {
                    console.log(data);
                }
            }
        )
    }
    else {
        console.log(data);
    }
}

function saveToDb() {
    var id = $('#gid').val();
    console.log(id);
    if (id!='') {
        $.post(
            "core.php",
            {
                "action" : "updateGoods",
                "id" : id,
                "gname" : $('#gname').val(),
                "gcost" : $('#gcost').val(),
                "gdescr" : $('#gdescr').val(),
                "gorder" : $('#gorder').val(),
                "gimg" : $('#gimg').val(),
                "gweight" : $('#gweight').val(),
                "gmade" : $('#gmade').val(),
                "gexp" : $('#gexp').val(),
                "gtype" : $('#gtype').val()
            },
            function(data) {
                if(data==1) {
                    alert('Запись добавлена');
                    init();
                }
                else {
                    console.log(data);
                }

            }
        );
    }
    else {
        $.post(
            "core.php",
            {
                "action" : "newGoods",
                "id" : null,
                "gname" : $('#gname').val(),
                "gcost" : $('#gcost').val(),
                "gdescr" : $('#gdescr').val(),
                "gorder" : $('#gorder').val(),
                "gimg" : $('#gimg').val(),
                "gweight" : $('#gweight').val(),
                "gmade" : $('#gmade').val(),
                "gexp" : $('#gexp').val(),
                "gtype" : $('#gtype').val()
            },
            function(data) {
                if(data==1) {
                    alert('Запись добавлена');
                    init();
                }
                else {
                    console.log(data);
                }

            }
        );

    }
}

$(document).ready(function () {
   init();
   $('.add-to-db').on('click', saveToDb);
   $('.delete-from-db').on('click', deleteGoods);
});