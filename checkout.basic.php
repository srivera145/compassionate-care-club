<?php
require 'vendor/autoload.php';
 \Stripe\Stripe::setApiKey('sk_test_51N44CEEo9JK0lLFsfXZTtDea1kpYrznvpxwGnlIWNdyH3V5kCCEVKY7LNhJDdstzyxqiMsFFgRVJuaFJpix93k5800DTzePmbb');

  $checkout_session = \Stripe\Checkout\Session::create([
      'success_url' => 'https://ccc25club.herokuapp.com/success.php',
      'cancel_url' => 'https://ccc25club.herokuapp.com/cancel.html',
      'payment_method_types' => ['card'],
      'mode' => 'subscription',
      'line_items' => [[
        'price' => "price_1N6csaEo9JK0lLFszqQOFrJb",
        // For metered billing, do not pass quantity
        'quantity' => 1,
      ]],
    ]);

?>
<head>
  <title>Compassionate Care Club Checkout | Basic</title>
  <link rel="icon" href="favicon.ico" type="image/png">
  <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
  <script type="text/javascript">
     var stripe = Stripe('pk_test_51N44CEEo9JK0lLFs2VsQoMmlu7A0fFMTjpbKjDNiXeIU4wzsDHObZhsxmTvnanZYZablX9PMIpqGYIvxEuPZpkx700GUJ2qGtF');
     var session = "<?php echo $checkout_session['id']; ?>";
          stripe.redirectToCheckout({ sessionId: session })
                  .then(function(result) {
          // If `redirectToCheckout` fails due to a browser or network
          // error, you should display the localized error message to your
          // customer using `error.message`.
          if (result.error) {
            alert(result.error.message);
          }
        })
        .catch(function(error) {
          console.error('Error:', error);
        });          



  </script>
  
</body>

