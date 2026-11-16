<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>


    
<div class="container my-3">
    <div class="row ">

    @if($message = Session::get('success'))
        <div class="alert alert-success">
           <p> {{ $message }}</p>
        </div>
    @endif

  @foreach ($users as $user)
        <div class="col-md-4 my-3">
            <div class="card text-center bg-info" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">{{ $user->name }}</h5>
    <p class="card-text">{{ $user->email }}</p>
    <a class="btn btn-success my-2" href="{{ route('user.show', $user->id) }}" class="btn btn-info">View Details</a>
  <form action="{{ route('user.destroy', $user->id) }}" method="post">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger">Delete User</button>
  </form>
  </div>
</div>
        </div>

@endforeach


    </div>
<div class="d-flex justify-content-center my-3">
    {{ $users->links() }}
    </div>

</div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>