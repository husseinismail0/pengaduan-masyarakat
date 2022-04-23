<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $users = User::orderBy('created_at', 'DESC');
        $users = $users->simplePaginate(99)->toArray()['data'];

        foreach ($users as $key => $val) {
            $users[$key]['created_at'] = Carbon::create($users[$key]['created_at'])->toDayDateTimeString();
        }

        return view('user.index', compact('user','users'));
    }

    public function createForm()
    {
        $user = Auth::user();

        $users = User::orderBy('created_at', 'DESC');
        $users = $users->simplePaginate(99)->toArray()['data'];

        foreach ($users as $key => $val) {
            $users[$key]['created_at'] = Carbon::create($users[$key]['created_at'])->toDayDateTimeString();
        }

        return view('user.create', compact('users','user'));
    }

    public function create(Request $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request->username);
        $user->phone = $request->phone;
        $user->role = $request->role;

        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'phone' => 'required|string',
            'role' => ['required', Rule::in(config('constant.user.role'))],
        ]);

        $user->save();

        return redirect()->back()->with('success', 'Berhasil menambah data user!');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data user!');
    }
}
