<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inserir novo Detento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <form method="POST" action="{{ route('prisioner.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome:</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="lastname"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Sobrenome:</label>
                            <input type="text" id="lastname" name="lastname" value="{{ old('lastname') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="document"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Documento:</label>
                            <input type="text" id="document" name="document" value="{{ old('document') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="zipcode"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">CEP:</label>
                            <input type="text" id="zipcode" name="zipcode" value="{{ old('zipcode') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md"
                                onchange="searchCEP()">
                        </div>
                        <div class="mb-4">
                            <label for="address"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Endereço:</label>
                            <input type="text" id="address" name="address" value="{{ old('address') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="number"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Número:</label>
                            <input type="text" id="number" name="number" value="{{ old('number') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="city"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cidade:</label>
                            <input type="text" id="city" name="city" value="{{ old('city') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="state"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estado:</label>
                            <input type="text" id="state" name="state" value="{{ old('state') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="country"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">País:</label>
                            <input type="text" id="country" name="country" value="{{ old('country') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="age"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Idade:</label>
                            <input type="number" id="age" name="age" value="{{ old('age') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="gender"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gênero:</label>
                            <select id="gender" name="gender"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                                <option value="Outro">Outro</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="date_entry"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data de
                                Ingresso:</label>
                            <input type="date" id="date_entry" name="date_entry" value="{{ old('date_entry') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="date_out"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data de
                                Saída:</label>
                            <input type="date" id="date_out" name="date_out" value="{{ old('date_out') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="cell"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cela:</label>
                            <input type="text" id="cell" name="cell" value="{{ old('cell') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="crime"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Crime:</label>
                            <textarea id="crime" name="crime"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">{{ old('crime') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="observation"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Observação:</label>
                            <textarea id="observation" name="observation"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">{{ old('observation') }}</textarea>
                        </div>
                        <a href="{{ route('prisioner.management') }}"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Voltar</a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
function searchCEP() {
    var zipcode = document.getElementById('zipcode').value;
    fetch('https://viacep.com.br/ws/' + zipcode + '/json/')
        .then(response => response.json())
        .then(data => {
            if (!data.erro) {
                document.getElementById('city').value = data.localidade;
                document.getElementById('address').value = data.logradouro;
                document.getElementById('state').value = data.uf;
                document.getElementById('country').value = 'Brasil';
            } else {
                alert('CEP não encontrado');
            }
        })
        .catch(error => {
            console.error('Erro ao buscar CEP:', error);
        });
}
</script>