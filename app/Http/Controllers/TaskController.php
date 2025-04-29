<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // Listar tarefas do usuário logado
    public function index(Request $request)
    {
        $query = auth()->user()->tasks();
    
        if ($request->filled('status') && $request->status !== 'Todas') {
            $query->where('status', $request->status);
        }
    
        $tasks = $query->orderByDesc('created_at')->paginate(5)->withQueryString();
    
        return view('tasks.index', compact('tasks'));
    }



    // Mostrar formulário de criação
    public function create()
    {
        return view('tasks.create');
    }

    // Salvar nova tarefa
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Auth::user()->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tarefa criada com sucesso!');
    }

    // Mostrar formulário de edição
    public function edit(Task $task)
    {
        $this->authorizeTask($task);
        return view('tasks.edit', compact('task'));
    }

    // Atualizar tarefa existente
    public function update(Request $request, Task $task)
    {
        $this->authorizeTask($task);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Pendente,Concluída',
        ]);

        $task->update($request->only('title', 'description', 'status'));

        return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada com sucesso!');
    }

    // Excluir tarefa
    public function destroy(Task $task)
    {
        $this->authorizeTask($task);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tarefa deletada com sucesso!');
    }

    // Proteção extra para garantir que o usuário só edita a própria tarefa
    private function authorizeTask(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }
    }
}
