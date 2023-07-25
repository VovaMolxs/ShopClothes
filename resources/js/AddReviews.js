
$(document).ready(function () {
    $('#send_review').on('click', function () {
        let text =      $('#review_text').val();
        let token =     $('#token').val();
        let product_id = $('#product_id').val();
        let mark      = $('#review_mark').val();
        let user_id      = $('#user_id').val();
        console.log(token);
        $.post(
            'add-comment',
            {text: text, _token: token, mark:mark, product_id: product_id, user_id: user_id},
            function () {

            }).done(function (response) {
            console.log(response)
            response = JSON.parse(response)
            $("#comments").append("<div>Mark:"+response.mark+"</div>"+"<div>Comment:"+response.text+"</div>")
        })

    })
})
