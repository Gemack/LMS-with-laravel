<div class="box">
    <div class="tutor">
        <div class="info">
            <h3>{{ $props->instructor }}</h3>
            <span>{{ $props->created_at }}</span>
        </div>
    </div>
    <div class="thumb">
        <img src="{{ asset($props->photo) }}" alt="">
        <span>10 videos</span>
    </div>
    <h3 class="title">{{ $props->title }}</h3>
    <form action="/course/{{ $props->id }}/enroll" method="POST">
        @csrf
        <button type="submit" class="inline-btn">Enroll</button>
    </form>

</div>
