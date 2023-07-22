<!-- error_page.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Error Page</title>
</head>
<body>
    <div class="container">
        <h1>Error Occurred</h1>
        @if (is_array($errors))
            <ul>
                @foreach ($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @else
            <p>{{ $errors }}</p>
        @endif
    </div>
</body>
</html>
