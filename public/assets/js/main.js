jQuery().ready(function ($) {
    $('.js-shipping-form').on('submit', function () {
        if (typeof shippingFormUrl !== "undefined" && shippingFormUrl !== null) {
            $.ajax({
                url: shippingFormUrl,
                type: 'POST',
                dataType: 'json',
                data: $(this).serialize(),
                success: function(data) {
                    $('.js-shipping-response').html('<span>Стоимость доставки: ' + data.shippingPrice + '</span>');
                },
                error: function (data) {
                    $('.js-shipping-response').html('<span>' + data.responseJSON.message + '</span>');
                }
            });
        } else {
            console.warn('Ссылка для отправки формы не определена!');
        }
    });
});
