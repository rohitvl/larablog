<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <title>Edit Page</title>
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
            <a class="navbar-brand" href="/">Blogvel</a>
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
          </nav><br />
          <div class="m-0 bg-dark text-center text-white">you are logged in as {{Auth::user()->name}}</div>
        </div>



      <div class="container mt-5 mb-5">
        <h2 class="text-center">Edit User</h2><br /><br />
        <div class="row">
        <div class="col-md-3">
          @if($user->photo)
            <img class="rounded img-fluid" height="200" src="{{$user->photo->path}}">
          @else
            <img class="rounded img-fluid" height="200" src="/images/avatar.png">
          @endif
        </div>

        <div class="col-md-9">
          <form action="/admin/users/{{$user->id}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PUT">

                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="name" class="form-control" id="name" placeholder="Enter name" name="name" value="{{$user->name}}">
                </div>

                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{$user->email}}">
                </div>

                <div class="form-group">
                  <label for="pass">Password:</label>
                  <input type="password" class="form-control" id="pass" placeholder="Enter password" name="password"  value="******">
                </div>

                <div class="form-group">
                  <label for="role">Select Role:</label>
                  <select class="form-control" id="role" name="role_id">

                    @foreach($roles as $role)
                      @if($user->role->name == $role->name)
                        <option value="{{$role->id}}" selected="selected">{{$role->name}}</option>
                      @else
                        <option value="{{$role->id}}">{{$role->name}}</option>
                      @endif
                    @endforeach

                  </select>
                </div>

                <div class="form-group">
                  <label for="status">Select Status:</label>
                  <select class="form-control" id="status" name="is_active">
                    @if($user->is_active == 1)
                    <option value=1 selected="selected">Active</option>
                    <option value=0>Not Active</option>
                    @else
                    <option value=1>Active</option>
                    <option value=0 selected="selected">Not Active</option>
                    @endif
                  </select>
                </div>

                <div class="form-group">

                      <input type="file" class="form-control-file border" name="photo_id" id="pic">

                </div>

                <div class="row">
                <div class="col-sm-6 text-center">
                  <button type="submit" class="btn btn-primary" style="width:90%;">Update</button>

                  </form>
                </div>



                <div class="col-sm-6 text-center">
                    <form action="/admin/users/{{$user->id}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger" style="width:90%;">Delete</button>
                    </form>
                </div>

              </div>
          </div>
          </div>


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
