<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Companhia;
use App\Pais;

class CompanhiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $companhias = Companhia::all();

            return view('reads/gerenciar-companhias', compact('companhias'));
        }catch(\Exception $e){
            if($e->getCode() == 1049){
                return redirect('/')->with('error', 'Erro ao estabelecer conexão com o banco de dados. Erro 1049');
            }   return redirect('/')->with('error', 'Ops, algum erro aconteceu, Código do erro: '.$e->getCode());
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $paises = Pais::all();
            return view('creates/adicionar-companhia', compact('paises'));
        }catch(\Exception $e){
            if($e->getCode() == 1049){
                return redirect('/')->with('error', 'Erro ao estabelecer conexão com o banco de dados. Erro 1049');
            }   return redirect('/')->with('error', 'Ops, algum erro aconteceu, Código do erro: '.$e->getCode());
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $companhia = new Companhia([
                'CD_CMPN_AEREA' => $request->get('codigo'),
                'NM_CMPN_AEREA' => $request->get('nome'),
                'CD_PAIS' => $request->get('pais')
            ]);
            $companhia->save();
            return redirect('gerenciar-companhias')->with('success', 'Companhia Adicionada');
        }catch(\Exception $e){
            if($e->getCode() == 1049){
                return redirect('/')->with('error', 'Erro ao estabelecer conexão com o banco de dados. Erro 1049');
            }   return redirect('/')->with('error', 'Ops, algum erro aconteceu, Código do erro: '.$e->getCode());
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $paises = Pais::all();
            $companhia = Companhia::find($id);
            return view('updates/editar-companhia', compact('companhia', 'paises'));
        }catch(\Exception $e){
            if($e->getCode() == 1049){
                return redirect('/')->with('error', 'Erro ao estabelecer conexão com o banco de dados. Erro 1049');
            }   return redirect('/')->with('error', 'Ops, algum erro aconteceu, Código do erro: '.$e->getCode());
        }
           
    }

    public function filtro(Request $request)
    {
        try{
            $paises = Pais::all();
            $companhias = Companhia::all();
            $id = $request->get('pesquisa');
            $companhia = Companhia::find($id);
            return view('updates/editar-companhia', compact('companhia', 'companhias', 'paises'));
        }catch(\Exception $e){
            if($e->getCode() == 1049){
                return redirect('/')->with('error', 'Erro ao estabelecer conexão com o banco de dados. Erro 1049');
            }   return redirect('/')->with('error', 'Ops, algum erro aconteceu, Código do erro: '.$e->getCode());
        }
           
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $companhia = Companhia::find($id);
            $companhia->CD_CMPN_AEREA =  $request->get('codigo');
            $companhia->NM_CMPN_AEREA = $request->get('nome');
            $companhia->CD_PAIS = $request->get('pais');
            $companhia->save();

            return redirect('gerenciar-companhias')->with('success', 'Companhia Editada');
        }catch(\Exception $e){
            if($e->getCode() == 1049){
                return redirect('/')->with('error', 'Erro ao estabelecer conexão com o banco de dados. Erro 1049');
            }   return redirect('/')->with('error', 'Ops, algum erro aconteceu, Código do erro: '.$e->getCode());
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $companhia = Companhia::find($id);
            $companhia->delete();

            return redirect('gerenciar-companhias')->with('success', 'Companhia Deletada');
        }catch(\Exception $e){
            if($e->getCode() == 1049){
                return redirect('/')->with('error', 'Erro ao estabelecer conexão com o banco de dados. Erro 1049');
            }   return redirect('/')->with('error', 'Ops, algum erro aconteceu, Código do erro: '.$e->getCode());
        }
        
    }
}