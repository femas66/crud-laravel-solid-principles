<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('classroom.store') }}" method="post">
        @csrf
        @method('POST')
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        @error('name')
            {{ $message }}
        @enderror
        <label for="school">School</label>
        <select name="school_id" id="school">
            @foreach ($schools as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        @error('school_id')
            {{ $message }}
        @enderror
        <button type="submit">Submit</button>
    </form>
</body>
</html>
