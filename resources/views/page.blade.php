<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   
    	<title>{{ @$page->title }}</title>
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0 cart" role="main">
            <div class="container">
                @include('breadcrumb',
                    ['links' => [
                        ['name' => $page->title, 'link' => null]
                    ]
                ])
            </div>
        
            <div class="container">
                <div class="py-5 pb-3">
                    <h1 class="fw-bold h2">{{ $page->title }}</h1>
                    <p class="mt-3">
                        {!!$page->content!!}
                    </p>
                </div>
            </div>
        
        </main>

    </body>
</html>