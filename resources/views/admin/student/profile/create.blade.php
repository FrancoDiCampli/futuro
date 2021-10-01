@extends('layouts.main')

@section('content')

<div class="w-8/12 mx-auto text-gray-700 text-sm">
    <div class="bg-main-blue h-32">
        <h1 class="text-center text-white text-2xl font-semibold p-10">Editar perfil</h1>

    </div>

    <div class="container flex mt-10 text-gray-600 text-xs justify-center">


        <div class="content w-full"
            x-data="{ width: '50' }"
            x-init="$watch('width', value => { if (value > 100) { width = 100 } if (value == 0) { width = 10 } })">
             <!-- Start Regular with text version -->
             <div
             class="bg-blue-200 rounded-full h-5 my-5"
             role="progressbar"
             :aria-valuenow="width"
             aria-valuemin="0"
             aria-valuemax="100"
             >
             <div
                 class="bg-main-blue rounded-full h-5 text-center text-white text-sm transition "
                 :style="`width: ${width}%; transition: width 2s;`"
                 x-text="`${width}% perfil completado`"
                 >
             </div>
         </div>
         <!-- End Regular with text version -->

            <div x-data="setup()">
                <ul class="flex justify-start items-center text-xs">
                    <template x-for="(tab, index) in tabs" :key="index">
                        <li class="cursor-pointer bg-white rounded-full px-5 py-2 mx-5"
                            :class="activeTab===index ? 'text-white bg-main-blue ' : ''" @click="activeTab = index"
                            x-text="tab"></li>
                    </template>
                </ul>

                <div class="mx-auto bg-white my-5 text-sm">
                    <form action="{{route('students.store')}}" method="POST" class="mb-10 py-2" enctype="multipart/form-data">
                        @csrf
                        <div x-show="activeTab===0">@include('students.components.create.personal')</div>
                        <div x-show="activeTab===1">Content 1</div>
                        <div x-show="activeTab===2">Content 1</div>
                        <div x-show="activeTab===3">Content 4</div>

                </div>
            </div>
                <div class="flex justify-center">
                    <button class="w-4/12 bg-main-blue text-white rounded-full px-5 py-2">Guardar</button>
                </div>
            </form>
        </div>


    </div>
</div>

@push('scripts')
<script>
	function setup() {
    return {
      activeTab: 0,
      tabs: [
          "Perfil",
          "Educacion",
          "Experiencia",
          "Psicometrico",
      ]
    };
  };
</script>
@endpush
@endsection
