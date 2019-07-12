<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipamento;

class EquipamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $equipamentos = Equipamento::all();

            return view('reads/gerenciar-equipamentos', compact('equipamentos'));
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
            return view('creates/adicionar-equipamento');
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
            $equipamento = new Equipamento([
                'CD_EQPT' => $request->get('codigo'),
                'NM_EQPT' => $request->get('nome'),
                'DC_TIPO_EQPT' => $request->get('descricao'),
                'QT_MOTOR' => $request->get('motores'),
                'IC_TIPO_PRPS' => $request->get('propulsor'),
                'QT_PSGR' => $request->get('passageiros')
            ]);
            $equipamento->save();
            return redirect('gerenciar-equipamentos')->with('success', 'Equipamento Adicionado');
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
            $equipamento = Equipamento::find($id);
        return view('updates/editar-equipamento', compact('equipamento'));
        }catch(\Exception $e){
            if($e->getCode() == 1049){
                return redirect('/')->with('error', 'Erro ao estabelecer conexão com o banco de dados. Erro 1049');
            }   return redirect('/')->with('error', 'Ops, algum erro aconteceu, Código do erro: '.$e->getCode());
        } 

           
    }

    public function filtro(Request $request)
    {
        try{
            $equipamentos = Equipamento::all();
            $id = $request->get('pesquisa');
            $equipamento = Equipamento::find($id);
            return view('updates/editar-equipamento', compact('equipamento', 'equipamentos'));
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
            $equipamento = Equipamento::find($id);
            $equipamento->CD_EQPT =  $request->get('codigo');
            $equipamento->NM_EQPT = $request->get('nome');
            $equipamento->DC_TIPO_EQPT = $request->get('descricao');
            $equipamento->QT_MOTOR =  $request->get('motores');
            $equipamento->IC_TIPO_PRPS = $request->get('propulsor');
            $equipamento->QT_PSGR = $request->get('passageiros');
            $equipamento->save();

            return redirect('gerenciar-equipamentos')->with('success', 'Equipamento Editado');
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
            $equipamento = Equipamento::find($id);
            $equipamento->delete();

            return redirect('gerenciar-equipamentos')->with('success', 'Equipamento Deletado');
        }catch(\Exception $e){
            if($e->getCode() == 1049){
                return redirect('/')->with('error', 'Erro ao estabelecer conexão com o banco de dados. Erro 1049');
            }   return redirect('/')->with('error', 'Ops, algum erro aconteceu, Código do erro: '.$e->getCode());
        }
        
    }
}
