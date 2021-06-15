<?php

namespace App\Http\Controllers\Themplus;

use App\Http\Controllers\Controller;
use App\Http\Requests\userRequest;
use App\Models\Address;
use App\Models\Churchs;
use App\Models\Groups;
use App\Models\Ministries;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('app.users.index');

        $users = User::all();
        return view('app.users.index', [
            'users' => $users
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
    public function store(userRequest $request)
    {
        //VALIDATION
        $request->validated();

        DB::beginTransaction();
        $userCreate = User::create($request->all());
        $userCreate->address()->create($request->all());
        DB::commit();

        return redirect()->route('app.membros.edit', $userCreate->id
        )->with(['color' => 'success', 'message' => 'Membro cadastrado com sucesso!']);

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
        $user = User::where('id', $id)->first();
        $address = $user->address()->first();
        $parents = User::where('id' ,'<>', $id)->get();
        $churchs = Churchs::select('id', 'name')->get();
        $groups = Groups::select('id','name')->get();

        $ministries = DB::table('ministries')->select('id', 'name')->get();

        $ministries_users = $user->ministries()->where('user_id', $id)->get();
        //$group_user = $user->groups()->where('user_id', $id)->get();

        return view('app.users.edit', [
            'user' => $user,
            'address' => $address,
            'parents' => $parents,
            'churchs' => $churchs,
            'ministries' => $ministries,
            'ministries_users' => $ministries_users,
            //'group_user' => $group_user,
            'groups' => $groups
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(userRequest $request, $id)
    {
        //========================= VALIDATION
        $request->validated();

        DB::beginTransaction();
        //======================================= USER UPDATE
        $userUpdate = User::find($id);
        $userUpdate->update($request->all());
        //======================================= USER UPDATE

        //======================= ADDRESS. If user have address, update, else, create
        $addressUpdate = Address::updateOrCreate(
            ['user_id' => $id],
            ['zipcode' =>  request('zipcode'),
            'city' =>  request('city'),
            'neighborhood' =>  request('neighborhood'),
            'street' =>  request('street'),
            'complement' =>  request('complement'),
            'number' =>  request('number'),
            'state' =>  request('state')]
        );
        //============================================== ADDRESS.

        //=========================================== MINISTRIES CHECK
        if($request->ministries){
            $minUserDet= User::find($id)->ministries()->detach();
            for ($i = 0; $i < count($request->ministries); $i++){
                $minUserUpdate= User::find($id)->ministries()->attach([
                        'ministries_id' => $request->ministries[$i]
                ]);
            }
        }else{
            $minUserDet= User::find($id)->ministries()->detach();
        }
        //=========================================== MINISTRIES CHECK
        DB::commit();
        return redirect()
            ->route('app.membros.edit', $id)
            ->with(['color' => 'success', 'message' => 'Membro atualizado com sucesso!']);

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
