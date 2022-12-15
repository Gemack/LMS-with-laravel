<!DOCTYPE html>
<html>

<head>
    <title>Add A course</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/adCourse.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
</head>

<body>
    <div class="container">

        <div class="contact-box">
            <div class="back-home">
                <a href="/">Back Home</a>
            </div>
            <form class="right" action="/update/{{ $course->id }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <h2>Update This Course</h2>
                <input type="text" class="field" placeholder="{{ $course->title }}" value="{{ $course->title }}"
                    name="title">
                @error('title')
                    <p class="error" style="color: red">{{ $message }}</p>
                @enderror
                <input type="text" class="field" placeholder="{{ $course->instructor }}"
                    value="{{ $course->instructor }}" name="instructor">
                @error('instructor')
                    <p class="error" style="color: red">{{ $message }}</p>
                @enderror
                <input type="file" class="field" placeholder="course image" name="photo">
                <textarea name="description" class="field">
                    {{ $course->description }}
                </textarea>
                @error('description')
                    <p class="error" style="color: red">{{ $message }}</p>
                @enderror
                <button type="submit" class="btn">Send</button>
            </form>
        </div>
    </div>
</body>

</html>
