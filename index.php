<!DOCTYPE html>
<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class=" container-fluid">
      <a class="navbar-brand" href="#">StockManager</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Manage</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Page context -->
  <div class="mx-4">
    <div class="content my-3">
      <h1 class="my-5 mx-2 fw-bold">Hello, User</h1>
      <!-- Highlight grid -->
      <div class="row align-items-start">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Gathering insights...</h5>
              <p class="card-text">Keep managing your stock and we'll gather insights for you!</p>
              <a href="#" class="btn btn-primary">Manage stock</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-10">
            <div class="card-body">
              <h5 class="card-title">Just a moment...</h5>
              <p class="card-text">There isn't anything happening right now, come back later.</p>
              <a href="#" class="btn btn-primary">Manage stock</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Collecting data...</h5>
              <p class="card-text">Oops, there doesn't seem to be any data to collect. Let's add some!</p>
              <a href="#" class="btn btn-primary">Manage stock</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Add additional elements here -->
  </div>
</body>

</html>