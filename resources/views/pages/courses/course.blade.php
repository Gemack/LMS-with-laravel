@extends('layout')
@section('content')
    <section class="courses">

        <h1 class="heading">our courses</h1>

        <div class="box-container">
            @foreach ($courses as $course)
                <x-course-card :props="$course" />
            @endforeach

        </div>

    </section>
@endsection


</body>

</html>
