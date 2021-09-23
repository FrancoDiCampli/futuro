
<div>


    <h1 class="text-2xl text-main-blue text-center">Agregar Nota</h1>
    <form action="{{route('notes.store')}}" class="mx-auto text-center p-10" method="POST">
        @csrf
        <input type="hidden" name="postulation" value="{{$vacante->id}}">
        <textarea class="border border-gray-300" name="content" id="" cols="30" rows="10" placeholder="Notas"></textarea>
        <button class="px-5 py-2 rounded-full">Cancelar</button>
        <button type="submit" class="bg-main-blue px-5 py-2 text-white rounded-full ">Guardar</button>
    </form>

</div>
