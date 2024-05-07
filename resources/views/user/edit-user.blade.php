<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Alteração de Informações de Usuário') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Suas Informações') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Altere suas informações e seu e-mail.") }}
                        </p>
                    </header>

                    <form method="post" action="{{ route('user.update', ['user' => $user]) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input-label for="name" :value="__('Nome')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                :value="old('name', $user->name)" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div>
                            <x-input-label for="lastname" :value="__('Sobrenome')" />
                            <x-text-input id="lastname" name="lastname" type="text" class="mt-1 block w-full"
                                :value="old('lastname', $user->lastname)" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
                        </div>
                        <div>
                            <x-input-label for="document" :value="__('Documento')" />
                            <x-text-input id="document" name="document" type="text" class="mt-1 block w-full"
                                :value="old('document', $user->document)" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('document')" />
                        </div>
                        <div>
                            <x-input-label for="phone" :value="__('Telefone')" />
                            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full"
                                :value="old('phone', $user->phone)" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                        </div>
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                                :value="old('email', $user->email)" required autocomplete="username" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !
                            $user->hasVerifiedEmail())
                            <div>
                                <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                    {{ __('Seu e-mail não foi verificado ainda.') }}

                                    <button form="send-verification"
                                        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                        {{ __('Clique aqui para enviar novamente o link de verificação.') }}
                                    </button>
                                </p>

                                @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                    {{ __('Um novo link de verificação foi enviado ao seu e-mail.') }}
                                </p>
                                @endif
                            </div>
                            @endif
                        </div>
                        <div>
                            <x-input-label for="password" :value="__('Nova Senha')" />
                            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"
                                autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <label for="access_level"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nível de
                                Acesso:</label>
                            <select id="access_level" name="access_level"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="admin" @if($user->access_level == 'admin') selected
                                    @endif>Administrador</option>
                                <option value="visitor_management" @if($user->access_level == 'visitor_management')
                                    selected
                                    @endif>Gestor de Visitantes</option>
                                <option value="prisioner_management" @if($user->access_level ==
                                    'prisioner_management') selected
                                    @endif>Gestor de Detentos</option>
                            </select>
                        </div>

                        <div class="flex items-center gap-4">
                            <a href="{{ route('user.management') }}"
                                class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancelar</a>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Salvar
                                Alterações</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div>
                    <section class="space-y-6">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Deletar Usuário') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Uma vez que sua conta for deletada, todos os recursos e dados serão apagados permanentemente.') }}
                            </p>
                        </header>

                        <x-danger-button x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
                            {{ __('Deletar') }}</x-danger-button>

                        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                            <form method="post" action="{{ route('user.destroy', ['user' => $user]) }}" class="p-6">
                                @csrf
                                @method('delete')

                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Tem certeza que deseja apagar sua conta?') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Uma vez que sua conta for deletada, todos os recursos e dados serão apagados permanentemente. Por favor, insira sua senha para confirmar.') }}
                                </p>

                                <div class="mt-6">
                                    <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                                    <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4"
                                        placeholder="{{ __('Password') }}" />

                                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
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
    </div>
</x-app-layout>