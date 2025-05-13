<form action="{{ isset($task) ? route('tasks.update', $task->id) : route('tasks.store') }}" method="post">
    @csrf
    @if(isset($task))
        @method('put')
    @endif

    <div class="mb-4">
        <x-label for="title" label="Titre: "/>
        <input type="text" id="title" name="title" class="w-full px-3 py-2 border rounded"
               value="{{ old('title', isset($task) ? $task->title : null) }}" required>
        <x-error field="title"/>
    </div>

    <div class="mb-4">
        <x-label for="detail" label="Détail: "/>
        <textarea name="detail" id="detail" class="w-full px-3 py-2 border rounded" required>
            {{ old('detail', isset($task) ? $task->detail : null) }}
        </textarea>
        <x-error field="detail"/>
    </div>

    @if(isset($task))
        <div class="mb-4">
            <input type="checkbox" name="state" id="state" class="w-4 h-4 px-3 py-2 border rounded"
                   @if (old('state', $task->state)) checked @endif>
            <span class="text-gray-700">Tâche accomplie</span>
        </div>
    @endif

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
        {{ isset($task) ? 'Mettre à jour' : 'Enregistrer' }}
    </button>
    <a role="button" class="bg-gray-500 text-white px-4 py-2 rounded" href="{{ route('tasks.index') }}">Annuler</a>
</form>