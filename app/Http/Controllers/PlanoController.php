<?php

namespace App\Http\Controllers;

use App\Ata;
use App\Plano;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Group;
use App\Meeting;

class PlanoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Group $group, Meeting $meeting)
    {

        $this->validate($request,[
            'alunoReuniao' => 'required',
            'accao'  =>'required',
            'intervenientes'  =>'required',
            'medicao'  =>'required',
        ]);

        $alunoReuniao = $request->alunoReuniao;


        if($alunoReuniao == "-1")
            $alunoReuniao = null;



        $idAta = Ata::where('meeting_id', $meeting->id)->get()->first()->id;

        $Plano                      = new Plano();
        $Plano->ata_id              = $idAta;
        $Plano->student_id          = $alunoReuniao;
        $Plano->action              = $request->accao;
        $Plano->intervenientes      = $request->intervenientes;
        $Plano->medicao             = $request->medicao;
        $Plano->description         = $request->descricao;
        $Plano->save();


        return redirect('ibis/'.$group->id.'/meetings/'.$meeting->id)->with('success', 'Plano de Accao Atualizado');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plano  $plano
     * @return \Illuminate\Http\Response
     */
    public function show(Plano $plano)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plano  $plano
     * @return \Illuminate\Http\Response
     */
    public function edit(Plano $plano)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plano  $plano
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plano $plano)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plano  $plano
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plano $plano)
    {
        //
    }
}
