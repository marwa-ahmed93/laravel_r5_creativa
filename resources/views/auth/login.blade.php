@extends ('main')


@section('content')

<h1 class="text-center"> Login  </h1>
    




 @if($message = Session::get('success'))
        <div class="alert alert-success">
           <p> {{ $message }}</p>
        </div>
    @endif

@if($message = Session::get('errors'))
        <div class="alert alert-danger">
           <p> {{ $message }}</p>
        </div>
    @endif

<form class="w-75 m-auto my-3"
 method="post"
  action="{{ route('login.form') }}" >
    @csrf
 

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">login</button>
</form>

@endsection