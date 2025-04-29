<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-900 leading-tight">
            👋 Olá, {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Seja bem-vindo ao seu painel!</h3>
                <p class="text-gray-600">
                    Você está logado com sucesso. Acesse suas tarefas no botão abaixo.
                </p>

                <a href="{{ route('tasks.index') }}" class="mt-5 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    🗂️ Ver Tarefas
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
