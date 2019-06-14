<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <title>Admin Page</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </head>
  <body>

          <div class="container-fluid">
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                <a class="navbar-brand" href="#">Blogvel</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                  <ul class="navbar-nav">
                    <li class="nav-item dropdown ml-5">
                      <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">
                        Users
                      </a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('admin.users.index')}}">All Users</a>
                        <a class="dropdown-item" href="{{route('admin.users.create')}}">Create Users</a>
                      </div>
                    </li>

                    <li class="nav-item dropdown ml-5">
                      <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">
                        Posts
                      </a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('admin.posts.index')}}">All Posts</a>
                        <a class="dropdown-item" href="{{route('admin.posts.create')}}">Create Posts</a>
                      </div>
                    </li>

                  </ul>
                </div>
              </nav>
            </div>


            <div class="container">
                <h2 class="text-center">Admin</h2>
            </div>

  </body>
</html>
