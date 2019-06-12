<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <title>Create Page</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </head>
  <body>

      <div class="container">
          <h2 class="text-center">Create User</h2>

          <form action="/admin/users" method="POST">
                {{csrf_field()}}

                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="name" class="form-control" id="name" placeholder="Enter name" name="name">
                </div>

                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>

                <div class="form-group">
                  <label for="pass">Password:</label>
                  <input type="password" class="form-control" id="pass" placeholder="Enter password" name="password">
                </div>

                <div class="form-group">
                  <label for="role">Select Status:</label>
                  <select class="form-control" id="role" name="role_id">

                    @foreach($roles as $role)
                      <option value={{$role->id}}>{{$role->name}}</option>
                    @endforeach

                  </select>
                </div>

                <div class="form-group">
                  <label for="status">Select Status:</label>
                  <select class="form-control" id="status" name="is_active">
                    <option value=1>Active</option>
                    <option value=0>Not Active</option>
                  </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
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
