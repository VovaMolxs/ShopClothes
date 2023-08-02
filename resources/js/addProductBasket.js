//добавление товаров в корзину
$(document).ready(function () {
    $('button#add_product').on('click', function () {
        let product_id = $(this).attr("data-id");
        let token =     $('#token').val();

        console.log(product_id)
        $.post(
            'add-basket',
            {product_id: product_id, _token: token},
            function () {

            }).done(function (response) {

            response = JSON.parse(response)
            $("#basket-count").html(response.basket_items)

        })

    })
})

//удаление товара из корзины
$(document).ready(function () {
    $('button.remove').on('click', function (e){
        let product_id = $(this).attr('data-product_id')
        let token = $(this).attr('data-token')

        $.post(
            'basket-remove',
            {product_id: product_id, _token: token},
            function () {

            }).done(function (response) {
                response = JSON.parse(response)
                $(`.tr_${product_id}`).detach()
                $("#basket-count").html(response.basket_items)
            }
        )
    })
})

//увиличение товара на 1 единицу в коризне
$(document).ready(function () {
    $('.plus').on('click', function (e) {
        e.preventDefault();
        let product_id =  $(this).attr("data-product_id");
        let token =     $(this).attr("data-token");
        let quantity = $(this).attr("data-quantity");
        let cost = $(this).attr("data-cost");

        $.post(
            'basket-plus',
            {product_id: product_id, _token: token},
            function () {

            }).done(function (response) {
            quantity++
            response = JSON.parse(response)
            console.log("количестов " + quantity);
            $("#basket-count").html(response.basket_items)
            $(`.qty-val_${product_id}`).html(quantity)
            $(`.minus_${product_id}`).attr('data-quantity', quantity)
            $(`.plus_${product_id}`).attr('data-quantity', quantity)
            $(`.product_cost_${product_id}`).html(`$` + cost*quantity)
            console.log(quantity);
        })

    })
})
//уменьшение товара на 1 единицу в коризне
$(document).ready(function () {
    $('.minus').on('click', function (e) {
        e.preventDefault();
        let product_id =  $(this).attr("data-product_id");
        let token =     $(this).attr("data-token");
        let quantity = $(this).attr("data-quantity");
        let cost = $(this).attr("data-cost");

        $.post(
            'basket-minus',
            {product_id: product_id, _token: token},
            function () {

            }).done(function (response) {
            quantity--
            response = JSON.parse(response)
            console.log($(`span.minus_ + ${product_id}`));
            $("#basket-count").html(response.basket_items)
            $(`.qty-val_${product_id}`).html(quantity)
            $(`.minus_${product_id}`).attr('data-quantity', quantity)
            $(`.plus_${product_id}`).attr('data-quantity', quantity)
            $(`.product_cost_${product_id}`).html(`$` + cost*quantity)
            console.log(quantity);
        })

    })
})






