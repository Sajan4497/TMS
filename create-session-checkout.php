<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta tags, title, and styles -->
</head>
<body>
  <div class="container">
    <h1>Select Payment Method</h1>
    <form id="payment-form">
      <input type="radio" id="stripe" name="payment_method" value="stripe">
      <label for="stripe">Stripe</label><br>
      <input type="radio" id="paypal" name="payment_method" value="paypal">
      <label for="paypal">PayPal</label><br><br>
      <button type="submit" class="submit">Proceed to Payment</button>
    </form>
    <div id="paypalMessage" class="paypal-message">
   
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script>
    const stripe = Stripe('pk_test_51PLeLNRqM69andAANgXcXOQLKFLsSKOmMmfViVPs7VD0Vnh5TKGR8L3lzxncosoZ6eWcyb848HG9MLLhB4ucsogd00jByUByVO');

    $('.submit').click(async function (event) {
      event.preventDefault(); 
      
      const paymentMethod = $("input[name='payment_method']:checked").val();
      const priceinusd = 1000; 
      const packagename = 'Package'; 
      const packageid = 123; 
      const packageprice = 1000; 
      const customerid = 456; 

      const formData = {
        id: customerid,
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

      if (paymentMethod === 'stripe') {
        stripe.redirectToCheckout({ sessionId: session.id });
      } else if (paymentMethod === 'paypal') {
        alert('Redirect to PayPal'); 
      }
    });

    $('#stripe').change(function() {
      $('#paypalMessage').toggle(!this.checked);
    });
  </script>
</body>
</html>
