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
      <h2>Create Survey</h2>
      <form action="{{route('survey/store')}}" method="POST">
        @csrf
      <div class="mt-4">
        <label for="form-control">Survey Name</label>
        <input type="text" name="name" class="form-control mr-5 mb-3" placeholder="Survey Name">
      </div>
       <button type="submit" class="btn btn-secondary mt-2">Submit</button>
       <a href="{{route('survey')}}" type="button" class="btn btn-danger mt-2">Cancel</a>
      </form>
    </div>
  </div>
</div>

</body>
</html>
