let count_product = 1
$(document).ready(function () {
    $('#add_product').on('click', function () {
        let product_id =      $('#product_id').val();
        let token =     $('#token').val();


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



