@extends ('main')

@section('content')
    
<div class="container my-3">
    <div class="row ">

    @if($message = Session::get('success'))
        <div class="alert alert-success">
           <p> {{ $message }}</p>
        </div>
    @endif
 @if($message = Session::get('error'))
        <div class="alert alert-danger">
           <p> {{ $message }}</p>
        </div>
    @endif
  @foreach ($users as $user)
        <div class="col-md-4 my-3">
            <div class="card text-center bg-info" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">{{ $user->name }}</h5>
    <p class="card-text">{{ $user->email }}</p>

<a class="btn btn-warning" href="{{route('user.edit' , $user->id)}}">Update</a>


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



@endsection




