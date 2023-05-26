<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white sm:flex-col">
            <h1>Shopping list</h1>
            <ul>
            @foreach($shopitems as $value)
                <li>
                    {{ $value->name }} -
                    <form method="post" action="{{ route('completeItem', $value->id) }}">
                        @csrf
                        <button type="submit">check off</button>
                     </form>
                </li>
            @endforeach
            </ul>

            <form method="post" action="{{ route('saveItem') }}">
               @csrf
                <label for="shopItem">New todo item</label>
                <input type="text" name="shopItem" />
                <button type="submit">Add</button>
            </form>
        </div>
    </body>
</html>
