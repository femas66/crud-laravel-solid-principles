<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>School</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    @if (session()->has('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",
            })
        </script>
    @endif
    @if (session()->has('success'))
        <script>
            Swal.fire(
                'Good job!',
                "{{ session('success') }}",
                'success'
            )
        </script>
    @endif
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">CRUD :D</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('school.index') }}">School</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('classroom.index') }}">Classroom</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.index') }}">Student</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
    <a href="{{ route('school.create') }}" class="btn btn-primary mt-2">Add</a>
    <table class="table mt-4" >
        <tr>
            <th>Name</th>
            <th>Image</th>
            <th colspan="2">Aksi</th>
        </tr>
        @foreach ($data as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td><img src="{{ asset('storage/'. $item->image) }}" alt="" srcset="" width="50" height="50" class="rounded"></td>
            <td><a href="{{ route('school.edit', $item->id) }}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('school.destroy', $item->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
</body>
</html>
