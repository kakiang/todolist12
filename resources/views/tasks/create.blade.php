<x-layout>
    <x-slot:title>
        Créer une tâche
    </x-slot:title>

    @if (session()->has('message'))
        <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
            {{ session('message') }}
        </div>    
    @endif

    <form action="{{ route('tasks.store') }}" method="post">
        @csrf
        <div class="mb-4">
            <x-label for="title" label="Titre: "/> 
            <input type="text" id="title" name="title" class="w-full px-3 py-2 border rounded" value="{{ old('title') }}" required>
            <x-error field="title"/>
        </div>

        <div class="mb-4">
            <x-label for="detail" label="Détail: "/> 
            <textarea name="detail" id="detail" class="w-full px-3 py-2 border rounded" required>{{ old('value') }}</textarea>
            <x-error field="detail"/>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Envoyer</button>
        <a role="button" class="bg-gray-500 text-white px-4 py-2 rounded" href="{{ route('tasks.index') }}">Annuler</a>
    </form>
</x-layout>