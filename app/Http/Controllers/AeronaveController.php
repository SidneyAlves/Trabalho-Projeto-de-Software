<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aeronave;
use App\Equipamento;
use App\Companhia;

class AeronaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $aeronaves = Aeronave::all();

            return view('reads/gerenciar-aeronaves', compact('aeronaves'));
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
            $equipamentos = Equipamento::all();
            $companhias = Companhia::all();

            return view('creates/adicionar-aeronave', compact('equipamentos', 'companhias'));
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
            $aeronave = new Aeronave([
                'CD_ARNV' => $request->get('codigo'),
                'CD_EQPT' => $request->get('equipamento'),
                'CD_CMPN_AEREA' => $request->get('companhia'),
            ]);
            $aeronave->save();
            return redirect('gerenciar-aeronaves')->with('success', 'Aeronave Adicionada');
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
            $equipamentos = Equipamento::all();
            $companhias = Companhia::all();
            $aeronave = Aeronave::find($id);
            return view('updates/editar-aeronave', compact('aeronave', 'equipamentos', 'companhias'));
        }catch(\Exception $e){
            if($e->getCode() == 1049){
                return redirect('/')->with('error', 'Erro ao estabelecer conexão com o banco de dados. Erro 1049');
            }   return redirect('/')->with('error', 'Ops, algum erro aconteceu, Código do erro: '.$e->getCode());
        }
           
    }

    public function filtro(Request $request)
    {
        try{
            $aeronaves = Aeronave::all();
            $equipamentos = Equipamento::all();
            $companhias = Companhia::all();
            $id = $request->get('pesquisa');
            $aeronave = Aeronave::find($id);
            return view('updates/editar-aeronave', compact('aeronave', 'aeronaves', 'equipamentos', 'companhias'));
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
            $aeronave = Aeronave::find($id);
            $aeronave->CD_ARNV =  $request->get('codigo');
            $aeronave->CD_EQPT = $request->get('equipamento');
            $aeronave->CD_CMPN_AEREA = $request->get('companhia');
            $aeronave->save();

            return redirect('gerenciar-aeronaves')->with('success', 'Aeronave Editada');
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
            $aeronave = Aeronave::find($id);
            $aeronave->delete();

            return redirect('gerenciar-aeronaves')->with('success', 'Aeronave Deletada');
        }catch(\Exception $e){
            if($e->getCode() == 1049){
                return redirect('/')->with('error', 'Erro ao estabelecer conexão com o banco de dados. Erro 1049');
            }   return redirect('/')->with('error', 'Ops, algum erro aconteceu, Código do erro: '.$e->getCode());
        }
        
    }
}
