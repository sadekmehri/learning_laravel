<?php

namespace App\Http\Controllers\admin\users;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\user\AddAdminUser;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CrudUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.consulter')->with('title','Users Panel Control');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.ajouter')->with('title','Users Panel Control');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddAdminUser $request)
    {
        $request->validated();
        $user = $this->getUserFormData($request);
        DB::beginTransaction();
        try{
            $user->save();
            DB::commit();
            return redirect()->route('admin.users.index')->with('success', 'Account was successfully added !');
        }catch(QueryException $ex){
            DB::rollBack();
            dd($ex->getMessage());
            return redirect()->route('admin.users.index')->with('error', 'Please Try Again !');
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
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $count = User::select('id_user')
            ->where('id_user', '=', $id)
            ->where('id_user', '!=', Auth::user()->id_user)
            ->count();

        if($count == 0)
            abort(404);

        return view('admin.users.Modifier')->with('title',' Modifier Users Account')->with('id',$id);
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

    public function getUsersData()
    {

        $count = User::select('id_user')
            ->where('id_user', '!=', Auth::user()->id_user)
            ->count();

        if($count) {
            return response()->json(
                [
                    "response" => [ 'type' => "success", "code" => 200 ],
                    "length" => $count,
                    "data" => User::select('id_user','name_user','prenom_user','email_user','is_active_user','nom_permission')
                        ->join('permissions', 'users.id_permission', '=', 'permissions.id_permission')
                        ->where('id_user', '!=', Auth::user()->id_user)
                        ->orderBy('id_user', 'desc')->get(),
                ],200);
        }

        return response()->json(
            [
                "length" => $count,
                "response" => ['type' => "There is no record", "code" => 200],
                "data" => []
            ],200);

    }

    public function getRolesData()
    {
        $count = Permission::count();
        if($count)
            return response()->json(Permission::orderBy('id_permission', 'asc')->get(),200);

        return response()->json(['message' => 'There is no record. Please try Again !'],404);
    }

    public function getUserFormData(Request $request)
    {
        $user = new User();
        $user->name_user = ucwords(preg_replace('!\s+!', ' ', $request->get("nom")));
        $user->prenom_user = ucwords(preg_replace('!\s+!', ' ', $request->get("prenom")));
        $user->email_user = $request->get("email");
        $user->password_user = bcrypt("0000");
        $user->id_permission = $request->get("role");
        return $user;
    }

    public function fetchOneUser($id)
    {
        $count = User::select('id_user')
            ->where('id_user', '=', $id)
            ->where('id_user', '!=', Auth::user()->id_user)
            ->count();

        if($count == 0)
            return response()->json(['message' => 'There is no record !'],404);

        return response()->json(
            User::select('id_user','name_user','prenom_user','email_user','is_active_user','users.id_permission','nom_permission')
                ->join('permissions', 'users.id_permission', '=', 'permissions.id_permission')
                ->where('id_user', '=', $id)
                ->where('id_user', '!=', Auth::user()->id_user)
                ->get(),200);
    }

}
