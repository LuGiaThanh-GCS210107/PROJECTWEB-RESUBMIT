<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit</title>
  </head>
  <body>
    <div class="container" style="margin-top:20px">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Information</h2>
                
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                <form action="{{url('saveinformation')}}" method="POST">
                    @csrf
                    <div class="md-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" name="id" class="form-control" value="{{$data->customerID}}" readonly>
                      
                    </div>
                    <div class="md-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$data->customerName}}">
                        @error('name')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                
                    <div class="md-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" value="{{$data->customerEmail}}">
                        @error('email')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div><br>
                    
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{url('/')}}" class="btn btn-success">Back</a>
                </form>
            </div>
        </div>
    </div>
  </body>
</html>