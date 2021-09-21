<?php

namespace App\Http\Controllers;

use App\Area;
use App\Group;
use App\Mail\IbisEmail2;
use App\Notifications\WelcomeEmailNotification;
use App\Role;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use DeviceDetector\Parser\Client\Browser;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coordenadores  = User::where('role_id','2')->orderBy('id', 'desc')->get();
        $formadores     = User::where('role_id','3')->orderBy('id', 'desc')->get();

//        $roles = Role::all();
//        $users = User::all();

        return view('pages.users.create', ['coordenadores'=>$coordenadores, 'formadores'=>$formadores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $areas = Area::all();
        $roles = Role::all();
        return view('auth.register', ['roles' => $roles, 'areas' => $areas, 'user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed|min:8',
            'taxpayer'  => 'required|digits:9|unique:users',
            'telephone' => 'required|digits_between:9,12',
            'role_id'   => 'required',
            'area_id'   => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->taxpayer = $request->taxpayer;
        $user->telephone = $request->telephone;
        $user->role_id = $request->role_id;
        $user->area_id = $request->area_id;
        $user->save();

        $url = explode('/', back()->getTargetUrl());
        array_pop($url);
        $url2 = implode('/', $url);

//        if($request->role_id ===  2)
//            return redirect($url2)->with('success', 'Coordenador adicionado!');
//        else
//            return redirect($url2)->with('success', 'Formador adicionado!');
        return redirect($url2)->with('success', 'Coordenador adicionado!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeTeacher(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
//            'password'  => 'required|confirmed|min:8',
            'taxpayer'  => 'required|digits:9|unique:users',
            'telephone' => 'required|digits_between:9,12',
            'role_id'   => 'required',
            'area_id'   => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->taxpayer);
        $user->taxpayer = $request->taxpayer;
        $user->telephone = $request->telephone;
        $user->role_id = $request->role_id;
        $user->area_id = $request->area_id;
        $user->save();

        $url = explode('/', back()->getTargetUrl());
        array_pop($url);
        $url2 = implode('/', $url);

//        if($request->role_id ===  2)
//            return redirect($url2)->with('success', 'Coordenador adicionado!');
//        else
//            return redirect($url2)->with('success', 'Formador adicionado!');
        return redirect($url2)->with('success', 'Formador adicionado!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group, User $user)
    {
        return view('pages.users.show', ['user' => $user, 'group'=>$group]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */

    public function edit(User $user)
    {
        $roles = Role::all();
        $areas = Area::all();
        return view('auth.register', ['user' => $user, 'roles' => $roles, 'areas'=>$areas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email',
//            'password'  => 'required',
//            'taxpayer'  => 'required',
            'telephone' => 'required|digits_between:9,12',
//            'role_id'   => 'required',
//            'area_id'   => 'required',
        ]);

        $user               = User::findorfail($user->id);
        $user->name         = $request->name;
        $user->email        = $request->email;
//        $user->password   = Hash::make($request->password);
        $user->taxpayer     = $request->taxpayer;
        $user->telephone    = $request->telephone;
        $user->role_id      = $request->role_id;
//        $user->area_id      = $request->area_id;
        $user->save();

        return redirect()->back()->with('success', 'Atualizado com sucesso!');
//        return response()->json(['status' => 'Atualizado com sucesso!']);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(User $user)
    {
        $user = User::findorfail($user->id);
        $user->delete();

        return response()->json(['status' => 'Eliminado com sucesso!']);
    }
}
