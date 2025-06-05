<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Entidade;

class EntidadeController extends Controller
{
    public function index(Request $request){
        $query = Entidade::with(['regional', 'especialidades']);

        if ($request->has('busca')) {
            $busca = $request->get('busca');
            $query->where(function ($q) use ($busca) {
                $q->where('razao_social', 'like', "%{$busca}%")
                  ->orWhere('cnpj', 'like', "%{$busca}%");
            });
        }

        if ($request->has('sort')) {
            $query->orderBy($request->get('sort'), $request->get('direction', 'asc'));
        }

        return response()->json($query->paginate(10));
    }


    public function store(Request $request){
        $validator = Validator::make($request->all(), $this->getValidationRules());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $entidade = new Entidade();
        $this->saveEntidadeData($entidade, $request);

        return response()->json($entidade->load(['regional', 'especialidades']), 201);
    }

    public function show($id){
        $entidade = Entidade::with(['regional', 'especialidades'])->find($id);

        if (!$entidade) {
            return response()->json(['message' => 'Entidade não encontrada'], 404);
        }

        return response()->json($entidade);
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), $this->getValidationRules());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $entidade = Entidade::findOrFail($id);
        $this->saveEntidadeData($entidade, $request);

        return response()->json([
            'message' => 'Entidade atualizada com sucesso',
            'entidade' => $entidade->load(['regional', 'especialidades']),
        ]);
    }


    public function destroy($id){
        $entidade = Entidade::findOrFail($id);
        $entidade->especialidades()->detach();
        $entidade->delete();

        return response()->json(['message' => 'Entidade excluída com sucesso']);
    }

    
    protected function getValidationRules(){
        return [
            'razao_social' => 'required|string',
            'nome_fantasia' => 'required|string',
            'cnpj' => 'required|string|max:18',
            'regional' => [
                'required',
                'regex:/^[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[1-5][0-9a-fA-F]{3}-[89abAB][0-9a-fA-F]{3}-[0-9a-fA-F]{12}$/'
            ],
            'data_inauguracao' => 'required|date',
            'ativa' => 'boolean',
            'especialidades' => 'required|array|min:5',
        ];
    }

    
    protected function saveEntidadeData(Entidade $entidade, Request $request){
        $data = $request->all();

        $entidade->fill([
            'razao_social' => $data['razao_social'],
            'nome_fantasia' => $data['nome_fantasia'],
            'cnpj' => $data['cnpj'],
            'regional_id' => $data['regional'],
            'data_inauguracao' => $data['data_inauguracao'],
            'ativa' => isset($data['ativa']) ? $data['ativa'] : false,
        ]);

        $entidade->save();
        
        $entidade->especialidades()->sync($data['especialidades']);
    }
}
