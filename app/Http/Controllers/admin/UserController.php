<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Aws\Common\Facade\Redshift;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('role_id', User::ROLE_USER)->get();
        return view('admin-lte.user.index')->with('users', $users);
    }

    public function create()
    {
        return view('admin-lte.user.create');
    }

    public function block(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user->status == User::USER_UN_BLOCKED) {
            $user->status = User::USER_BLOCKED;
        } else {
            $user->status = USER::USER_UN_BLOCKED;
        }
        $user->save();
        return redirect()->route('users');
    }

    public function update(Request $request, $id)
    {
        return view('admin-lte.user.update');
    }

}
