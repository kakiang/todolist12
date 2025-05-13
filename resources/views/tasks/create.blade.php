<x-layout>
    <x-slot:title>
        Créer une tâche
    </x-slot:title>

    @if (session()->has('message'))
        <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
            {{ session('message') }}
        </div>    
    @endif

    @include('tasks.create_edit')
</x-layout>