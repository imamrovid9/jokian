<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ucfirst($article->title) }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/admin') }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('asset/admin') }}/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('asset/admin') }}/css/app.css">
</head>

<body>
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="{{ url()->previous() }}"><i class="bi bi-chevron-left"></i></a>
            <a class="navbar-brand ms-4" href="{{ url()->previous() }}">
                {{ ucfirst($article->title) }}
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center align-middle">
                <h4 class="card-title">{{ ucfirst($article->title) }}</h4>
            </div>
            <div class="card-body">
                {!! $article->article !!}
                <p class="pt-2">{{ $article->created_at }}</p>
            </div>
        </div>
    </div>
</body>

</html>