<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <title>See Posts Page</title>
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

                    @if(Auth::user()->isAdminOnly())
                    <li class="nav-item dropdown ml-5">
                      <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">
                        Users
                      </a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('admin.users.index')}}">All Users</a>
                        <a class="dropdown-item" href="{{route('admin.users.create')}}">Create Users</a>
                      </div>
                    </li>
                    @endif

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

            @if (session()->has('deletedcomm'))
              <div class="container">
              <br />
              <h2 class="bg-danger text-white">{{session('deletedcomm')}}</h2>
              </div>

            @endif

            <div class="container mt-5 mb-5">
              <h2 class="text-center">See Posts</h2><br /><br />
              <div class="row">
              <div class="col-md-3">
                @if($post->photo)
                  <img class="rounded img-fluid" height="200" src="{{$post->photo->path}}">
                @else
                  <img class="rounded img-fluid" height="200" src="/images/no.png">
                @endif
              </div>

              <div class="col-md-9">

                    <div class="border">
                      <h2 class="px-3 text-center text-info">Title</h2>
                      <p class="px-3 text-center">{{$post->title}}</p>
                    </div>

                    <div class="border">
                      <h2 class="px-3 text-center text-info">Content</h2>
                      <p class="px-3 text-center">{{$post->body}}</p>
                    </div>
                    <p class="text-success"><i>posted {{$post->created_at->diffForHumans()}} by {{$post->user->name}}</i></p>

                </div>
              </div><br /><br />


                <div>
                  <form action="{{route('admin.comments.store', $post->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                          <label for="comment">Add Comment:</label>
                          <input type="text" class="form-control" id="comment" placeholder="Enter comment" name="comment" autocomplete="off">
                        </div>

                        <input type="hidden" value="{{$post->id}}" name="post_id">

                        <input type="hidden" value="{{Auth::user()->id}}" name="user_id">


                        <button type="submit" class="btn btn-primary">Comment</button>

                  </form>
                </div><br /><br />

                <div>

                  <h3>Comments on this Posts</h3><br />
                      @if(count($comments)>0)
                          @foreach($comments as $comment)
                          <div class="border mt-3">
                            <h4 class="px-3 text-success">{{$comment->comment}}</h4>
                            <p class="px-3">commented {{$comment->created_at->diffForHumans()}} by <b>{{$comment->user->name}}</b> </p>

                            @if($comment->user_id == Auth::user()->id)
                            <form action="/admin/comments/{{$comment->id}}" method="post" class="px-3 mb-2">
                              {{csrf_field()}}
                              <input type="hidden" name="_method" value="DELETE">
                              <button type="submit" class="btn btn-primary btn-sm">Delete</button>
                            </form>
                            @endif

                          </div><br />
                          @endforeach

                      @else
                          <p class="px-3 text-danger">No comments on this post</b> </p>
                      @endif


                </div>


            </div>

  </body>
</html>
