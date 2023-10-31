<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
           </head>
    <body class="antialiased">
       
        <div class="grid grid-cols-2">
        @foreach ($stories as $story)
            <div>
                {{ $story->title }}
                @foreach ($story->categories as $category)
                    <div>{{ $category->name }}</div>
                @endforeach
            </div>
            <hr/>
        @endforeach

    </body>
</html>
