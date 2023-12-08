<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<style>
    a:link { text-decoration: none;color:grey; }
    a:visited { text-decoration: none;color:grey; }
    a:hover { text-decoration: none;color:grey; }
    a:active { text-decoration: none;color:grey; }

 
</style>

<body>

<div class="container" style="margin-top:20px">
  <div class="card" style="margin-left: 120px; margin-right:300px">
    <div class="card-body">
      <a href="{{route('survey/create')}}" class="btn btn-info text-white">Add Survey</a>
      <h2 class="mt-3">All Survey List</h2>
       
                @foreach ($survey as $item)
                <ul class="list-group">
                    <li class="list-group-item mb-1"><a href="{{ route('survey.show-survey',$item->id) }}">{{$item->name}}</a></li>
                </ul>
                 @endforeach
          
    </div>
  </div>
</div>

</body>
</html>
