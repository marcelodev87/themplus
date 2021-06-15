<?php

namespace App\Http\Controllers\Themplus;

use App\http\Requests\groupsRequest;
use App\Http\Controllers\Controller;
use App\Models\Groups;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select('id','name')->get();
        $groups = Groups::all();

        return view('app.groups.index', compact('users','groups') );
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
    public function store(groupsRequest $request)
    {
        //VALIDATION
        $request->validated();

        DB::beginTransaction();
        //$groupCreate = new Groups();

        //$groupCreate->fill($request->all());
        //var_dump($request->all(), $groupCreate->getAttributes());
        $groupCreate = Groups::create($request->all());
        DB::commit();

        return redirect()->route('app.celulas.edit', $groupCreate->id
        )->with(['color' => 'success', 'message' => 'Membro cadastrado com sucesso!']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Groups $group)
    {

        // =============================================================== AQUI
        //$group = Groups::where('id', '1')->first();
        $group = Groups::with('groupsLeaderId', 'hostId')->first();
        //$group = User::with('groups')->first();
        //$group = Groups::with('hostId')->get();

   /*      $a = App\Produto::find(1)->variacoes; // retorna todas as variações do produto com id 1.
    $b = App\Variacao::find(1)->produtos; // retorna todos os produtos da variação com id 1.
    $c = App\Produto::with('variacoes')->get();
    $a = App\Groups::find(1)->groupsLeaderId; */

       return response()->json($group);
// =============================================================== AQUI
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //colocar o parâmetro $id
    {
        $group = Groups::where('id', $id)->first();
        $users = User::select('id','name')->get();

        return view('app.groups.edit', compact('group', 'users'));
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
