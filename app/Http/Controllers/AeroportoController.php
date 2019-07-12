<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aeroporto;
use App\Pais;
use App\UF;

class AeroportoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $aeroportos = Aeroporto::all();
            //$paises = Pais::all();

            return view('reads/gerenciar-aeroportos', compact('aeroportos'));
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
            $aeroportos = Aeroporto::all();
            $paises = Pais::all();
            $ufs = UF::all();
            return view('creates/adicionar-aeroporto', compact('paises', 'aeroportos', 'ufs'));
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
            $aeroporto = new Aeroporto([
                'CD_ARPT' => $request->get('codigo'),
                'CD_PAIS' => $request->get('pais'),
                'SG_UF' => $request->get('uf'),
                'NM_CIDD' => $request->get('cidade')
            ]);
            $aeroporto->save();
            return redirect('gerenciar-aeroportos')->with('success', 'Aeroporto Adicionado');
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
            $aeroportos = Aeroporto::all();
            $ufs = UF::all();
            $aeroporto = Aeroporto::find($id);
            return view('updates/editar-aeroporto', compact('aeroporto', 'aeroportos', 'paises', 'ufs'));
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
            $aeroportos = Aeroporto::all();
            $ufs = UF::all();
            $id = $request->get('pesquisa');
            $aeroporto = Aeroporto::find($id);
            return view('updates/editar-aeroporto', compact('aeroporto', 'aeroportos', 'paises', 'ufs'));
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
            $aeroporto = Aeroporto::find($id);
            $aeroporto->CD_ARPT =  $request->get('codigo');
            $aeroporto->CD_PAIS = $request->get('pais');
            $aeroporto->SG_UF = $request->get('uf');
            $aeroporto->NM_CIDD = $request->get('pais');
            $aeroporto->save();

            return redirect('gerenciar-aeroportos')->with('success', 'Passageiro Editado');
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
            $aeroporto = Aeroporto::find($CD_PSGR);
            $aeroporto->delete();

            return redirect('gerenciar-aeroportos')->with('success', 'Aeroporto Deletado');
        }catch(\Exception $e){
            if($e->getCode() == 1049){
                return redirect('/')->with('error', 'Erro ao estabelecer conexão com o banco de dados. Erro 1049');
            }   return redirect('/')->with('error', 'Ops, algum erro aconteceu, Código do erro: '.$e->getCode());
        }
        
    }
}
