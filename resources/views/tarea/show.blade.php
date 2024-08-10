<!-- resources/views/tarea/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalle de Tarea') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold">Título:</h3>
                        <p>{{ $Tarea->tarea_titulo }}</p>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold">Descripción:</h3>
                        <p>{{ $Tarea->tarea_descripcion }}</p>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold">Prioridad:</h3>
                        <p>{{ $Tarea->tarea_estado }}</p>
                    </div>
                    <a href="{{ route('tarea.index') }}" class="btn btn-secondary">Volver a la lista</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
