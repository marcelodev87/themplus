<?php

namespace App\Http\Controllers\Themplus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ministries;
use Illuminate\Support\Facades\Validator;

class MinistriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ministries = Ministries::all();
        //$users = User::all();
        $users = User::select('id','name')->get();
        return view('app.ministrys.index' ,[
            'users' => $users,
            'ministries' => $ministries
        ]);
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
    public function store(Request $request)
    {

        //$ministry->fill($request->all());
        //var_dump($ministry->getAttributes(), $request->all());  para verificar se a imagem está chegando no seu metodo

        $validator = Validator::make($request->all(),[
            'name' => 'required|min:3|max:191',
            'date_of_foundation' => 'required|date_format:d/m/Y',
            'leader' => 'required'
            ]);
        $errors = $validator->errors();


        if($validator->fails()){
            return back()->withErrors($errors)->withInput();
        }else{
            $ministry = new Ministries();
            $ministryCreate = Ministries::create($request->all());
            $ministryCreate->save();
            return redirect()->route('app.ministerios')->with(['color' => 'success', 'message' => 'Ministério cadastrado com sucesso!']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $ministries = Ministries::all();
        $users = User::all();
        return view('app.ministrys.index' ,[
            'users' => $users,
            'ministries' => $ministries
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::select('id','name')->get();
        $ministry = Ministries::where('id', $id)->first();
        //var_dump($ministry);
        return view('app.ministrys.edit', [
            'users' => $users,
            'ministry' =>$ministry
        ]);
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
        $users = User::select('id','name')->get();

        $ministryUpdate = Ministries::find($id);
        $ministryUpdate->fill($request->all());
        $ministryUpdate->save();
        //var_dump($ministryUpdate);
        return redirect()->route('app.ministerios')->with(['color' => 'success', 'message' => 'Ministério atualizado com sucesso!']);

        /* return redirect()->route('app.ministerios.edit', [
            'users' => $users,
            'ministry' => $ministryUpdate->id
        ])->with(['color' => 'success', 'message' => 'Ministério atualizado com sucesso!']); */

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
