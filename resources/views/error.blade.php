<!doctype html>
<html lang="eng">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>MARKBOOK STORE</title>
</head>
<body>
<div class="container" style="margin-top: 80px;">
    @error('email')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
    @enderror

    @error('password')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
    @enderror

    @error('error')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
    @enderror

    @error('success')
    <div class="alert alert-success" role="alert">
        {{ $message }}
    </div>
    @enderror
</div>
</body>
</html>
