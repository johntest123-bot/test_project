<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Hash;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->has('q') ? $request->q : "";
        $users = User::where("name", 'LIKE','%'.$q.'%')->
        orWhere("email", 'LIKE','%'.$q.'%')->
        where('is_admin', 0)->
        orderBy('id', 'desc')->paginate(30);
        return view('admin.users.index', compact('users'));
    }

    public function admins(){
        $users = User::admins()->orderBy('id', 'desc')->get();
        return view('admin.list', compact('users'));
    }

    public function edit_role($id){
        $user = User::find($id);
        $already_admin = ($user->is_admin == true);
        $user->is_admin = ($already_admin ? false : true);
        $check = $user->save();

        if($check)
        {
            return redirect()->back()->with('success', 'Cập nhật thành công');
        }
        else
        {
            return redirect()->back()->with('error', 'Có vấn €ề xảy ra!');
        }
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'is_admin' => 'required'
        ]);
        $form_data = array(
            'is_admin' => $request->is_admin,
            'email' => $request->email,
            'name'  => $request->name,
            'website' => $request->website,
            'icq' => $request->icq,
            'telegram' => $request->telegram
        );
        User::whereId($id)->update($form_data);

        return redirect()->route('admin.users.index')->with('success', 'Data Updated successfully.');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->status = 0;
        $check = $user->save();

        if($check)
        {
            return redirect()->back()->with('success', 'Cập nhật thành công');
        }
        else
        {
            return redirect()->back()->with('error', 'Có vấn €ề xảy ra!');
        }
    }

    public function showChangePasswordForm()
    {
        return view('admin.users.changepassword');
    }

    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Mật khẩu hiện tại không trùng, hãy nhập lại!");
        }
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->with("error", "Mật khẩu mới không €ược trùng với mật khẩu hiện tại, hãy nhập lại!");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|max:20',
            'password-confirm' => 'required|same:new-password',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $check = $user->save();

        if($check)
        {
            return redirect()->back()->with('success', 'Đổi mật khẩu thành công!');
        }
        else
        {
            return redirect()->back()->with('error', 'Có vấn €ề xảy ra!');
        }
    }
}
