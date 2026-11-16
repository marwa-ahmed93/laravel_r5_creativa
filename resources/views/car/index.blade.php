<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    
<div class="container my-3">
  @if($message = Session::get('success'))
        <div class="alert alert-success">
           <p> {{ $message }}</p>
        </div>
    @endif

    <div class="row">
        @foreach ($cars as $car)
        <div class="col-md-4">
            
            <div class="card text-center bg-info" style="width: 18rem;">
                <div class="card-body">
                    <img src="{{asset('storage/' . 
                    $car->image)}}" alt="{{ $car->model }}" class="img-fluid">
                    <h5 class="card-title"> Car Model: {{ $car->model }}</h5>
                    <p class="card-text">Price: ${{ number_format($car->price, 2) }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


</body>
</html>