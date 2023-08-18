<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('school.update', $data->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Name" value="{{ $data->name }}">
        <img src="{{ asset('storage/' . $data->image) }}" alt="" srcset="" width="50" height="50">
        <label for="image">image</label>
        <input type="file" name="image" id="image" accept="image/jpg, image/jpeg, image/png">
        <button type="submit">Submit</button>
    </form>
</body>
</html>
