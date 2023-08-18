<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="{{ route('student.update', $student->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3 mt-4">
                <label for="name">Name</label>
                <input type="text" name="name" id="Name" placeholder="Name" class="form-control" value="{{ $student->name }}">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" placeholder="Email" class="form-control" value="{{ $student->email }}">
                @error('email')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @error('image')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="flexRadioDefault1" name="gender" value="male" {{ ($student->gender == 'male') ? "checked" : "" }}>
                <label class="form-check-label" for="flexRadioDefault1">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="flexRadioDefault2" name="gender" value="female" {{ ($student->gender == 'female') ? "checked" : "" }}>
                <label class="form-check-label" for="flexRadioDefault2">
                    Female
                </label>
            </div>
            <div class="mb-3 mt-3">
                <select name="classroom_id" id="" class="form-select">
                    @foreach ($classrooms as $item)
                    <option value="{{ $item->id }}" {{ ($student->classroom_id == $item->id) ? "selected" : "" }}>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
