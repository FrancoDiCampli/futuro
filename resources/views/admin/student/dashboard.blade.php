@extends('layouts.main')

@section('content')

<div class="w-10/12 mx-auto">
    <h1 class="text-xxl text-main-blue text-center md:text-left md:text-4xl ">Mis  <span class="font-semibold">postulaciones</span> </h1>
    <div class="flex justify-between mt-5 items-center">
        <p class="">Mostrando 1 de 1</p>
    </div>
    <div x-data="setup()">
        <ul class="flex justify-start items-center text-xs">
            <template x-for="(tab, index) in tabs" :key="index">
                <li class="cursor-pointer bg-white rounded-full px-5 py-2 mx-5"
                    :class="activeTab===index ? 'text-white bg-main-blue ' : ''" @click="activeTab = index"
                    x-text="tab"></li>
            </template>
        </ul>

        <div class="mx-auto">
            <div x-show="activeTab===0">
                <div class="content flex flex-wrap">
                    @include('admin.student.components.active')
                </div>
            </div>
            <div x-show="activeTab===1">
                <div class="content flex flex-wrap">
                    @include('admin.student.components.invitation')
                </div>
            </div>

        </div>
    </div>
    {{-- <div class="content flex flex-wrap">
        @include('admin.student.components.active')
    </div> --}}
</div>

@push('scripts')
<script>
	function setup() {
    return {
      activeTab: 0,
      tabs: [
          "Activas",
          "Invitaciones",

      ]
    };
  };
</script>
@endpush
@endsection
