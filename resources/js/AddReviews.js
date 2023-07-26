/*
$(document).ready(function () {
    $('#send_review').on('click', function () {
        let text =      $('#review_text').val();
        let token =     $('#token').val();
        let product_id = $('#product_id').val();
        let mark      = $('#review_mark').val();
        let user_id      = $('#user_id').val();
        let user_name = $('#user_name').val();

        console.log(token);
        $.post(
            'add-comment',
            {text: text, _token: token, mark:mark, product_id: product_id, user_id: user_id},
            function () {

            }).done(function (response) {
            console.log(user_name)
            response = JSON.parse(response)
            $("#comment-list").append(
                "<div class=\"single-comment justify-content-between d-flex\" id=\"comments\">\n" +
                "                                                    <div class=\"user justify-content-between d-flex\">\n" +
                "                                                        <div class=\"thumb text-center\">\n" +
                "                                                            <!-- <img src=\"{{ asset('/storage') }}/assets/imgs/page/avatar-6.jpg\" alt=\"\"> -->\n" +
                "                                                            <h6><a href=\"#\">"+ user_name +"</a></h6>\n" +
                "                                                        </div>\n" +
                "                                                        <div class=\"desc\">\n" +
                "                                                            <div class=\"product-rate d-inline-block\">\n" +
                "                                                                <div class=\"product-rating\" style=\"width:"+ response.mark +"0%\">\n" +
                "                                                                </div>\n" +
                "                                                            </div>\n" +
                "                                                            <p>" + response.text + "</p>\n" +
                "                                                            <div class=\"d-flex justify-content-between\">\n" +
                "                                                                <div class=\"d-flex align-items-center\">\n" +
                "                                                                    <p class=\"font-xs mr-30\"> </p>\n" +
                "                                                                </div>\n" +
                "                                                            </div>\n" +
                "                                                        </div>\n" +
                "                                                    </div>\n" +
                "                                                </div")
        })

    })
})
*/
