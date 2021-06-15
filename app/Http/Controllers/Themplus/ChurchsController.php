<?php

namespace App\Http\Controllers\Themplus;

use App\Http\Controllers\Controller;
use App\Models\Churchs;
use Illuminate\Http\Request;
use App\Models\User;


class ChurchsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select('id','name')->get();
        $churchs = Churchs::all();

        return view('app.churchs.index', [
            'users' => $users,
            'churchs' =>$churchs,
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
        $churchCreate = new Churchs();
        //$churchCreate->fill($request->all());
        //var_dump($churchCreate->getAttributes(), $request->all());

        $churchCreate->name =  $request->get('name');
        $churchCreate->date_of_foundation =  $request->get('date_of_foundation');
        $churchCreate->document =  $request->get('document');

        $churchCreate->zipcode =  $request->get('zipcode');
        $churchCreate->state =  $request->get('state');
        $churchCreate->city =  $request->get('city');
        $churchCreate->neighborhood =  $request->get('neighborhood');
        $churchCreate->street =  $request->get('street');
        $churchCreate->complement =  $request->get('complement');
        $churchCreate->number =  $request->get('number');
        $churchCreate->leader = $request->get('leader');

        $churchCreate->save();

        return redirect()->route('app.igreja.edit', $churchCreate->id
        )->with(['color' => 'success', 'message' => 'Igreja/Congregação cadastrada com sucesso!']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Churchs $church)
    {
        //$church = Churchs::where('id', $id)->first();
        //return view('app.churchs.show', 'id');

        return response()->json($church);

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
        $church = Churchs::where('id', $id)->first();
        return view('app.churchs.edit', [
            'users' => $users,
            'church' =>$church,
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
        //
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
