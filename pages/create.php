<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/static/page.js"></script>
    <link href="/css/output.css" rel="stylesheet">
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

<!-- Edit data fields if POST -->
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $code = $_REQUEST['pcode'];
        $pname = (string) $_REQUEST['pname'];
        $stock = 0;
        $cost = (int) $_REQUEST['cost'];
        $price = (int) $_REQUEST['price'];

        if (empty($code) or empty($pname) or empty($cost) or empty($price)) {
            echo "Please enter all fields";
        } else {
            $result = $conn->query("SELECT code FROM products WHERE code=$code");
            if (mysqli_num_rows($result) > 0) {
                $sql = "UPDATE products SET name='$pname', stock='$stock', cost='$cost', price='$price' WHERE code='$code'";
            }
            else {
                $sql = "INSERT INTO products (name, stock, cost, price, code) VALUES ('$pname', '$stock', '$cost', '$price', '$code')";
            };
            // Check if query was successful
            if ($conn->query($sql) === TRUE) {
                echo 'Product successfully added/edited';
            } else {
                echo "Error updating record: " . $conn->error;
            }                      
        }
        }
?>

<body class="flex flex-col h-screen bg-slate-100space-y-5">
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
<div class="flex flex-col mx-4 p-4 text-lg h-full">
    <div id="barcode_scanner" class="w-90 h-56 block md:hidden overflow-hidden relative border-4"></div>
    <h1 class="text-4xl font-bold my-4">Advanced Management</h1>
    <button onclick="scan_barcode()" class="block md:hidden bg-cyan-700 hover:bg-cyan-800 text-white font-bold py-2 px-2 rounded-md mt-4">Scan barcode</button>

<form class="flex flex-col" action="create.php" method="post">
    <h2 class="text-3xl font-bold">Create/Edit Product</h2>
    <div class="flex flex-col">
        <label for="pcode">Product Code</label>
        <input class="border border-gray-800 rounded-md" type="text" name="pcode" id="pcode_field"></input>
    </div>
    <div class="flex flex-col">
        <label for="pname">Product Name</label>
        <input class="border border-gray-800 rounded-md" type="text" name="pname" id="pname_field"></input>
    </div>
    <div class="flex flex-col">
        <label for="cost">Cost</label>
        <input class="border border-gray-800 rounded-md" type="number" name="cost" id="cost_field">
    </div>
    <div class="flex flex-col">
        <label for="price">Price</label>
        <input class="border border-gray-800 rounded-md" type="number" name="price" id="price_field">
    </div>
    <button class="bg-blue-800 hover:bg-gray-700 text-white font-bold py-2 px-2 rounded-md mt-4" type="submit" name="edit">Apply Changes</button>
</form> 
</div>   
</body>
</html>