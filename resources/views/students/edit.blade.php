@extends('layouts.main')

@section('content')

<div class="w-10/12 mx-auto text-gray-700">

    <div class="title">
        <div class="text-center text-white bg-main-blue">
            <h1 class="py-5 text-2xl font-medium">Editar <span class="font-semibold">perfil</span></h1>
            <p class="w-6/12 py-5 mx-auto text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam dolor enim, lacinia et sem et, rhoncus pharetra orci.</p>
        </div>

    </div>
    <div class="w-8/12 mx-auto content"
    x-data="{ width: '{{$per}}' }"
    x-init="$watch('width', value => { if (value > 100) { width = 100 } if (value == 0) { width = 10 } })">
     <!-- Start Regular with text version -->
        <div
            class="h-5 my-5 bg-blue-200 rounded-full"
            role="progressbar"
            :aria-valuenow="width"
            aria-valuemin="0"
            aria-valuemax="100"
            >
            <div
                class="h-5 text-sm text-center text-white transition rounded-full bg-main-blue "
                :style="`width: ${width}%; transition: width 2s;`"
                x-text="`${width}% perfil completado`"
                >
            </div>
        </div>

    </div>

    <div class="container flex justify-center mt-10 text-xs text-gray-600">



            <div x-data="setup()">
                <ul class="flex items-center justify-start text-xs">
                    <template x-for="(tab, index) in tabs" :key="index">
                        <li class="px-5 py-2 mx-5 bg-white rounded-full cursor-pointer"
                            :class="activeTab===index ? 'text-white bg-main-blue ' : ''" @click="activeTab = index"
                            x-text="tab"></li>
                    </template>
                </ul>

                <div class="mx-auto my-5 bg-white">
                    <input type="hidden" value="{{$student->id}}">
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
