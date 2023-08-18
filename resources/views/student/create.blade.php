<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" id="" placeholder="Name">
        @error('name')
            {{ $message }}
        @enderror
        <input type="email" name="email" id="" placeholder="Email">
        @error('email')
            {{ $message }}
        @enderror
        <input type="file" name="image" id="">
        @error('image')
            {{ $message }}
        @enderror
        <label for="male">Male</label>
        <input type="radio" name="gender" id="male" value="male">
        <label for="male">Female</label>
        <input type="radio" name="gender" id="male" value="female">
        <select name="classroom_id" id="">
            @foreach ($classrooms as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
