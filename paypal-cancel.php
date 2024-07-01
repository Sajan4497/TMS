


<html>
<head>
  <title>Checkout canceled</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <section>
    <p>Forgot to add something to your cart? Shop around then come back to pay!</p>
    <form action="process_form.php" method="post">
      <label for="item">Item:</label>
      <input type="text" id="item" name="item">
      <br>
      <label for="quantity">Quantity:</label>
      <input type="number" id="quantity" name="quantity">
      <br>
      <input type="submit" value="Add to Cart">
    </form>
  </section>
</body>
</html>
