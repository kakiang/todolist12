<x-layout>
    <x-slot:title>
        Voir une tâche
    </x-slot:title>
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6 space-y-6">
        <div class="border-b pb-4">
            <h3 class="font-semibold text-xl text-gray-800">Titre</h3>
            <p class="text-gray-600 mt-2">{{ $task->title }}</p>
        </div>
        
        <div class="border-b pb-4">
            <h3 class="font-semibold text-xl text-gray-800">Détail</h3>
            <p class="text-gray-600 mt-2">{{ $task->detail }}</p>
        </div>


        <div class="border-b pb-4">
            <h3 class="font-semibold text-xl text-gray-800">Etat</h3>
            <p class="text-gray-600 mt-2">
                @if ($task->state)
                    <span class="text-green-600">La tâche a été accomplie !</span>
                @else
                    <span class="text-red-600">La tâche n'a pas été accomplie !</span>
                @endif
            </p>
        </div>
        
        <div class="border-b pb-4">
            <h3 class="font-semibold text-xl text-gray-800">Date de création</h3>
            <p class="text-gray-600 mt-2">{{ $task->created_at->format('d/m/Y') }}</p>
        </div>

        @if (!$task->created_at->isSameDay($task->updated_at))
            <div>
                <h3 class="font-semibold text-xl text-gray-800">Dernière modification</h3>
                <p class="text-gray-600 mt-2">{{ $task->updated_at->format('d/m/Y') }}</p>
            </div>            
        @endif
    </div>
</x-layout>