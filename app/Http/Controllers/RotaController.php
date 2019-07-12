<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rota;
use App\Aeroporto;

class RotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $rotas = Rota::all();
            return view('reads/gerenciar-rotas', compact('rotas'));
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
            return view('creates/adicionar-rota', compact('aeroportos'));
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
            $rota = new Rota([
                'CD_ARPT_ORIG' => $request->get('aeroportoO'),
                'CD_ARPT_DESC' => $request->get('aeroportoD'),
                'VR_PASG' => $request->get('voucher')
            ]);
            $rota->save();
            return redirect('gerenciar-rotas')->with('success', 'Rota Adicionada');
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
            $aeroportos = Aeroporto::all();
            $rota = Rota::find($id);
            return view('updates/editar-rota', compact('rota', 'aeroportos'));
        }catch(\Exception $e){
            if($e->getCode() == 1049){
                return redirect('/')->with('error', 'Erro ao estabelecer conexão com o banco de dados. Erro 1049');
            }   return redirect('/')->with('error', 'Ops, algum erro aconteceu, Código do erro: '.$e->getCode());
        }
           
    }

    public function filtro(Request $request)
    {
        try{
            $aeroportos = Aeroporto::all();
            $rotas = Rota::all();
            $id = $request->get('pesquisa');
            $rota = Rota::find($id);
            return view('updates/editar-rota', compact('rota', 'aeroportos', 'rotas', 'aeroportos'));
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
            $rota = Rota::find($id);
            $rota->CD_ARPT_ORIG =  $request->get('aeroportoO');
            $rota->CD_ARPT_DESC = $request->get('aeroportoD');
            $rota->VR_PASG = $request->get('voucher');
            $rota->save();

            return redirect('gerenciar-rotas')->with('success', 'Rota Editada');
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
            $rota = Rota::find($id);
            $rota->delete();

            return redirect('gerenciar-rotas')->with('success', 'Rota Deletada');
        }catch(\Exception $e){
            if($e->getCode() == 1049){
                return redirect('/')->with('error', 'Erro ao estabelecer conexão com o banco de dados. Erro 1049');
            }   return redirect('/')->with('error', 'Ops, algum erro aconteceu, Código do erro: '.$e->getCode());
        }
        
    }
}
