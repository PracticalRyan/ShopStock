<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/output.css" rel="stylesheet">
    <script src="/static/page.js"></script>
    <script src="/static/promptpay-qr.js"></script>
    <script src="/static/promptpay.js"></script>
    <script src="/static/qrcode.js"></script>
    <script src="/static/sounds.js" type="text/javascript"></script>
    <link href="/css/barcode.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@ericblade/quagga2/dist/quagga.js"></script>

</head>

<!-- Initialize database connection -->
<?php
    $servername = "db";
    $username = "root";
    $password = "mariadb";
    $database = "shopstock"; 

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed, please check your database connection before continuing: \n" . $conn->connect_error);
  }
?>

<!-- Edit data fields on POST -->
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['complete'])) {
            $shopping_cart = $conn->query("SELECT product_code, amount FROM point_of_sale");
            while($row = mysqli_fetch_assoc($shopping_cart)) {
                $product_code = $row["product_code"];
                $bought= $row["amount"];
                $stock = (int) $conn->query("SELECT stock FROM products WHERE code=$product_code")->fetch_assoc()["stock"];
                $price = (int) $conn->query("SELECT price FROM products WHERE code=$product_code")->fetch_assoc()["price"];
                $sold_amount = (int) $conn->query("SELECT sold_amount FROM products WHERE code=$product_code")->fetch_assoc()["sold_amount"];
                $sold_revenue = (int) $conn->query("SELECT sold_revenue FROM products WHERE code=$product_code")->fetch_assoc()["sold_revenue"];

                $revenue = $row["amount"] * $price;
                $conn->query("UPDATE products SET stock=$stock-$bought WHERE code=$product_code");
                $conn->query("UPDATE products SET sold_amount = $sold_amount + $bought WHERE code=$product_code");
                $conn->query("UPDATE products SET sold_revenue = $sold_revenue + $revenue WHERE code=$product_code");
                $conn->query("DELETE FROM point_of_sale WHERE product_code=$product_code");
            }
            echo 'Complete';
        }
        else {
            // collect value of input field
            $pcode = $_REQUEST['pcode'];
            $amount = (int) $_REQUEST['amount'];

            if (empty($pcode) or empty($amount)) {
                echo "Please enter all fields";
            } else {
                $result = $conn->query("SELECT amount FROM point_of_sale WHERE product_code=$pcode");
                if ($result->num_rows > 0) {
                    $initial = (int) $result->fetch_assoc()["amount"];
                    $result = $conn->query("UPDATE point_of_sale SET amount=$amount+$initial WHERE product_code=$pcode");
                }
                else {
                    $result = $conn->query("INSERT INTO point_of_sale (product_code, amount) VALUES ($pcode, $amount)");
                }
            }

            // Check if query was successful
            if ($result === TRUE) {
                } else {
                echo "Error updating record: " . $conn->error;
                }    
        }                  
    }
?>

<body class="flex flex-col h-screen bg-slate-100">
    <!-- Navigation bar -->
    <nav class="bg-gray-800 border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-slate-300">RaiFun</span>
            </a>
            <button onclick="navbarclicked()" data-collapse-toggle="navitems" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-slate-300 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navitems">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-transparent">
                    <li>
                        <a href="index.php" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:bg-transparent md:text-slate-300 md:p-0 md:hover:text-blue-700">Home</a>
                    </li>
                    <li>
                        <a href="manage.php" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:text-slate-300 marker:md:border-0 md:hover:text-blue-700 md:p-0" aria-current="page">Manage</a>
                    </li>
                    <li>
                        <a href="pos.php" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:text-slate-300 md:hover:text-blue-700 md:p-0" aria-current="page">Point of Sale</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Content container -->
    <div class="flex flex-col mx-4 p-4 text-lg h-full bg-slate-100">
    <div id="barcode_scanner" class="w-90 h-56 block md:hidden overflow-hidden relative border-4"></div>
        <!-- Title -->
        <h2 class="text-4xl font-bold my-4">Point of Sale</h2>
        <button onclick="scan_barcode()" class="block md:hidden bg-cyan-700 hover:bg-cyan-800 text-white font-bold py-2 px-2 rounded-md mt-4">Scan barcode</button>
        <!-- Management dashboard -->
        <grid class="grid md:grid-cols-4 h-full gap-2">
            <div class="hidden md:block col-span-3 bg-white rounded-lg shadow-lg p-3">
            <table class="table-fixed text-left w-full">
                    <thead class="border">
                        <tr class="border ">
                            <th class="w-8/12">Product Name</th>
                            <th class="w-2/12">Price</th>
                            <th class="w-2/12 ">Amount</th>
                            <th class="w-2/12">Total</th>
                        </tr>
                    </thead>
                    <!-- Table fields fetched from DB -->
                    <tbody class="border">
                    <?php
                    $sql = "SELECT point_of_sale.amount, products.name, products.price FROM point_of_sale INNER JOIN products ON products.code=point_of_sale.product_code;";
                    $result = mysqli_query($conn, $sql);
                    // Show fields
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            $total_cost= (int) $row["amount"] * (int) $row["price"];
                            echo '<tr class="border">';
                            echo '<td class="p-2">' . $row["name"] . '</td>';
                            echo '<td class="p-2">' . $row["price"] . '</td>';
                            echo '<td class="p-2">' . $row["amount"] . '</td>';
                            echo '<td class="p-2">' . $total_cost . '</td>';
                            echo '</tr>';                        
                        }
                      } else {
                        echo "0 results";
                      }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="flex flex-col col-span-1 shadow-xl p-4 rounded-lg bg-white gap-5">
                <!-- Add Product -->
                <form class="flex flex-col" action="pos.php" method="post">
                    <h2 class="text-3xl font-bold">Add</h2>
                    <label for="ID">Product Code</label>
                    <input class="border border-gray-800 rounded-md" type="text" name="pcode" id="pcode_field">
                    <label for="Amount">Amount</label>
                    <input class="border border-gray-800 rounded-md" type="number" name="amount" id="amount_field" value="1">
                    <button class="bg-gray-700 hover:bg-gray-800 text-white font-bold py-2 px-2 rounded-md mt-4" type="submit">Add product</button>
                </form>
                <!-- Payment  -->
                <div class="flex flex-col">
                    <h2 class="text-3xl font-bold">Payment</h2>
                    <?php
                    $sql = "SELECT point_of_sale.amount, products.price FROM point_of_sale INNER JOIN products ON products.code=point_of_sale.product_code;";
                    $result = mysqli_query($conn, $sql);
                    $total_price = 0;
                    // Show fields
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            $total_cost= (int) $row["amount"] * (int) $row["price"];
                            $total_price = $total_price + $total_cost;
                        }
                      } else {
                      }
                      echo "Total:$total_price"
                    ?>
                    <script>
                        var prompt_price = <?php echo json_encode($total_price); ?>;
                    </script>
                    <form method="post" class="flex flex-col">
                        <button class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-2 rounded-md mt-4" name="complete" type="submit">Payment Complete</button>
                    </form>
                    <button onclick="generate_promptpay()" class="bg-cyan-700 hover:bg-cyan-800 text-white font-bold py-2 px-2 rounded-md mt-4">PromptPay</button>
                </div>
                <div id="qrcode"></div>
            </div>
        </grid>
    </div>
</body>

</html>