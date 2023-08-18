<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <ul>
        <li><a href="{{ route('school.index') }}">School</a></li>
        <li><a href="{{ route('student.index') }}">Student</a></li>
        <li><a href="{{ route('classroom.index') }}">Classroom</a></li>
    </ul>
    <a href="{{ route('student.create') }}">Add</a>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
            <th>Gender</th>
            <th>Kelas</th>
            <th colspan="2">Aksi</th>
        </tr>
        @foreach ($data as $item)
        <tr>
            <td>{{  $item->name  }}</td>
            <td>{{  $item->email  }}</td>
            <td><img src="{{ asset('storage/'.$item->image) }}" alt="" srcset="" width="50" height="50"></td>
            <td>{{  $item->gender  }}</td>
            <td>{{  $item->classroom->name  }}</td>
            <td><a href="{{ route('student.edit', $item->id) }}">Edit</a></td>
            <td>
                <form action="{{ route('student.destroy', $item->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
