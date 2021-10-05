$(function () {
    $('#datep').datepicker($.datepicker.regional["ru"]);
});

$(function () {
    $('.deposit__button').on('click', function (e) {
        e.preventDefault();
        $.ajax('calc.php', {
            type: "POST",
            dataType: 'json',
            data: JSON.stringify({
                "startDate": $('#datep').val(),
                "sum": $('#sum').val(),
                "term": convertTerm($('#term').val()),
                "percent": $('#percent').val(),
                "sumAdd": $('#sumAdd').val()
            }),
            success: function (result) {
                $('<div class="result"><p>Сумма к выплате</p><span class="ruble">&#8381;</span><span class="final_price">' + result['sum'] + '</span></div>').insertAfter('form');
            },
        })
    });
});

function convertTerm(val) {
    if ($('select').val() === 'year') {
        return val * 12;
    }
    return val;
}

let checkbox = document.querySelector(".deposit_checkbox");
let value = document.querySelector(".deposit__model_show");
let map_close = document.querySelector(".map_close");
checkbox.addEventListener("click", function (evt) {
    if (value.classList.contains("deposit__model_show"))
        value.classList.toggle("deposit__model_show_on");
});


