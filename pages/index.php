<!DOCTYPE html>
<html>

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
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/css/output.css" rel="stylesheet">
  <script src="/static/page.js"></script>
</head>

<body class="bg-slate-100">
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

  <!-- Content flex container -->
  <div class="flex flex-col mx-4">
    <!-- Welcome message -->
    <h2 class="text-4xl font-bold my-16">Hello, Contoso</h2>
    <!-- Insight cards -->
    <h3 class="text-3xl font-bold my-3">Insights</h3>
    <div class="grid grid-cols-3 gap-x-2">
    <?php
    // Get bestselling product
      $sql = "SELECT name, sold_amount FROM products ORDER BY sold_amount DESC";
      $bestseller = mysqli_query($conn, $sql);
      // Show fields
      if (mysqli_num_rows($bestseller) > 0) {
        $first_key = mysqli_fetch_assoc($bestseller);
        echo("<a class=\"block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100\">");
        echo("<h5 class=\"mb-2 text-2xl font-bold tracking-tight text-green-600\">Best Seller</h5>");
        echo('<p class="font-normal text-gray-700\">Your best selling product is ' . $first_key["name"] . ' with ' . $first_key["sold_amount"] . ' sold</p>');
        echo('</a>');
          
      } else {
        echo("<a class=\"block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100\">");
        echo("<h5 class=\"mb-2 text-2xl font-bold tracking-tight text-gray-900\">Learning...</h5>");
        echo('<p class="font-normal text-gray-700\">Please wait while we collect the data</p>');
        echo('</a>');        
      }
      $sql = "SELECT name, stock FROM products WHERE stock < 30 ORDER BY stock ASC";
      $low_stock = mysqli_query($conn, $sql);

      if (mysqli_num_rows($low_stock) > 0) {
        $first_key = mysqli_fetch_assoc($low_stock);
        echo("<a class=\"block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100\">");
        echo("<h5 class=\"mb-2 text-2xl font-bold tracking-tight text-gray-900 text-yellow-600\">Warning</h5>");
        echo('<p class="font-normal text-gray-700\">The product ' . $first_key["name"] . ' needs restocking with only ' . $first_key["stock"] . ' left.</p>');
        echo('</a>');
          
      } else {
        echo("<a class=\"block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100\">");
        echo("<h5 class=\"mb-2 text-2xl font-bold tracking-tight text-gray-900\">Learning...</h5>");
        echo('<p class="font-normal text-gray-700\">Please wait while we collect the data</p>');
        echo('</a>');        
      }
      ?>    
      </div>
      
    <!-- Data segments -->
    <h3 class="text-3xl font-bold mb-3 mt-6">Data</h3>
    <div class="grid grid-cols-8 gap-x-2">
      <a href="#" class="block col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Fun Fact</h5>
        <p class="font-normal text-gray-700">Did you know? 100% of our users use RaiFun to keep their busines operating smoothly and efficiently.</p>
      </a>
      <?php
        $sql = "SELECT SUM(bought_cost) AS cost, SUM(sold_revenue) AS revenue FROM products";
        $economy = mysqli_fetch_assoc(mysqli_query($conn, $sql));
      
        $costs = $economy['cost'];
        $revenue = $economy['revenue'];

        echo('<a href="#" class="block col-span-2 p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">');
        echo('<p class="text-xl font-bold text-gray-700">Revenue</p>');
        echo('<h5 class="mb-3 text-4xl font-bold tracking-tight text-green-700">' . $revenue . '฿ </h5>');
        echo('<p class="text-xl font-bold text-gray-700">Costs</p>');
        echo('<h5 class="mb-3 text-4xl font-bold tracking-tight text-red-700">' . $costs . '฿</h5>');
        echo('</a>');
      ?>
      <a href="#" class="block col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">History</h5>
      </a>
    </div>
  </div>
</body>

</html>