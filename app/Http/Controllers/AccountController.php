<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = User::all();
        return view('MainWebsite.Dashboard.AccountPage', [
            "datas" => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'unique:users|required|max:255',
            'username' => 'unique:users|required|max:255',
            'email' => ' unique:users|email|required|max:255',
            'password' => 'required|min:5|max:255'
        ]);

        // $validatedData['password']=bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);
        // dd($request);
        User::create($validatedData);
        return redirect('/admin/akun')->with("success", "Akun berhasil dibuat");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        return view('MainWebsite.Dashboard.EditAccountPage', [
            "datas" => $User
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $User)
    {
        $rules = [
            'password' => 'required|min:5|max:255'
        ];

        if ($request->name != $User->name) {
            $rules['name'] = 'required|unique:users|max:255';
        }

        if ($request->username != $User->username) {
            $rules['username'] = 'required|unique:users|max:255';
        }

        if ($request->email != $User->email) {
            $rules['email'] = 'unique:users|email|required|max:255';
        }

        $validatedData = $request->validate($rules);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::where('id', $User->id)
            ->update($validatedData);
        return redirect('/admin/akun')->with("success", "Akun berhasil dibuat");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $User)
    {
        User::destroy($User->id);
        return redirect('/admin/akun')->with("success", "Akun berhasil dihapus");
    }
}
