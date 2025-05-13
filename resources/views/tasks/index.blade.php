<x-layout>
    <x-slot:title>Liste des tâches</x-slot:title>

    <div class="container flex justify-center mx-auto relative">
        <div class="flex flex-col w-full">
            <div class="border-b border-gray-200 overflow-x-auto pt-6">
                <div class="flex justify-end mb-4">
                    <x-link-button href="{{ route('tasks.create') }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Ajouter une tâche
                    </x-link-button>
                </div>

                <table class="min-w-full bg-white mb-4">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-xs text-gray-500">#</th>
                            <th class="px-4 py-2 text-xs text-gray-500">Titre</th>
                            <th class="px-4 py-2 text-xs text-gray-500">Détail</th>
                            <th class="px-4 py-2 text-xs text-gray-500">Etat</th>
                            <th class="px-4 py-2 text-xs text-gray-500 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($tasks as $task)
                            <tr class="whitespace-nowrap">
                                <td class="px-4 py-4 text-sm text-gray-500">{{ $task->id }}</td>
                                <td class="px-4 py-4 text-sm font-medium text-gray-900">{{ $task->title }}</td>
                                <td class="px-4 py-4 text-sm font-medium text-gray-900">{{ $task->detail }}</td>
                                <td class="px-4 py-4">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $task->state ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $task->state ? 'Effectuée' : 'A faire' }}
                                    </span>
                                </td>
                                <td class="px-4 py-4 flex justify-center space-x-2">
                                    <x-link-button href="{{ route('tasks.show', $task->id) }}"
                                        class="text-blue-600 hover:text-blue-400">
                                        Voir
                                    </x-link-button>
                                    <x-link-button href="{{ route('tasks.edit', $task->id) }}"
                                        class="text-yellow-600 hover:text-yellow-400">
                                        Modifier
                                    </x-link-button>
                                    {{-- <form id="destroy{{ $task->id }}"
                                        action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE') --}}
                                        <button onclick="showModal('{{ route('tasks.destroy', $task->id) }}')">
                                            <x-link-button color="bg-red-600 hover:bg-red-400">
                                                Supprimer
                                            </x-link-button>
                                        </button>

                                    {{-- </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mb-4">
                    {{ $tasks->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Confirmation Modal -->
    <div id="delete-modal" class="hidden fixed inset-0 bg-gray-800/80 grid place-items-center p-4">
        <div class="bg-white p-6 max-w-sm w-full rounded-lg shadow-2xl">
            <p class="mb-4">Delete this task?</p>
            <form id="delete-form" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex gap-2">
                    <button type="button" onclick="hideModal()" class="px-4 py-2 border flex-1">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white flex-1">Delete</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function showModal(deleteUrl) {
            document.getElementById('delete-form').action = deleteUrl;
            document.getElementById('delete-modal').classList.remove('hidden');
        }

        function hideModal() {
            document.getElementById('delete-modal').classList.add('hidden');
        }
    </script>
</x-layout>
