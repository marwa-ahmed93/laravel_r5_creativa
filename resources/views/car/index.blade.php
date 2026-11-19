
@extends ('main')

@section('content')

<div class="container my-3">
  @if($message = Session::get('success'))
        <div class="alert alert-success">
           <p> {{ $message }}</p>
        </div>
    @endif

<div class="w-50 m-auto my-3">
    <a  class="btn btn-secondary w-100" href="{{route('car.create')}}">Create Car</a>
</div>


    <div class="row">
        @foreach ($cars as $car)
        <div class="col-md-4">
            
            <div class="card text-center bg-info" style="width: 18rem;">
                <div class="card-body">
                    <img src="{{asset('storage/' . 
                    $car->image)}}" alt="{{ $car->model }}" class="img-fluid">
                    <h5 class="card-title"> Car Model: {{ $car->model }}</h5>
                    <p class="card-text">Price: ${{ number_format($car->price, 2) }}</p>
                    <form action="{{route('car.destroy' , $car->id)}}" method="post">
                    @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection