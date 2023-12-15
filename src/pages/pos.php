<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <script src="/src/static/page.js"></script>
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
    </div>
</body>

</html>