<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Funcionário') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <h2 class="text-lg font-semibold mb-4">Editar Funcionário</h2>
                    <form method="POST" action="{{ route('employee.update', $employee->id) }}" class="max-w-lg">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome:</label>
                            <input type="text" id="name" name="name" value="{{ $employee->name }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="document" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Documento:</label>
                            <input type="text" id="document" name="document" value="{{ $employee->document }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Função:</label>
                            <select id="role" name="role" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="Guarda" @if($employee->role == 'Guarda') selected @endif>Guarda</option>
                                <option value="Cozinheiro" @if($employee->role == 'Cozinheiro') selected @endif>Cozinheiro</option>
                                <option value="Zelador" @if($employee->role == 'Zelador') selected @endif>Zelador</option>
                                <option value="Outro" @if($employee->role == 'Outro') selected @endif>Outro</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="salary" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Salário:</label>
                            <input type="number" id="salary" name="salary" value="{{ $employee->salary }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <a href="{{ route('employee.management') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancelar</a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Salvar Alterações</button>
                        <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" class="mt-4" onsubmit="return confirm('Tem certeza que deseja excluir este funcionário? Esta ação é irreversível.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900">Deletar Funcionário</button>
                        </form>
                        </div>
                    </form>          
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
