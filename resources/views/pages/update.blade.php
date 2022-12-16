@extends('layout')
@section('content')
    <section class="form-container">

        <form action="/update/user/{{ auth()->user()->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h3>update profile</h3>
            <p>update name</p>
            <input type="text" name="name" placeholder={{ auth()->user()->name }} maxlength="50" class="box">
            <p>update email</p>
            <input type="email" name="email" placeholder={{ auth()->user()->email }} maxlength="50" class="box">
            <input type="file" name="photo" class="box">
            <input type="submit" name="submit" class="btn">
        </form>

    </section>
@endsection


</body>

</html>
