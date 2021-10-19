@extends('layouts.main')

@section('content')

<div class="w-10/12 mx-auto">
    <h1 class="text-center text-xxl text-main-blue md:text-left md:text-4xl ">Mis  <span class="font-semibold">postulaciones</span> </h1>
    <div class="flex items-center justify-between mt-5">
        {{-- <p class="">Mostrando 1 de 1</p> --}}
        {{ $postulations->links() }}
    </div>
    <div x-data="setup()">
        <ul class="flex items-center justify-start text-xs">
            <template x-for="(tab, index) in tabs" :key="index">
                <li class="px-5 py-2 mx-5 bg-white rounded-full cursor-pointer"
                    :class="activeTab===index ? 'text-white bg-main-blue ' : ''" @click="activeTab = index"
                    x-text="tab"></li>
            </template>
        </ul>

        <div class="mx-auto">
            @if(count($postulations)>0)
            <div x-show="activeTab===0">
                <div class="flex flex-wrap content">
                    @include('admin.student.components.active')
                </div>
            </div>
            <div x-show="activeTab===1">
                <div class="flex flex-wrap content">
                    @include('admin.student.components.invitation')
                </div>
            </div>
            @else
                <p class="text-sm font-semibold text-main-blue">No posee postulaciones activas</p>
            @endif

        </div>
    </div>
    {{-- <div class="flex flex-wrap content">
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
