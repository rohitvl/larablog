<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <title>Create Posts Page</title>
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
                <h2 class="text-center">Create Post</h2>

                <form action="/admin/posts" method="POST" enctype="multipart/form-data">
                      {{csrf_field()}}

                      <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="name" class="form-control" id="title" placeholder="Enter title" name="title">
                      </div>

                      <div class="form-group">
                        <label for="category">Select Category:</label>
                        <select class="form-control" id="category" name="category_id">

                          @foreach($categories as $category)
                            <option value={{$category->id}}>{{$category->name}}</option>
                          @endforeach

                        </select>
                      </div>

                      <div class="form-group">
                          <input type="file" class="form-control-file border" name="photo_id" id="photo_id">
                      </div>

                      <div class="form-group">
                          <label for="body">Description:</label>
                          <textarea class="form-control" id="body" rows="10" name="body"></textarea>
                      </div>

                      <button type="submit" class="btn btn-primary">Create Post</button>

                      </form>






                <ul class="text-danger mt-5 bg-light">
                  @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                      <li>
                        {{$error}}
                      </li>
                    @endforeach
                  @endif
                </ul>

            </div>


  </body>
</html>
