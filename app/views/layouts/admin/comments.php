<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">
    <title>Admin</title>
</head>
<body>
    <!-- navBar -->
    <section id="navBar">
        <div class="container d-flex justify-content-between align-items-center">
            <h3 class="title fst-italic">AdminPanel</h3>
            <ul class="nav justify-content-center">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Products</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Admins</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Comment</a>
                </li>
            </ul>
            <div class="logout fw-bold">Logout</div>
        </div>
    </section>

    <!-- messages -->
    <section id="messages">
      <div class="container"> 
        <h2 class="text-center my-4 fw-bold">Messages</h2>
        <!-- existing admins -->
        <div class="existingmessages px-5">
          <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                      <div class="card-title d-flex">
                        username : 
                        <p class="ms-2">xiu</p>
                      </div>
                      <div class="card-title d-flex">
                        phone : 
                        <p class="ms-2">0708162384</p>
                      </div>
                      <div class="card-title d-flex">
                        mail : 
                        <p class="ms-2">baptram17@gmail.com</p>
                      </div>
                      <div class="card-title d-flex">
                        message : 
                        <p class="ms-2">fighting</p>
                      </div>
                    
                      <div class="btn btn-danger">Delete</div>

                    </div>
                </div>
            </div>
          </div>
        </div>

      </div>
    </section>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>