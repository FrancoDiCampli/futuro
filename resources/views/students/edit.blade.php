@extends('layouts.main')

@section('content')

<div class="w-10/12 mx-auto text-gray-700">

    <div class="title">
        <div class="bg-main-blue text-white text-center">
            <h1 class="text-2xl font-medium py-5">Editar <span class="font-semibold">perfil</span></h1>
            <p class="text-sm w-6/12 mx-auto py-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam dolor enim, lacinia et sem et, rhoncus pharetra orci.</p>
        </div>

    </div>
    <div class="content w-8/12 mx-auto"
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

    </div>

    <div class="container flex mt-10 text-gray-600 text-xs justify-center">



            <div x-data="setup()">
                <ul class="flex justify-start items-center text-xs">
                    <template x-for="(tab, index) in tabs" :key="index">
                        <li class="cursor-pointer bg-white rounded-full px-5 py-2 mx-5"
                            :class="activeTab===index ? 'text-white bg-main-blue ' : ''" @click="activeTab = index"
                            x-text="tab"></li>
                    </template>
                </ul>

                <div class="mx-auto bg-white my-5">
                    <div x-show="activeTab===0">@include('students.components.edit.personal')</div>
                    <div x-show="activeTab===1">@include('students.components.edit.education')</div>
                    <div x-show="activeTab===2">@include('students.components.edit.experience')</div>
                    <div x-show="activeTab===3">Content 4</div>
                </div>
            </div>
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
