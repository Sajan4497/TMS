<html>

<head>
  <title>Checkout canceled</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    Swal.fire({
      title: 'Payment Cancel!',
      text: 'Click OK to go back.',
      icon: 'cancelled',
      confirmButtonText: 'OK',
      allowOutsideClick: false
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'Full-packages.php';
      }
    });
  </script>
</body>


</html>