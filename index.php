<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Pay Page</title>
</head>

<body>
  <div class="container">
    <h2 class="my-4 text-center">Make Your Payment</h2>

    <form action="charge.php" method="post" id="payment-form">
      <div class="form-row">
        <input type="text" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="First Name" name="first_name">
        <input type="text" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Last Name" name="last_name">
        <input type="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email Address" name="email">
        <div id="card-element" class="form-control"></div>
        <div id="card-errors" role="alert"></div>
      </div>

      <button class="btn btn-primary mt-4 form-control">Submit Payment</button>
    </form>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="./js/charge.js"></script>
</body>

</html>