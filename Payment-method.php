





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Methods</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
    }

    .container {
      max-width: 400px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
    }

    form {
      margin-top: 20px;
    }

    input[type="radio"] {
      display: none;
    }

    label {
      display: inline-block;
      cursor: pointer;
      margin-bottom: 10px;
    }

    label:before {
      content: "";
      display: inline-block;
      width: 20px;
      height: 20px;
      border: 2px solid #666;
      border-radius: 50%;
      margin-right: 10px;
      vertical-align: middle;
    }

    input[type="radio"]:checked + label:before {
      background-color: #0070ba; /* PayPal Blue */
      border-color: #0070ba;
    }

    button[type="submit"] {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #0070ba; /* PayPal Blue */
      border: none;
      color: #fff;
      font-size: 16px;
      font-weight: bold;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
      background-color: #005aa7; 
    }

   
    .paypal-message {
      display: none;
      margin-top: 20px;
      text-align: center;
    }

    .paypal-button {
      background-color: #003087;
      color: #fff;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 10px;
    }

    .paypal-button:hover {
      background-color: #001e57;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Select Payment Method</h1>
    
      <input type="radio" id="stripe" name="payment_method" value="stripe">
      <label for="stripe">Stripe</label><br>
      <input type="radio" id="paypal" name="payment_method" value="paypal">
      <label for="paypal">PayPal</label><br><br>
      <button type="submit">Proceed to Payment</button>
    </form>

   

    
   
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script>

const stripe = Stripe('pk_test_51PLeLNRqM69andAANgXcXOQLKFLsSKOmMmfViVPs7VD0Vnh5TKGR8L3lzxncosoZ6eWcyb848HG9MLLhB4ucsogd00jByUByVO');

$('.Proceed to Payment').click(async function () {
    const id = $(this).data('id');
    const priceinusd = $(this).data('priceinusd');
    const packagename = $(this).data('packagename');
    const packageid = $(this).data('packageid');
    const packageprice = $(this).data('packageprice');
    const customerid = $(this).data('customerid');

    const formData = {
        id: id,
        priceinusd: priceinusd,
        packagename: packagename,
        packageid: packageid,
        packageprice: packageprice,
        customerid: customerid,
    };

    const response = await fetch('create-session-checkout.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(formData)
    });

    const session = await response.json();

    if (session.error) {
        alert(session.error);
    } else {
        stripe.redirectToCheckout({ sessionId: session.id });
    }
});
document.getElementById("paypal").addEventListener("change", function() {
      if (this.checked) {
        document.getElementById("paypalMessage").style.display = "block";
      } else {
        document.getElementById("paypalMessage").style.display = "none";
      }
    });
</script>
</body>
</html>

  
   
 