<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" value="intelligence alan">
    <meta name="description" value="intelligence alan">
    <link rel="stylesheet" href="/css/main.css">

    <title>{{ config('app.name') }}</title>
</head>
<body>
    <div class="wrapper">
        <div class="search-form">
            <img src="https://dummyimage.com/350x150/b0aeb0/fff" alt="Intelligence Alan logo">
            <form method="get">
                <input type="text" name="q" required class="search-form-input">
                <button type="submit" name="submit" class="search-form-button">Search</button>
            </form>
        </div>
    </div>
</body>
</html>