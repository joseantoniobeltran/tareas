<!-- resources/views/tarea/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tareas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Filtros y Búsqueda -->
                    <form method="GET" action="{{ route('tarea.index') }}" class="mb-6">
                        <div class="flex gap-4 mb-4">
                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Buscar..."
                                class="form-input rounded-md shadow-sm text-gray-800"
                            >
                            <select
                                name="prioridad"
                                class="form-select text-gray-800 rounded-md shadow-sm"
                            >
                                <option value="">Todas las prioridades</option>
                                <option value="Prioridad" {{ request('prioridad') === 'Prioridad' ? 'selected' : '' }}>Prioridad</option>
                                <option value="No prioridad" {{ request('prioridad') === 'No prioridad' ? 'selected' : '' }}>No Prioridad</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                    </form>

                    <!-- Tareas Activas -->
                    <h3 class="text-lg font-semibold mb-4">Tareas Activas</h3>
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Título
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Descripción
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Prioridad
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Acción
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($Tareas as $Tarea)
                                @if (is_null($Tarea->deleted_at)) <!-- Mostrar solo tareas activas -->
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $Tarea->tarea_titulo }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $Tarea->tarea_descripcion }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $Tarea->tarea_estado }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('tarea.show', $Tarea->id) }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300">Ver</a> |
                                            <a href="{{ route('tarea.edit', $Tarea->id) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300">Editar</a> |
                                            <form action="{{ route('tarea.destroy', $Tarea->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Paginación -->
                    <div class="mt-6">
                        {{ $Tareas->links() }}
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('tarea.create') }}" class="btn btn-primary">Crear Nueva Tarea</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
