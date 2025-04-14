<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('admin.users.user', compact('users'));
    }

    public function create() {
        return view('admin.users.user-create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'vaitro' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'vaitro' => $request->vaitro,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.user-list')->with('success', 'Thêm user thành công!');
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('admin.users.user-edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' .$id,
            'vaitro' => 'required'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'vaitro' => $request->vaitro,
        ]);

        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('admin.user-list')->with('success', 'Cập nhật user thành công!');
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user-list')->with('success', 'Xóa user thành công!');
    }
}