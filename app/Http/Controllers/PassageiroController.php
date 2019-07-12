<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Passageiro;
use App\Pais;

class PassageiroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $passageiros = Passageiro::all();
            return view('reads/gerenciar-passageiros', compact('passageiros'));
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
            $passageiros = Passageiro::all();
            return view('creates/adicionar-passageiro', compact('passageiros', 'paises'));
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
            $passageiro = new Passageiro([
                'NM_PSGR' => $request->get('nome'),
                'IC_SEXO_PSGR' => $request->get('sexo'),
                'DT_NASC_PSGR' => $request->get('dataNasc'),
                'CD_PAIS' => $request->get('pais'),
                'IC_ESTD_CIVIL' => $request->get('estCivil'),
                'CD_PSGR_RESP' => $request->get('responsavel')
            ]);
            $passageiro->save();
            return redirect('gerenciar-passageiros')->with('success', 'Passageiro Adicionado');
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
            $passageiros = Passageiro::all();
            $passageiro = Passageiro::find($id);
            return view('updates/editar-passageiro', compact('passageiro', 'passageiros', 'paises'));
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
            $passageiros = Passageiro::all();
            $id = $request->get('pesquisa');
            $passageiro = Passageiro::find($id);
            return view('updates/editar-passageiro', compact('passageiro', 'passageiros', 'paises'));
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
            $passageiro = Passageiro::find($id);
            $passageiro->NM_PSGR =  $request->get('nome');
            $passageiro->IC_SEXO_PSGR = $request->get('sexo');
            $passageiro->DT_NASC_PSGR = $request->get('dataNasc');
            $passageiro->CD_PAIS = $request->get('pais');
            $passageiro->IC_ESTD_CIVIL = $request->get('estCivil');
            $passageiro->CD_PSGR_RESP = $request->get('responsavel');
            $passageiro->save();

            return redirect('gerenciar-passageiros')->with('success', 'Passageiro Editado');
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
    public function destroy($CD_PSGR)
    {
        try{
            $passageiro = Passageiro::find($CD_PSGR);
            $passageiro->delete();

            return redirect('gerenciar-passageiros')->with('success', 'Passageiro Deletado');
        }catch(\Exception $e){
            if($e->getCode() == 1049){
                return redirect('/')->with('error', 'Erro ao estabelecer conexão com o banco de dados. Erro 1049');
            }   return redirect('/')->with('error', 'Ops, algum erro aconteceu, Código do erro: '.$e->getCode());
        }
        
    }
}
