<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Employee QrCode NIP</title>
</head>
<body>

<div class="text-center" style="margin-top: 50px;">
    <h3>Employee QrCode NIP</h3>

    {!! QrCode::size(500)->generate('q1w2e3r4t5y6u7i8o9p0a1s2d3f4g5h6j7k8l9m0z1x2c3v4b5n6m7k8j8h9g0;'.$nip); !!}

    <p>scan this qrcode for start attendance</p>
</div>

</body>
</html>