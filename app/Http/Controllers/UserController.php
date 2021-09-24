<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.studentsuser.index')->only('index');
        $this->middleware('can:admin.studentsuser.edit')->only('edit','update');

         
        
    }
    
    public function index()
    {
        $users = User::paginate();

        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

   
    public function create()
    {
        $user = new User();
        
        return view('user.create', compact('user'));
    }

  
    public function store(Request $request)
    {
        //request()->validate(User::$rules);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();
        //$user = User::create($request->all());
        return redirect()->route('admin.studentsuser.index')
            ->with('success', 'User created successfully.');
    }

   
    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    
    public function edit($id)
    {
        $user = User::find($id);
        //return $user;
        return view('user.edit', compact('user'));
    }

    
    public function update(Request $request, User $user)
    {
        request()->validate(User::$rules);

        $user->update($request->all());

        return redirect()->route('admin.studentsuser.update')
            ->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('admin.studentsuser.index')
            ->with('success', 'User deleted successfully');
    }
}
