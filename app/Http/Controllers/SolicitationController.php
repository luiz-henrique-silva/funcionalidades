<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Solicitation;


class SolicitationController extends Controller
{

public function showPendingProjects()
{
    // Buscando todos os projetos pendentes
    $projects = Project::where('status', 'pendente')->get();

    // Retornando a view com a variável $projects
    return view('projects.approve', compact('projects'));
}

    // Exibir todas as solicitações pendentes
    public function index() {
        $solicitations = Solicitation::all(); // ou adicionar filtros conforme necessário
        return view('solicitations.index', compact('solicitations'));
    }

    // Salvar uma nova solicitação
    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'data_inicio' => 'nullable|date',
        'data_final' => 'nullable|date',
        'integrantes' => 'nullable|string',
        'curso_id' => 'nullable|integer',
        'professor_orientador_id' => 'nullable|integer',
        'link_github' => 'nullable|url',
    ]);

    $validated['user_id'] = auth()->id(); // ID do usuário autenticado
    $validated['status'] = 'pendente'; // Define o status como pendente automaticamente

    Solicitation::create($validated);

    return redirect()->route('solicitations.index')->with('success', 'Solicitação enviada com sucesso!');
}


    // Aprovar uma solicitação (mover para projetos)
    public function approve(Solicitation $solicitation) {
        // Lógica para mover para a tabela de projetos, semelhante ao que foi discutido antes
    }
    
    // Outros métodos conforme necessário...
}
