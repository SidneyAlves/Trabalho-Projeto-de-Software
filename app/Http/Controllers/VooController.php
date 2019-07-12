<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\voo;
use App\Aeronave;
use App\Rota;
use Illuminate\Support\Facades\DB;

class VooController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $voos = voo::all();

            return view('reads/gerenciar-voos', compact('voos'));
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
    public function create(Request $request)
    {
        try{
            $aeronaves = Aeronave::all();
            $rotas = Rota::all();
            return view('creates/adicionar-voo', compact('aeronaves', 'rotas'));
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
            $voo = new voo([
                'NR_ROTA_VOO' => $request->get('rota'),
                'CD_ARNV' => $request->get('aeronave'),
                'NR_VOO' => $request->get('numero'),
                'DT_SAIDA_VOO' => $request->get('dataSaida')
            ]);
            $voo->save();
            return redirect('gerenciar-voos')->with('success', 'Voo adicionado');
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
    public function edit($numero, $data)
    {
        try{
            $aeronaves = Aeronave::all();
            $rotas = Rota::all();
            $voo = voo::where('NR_VOO', $numero)->where('DT_SAIDA_VOO', $data)->get();
            $voo = $voo[0];

            return view('updates/editar-voo', compact('voo', 'aeronaves', 'rotas'));
        }catch(\Exception $e){
            if($e->getCode() == 1049){
                return redirect('/')->with('error', 'Erro ao estabelecer conexão com o banco de dados. Erro 1049');
            }   return redirect('/')->with('error', 'Ops, algum erro aconteceu, Código do erro: '.$e->getCode());
        }
        
    }

    public function filtro(Request $request)
    {
        try{
            try{
                $numero = $request->get('numero');
                $data = $request->get('data');
                $aeronaves = Aeronave::all();
                $rotas = Rota::all();
                $voo = voo::where('NR_VOO', $numero)->where('DT_SAIDA_VOO', $data)->get();
                $voo = $voo[0];
    
                return view('updates/editar-voo', compact('voo', 'aeronaves', 'rotas')); 
            }catch(\Exception $e){
                return redirect('gerenciar-voos')->with('error', 'Voo não encontrado');
            }
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
    public function update($numeroAntigo, $dataAntiga, Request $request)
    {
        try{
            $numero = $request->get('numero');
            $data = $request->get('dataSaida');
            $NR_ROTA_VOO = $request->get('rota');
            $CD_ARNV = $request->get('aeronave');

            DB::table('itr_voo')->where('NR_VOO', $numeroAntigo)->where('DT_SAIDA_VOO', $dataAntiga)->update(['NR_ROTA_VOO' => $NR_ROTA_VOO, 'CD_ARNV' => $CD_ARNV, 'NR_VOO' => $numero, 'DT_SAIDA_VOO' => $data]);

            return redirect('gerenciar-voos')->with('success', 'Voo Alterado');
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
    public function destroy($numero, $data)
    {
        try{
            $voo = voo::where('NR_VOO', $numero)->where('DT_SAIDA_VOO', $data)->delete();

            return redirect('gerenciar-voos')->with('success', 'Voo Deletado');
        }catch(\Exception $e){
            if($e->getCode() == 1049){
                return redirect('/')->with('error', 'Erro ao estabelecer conexão com o banco de dados. Erro 1049');
            }   return redirect('/')->with('error', 'Ops, algum erro aconteceu, Código do erro: '.$e->getCode());
        }
        
    }
}