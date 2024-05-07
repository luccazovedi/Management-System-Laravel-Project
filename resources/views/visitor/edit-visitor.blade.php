<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Informações do(a) Visitante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white ">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <form method="POST" action="{{ route('visitor.update', [$visitor->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome:</label>
                            <input type="text" id="name" name="name" value="{{ $visitor->name }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="document"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Documento:</label>
                            <input type="text" id="document" name="document" value="{{ $visitor->document }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="age"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Idade:</label>
                            <input type="text" id="age" name="age" value="{{ $visitor->age }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="phone"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Telefone:</label>
                            <input type="text" id="phone" name="phone" value="{{ $visitor->phone }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="email"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email:</label>
                            <input type="email" id="email" name="email" value="{{ $visitor->email }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="zipcode"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">CEP:</label>
                            <input type="text" id="zipcode" name="zipcode" value="{{ $visitor->zipcode }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md"
                                onchange="searchCEP()">
                        </div>
                        <div class="mb-4">
                            <label for="address"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Endereço:</label>
                            <input type="text" id="address" name="address" value="{{ $visitor->address }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="number"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Número:</label>
                            <input type="number" id="number" name="number" value="{{ $visitor->number }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="city"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cidade:</label>
                            <input type="text" id="city" name="city" value="{{ $visitor->city }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="state"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estado:</label>
                            <input type="text" id="state" name="state" value="{{ $visitor->state }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="country"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">País:</label>
                            <input type="text" id="country" name="country" value="{{ $visitor->country }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="gender"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gênero:</label>
                            <select id="gender" name="gender"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white dark:bg-gray-700 dark:text-gray-100 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                                <option value="Outro">Outro</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="visit_date"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data da
                                Visita:</label>
                            <input type="date" id="visit_date" name="visit_date" value="{{ $visitor->visit_date }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="visit_time"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Hora da
                                Visita:</label>
                            <input type="time" id="visit_time" name="visit_time" value="{{ $visitor->visit_time }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="prisioner_id"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Prisioneiro:</label>
                            <select id="prisioner_id" name="prisioner_id"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white dark:bg-gray-700 dark:text-gray-100 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach($prisioners as $prisioner)
                                <option value="{{ $prisioner->id }}"
                                    {{ $visitor->prisioner_id == $prisioner->id ? 'selected' : '' }}>
                                    {{ $prisioner->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="prisioner_id" value="{{ $visitor->prisioner_id }}">

                        <a href="{{ route('prisioner.management') }}"
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
                                {{ __('Deletar Visitante') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Uma vez que confirmado, todos os recursos e dados serão apagados permanentemente.') }}
                            </p>
                        </header>
                        <x-danger-button x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-visitor-deletion')">
                            {{ __('Deletar') }}</x-danger-button>

                        <x-modal name="confirm-visitor-deletion" :show="$errors->visitorDeletion->isNotEmpty()"
                            focusable>
                            <form method="POST" action="{{ route('visitor.destroy', ['visitor' => $visitor]) }}"
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

                                    <x-input-error :messages="$errors->visitorDeletion->get('password')" class="mt-2" />
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