@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">🗂️ Minhas Tarefas</h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-outline-primary shadow-sm">+ Nova Tarefa</a>
    </div>

    <!-- Filtro por status -->
    <form method="GET" action="{{ route('tasks.index') }}" class="mb-4">
        <div class="row g-2 align-items-end">
            <div class="col-md-3">
                <label for="status" class="form-label fw-semibold">Filtrar por Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="">Todas</option>
                    <option value="Pendente" {{ request('status') == 'Pendente' ? 'selected' : '' }}>Pendente</option>
                    <option value="Concluída" {{ request('status') == 'Concluída' ? 'selected' : '' }}>Concluída</option>
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-outline-secondary">🔍 Filtrar</button>
            </div>
        </div>
    </form>

    @if($tasks->count())
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white fw-semibold">
                Lista de Tarefas
            </div>
            <div class="card-body p-4 bg-light">
                <table class="table table-bordered table-striped rounded shadow-sm bg-white">
                    <thead class="table-primary text-center">
                        <tr>
                            <th class="w-25">Título</th>
                            <th class="w-25">Status</th>
                            <th class="w-25">Data de Criação</th>
                            <th class="w-25">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr class="align-middle text-center">
                                <td class="fw-medium">{{ $task->title }}</td>
                                <td>
                                    <span class="badge px-3 py-2 {{ $task->status === 'Concluída' ? 'bg-success' : 'bg-warning text-dark' }}">
                                        {{ $task->status }}
                                    </span>
                                </td>
                                <td>{{ $task->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-outline-secondary">
                                            ✏️ Editar
                                        </a>
                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                🗑️ Excluir
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Paginação -->
                <div class="mt-4 d-flex justify-content-center">
                    {{ $tasks->links() }}
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-info text-center shadow-sm">
            Você ainda não possui tarefas cadastradas. Clique em <strong>+ Nova Tarefa</strong> para adicionar.
        </div>
    @endif
</div>
@endsection
