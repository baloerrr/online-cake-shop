<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {


        if ($request->ajax()) {
            $data = User::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                                  <a href="'.route('user.edit', $row->id).'" class="edit btn btn-success btn-sm">Edit</a>
                                  <form action="' . route('user.destroy', $row->id) . '" method="POST" class="d-inline">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                    <button type="submit" class="delete  btn btn-sm bg-red-500 text-white transition-all hover:bg-red-700 " onclick="return confirm(\'Are you sure you want to delete this user?\')">Delete</button>
                                  </form>';
                    return $actionBtn;
                })
                ->addColumn('role', function ($row) {
                    $roleArr = $row->getRoleNames();
                    $data = '';
                    foreach ($roleArr as $value) {
                        $data .= '<label class="badge badge-success">' . $value . '</label> ';
                    }
                    return $data;
                })
                ->rawColumns(['action', 'role'])
                ->make(true);
        }


        return view('user.index');
    }

    public function create()
    {
        $breadcrumb = 'User';
        $roles = Role::pluck('name', 'name')->all();
        return view('user.create', compact('roles', 'breadcrumb'));
    }




    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        return redirect()->route('user.index')
            ->with('success', 'User created successfully');
    }

    public function createUser()
    {
        $breadcrumb = 'User';
        $roles = Role::pluck('name', 'name')->all();
        return view('user.createUser', compact('roles', 'breadcrumb'));
    }

    public function storeUser(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,

        ]);
        $user->assignRole('pembeli');
        customer::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);


        return redirect()->route('user.index')->with('success', 'account created');
    }

    public function edit($id)
    {
        $customer = customer::where('user_id',$id)->first();
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();


        return view('user.edit', compact('customer','user','roles', 'userRole',));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'alamat' => 'required',
            'no_hp' => 'required',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $customer = Customer::where('user_id', $id)->first();

        if ($user && $customer) {
            $user->update($input);

            // Update customer data
            $customer->update([
                'name' => $input['name'],
                'email' => $input['email'],
                'alamat' => $input['alamat'],
                'no_hp' => $input['no_hp'],
            ]);

            // Update roles (if needed)
            DB::table('model_has_roles')->where('model_id', $id)->delete();
            $user->assignRole($request->input('roles'));

            return redirect()->route('user.index')->with('success', 'User and Customer updated successfully');
        } else {
            return redirect()->route('user.index')->with('error', 'User or Customer not found');
        }
    }



    public function show($id)
    {
        $user = User::find($id);
        return view('user.show', compact('user'));
    }


    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('user.index')
            ->with('success', 'User deleted successfully');
    }
}
