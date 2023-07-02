<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $viewData['product']->name }}</title>
</head>
<body>
    {{ $viewData['product']->name }} <br>
    {{ $viewData['product']->description }} <br>
    {{ $viewData['product']->price }} <br>
</body>
</html>