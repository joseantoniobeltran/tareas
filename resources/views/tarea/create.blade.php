<!-- resources/views/tarea/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Tarea') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('tarea.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="tarea_titulo" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Título</label>
                            <input type="text" id="tarea_titulo" name="tarea_titulo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 dark:focus:border-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>
                        </div>
                        <div class="mb-4">
                            <label for="tarea_descripcion" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Descripción</label>
                            <textarea id="tarea_descripcion" name="tarea_descripcion" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 dark:focus:border-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="tarea_estado" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Prioridad</label>
                            <select id="tarea_estado" name="tarea_estado" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 dark:focus:border-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>
                                <option value="">Selecciona una opción</option>
                                <option value="Prioridad">Prioridad</option>
                                <option value="No prioridad">No prioridad</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
