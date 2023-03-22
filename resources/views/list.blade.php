<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>Document</title>
</head>
<body class="container">
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Заголовок</th>
            <th scope="col">Дата создания</th>
            <th scope="col">Изменить</th>
            
          </tr>
        </thead>
        <tbody>
            @foreach ($pages->sortByDesc('created_at') as $page)
            <tr>
                <th scope="row">{{$page->id}}</th>
                <td><a href="/listpages/{{$page->id}}">{{ $page->title }}</a></td>
                <td>{{ $page->created_at->diffForHumans() }}</td>
                <td>
                    <button class="btn btnRemove" data-id="{{$page->id}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
                        <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
                        </svg>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
      <script>
        $('body').on('click', '.btnRemove', function() {
          $.ajax({
              headers:{
                  'X-CSRF-TOKEN': "{{csrf_token()}}"
              },
              type:'POST',
              url:"{{route('remove')}}",
              data: {id: $(this).data('id')},
          }).done((data) => {
  
          }).fail((err) => {
              console.log(err.responseJSON.message);
          });
        });
      </script>
</body>
</html>