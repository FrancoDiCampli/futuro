@extends('layouts.main')

@section('content')

    <div class="w-10/12 mx-auto text-gray-700">
        @if(count($notifications)>0)
        <h1 class="text-xl text-main-blue font-semibold">Hay {{count($notifications)}} mensajes no leidos</h1>
        @else
        <h1 class="text-xl text-main-blue font-semibold">No hay mensajes nuevos</h1>

        @endif
        <div class=" mx-auto">
            @foreach ($notifications as $notification)

                <div class="card w-6/12 bg-white border rounded-lg p-5">
                    <h1 class="font-semibold">{{$notification->data['title']}}</h1>
                    <p class="text-sm my-2">{{$notification->data['content']}}</p>
                    <p class="text-xs">Enviado el {{$notification->created_at}}</p>
                    <p class="text-xs">por: <span class="italic">{{$notification->data['sender']}}</span></p>
                    <div class="flex justify-end">
                        <span class="bg-main-blue text-white text-xs px-3 py-1 rounded-full">Nuevo</span>
                        {{-- <span class="bg-lime text-white text-xs px-3 py-1 rounded-full">Leido</span> --}}
                    </div>
                </div>

            @endforeach
        </div>
    </div>
@endsection
