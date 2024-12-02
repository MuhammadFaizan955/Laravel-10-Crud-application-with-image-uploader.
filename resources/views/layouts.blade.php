 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>re</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
     </script>
 </head>

 <body>



     <div class="container mt-5">
         <div class="row">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-header">
                         <h4>Record
                             <a href="{{ route('layouts.create') }}" class="btn btn-outline-success btn-sm float-end">Add
                                 Record</a>
                         </h4>
                     </div>


                     @if ($message = Session::get('success'))
                         <div class="alert alert-success">
                             <p>{{ $message }}</p>
                         </div>
                     @endif
                     <table class="container table table-striped table-bordered text-center">

                         <tr>
                             <th>id</th>
                             <th>title</th>
                             <th>detail</th>
                             <th>image</th>
                             <th width="280px">Action</th>
                         </tr> <!-- <th>name</th>
<th>city</th>
<th>address</th> -->

                         @if (isset($student))
                             @foreach ($student as $content)
                                 <tr>
                                     <td>{{ $content['id'] }}</td>
                                     <td>{{ $content['title'] }}</td>

                                     <td>{{ $content['detail'] }}</td>
                                     <td><img src=" {{ $content['image'] }}" width="70px" height="70px">
                                     <td>


                                         <form action="" method="Post">
                                             <a href= "{{route('layouts.show', $content->id)}}" class="btn btn-outline-warning btn-sm">view</a>
                                             <a href="{{ route('layouts.edit', $content->id) }}"
                                                 class="btn btn-outline-primary btn-sm">Edit</a>
                                             @csrf
                                             @method('DELETE') <button type="submit"
                                                 class="btn btn-outline-danger btn-sm">Delete</button>

                                     </td>
                                 </tr>
                             @endforeach
                         @endif
                     </table>
                 </div>
                 {{ $student->links() }}
 </body>

 </html>
