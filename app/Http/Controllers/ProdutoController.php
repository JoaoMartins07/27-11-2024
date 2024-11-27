<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource (Listar produtos).
     */
    public function index()
    {
        $produtos = Produto::all();
        return view('produto.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource (Exibir formulário de criação).
     */
    public function create()
    {
        return view('produto.create');
    }

    /**
     * Store a newly created product (Inserir produto).
     */
    public function store(Request $request)
    {
        $request->validate([
            'ref' => 'required|string|max:255|unique:produtos,ref',
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ativo' => 'nullable|boolean',
        ]);

        $path = $request->file('imagem')->store('produtos');

        Produto::create([
            'ref' => $request->ref,
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'imagem' => $path,
            'ativo' => $request->has('ativo'),
        ]);

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Display the specified product (Ver detalhes do produto).
     */
    public function show(string $id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return abort(404, 'Produto não encontrado');
        }

        return view('produto.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified product (Exibir formulário de edição).
     */
    public function edit(string $id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return abort(404, 'Produto não encontrado');
        }

        return view('produto.edit', compact('produto'));
    }

    /**
     * Update the specified product (Editar produto).
     */
    public function update(Request $request, string $id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return abort(404, 'Produto não encontrado');
        }

        $validated = $request->validate([
            'ref' => 'required|string|max:255|unique:produtos,ref,' . $produto->id,
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ativo' => 'nullable|boolean',
        ]);

        if ($request->hasFile('imagem')) {
            // Remover a imagem antiga, se existir
            if ($produto->imagem && Storage::exists($produto->imagem)) {
                Storage::delete($produto->imagem);
            }

            // Guardar a nova imagem
            $validated['imagem'] = $request->file('imagem')->store('produtos');
        }

        $produto->update($validated);

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified product (Eliminar produto).
     */
    public function destroy(string $id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return abort(404, 'Produto não encontrado');
        }

        // Remover a imagem do produto
        if ($produto->imagem && Storage::exists($produto->imagem)) {
            Storage::delete($produto->imagem);
        }

        $produto->delete();

        return redirect()->route('produtos.index')->with('success', 'Produto eliminado com sucesso!');
    }

    /**
     * Display a listing of active products (Listar produtos ativos).
     */
    public function listActiveProducts()
    {
        $produtos = Produto::where('ativo', true)->get();
        return view('produto.index', compact('produtos'));
    }

    /**
     * Search for products by title (Pesquisar produtos por título).
     */
    public function searchByTitle(Request $request)
    {
        $titulo = $request->query('titulo', '');

        $produtos = Produto::where('titulo', 'like', '%' . $titulo . '%')->get();

        return view('produto.index', compact('produtos'));
    }
}
