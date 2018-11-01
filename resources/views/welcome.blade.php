<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">


            <div class="content">


                <div class="links">
                    <div id="paypal-button"></div>
                </div>
            </div>
        </div>

        <script src="https://www.paypalobjects.com/api/checkout.js"></script>
        <script>
            paypal.Button.render({
                // Configure environment
                env: 'sandbox',
                client: {
                    sandbox: 'Ae5JKxb8bakTsZsKfYmLGHvLfeMupwoTj7GREN_zmYgLuQHxRPDLNZDu_YdJX3_XuiOZxpCoTOqpEBq_', //demo_sandbox_client_id
                    production: 'demo_production_client_id'
                },
                // Customize button (optional)
                locale: 'en_US',
                style: {
                    size: 'large',
                    color: 'gold',
                    shape: 'pill',
                },
                // Set up a payment
                payment: function(data, actions) {
                    return actions.payment.create({
                        transactions: [{
                            amount: {
                                total: '0.01',
                                currency: 'USD'
                            }
                        }]
                    });
                },
                // Execute the payment
                onAuthorize: function(data, actions) {
                    return actions.payment.execute().then(function() {
                        // Show a confirmation message to the buyer
                        window.alert('Thank you for your purchase!');
                    });
                }
            }, '#paypal-button');

        </script>
    </body>
</html>
