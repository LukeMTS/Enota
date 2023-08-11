<x-app-layout>
    <x-slot name="header">
        <div style="display: flex; justify-content: space-between;">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
                <a href="{{ route('schedule.create') }}">Cadastrar</a>
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Descrição</th>
                                <th>Data</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($schedules as $schedule)
                            <tr>
                                <td>{{ $schedule->title }}</td>
                                <td>{{ $schedule->description }}</td>
                                <td>{{ $schedule->date }}</td>
                                <td>
                                    <form action="{{ route('schedule.destroy', $schedule->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('schedule.edit', $schedule->id) }}">Editar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="color: white;">
                    @if($schedules->previousPageUrl())
                    <a href="{{ $schedules->previousPageUrl() }}">Anterior</a>
                    @endif
                    @if($schedules->nextPageUrl())
                    <a href="{{ $schedules->nextPageUrl() }}">Próxima</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>