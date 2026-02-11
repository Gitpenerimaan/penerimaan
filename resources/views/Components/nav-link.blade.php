@props(['active'=> false ])  {{-- deklarasi prop disini, type default anchor}}

{{-- 
html atribut ada bbrp; href, id, class
html prop ; selain atribut
jika 'active' dideclare sebagai prop, maka ketika inspect di layout.blade 'active' tidak muncul
jika 'active' tidak dideclare sbg props,  maka 'active' akan dianggap sbg atribut, dan muncul saat inspect
--}}

<a class=" {{ $active ?  'bg-red-600 text-white' :  'text-gray-300 hover:bg-white/5 hover:text-white' }}
rounded-md px-3 py-2 text-sm font-medium"
aria-current="{{ $active ? 'page': 'false'}}" {{-- apakah current link , represent current page--}}

{{ $attributes }}  
{{--show attribut contoh 'id=xxx' pada layout file saat inspect home link --}}

>{{ $slot }}</a>
{{--note </a> anchor bisa dimodif {{$type}}  --}}

