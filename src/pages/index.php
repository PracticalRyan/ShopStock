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
            <a href="index.php" class="block font-bold py-2 px-3 text-slate-300 bg-blue-700 rounded md:bg-transparent md:text-slate-300 md:p-0" aria-current="page">Home</a>
          </li>
          <li>
            <a href="manage.php" class="block py-2 px-3 text-slate-300 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Manage</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Content flex container -->
  <div class="flex flex-col mx-4">
    <!-- Welcome message -->
    <h2 class="text-4xl font-bold my-16">Hello, User</h2>
    <!-- Insight cards -->
    <h3 class="text-3xl font-bold my-3">Insights</h3>

    <div class="grid grid-cols-3 gap-x-2">
      <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">

        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Learning...</h5>
        <p class="font-normal text-gray-700">Make sure you have added data in the manage page in the navigation bar above!</p>
      </a>

      <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">

        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Learning...</h5>
        <p class="font-normal text-gray-700">The data is being analyzed, check back later.</p>
      </a>

      <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">

        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Learning...</h5>
        <p class="font-normal text-gray-700">Just one moment! We are trying our best to sift through the data.</p>
      </a>
    </div>
    <!-- Data segments -->
    <h3 class="text-3xl font-bold mb-3 mt-6">Data</h3>
    <div class="grid grid-cols-8 gap-x-2">
      <a href="#" class="block col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Fun Fact</h5>
        <p class="font-normal text-gray-700">Did you know? 100% of our users use RaiFun to keep their busines operating smoothly and efficiently.</p>
      </a>
      <a href="#" class="block col-span-2 p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
        <p class="text-xl font-bold text-gray-700">Revenue</p>
        <h5 class="mb-3 text-4xl font-bold tracking-tight text-green-700">1230฿</h5>
        <p class="text-xl font-bold text-gray-700">Costs</p>
        <h5 class="mb-3 text-4xl font-bold tracking-tight text-red-700">230฿</h5>
      </a>
      <a href="#" class="block col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">History</h5>
      </a>
    </div>

  </div>
</body>

</html>