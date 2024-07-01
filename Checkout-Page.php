<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            display: block;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
        .payment-method {
            margin-bottom: 20px;
        }
        #paypal-button-container {
            margin-top: 20px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
   
    
    <script src="https://www.paypal.com/sdk/js?client-id=AWenHhLp8Gz42Bgcbzsro9HR5qdStiO74BB47JotlQcqvj-tBLBggLZ52HQH16h5-H6pVnGoZMWXZbY-&currency=USD"></script>
    <script>
        $(document).ready(function() {
            const stripe = Stripe('pk_test_51PLeLNRqM69andAANgXcXOQLKFLsSKOmMmfViVPs7VD0Vnh5TKGR8L3lzxncosoZ6eWcyb848HG9MLLhB4ucsogd00jByUByVO');

            // Read total price from URL parameters and set it in the form
            const urlParams = new URLSearchParams(window.location.search);
            const total = urlParams.get('total');
            $('#priceinusd').val(total);

            $('form').on('submit', async function(event) {
                event.preventDefault();

                var paymentMethod = $('input[name="PaymentMethod"]:checked').val();
                if (paymentMethod === 'Stripe') {
                    const formData = {
                        firstname: $('#Firstname').val(),
                        lastname: $('#Lastname').val(),
                        country: $('#Country').val(),
                        address: $('#Address').val(),
                        city: $('#City').val(),
                        state: $('#State').val(),
                        zipcode: $('#Zipcode').val(),
                        email: $('#Email').val(),
                        phone: $('#Phone').val(),
                        priceinusd: $('#priceinusd').val(),
                        packageid: $('#packageid').val(),
                        customerid: $('#customerid').val()
                    };

                    const response = await fetch('stripe-checkout.php', {
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
                } else  {
                    
                    // Check if the PayPal SDK is loaded
                    if (typeof paypal !== 'undefined' && paypal.Buttons) {

                        paypal.Buttons({
                            createOrder: function(data, actions) {
                                return actions.order.create({
                                    purchase_units: [{
                                        amount: {
                                            value: $('#priceinusd').val() 
                                        }
                                    }]
                                });
                            },
                            onApprove: function(data, actions) {
                                return actions.order.capture().then(function(details) {
                                    // Handle successful payment
                                    alert('Transaction completed by ' + details.payer.name.given_name);
                                });
                            }
                        }).render('#paypal-button-container');
                    } else {
                        alert('PayPal SDK not loaded');
                    }
                }
            });
        });

        // Function to load PayPal SDK script
        function loadPayPalScript(callback) {
            const script = document.createElement('script');
            script.src = 'https://www.paypal.com/sdk/js?client-id=AWenHhLp8Gz42Bgcbzsro9HR5qdStiO74BB47JotlQcqvj-tBLBggLZ52HQH16h5-H6pVnGoZMWXZbY-&currency=USD';
            script.onload = callback;
            script.onerror = function() {
                console.error('PayPal SDK could not be loaded.');
            };
            document.head.appendChild(script);
        }

        // Load PayPal SDK script and initialize buttons
        loadPayPalScript(function() {
            console.log('PayPal SDK loaded successfully.');
        });
    </script>
</head>
<body>
    <div class="container">
        <h2>Checkout</h2>
        <form>
 
            <label for="Firstname">First Name:</label>
            <input type="text" id="Firstname" name="Firstname" required><br><br>

            <label for="Lastname">Last Name:</label>
            <input type="text" id="Lastname" name="Lastname" required><br><br>

            <label for="Country">Country:</label>
            <input type="text" id="Country" name="Country" required><br><br>

            <label for="Address">Address:</label>
            <input type="text" id="Address" name="Address" required><br><br>

            <label for="City">City:</label>
            <input type="text" id="City" name="City" required><br><br>

            <label for="State">State:</label>
            <input type="text" id="State" name="State" required><br><br>

            <label for="Zipcode">Zip Code:</label>
            <input type="text" id="Zipcode" name="Zipcode" required><br><br>

            <label for="Email">Email:</label>
            <input type="text" id="Email" name="Email" required><br><br>

            <label for="Phone">Phone:</label>
            <input type="text" id="Phone" name="Phone" required><br><br>
            
            <label for="Price">Price (in USD):</label>
            <input type="text" id="priceinusd" name="priceinusd" disabled><br><br>
            
            <label for="PaymentMethod">Payment Method:</label>
            <input type="radio" id="stripe" name="PaymentMethod" value="Stripe" required>
            <label for="stripe">Stripe</label><br>
            <input type="radio" id="paypal" name="PaymentMethod" value="PayPal" required>
            <label for="paypal">PayPal</label>
            <div id="paypal-button-container"></div>
            <button type="submit">Complete Purchase</button>
        </form>
    </div>
</body>
</html>
