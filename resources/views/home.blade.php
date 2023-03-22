<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Create</title>
</head>
<body class="bg-light">
    <div class="container">
        <div class="py-5 text-center">
            <h2>New page</h2>
        </div>
        <div class="row g-5">
            <div>
                <form method="POST" action="{{route('createpage')}}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="" required="">
                        </div>
                        <div class="col-12">
                            <textarea name="content" class="form-control" id="content" placeholder="Content" cols="40" rows="5"></textarea>
                        </div>
                        <div class="col-12">
                            <input type="text" name="ceotitle" class="form-control" id="ceotitle" placeholder="Ceo title" value="" required="">
                        </div>
                        <div class="col-12">
                            <input type="text" name="ceodescription" class="form-control" id="ceodescription" placeholder="Ceo description" value="" required="">
                        </div>
                        <hr class="my-4">
            
                        <button class="w-100 btn btn-primary btn-lg" type="submit">Create</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</html>