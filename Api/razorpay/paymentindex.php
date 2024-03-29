<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <!-- Add your custom styles here -->
 <div class="card card-outline-secondary">
        <div class="card-body">
            <h3 class="text-center">STUDENT PAYMENT CHALLAN </h3>
            <hr>
   
 <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="button"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="button"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<form>
    <input type="text" name="name" id="name" placeholder="Enter your name"><br><br>
    <input type="text" name="amt" id="amt" placeholder="Enter amount"><br><br>
    <input type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()">
</form>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
    function pay_now() {
        var name = jQuery("#name").val();
        var amt = jQuery("#amt").val();
	console.log("name");
	console.log("amt");
        jQuery.ajax({
            type: "post",
            url: "payment_process.php",
            data: "amt=" + amt + "&name=" + name,
            success: function(result) {
                var options = {
                    "key": "rzp_test_ETv9jeKhU40m5M",
                    "amount": amt * 100,
                    "currency": "INR",
                    "name": "Acme Corp",
                    "description": "Test Transaction",
                    "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                    "handler": function(response) {
                        jQuery.ajax({
                            type: "post",
                            url: "payment_process.php",
                            data: "payment_id=" + response.razorpay_payment_id,
                            success: function(result) {
                                window.location.href = "thank_you.php";
                            }
                        });
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
            }
        });
    }
</script>

</body>
</html>
