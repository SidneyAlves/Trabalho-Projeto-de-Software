<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\voo;
use App\Reserva;
use App\Passageiro;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{

    public function voos()
    {
        try{
            $voos = voo::all();
            return view('reads/gerenciar-reservas', compact('voos'));
        }catch(\Exception $e){
            if($e->getCode() == 1049){
                return redirect('/')->with('error', 'Erro ao estabelecer conexão com o banco de dados. Erro 1049');
            }   return redirect('/')->with('error', 'Ops, algum erro aconteceu, Código do erro: '.$e->getCode());
        }
        
    }

    public function filtroVoo(Request $request)
    {
        try{
            $numero = $request->get('numero');
            $data = $request->get('data');
            
            try{
                $voo = voo::where('NR_VOO', $numero)->where('DT_SAIDA_VOO', $data)->get();
                $voo = $voo[0];
                try{
                    $numero = $request->get('numero');
                    $data = $request->get('data');
                    $reservas = Reserva::where('NR_VOO', $numero)->where('DT_SAIDA_VOO', $data)->get();
        
                    return view('reads/gerenciar-reservas-single', compact('reservas', 'numero', 'data'));  
                }catch(\Exception $e){
                    return redirect('gerenciar-reservas')->with('error', 'Não existe este voo nesta data');
                }
            }catch(\Exception $e){
                return redirect('gerenciar-reservas')->with('error', 'Não existe este voo nesta data');
            }
        }catch(\Exception $e){
            if($e->getCode() == 1049){
                return redirect('/')->with('error', 'Erro ao estabelecer conexão com o banco de dados. Erro 1049');
            }   return redirect('/')->with('error', 'Ops, algum erro aconteceu, Código do erro: '.$e->getCode());
        }
        
        
    }

    public function reservas(Request $request)
    {
        try{
            $numero = $request->get('numero');
            $data = $request->get('data');
            $reservas = Reserva::where('NR_VOO', $numero)->where('DT_SAIDA_VOO', $data)->get();

            return view('reads/gerenciar-reservas-single', compact('reservas', 'numero', 'data'));
        }catch(\Exception $e){
            if($e->getCode() == 1049){
                return redirect('/')->with('error', 'Erro ao estabelecer conexão com o banco de dados. Erro 1049');
            }   return redirect('/')->with('error', 'Ops, algum erro aconteceu, Código do erro: '.$e->getCode());
        }
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $reserva = Reserva::all();
            return view('reads/gerenciar-reservas-single', compact('reserva'));
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
            $numero = $request->get('numero');
            $data = $request->get('data');
            $passageiros = Passageiro::all();
            return view('creates/adicionar-reserva', compact('passageiros', 'numero', 'data'));
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
            $numero = $request->get('numero');
            $data = $request->get('data');
            
            $reserva = new Reserva([
                'CD_PSGR' => $request->get('passageiro'),
                'PC_DESC_PASG' => $request->get('desconto'),
                'NR_VOO' => $request->get('numero'),
                'DT_SAIDA_VOO' => $request->get('data')
            ]);
            $reserva->save();
            return redirect('gerenciar-reservas')->with('success', 'Reserva Feita');
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
    public function edit($id, $numero, $data)
    {
        try{
            $passageiros = Passageiro::all();
            $reserva = Reserva::where('NR_VOO', $numero)->where('DT_SAIDA_VOO', $data)->where('CD_PSGR', $id)->get();
            $reserva = $reserva[0];
            return view('updates/editar-reserva', compact('reserva', 'numero', 'data', 'passageiros'));
        }catch(\Exception $e){
            if($e->getCode() == 1049){
                return redirect('/')->with('error', 'Erro ao estabelecer conexão com o banco de dados. Erro 1049');
            }   return redirect('/')->with('error', 'Ops, algum erro aconteceu, Código do erro: '.$e->getCode());
        }
        
    }

    public function filtro(Request $request)
    {
        try{
            $passageiros = Passageiro::all();
            $numero = $request->get('numero');
            $data = $request->get('data');
            $id = $request->get('pesquisa');
            $reserva = DB::table('itr_resv')->where('NR_VOO', $numero)->where('DT_SAIDA_VOO', $data)->where('CD_PSGR', $id)->get();
            //Reserva::find($id);
            $reserva = $reserva[0];
            return view('updates/editar-reserva', compact('reserva', 'passageiros', 'numero', 'data'));
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
    public function update($id, Request $request)
    {
        try{
            $numero = $request->get('numero');
            $data = $request->get('data');
            $CD_PSGR = $request->get('passageiro');
            $PC_DESC_PASG = $request->get('desconto');

            DB::table('itr_resv')->where('NR_VOO', $numero)->where('DT_SAIDA_VOO', $data)->where('CD_PSGR', $id)->update(['CD_PSGR' => $CD_PSGR, 'PC_DESC_PASG' => $PC_DESC_PASG, 'NR_VOO' => $numero, 'DT_SAIDA_VOO' => $data]);

            return redirect('gerenciar-reservas')->with('success', 'Reserva Alterada');
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
    public function destroy($id, $numero, $data)
    {
        try{
            $reserva = Reserva::where('NR_VOO', $numero)->where('DT_SAIDA_VOO', $data)->where('CD_PSGR', $id)->delete();
            return redirect('gerenciar-reservas')->with('success', 'Reserva Deletada');
        }catch(\Exception $e){
            if($e->getCode() == 1049){
                return redirect('/')->with('error', 'Erro ao estabelecer conexão com o banco de dados. Erro 1049');
            }   return redirect('/')->with('error', 'Ops, algum erro aconteceu, Código do erro: '.$e->getCode());
        }
        
    }
}
