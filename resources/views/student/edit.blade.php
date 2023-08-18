<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('student.update', $student->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="name" id="" placeholder="Name" value="{{ $student->name }}">
        @error('name')
            {{ $message }}
        @enderror
        <input type="email" name="email" id="" placeholder="Email" value="{{ $student->email }}">
        @error('email')
            {{ $message }}
        @enderror
        <input type="file" name="image" id="">
        @error('image')
            {{ $message }}
        @enderror
        <label for="male">Male</label>
        <input type="radio" name="gender" id="male" value="male" {{ ($student->gender == 'male') ? "checked" : "" }}>
        <label for="male">Female</label>
        <input type="radio" name="gender" id="male" value="female"  {{ ($student->gender == 'female') ? "checked" : "" }}>
        <select name="classroom_id" id="">
            @foreach ($classrooms as $item)
            <option value="{{ $item->id }}" {{ ($student->classroom_id == $item->id) ? "selected" : "" }}>{{ $item->name }}</option>
            @endforeach
        </select>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
