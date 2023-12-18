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


</head>

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
        <!-- Title -->
        <h2 class="text-4xl font-bold my-4">Point of Sale</h2>
        <!-- Management dashboard -->
        <grid class="grid grid-cols-4 h-full gap-2">
            <div class="col-span-3 bg-white rounded-lg shadow-lg p-3">
                <table class="table-fixed text-left w-full">
                    <thead class="border">
                        <tr class="border ">
                            <th class="w-8/12">Product Name</th>
                            <th class="w-2/12 ">Amount</th>
                            <th class="w-2/12">Price</th>
                        </tr>
                    </thead>
                    <tbody class="border">
                        <tr class="border">
                            <td class="p-2">Nestle Pure Life Bottled Water </td>
                            <td class="p-2">8</td>
                            <td class="p-2">12</td>
                        </tr>
                        <tr class="border">
                            <td class="p-2">Panasonic AA Batteries</td>
                            <td class="p-2">18</td>
                            <td class="p-2">40</td>
                        </tr>
                        <tr class="border">
                            <td class="p-2">Notebooks</td>
                            <td class="p-2">23</td>
                            <td class="p-2">25</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="flex flex-col col-span-1 shadow-xl p-4 rounded-lg bg-white gap-5">
                <!-- Add Product -->
                <div class="flex flex-col">
                    <h2 class="text-3xl font-bold">Add</h2>
                    <label for="ID">Product Code</label>
                    <input class="border border-gray-800 rounded-md" type="text" id="fname" name="fname">
                    <label for="Amount">Amount</label>
                    <input class="border border-gray-800 rounded-md" type="text" id="lname" name="lname">
                    <button class="bg-gray-700 hover:bg-gray-800 text-white font-bold py-2 px-2 rounded-md mt-4" type="submit">Add product</button>
                </div>
                <!-- Payment  -->
                <div class="flex flex-col">
                    <h2 class="text-3xl font-bold">Payment</h2>
                    <button class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-2 rounded-md mt-4" type="submit">Cash</button>
                    <button onclick="generate_promptpay()" class="bg-cyan-700 hover:bg-cyan-800 text-white font-bold py-2 px-2 rounded-md mt-4">PromptPay</button>
                </div>
                <div id="qrcode"></div>
            </div>
        </grid>
    </div>
</body>

</html>