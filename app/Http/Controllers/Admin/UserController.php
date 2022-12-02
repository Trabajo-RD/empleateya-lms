<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        // Add middleware to Resource Routes
        $this->middleware('can:list-user')->only('index');
        $this->middleware('can:update-user')->only('edit', 'update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // return $user;

        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.edit', compact('user'))->with('rol_granted', 'Se ha actualizado el rol del usuario');
    }

    /**
     * Update the specified user password
     * 
     * @param   \App\Models\User    $user
     */
    public function userPasswordReset( Request $request)
    {
        // dd($request->document_id);

        $user = User::where('document_id',  $request->document_id)->first();

        if($user->document_id != $request->document_id){
            return redirect()->back()->with('danger', 'El documento digitado no existe en nuestra base de datos');
        };

        //$user->password = bcrypt($request->password);
        
        $user->update([
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('admin.users.edit', compact('user'))->with('success', 'La contraseña del usuario, ha sido actualizada. La nueva contraseña es: '. $request->password);
    }

    /**
     * Return the password reset form
     */
    public function requestPasswordReset(User $user)
    {
        return view('admin.users.reset-password', compact('user'));
    }

    /**
     * Export to excel the ModelExport class
     */
    public function exportAllUsersToXLSX(){

        // return [
        //     (new UsersExport)->withWriterType(\Maatwebsite\Excel\Excel::XLSX)
        // ];
        return Excel::download(new UsersExport, 'capacitate.users.all.xlsx');
    }

    public function exportAllUsers( $format ){

        $date = Carbon::now()->format('Ymd');
        $unix_timestamp = now()->timestamp;

        if ($format == 'xlsx' ){
            return Excel::download(new UsersExport, $date . '_' . $unix_timestamp . '_capacitate.users.all.xlsx');
        }

        if ($format == 'csv' ){
            return Excel::download(new UsersExport, $date . '_' . $unix_timestamp . '_capacitate.users.all.csv');
        }

        if ($format == 'ods' ){
            return Excel::download(new UsersExport, $date . '_' . $unix_timestamp . '_capacitate.users.all.ods');
        }

    }

}
