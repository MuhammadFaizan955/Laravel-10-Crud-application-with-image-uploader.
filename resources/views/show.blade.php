<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
</head>
<body>
    <table class="container table table-striped table-bordered">

        <tr>
     <th>Title</th>
     <td>{{ $content->title }}</td>
    </tr>
    <tr>
        <th>Detail</th>
        <td>{{ $content->detail }}</td>
    </tr>
    <tr>
    <th>image</th>
    <td>
        <a href="{{ asset($content['image']) }}" target="_blank">View Images</a> |
        <a href="{{ asset($content['image']) }}" download>Download Images</a>
    </td>

</tr>
<tr>
