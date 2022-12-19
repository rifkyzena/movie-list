<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.profile', compact('user'));
    }

    public function update(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|email:dns',
            'date_of_birth' => 'required',
            'phone' => 'required|min:5|max:13',
        ]);

        $model = User::find($request->id);
        $model->update([
            'username' => $request->username,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'phone' => $request->phone,
        ]);
        if ($model) {
            return redirect()->route('profile.index')->with(['success' => 'Profile Updated Successfully']);
        } else {
            return redirect()->back()->withInput()->with(['error' => 'Some problem occurred, please try again']);
        }
    }

    public function image(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'image_url' => 'required',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $user = User::find($request->id);
            if($user->image_url != null){
                Storage::delete($user->image_url);
                $image_url = $request->file('image_url')->store('users');
            }else{
                $image_url = $request->file('image_url')->store('users');
            }
            $user->update([
                'image_url' => $image_url
            ]);
            return response()->json(['status' => 1, 'success' => 'Profile Updated Successfully']);
        }
    }
}
