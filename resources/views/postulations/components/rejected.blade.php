
@foreach ($postulations->byStatus('rejected') as $postulation)

<div class="flex items-start justify-start p-5 my-5 bg-white border card">
    <img class="h-20 rounded-full shadow-md " src="{{asset('img/avatar/eduardo.png')}}" alt="">

    <div class="mx-5 text-sm text-left">
        <h1 class="font-semibold">{{$postulation->student->first_name}} {{$postulation->student->last_name}}</h1>
        <div class="flex items-center text-xs">
            <svg aria-hidden="true" data-prefix="fas" data-icon="map-marker-alt" class="h-5 svg-inline--fa fa-map-marker-alt fa-w-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/></svg>
            <p class="mx-2">{{$postulation->student->city->name}}</p>
        </div>
        <div class="flex my-5">
            <p>{{isset($postulation->student->subcategory->name) ?? '' }}</p>

            <div class="flex items-center mx-5">
                <svg aria-hidden="true" data-prefix="fas" data-icon="graduation-cap" class="h-5 svg-inline--fa fa-graduation-cap fa-w-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M622.34 153.2 343.4 67.5c-15.2-4.67-31.6-4.67-46.79 0L17.66 153.2c-23.54 7.23-23.54 38.36 0 45.59l48.63 14.94c-10.67 13.19-17.23 29.28-17.88 46.9C38.78 266.15 32 276.11 32 288c0 10.78 5.68 19.85 13.86 25.65L20.33 428.53C18.11 438.52 25.71 448 35.94 448h56.11c10.24 0 17.84-9.48 15.62-19.47L82.14 313.65C90.32 307.85 96 298.78 96 288c0-11.57-6.47-21.25-15.66-26.87.76-15.02 8.44-28.3 20.69-36.72L296.6 284.5c9.06 2.78 26.44 6.25 46.79 0l278.95-85.7c23.55-7.24 23.55-38.36 0-45.6zM352.79 315.09c-28.53 8.76-52.84 3.92-65.59 0l-145.02-44.55L128 384c0 35.35 85.96 64 192 64s192-28.65 192-64l-14.18-113.47-145.03 44.56z"/></svg>
                <p>{{$postulation->student->experience}}</p>
            </div>
        </div>
        <a class="my-2 text-xl text-main-blue" href="{{route('get.postulation',['student'=>$postulation->student->id,'vacancy'=>$vacancy->id])}}">{{$postulation->student->title}}</a>

        <p class="">{{$postulation->student->speech}}</p>

    </div>


</div>

@endforeach
