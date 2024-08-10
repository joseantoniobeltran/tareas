<!-- resources/views/tarea/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Tarea') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('tarea.update', $Tarea->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="tarea_titulo" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Título</label>
                            <input type="text" id="tarea_titulo" name="tarea_titulo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 dark:focus:border-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" value="{{ $Tarea->tarea_titulo }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="tarea_descripcion" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Descripción</label>
                            <textarea id="tarea_descripcion" name="tarea_descripcion" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 dark:focus:border-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>{{ $Tarea->tarea_descripcion }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="tarea_estado" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Estado</label>
                            <input type="text" id="tarea_estado" name="tarea_estado" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 dark:focus:border-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" value="{{ $Tarea->tarea_estado }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
