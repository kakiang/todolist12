<x-layout>
    <x-slot:title>Modifier une tâche</x-slot:title>

    @if (session()->has('message'))
        <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
            {{ session('message') }}
        </div>
    @endif

    <form action="{{ route('tasks.update', $task->id) }}" method="post">
        @csrf
        @method('put')
        <div class="mb-4">
            <x-label for="title" label="Titre : "/>
            <input type="text" id="title" name="title" class="w-full px-3 py-2 border rounded" value="{{ old('title', $task->title) }}" required>
            <x-error field="title"/>
        </div>
        <div class="mb-4">
            <x-label for="detail" label="Détail : "/>
            <textarea id="detail" name="detail" class="w-full px-3 py-2 border rounded" required>{{ old('detail', $task->detail) }}</textarea>
            <x-error field="detail"/>
        </div>
        <div class="mb-4">
            <input type="checkbox" name="state" id="state" class="w-4 h-4 px-3 py-2 border rounded"  @if (old('state', $task->state)) checked @endif>
            <span class="text-gray-700">{{ __('Tâche accomplie')  }}</span>                
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Envoyer</button>
    </form>
</x-layout>