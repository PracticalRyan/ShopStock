<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
</head>

<body>
    <!-- Navigation bar -->
    <nav class="bg-gray-800 border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-slate-300">RaiFun</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-slate-300 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-transparent">
                    <li>
                        <a href="index.php" class="block py-2 px-3 text-slate-300 bg-blue-700 rounded md:bg-transparent md:text-slate-300 md:p-0">Home</a>
                    </li>
                    <li>
                        <a href="manage.php" class="block font-bold py-2 px-3 text-slate-300 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0" aria-current="page">Manage</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Content container -->
    <div class="mx-4">
        <!-- Title -->
        <h2 class="text-4xl font-bold my-4">Manage Inventory</h2>
        <!-- Management dashboard -->
        <div class="grid grid-col-"></div>
    </div>
</body>

</html>