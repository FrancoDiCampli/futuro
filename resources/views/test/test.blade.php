{{-- <img class="h-12 rounded-full shadow-sm" src="{{asset('storage/avatar/8/PQuy8XB0F4R9thRAxAkm1Z0Zh70JxaFsD1uiFkef.jpg') }}" alt="user"> --}}
<img class="h-12 rounded-full shadow-sm" src="{{asset('storage/'.user()->photo->path) }}" alt="user">

<pre>{{'storage/'.user()->photo->path}}</pre>
<form action="{{route('save')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="photo" >
    <button type="submit">Send</button>
</form>
