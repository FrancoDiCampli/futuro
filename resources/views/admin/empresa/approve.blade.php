<div class="w-10/12 mx-auto">


    <div class="title">
        <div class="bg-main-blue text-white text-center">
            <h1 class="text-2xl font-medium py-5">Aprobar <span class="font-semibold">reclutadores</span></h1>
            <p class="text-sm w-6/12 mx-auto py-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam dolor enim, lacinia et sem et, rhoncus pharetra orci.</p>
        </div>

    </div>

    <div class="container flex mt-10 text-gray-600">
        <div class="content w-8/12 ">

            @foreach ($recruiters as $recruiter)

            <div class="card bg-white p-5 mb-10 flex justify-between items-start">

                <img class=" rounded-full shadow-md w-2/12 h-24 mx-auto" src="{{asset('img/avatar/eduardo.png')}}" alt="">

                <div class="w-8/12 mx-5">
                    <h1>{{$recruiter->first_name}} {{$recruiter->last_name}}</h1>
                    <div class="flex items-center  my-2 text-sm">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="map-marker-alt" class="h-5 svg-inline--fa fa-map-marker-alt fa-w-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/></svg>
                        <p class="mx-2">{{$recruiter->city->name}}</p>
                    </div>
                    <div class="flex items-center  my-2 text-sm">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="phone" class="h-5 svg-inline--fa fa-phone fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="m493.4 24.6-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"/></svg>
                        <p class="mx-2">{{$recruiter->phone}}</p>
                    </div>
                    <div class="flex items-center  my-2 text-sm">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="envelope" class="h-5 svg-inline--fa fa-envelope fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"/></svg>
                        <p class="mx-2">{{$recruiter->email}}</p>
                    </div>
                </div>
                @if ($recruiter->status === 1)
                    <p class="bg-lime text-white px-5 py-2 rounded-full">Aceptado</p>
                @else
                    <form action="{{route('accept.recruiter')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$recruiter->id}}" name="recruiter_id">
                        <button type="submit" class="bg-main-blue text-gray-100 px-5 py-2 rounded-full">Aceptar</button>
                    </form>
                @endif



            </div>

            @endforeach
        </div>

        <div class="aside w-4/12 ">
            <div class="card bg-white items-center text-center mx-5 mb-10 p-5">
                <div class="logo pt-2">
                    <img class="h-16 mx-auto" src="img/logos/danone.png" alt="">
                </div>
                <div class="my-5">
                    <h1 class="text-center font-semibold">Danone</h1>
                    <div class="flex  justify-center my-5">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="users" class="h-4 svg-inline--fa fa-users fa-w-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"/></svg>
                        <p class="text-xs mx-1">users 5,000 - 8,000</p>
                    </div>
                    <div class="flex  justify-center my-5">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="industry" class="h-4 svg-inline--fa fa-industry fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M475.115 163.781 336 252.309v-68.28c0-18.916-20.931-30.399-36.885-20.248L160 252.309V56c0-13.255-10.745-24-24-24H24C10.745 32 0 42.745 0 56v400c0 13.255 10.745 24 24 24h464c13.255 0 24-10.745 24-24V184.029c0-18.917-20.931-30.399-36.885-20.248z"/></svg>
                        <p class="text-xs mx-1">Alimentos</p>
                    </div>
                </div>


                <div class="flex  justify-center items-center my-5 bg-lime text-white px-5 py-2 w-8/12 mx-auto rounded-full">
                   <p class="bg-white text-gray-700 rounded-full px-1 mx-2 ">10</p><p class="font-semibold">Vacantes</p>
                </div>


            </div>

            <a href="{{route('jobs.create')}}" class="flex items-center w-10/12 mx-auto justify-center text-center bg-main-blue text-white m-5 rounded-full py-2">
                <p class="mx-5">Crear vacante</p>
                <svg aria-hidden="true" data-prefix="fas" data-icon="arrow-up" class="h-4 svg-inline--fa fa-arrow-up fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="m34.9 289.5-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z"/></svg>
            </a>




        </div>
    </div>
</div>

