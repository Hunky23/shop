<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="assets/js/jquery-3.6.3.min.js"></script>
    <title>Расчёт стоимости доставки</title>
</head>
<body>
    <section class="shipping">
        <div class="shipping__container container">
            <h1 class="shipping__title">Расчёт стоимости доставки</h1>

            <form class="js-shipping-form" onsubmit="return false;">
                @csrf

                <div class="shipping__block">
                    <label for="package-weight">Вес посылки(кг)*:</label>

                    <br>

                    <input id="package-weight" type="text" name="packageWeight">
                </div>

                <div class="shipping__block">
                    <span>Способы доставки*:</span>

                    <br>

                    <label for="russian-post">Почта России</label>
                    <input id="russian-post" type="radio" name="shippingMethod" value="russianPost" checked="checked">

                    <br>

                    <label for="dhl">DHL</label>
                    <input id="dhl" type="radio" name="shippingMethod" value="dhl">
                </div>

                <button class="shipping__block shipping__btn">Рассчитать</button>

                <script>
                    let shippingFormUrl = '{{ route('shipping.costCalculation') }}';
                </script>
            </form>

            <div class="shipping__response js-shipping-response">

            </div>
        </div>
    </section>

    <script src="assets/js/main.js"></script>
</body>
</html>
