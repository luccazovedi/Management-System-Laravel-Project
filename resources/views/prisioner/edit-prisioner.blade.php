<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Informações do(a) Detendo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <form method="POST" action="{{ route('prisioner.update', $prisioner->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome:</label>
                            <input type="text" id="name" name="name" value="{{ $prisioner->name }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="age"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Idade:</label>
                            <input type="number" id="age" name="age" value="{{ $prisioner->age }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="gender"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gênero:</label>
                            <select id="gender" name="gender"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="Masculino" @if($prisioner->gender == 'Masculino') selected
                                    @endif>Masculino</option>
                                <option value="Feminino" @if($prisioner->gender == 'Feminino') selected @endif>Feminino
                                </option>
                                <option value="Outro" @if($prisioner->gender == 'Outro') selected @endif>Outro</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="date_entry"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data de
                                Ingresso:</label>
                            <input type="date" id="date_entry" name="date_entry" value="{{ $prisioner->date_entry }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="date_out"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data de
                                Saída:</label>
                            <input type="date" id="date_out" name="date_out" value="{{ $prisioner->date_out }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="cell"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cela:</label>
                            <input type="text" id="cell" name="cell" value="{{ $prisioner->cell }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="crime"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Crime:</label>
                            <textarea id="crime" name="crime"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">{{ $prisioner->crime }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="observation"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Observação:</label>
                            <textarea id="observation" name="observation"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-md">{{ $prisioner->observation }}</textarea>
                        </div>
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
                                {{ __('Deletar Detento') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Uma vez que confirmado, todos os recursos e dados serão apagados permanentemente.') }}
                            </p>
                        </header>
                        <x-danger-button x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-prisioner-deletion')">
                            {{ __('Deletar') }}</x-danger-button>

                        <x-modal name="confirm-prisioner-deletion" :show="$errors->prisionerDeletion->isNotEmpty()"
                            focusable>
                            <form method="POST" action="{{ route('prisioner.destroy', ['prisioner' => $prisioner]) }}"
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

                                    <x-input-error :messages="$errors->prisionerDeletion->get('password')"
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