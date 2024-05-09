<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Informações do(a) Funcionário(a)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <form method="POST" action="{{ route('employee.update', $employee->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome:</label>
                            <input type="text" id="name" name="name" value="{{ $employee->name }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="document"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Documento:</label>
                            <input type="text" id="document" name="document" value="{{ $employee->document }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="email"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">E-mail:</label>
                            <input type="email" id="email" name="email" value="{{ $employee->email }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="phone"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Telefone:</label>
                            <input type="text" id="phone" name="phone" value="{{ $employee->phone }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="age"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Idade:</label>
                            <input type="number" id="age" name="age" value="{{ $employee->age }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="gender"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gênero:</label>
                            <select id="gender" name="gender" value="{{ $employee->gender }}"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white dark:bg-gray-700 dark:text-gray-100 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                                <option value="Outro">Outro</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="zipcode"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">CEP:</label>
                            <input type="number" id="zipcode" name="zipcode" value="{{ $employee->zipcode }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md"
                                onchange="searchCEP()">
                        </div>
                        <div class="mb-4">
                            <label for="address"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Endereço:</label>
                            <input type="text" id="address" name="address" value="{{ $employee->address }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="number"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Número:</label>
                            <input type="number" id="number" name="number" value="{{ $employee->number }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="city"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cidade:</label>
                            <input type="text" id="city" name="city" value="{{ $employee->city }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="state"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estado:</label>
                            <input type="text" id="state" name="state" value="{{ $employee->state }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="country"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">País:</label>
                            <input type="text" id="country" name="country" value="{{ $employee->country }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="role"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Função:</label>
                            <select id="role" name="role" required
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white dark:bg-gray-700 dark:text-gray-100 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="Segurança" {{ $employee->role === 'Segurança' ? 'selected' : '' }}>
                                    Segurança</option>
                                <option value="Cozinheiro" {{ $employee->role === 'Cozinheiro' ? 'selected' : '' }}>
                                    Cozinheiro(a)</option>
                                <option value="Zelador" {{ $employee->role === 'Zelador' ? 'selected' : '' }}>Zelador(a)
                                </option>
                                <option value="Outro" {{ $employee->role === 'Outro' ? 'selected' : '' }}>Outro</option>
                            </select>
                        </div>
                        <div class="mb-4" id="other">
                            <label for="other"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Especifique:</label>
                            <input type="text" id="other" name="other" value="{{ $employee->other }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="date_admission"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data de
                                Admissão:</label>
                            <input type="date" id="date_admission" name="date_admission"
                                value="{{ $employee->date_admission }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="salary"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Salário:</label>
                            <div class="flex">
                                <span
                                    class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                    R$
                                </span>
                                <input type="number" id="salary" name="salary" value="{{ $employee->salary }}" required
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-none sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100">
                            </div>
                        </div>
                        <a href="{{ route('employee.management') }}"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancelar</a>

                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Salvar
                            Alterações</button>
                    </form>
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg mt-3">
                <div>
                    <section class="space-y-6">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Deletar Detento') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Uma vez que confirmado, todos os recursos e dados serão apagados permanentemente.') }}
                            </p>
                        </header>
                        <x-danger-button x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-employee-deletion')">
                            {{ __('Deletar') }}</x-danger-button>

                        <x-modal name="confirm-employee-deletion" :show="$errors->employeeDeletion->isNotEmpty()"
                            focusable>
                            <form method="POST" action="{{ route('employee.destroy', ['employee' => $employee]) }}"
                                class="p-6">
                                @csrf
                                @method('delete')

                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Tem certeza que deseja apagar estes dados?') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Uma vez que confirmado, todos os recursos e dados serão apagados permanentemente.
                                        Por favor, insira sua senha para confirmar.') }}
                                </p>

                                <div class="mt-6">
                                    <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                                    <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4"
                                        placeholder="{{ __('Password') }}" />

                                    <x-input-error :messages="$errors->employeeDeletion->get('password')"
                                        class="mt-2" />
                                </div>

                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('Cancelar') }}
                                    </x-secondary-button>

                                    <x-danger-button class="ms-3">
                                        {{ __('Deletar') }}
                                    </x-danger-button>
                                </div>
                            </form>
                        </x-modal>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
function toggleOtherField() {
    var roleSelect = document.getElementById('role');
    var otherRoleField = document.getElementById('other');

    if (roleSelect.value === 'Outro') {
        otherRoleField.style.display = 'block';
    } else {
        otherRoleField.style.display = 'none';
    }
    toggleOtherField();
    roleSelect.addEventListener('change', toggleOtherField);
    
}

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