@foreach ($postulations->byStatus('new') as $postulation)
<a href="{{route('vacancies.show',$postulation->vacancy->slug)}}" class="justify-center w-56 mx-1 mt-5 space-x-2 text-gray-700 bg-white cursor-pointer card">
    <img class="h-16 mx-auto mt-5" src="{{asset('img/logos/logo.png')}}" alt="">
    <div class="my-5">
        @if ($postulation->vacancy->recruiter->belong_enterprise)
            <h1 class="font-semibold text-center">{{$postulation->vacancy->recruiter->enterprise->name}}</h1>
        @else
            <h1 class="font-semibold text-center">{{$postulation->vacancy->recruiter->fullname}}</h1>
        @endif
        <div class="flex justify-center">
            <svg aria-hidden="true" data-prefix="fas" data-icon="map-marker-alt" class="h-4 svg-inline--fa fa-map-marker-alt fa-w-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/></svg>
            <p class="mx-1 text-xs">{{$postulation->vacancy->city->name}}</p>
        </div>
    </div>

    <div class="mx-auto my-5 text-center">
        <h2 class="text-xl font-semibold text-main-blue">{{$postulation->vacancy->subcategory->category->name}}</h2>
        <p class="text-xs">{{$postulation->vacancy->subcategory->name}}</p>
    </div>

    <div class="flex items-center justify-center my-10 text-xs">

        @if ($postulation->vacancy->expired)
        <p class="px-5 py-2 text-white bg-red-500 rounded-full">Cerrada</p>
        @else
        <p class="px-5 py-2 text-white rounded-full bg-lime">Abierta</p>
        @endif
    </div>
</a>
@endforeach
