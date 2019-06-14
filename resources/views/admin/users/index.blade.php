<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <title>User Page</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <style>
        .namelink{
          text-decoration:none;
          color:black;
        }
        .namelink:hover {
          text-decoration: none;
        }
      </style>
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


      <div class="container my-5">
          <h2 class="text-center">Users</h2><br /><br />

          @if (session()->has('deleted'))

            <h2 class="bg-danger text-white">{{session('deleted')}}</h2>

          @endif

          <table class="table table-hover table-responsive-md">
                <thead>
                  <tr>
                    <th>Sr No.</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Updated</th>
                  </tr>
                </thead>
                <tbody>

                    @if($users)

                    <?php $count=1; ?>

                      @foreach($users as $user)
                          <tr>
                            <td>{{$count++}}</td>

                            <td>
                              @if($user->photo)
                              <img height="50" width="50" src="{{$user->photo->path}}" alt="pro pic">
                              @else
                              {{'No image'}}
                              @endif
                            </td>

                            <td>
                              <a href="{{route('admin.users.edit', $user->id)}}" class="namelink">
                                {{$user->name}}
                              </a>
                            </td>

                            <td>{{$user->email}}</td>
                            <td>{{$user->role->name}}</td>

                            @if($user->is_active == 1)
                            <td class="text-success">{{'Active'}}</td>
                            @else
                            <td class="text-danger">{{'Not Active'}}</td>
                            @endif

                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td>{{$user->updated_at->diffForHumans()}}</td>
                          </tr>
                      @endforeach
                    @endif

                </tbody>
          </table>
      </div>

  </body>
</html>
