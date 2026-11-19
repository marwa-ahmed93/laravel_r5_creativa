
@extends ('main')



@section('content')


  <h1 class="text-center"> Create Car </h1>
    

@include('layouts.errors')


<form class="w-75 m-auto my-3"
 method="post"
  action="{{ route('car.store') }}" enctype="multipart/form-data"> 
    @csrf
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Model</label>
    <input type="text" name="model" class="form-control" id="exampleInputPassword1">
    @if($errors->has('model'))
  <div class="alert alert-danger">{{$errors->first('model')}}</div>
  @endif
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Price</label>
    <input type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  
    @if($errors->has('price'))
  <div class="alert alert-danger">{{$errors->first('price')}}</div>
  @endif
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Image</label>
    <input type="file" name="image" class="form-control" id="exampleInputPassword1">
      @if($errors->has('image'))
  <div class="alert alert-danger">{{$errors->first('image')}}</div>
  @endif
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection

  