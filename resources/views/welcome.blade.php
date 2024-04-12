<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-12 text-center">
                <h1>Shyam Kumbhar</h1>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6 col-lg-3 mb-4">
                <a href="{{route('demo')}}" class="btn btn-primary btn-block">Task 1</a>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <a href="{{route('ip')}}" class="btn btn-primary btn-block">Task 2</a>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <a href="{{route('getData')}}" class="btn btn-primary btn-block">Task 3</a>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <a href="{{route('send.email')}}" class="btn btn-primary btn-block">Task 4</a>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
