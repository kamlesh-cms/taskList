<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <h1 class="text-center md:text-left px-6 text-xl text-gray-600">Dashboard</h1>
                <div class="px-6 mt-4">
                    <p class="text-center md:text-left text-md text-green-700 text-md">Welcome {{Auth::user()->name}}!</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
