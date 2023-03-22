<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row g-5">
            <h4 class="mb-3">Billing address</h4>
            <form method="POST" action="{{route('change')}}">
            @csrf
            <input type="hidden" value="{{$page->id}}" name="id">
            <div class="row g-3">
                <div class="col-sm-6">
                <label for="firstName" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" placeholder="" value="{{$page->title}}" required="">
                </div>
    
                <div class="col-sm-6">
                <label for="lastName" class="form-label">Slug</label>
                <input type="text" class="form-control" name="slug" placeholder="" value="{{$page->slug}}" required="">
                </div>
    
                <div class="col-12">
                <label for="username" class="form-label">SEO title</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" name="ceotitle" placeholder="" value="{{$page->ceotitle}}" required="">
                </div>
                </div>
    
                <div class="col-12">
                <label for="email" class="form-label">SEO description</label>
                <input type="text" class="form-control" name="ceodescription" placeholder="" value="{{$page->ceodescription}}">
                </div>

                <div class="col-12">
                <label for="email" class="form-label">Content</label>
                <textarea type="text" class="form-control" name="content">{{$page->content}}</textarea>
                </div>
    
    
                <hr class="my-4">
    
                <button class="w-100 btn btn-primary btn-lg" type="submit">Save</button>
            </form>
            </div>
        </div>

    </div>
    
</body>
</html>