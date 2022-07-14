<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

     
    </head>
    <body >
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        @php $response = json_decode($response)->fields;@endphp
        <div class="card-body my-3">
            <div class="container my-3">
                @if(session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <form method="post" action="{{url('/public/save')}}">
                   <input type="hidden" name="_token" value=" {{ csrf_token() }}">
                   @for($i=0; $i<count($response); $i++)
                       @if(isset($response[$i]->items))
                            @if($response[$i]->type == "dropdown")
                                <div class="mb-3">
                                    <label for="{{$response[$i]->key}}" name="{{$response[$i]->key}}"  class="form-label">{{$response[$i]->label}}</label>
                                    <select class="form-select" name="{{$response[$i]->key}}" id="{{$response[$i]->key}}" required>
                                        <option selected disabled value="">Choose...</option>
                                        @for($j=0; $j<count($response[$i]->items); $j++)
                                         <option value="{{$response[$i]->items[$j]->value}}">{{$response[$i]->items[$j]->text}}</option>
                                        @endfor
                                       
                                    </select>
                            @endif
                       @else
                            <div class="mb-3">
                              <label for="{{$response[$i]->key}}" class="form-label">{{$response[$i]->label}}</label>
                              <input type="{{$response[$i]->type}}" class="form-control" id="{{$response[$i]->key}}" name="{{$response[$i]->key}}" placeholder="{{$response[$i]->label}} (@if(isset($response[$i]->unit)){{$response[$i]->unit}}@endif)" title="{{$response[$i]->label}}"  @if(isset($response[$i]->isRequired)) @if($response[$i]->isRequired) required @endif @endif  @if(isset($response[$i]->isReadonly)) @if($response[$i]->isReadonly) readonly @endif @endif>
                            </div>
                       @endif
                    @endfor
                    <center>
                        <button type="submit" class="btn btn-outline-success">Submit</button>
                    </center>
              </form>
            </div>
        </div>
        @if(count($data) != 0)
            <div class="card-body my-3">
                <div class="container my-3">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">So.No.</th>
                                <th scope="col">Date of Birth</th>
                                <th scope="col">Gestational Age(Weeks)</th>
                                <th scope="col">Sex</th>
                                <th scope="col">Height(cm)</th>
                                <th scope="col">Weight(Kg)</th>
                                <th scope="col">BMI(kg/m<sup>3</sup>)</th>
                            </tr>
                        </thead>
                         <tbody>
                             @foreach ($data as  $val)
                                <tr>
                                    <th scope="row">{{$val->id}}</th>
                                    <td>{{$val->DOB}}</td>
                                    <td>{{$val->Age}}</td>
                                    <td>{{$val->Sex}}</td>
                                    <td>{{$val->Height}}</td>
                                    <td>{{$val->Weight}}</td>
                                    <td>{{$val->BMI}}</td>
                                </tr>
                            @endforeach
                         </tbody>
                         
                    </table>
                    
                        {{$data->links()}}
                        
                </div>
            </div>
        @endif
    </body>
</html>
