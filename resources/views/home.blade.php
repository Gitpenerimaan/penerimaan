<!-- referensikan layout file dg <x-..file refnya, case ini namafile nya layout.blade.php -->

<!-- variable $heading dari file layout, didefine disini dg 2 opsi, sebagai Properti; <x-layout heading="" atau	sebagai var slot yang diberi nama, seusai dengan posisi pada layout -->



<x-layout> 

	<x-slot:heading>
		Homee Page
	</x-slot:heading>

<h1>{{$greeting}} from HOME PAGE, {{ $user}}</h1>
</x-layout>