<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gerenciar Visitantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <form method="GET" action="{{ route('visitor.management') }}">
                        <div class="flex items-center mb-4">
                            <input type="text" name="search" placeholder="Pesquisar detentos"
                                class="px-4 py-2 border rounded-md shadow-sm text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                value="{{ request('search') }}">
                            <button type="submit"
                                class="ml-2 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                Buscar
                            </button>
                            <button type="button" onclick="window.location.href='{{ route('visitor.management') }}'"
                                class="ml-2 px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500">
                                Limpar
                            </button>
                        </div>
                    </form>
                    @if ($visitors->isEmpty())
                    <p class="text-gray-600 dark:text-gray-400">Não há visitantes cadastrados!</p>
                    @else
                    <div class="mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                            <table class="min-w-full leading-normal w-full">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-600 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                            Nome</th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-600 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                            Idade</th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-600 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                            Documento</th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-600 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                            Data da Visita</th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-600 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                            Hora da Visita</th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-600 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                            Prisioneiro</th>
                                        @if(auth()->user()->access_level == 'admin' || auth()->user()->access_level ==
                                        'visitor_management')
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-600 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                            Ações</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($visitors as $visitor)
                                    <tr class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm"
                                        style="color:white">
                                        <td
                                            class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                                            {{ $visitor->name }}</td>
                                        <td
                                            class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                                            {{ $visitor->age }}</td>
                                        <td
                                            class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                                            {{ $visitor->document }}</td>
                                        <td
                                            class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                                            {{ $visitor->visit_date }}</td>
                                        <td
                                            class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                                            {{ $visitor->visit_time }}</td>
                                        <td
                                            class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                                            {{ $visitor->prisioner->name }}</td>
                                        @if(auth()->user()->access_level == 'admin' || auth()->user()->access_level ==
                                        'visitor_management')
                                        <td
                                            class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm flex-space-around">
                                            <a href="{{ route('visitor.edit', $visitor->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900 mr-2">Editar</a>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                    <div class="mt-3">
                        <a href="{{ route('visitor.create') }}"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Inserir
                            Novo Visitante</a>
                        <a href="{{ route('export', ['model' => 'Visitor', 'columns' => ['name', 'lastname', 'document', 'age', 'phone', 'email', 'address', 'number', 'city', 'zipcode', 'state', 'country', 'gender', 'visit_date', 'visit_time', 'prisioner_id'], 'file_name' => 'visitors.xlsx']) }}"
                            class="ml-3 inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Exportar
                            Visitantes</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>