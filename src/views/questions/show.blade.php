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
<body>

<div class="container" style="margin-top:20px">
    <div class="card" style="margin-left: 120px; margin-right:300px">
        <div class="card-body">
            <a href="{{route('survey/create')}}" class="btn btn-success">Add Survey</a>
            <h2 class="mt-3">All Questions List</h2>
            <table class="table table-hover mt-3">
                <thead>
                <tr>
                    <th scope="col">Survey Name</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Hello</td>
                </tr>
{{--                @foreach ($survey as $item)--}}
{{--                    <tr>--}}
{{--                        <th><a href="{{ route('survey.show-survey',$item->id) }}">{{$item->name}}</a><th>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
                </tbody>
            </table>
        </div>
    </div>
</div>


</body>
</html>
