<?php
session_start();
include('config.php');

$id = $_SESSION["id"];

$sql = "SELECT * FROM cart";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $cart = $result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "No items found in the cart";
    exit; 
}
$totalPrice = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .Logout-button {
            padding: 5px 10px;
            background-color: #808080;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
            margin-right: 5px;
        }

        .content {
            margin-left: 80px;
            padding: 20px;
        }

        #cartTable {
            width: 100%;
            border-collapse: collapse;
        }

        #cartTable th,
        #cartTable td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        #cartTable th {
            background-color: #f2f2f2;
        }

        #cartTable tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #cartTable tbody tr:hover {
            background-color: #ddd;
        }

        #cartTable img {
            max-width: 100px;
            max-height: 100px;
        }

        #place-order,
        #ProceedToCheckout {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #place-order:hover,
        #ProceedToCheckout:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="content">
        <h2>Packages Cart</h2>
        <table id="cartTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>National Park Name</th>
                    <th>National Park Location</th>
                    <th>National Park Details</th>
                    <th>National Park Type</th>
                    <th>Price (USD)</th>
                    <th>Quantity</th>
                    <th>National Park Features</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $item): ?>
                    <tr id="row_<?= $item['id'] ?>">
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['nationalparkname'] ?></td>
                        <td><?= $item['nationalparklocation'] ?></td>
                        <td><?= $item['nationalparkdetails'] ?></td>
                        <td><?= $item['nationalparktype'] ?></td>
                        <td class="price" data-price="<?= $item['priceinusd'] ?>"><?= $item['priceinusd'] ?></td>
                        <td class="quantity-check">
                            <button class="quantity-increment" data-id="<?= $item['id'] ?>">+</button>
                            <input type='number' class="quantity" value="1" />
                            <button class="quantity-decrement" data-id="<?= $item['id'] ?>">-</button>
                        </td>
                        <td><?= $item['nationalparkfeatures'] ?></td>
                        <td><img src="<?= $item['nationalparkimage'] ?>" width="100px" height="100px" alt="Image"></td>

                        <td>
                            <button class='delete-button' data-id="<?= $item['id'] ?>">Remove</button>
                        </td>
                    </tr>
                    <?php $totalPrice += $item['priceinusd']; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div id="total-price">Total Price: $<span id="total"><?= $totalPrice ?></span></div>
        <button id="ProceedToCheckout" data-total="<?= $totalPrice ?>">Proceed to Checkout</button>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            function updateTotalPrice() {
                let total = 0;
                $('#cartTable tbody tr').each(function() {
                    let price = parseFloat($(this).find('.price').data('price'));
                    let quantity = parseInt($(this).find('.quantity').val());
                    total += price * quantity;
                });
                $('#total').text(total.toFixed(2));
            }

            $('.quantity-increment').click(function() {
                var id = $(this).data('id');
                var quantityElement = $(this).siblings('.quantity');
                var quantity = parseInt(quantityElement.val());
                quantityElement.val(quantity + 1);
                
                $.ajax({
                    url: 'update-quantity.php',
                    method: 'post',
                    data: { id: id, quantity: quantity + 1 },
                    success: function(response) {
                        updateTotalPrice();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating quantity:', error);
                    }
                });
            });

            $('.quantity-decrement').click(function() {
                var id = $(this).data('id');
                var quantityElement = $(this).siblings('.quantity');
                var quantity = parseInt(quantityElement.val());
                
                if (quantity > 1) {
                    quantityElement.val(quantity - 1);

                    $.ajax({
                        url: 'update-quantity.php',
                        method: 'post',
                        data: { id: id, quantity: quantity - 1 },
                        success: function(response) {
                            updateTotalPrice();
                        },
                        error: function(xhr, status, error) {
                            console.error('Error updating quantity:', error);
                        }
                    });
                }
            });

            $('.delete-button').click(function() {
                var id = $(this).data('id');
                $.ajax({
                    type: 'POST',
                    url: 'cart-delete.php',
                    data: { id: id },
                    success: function(response) {
                        $('#row_' + id).remove();
                        updateTotalPrice();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            updateTotalPrice();

            $('#ProceedToCheckout').click(function() {
                const total = $('#total').text();
                window.location.href = 'Checkout-Page.php?total=' + total;
            });
        });
    </script>
</body>
</html>
