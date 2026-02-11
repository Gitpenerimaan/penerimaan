<x-layout>
    
       <x-slot:heading>
		Job
	</x-slot:heading>
    
  <h2 class="font-bold text-lg">
   
   {{-- {{ $job['title'] }} ini ex akses job object as array --}}
  </h2>

  <p>
    This job pays {{ $job-> salary}} per year
  </p>

  <p class="mt-6">
    <x-button href="/jobs/{{ $job->id }}/edit"> EDIT JOB </x-button>
    {{-- akses job object as property--}}
  </p>

</x-layout>