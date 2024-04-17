<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /// Dashboard - view user 
    public function viewUser() {
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('pages.user.index', compact('users'));
    }
    // Function - view register
    public function register(){
        return view('auth.register');
    }
    // function - view update user
    public function viewUpdateUser() {
        return view('pages.user.edit');
    }
    // Function add user
    public function createUser(Request $request) {
        $request->validate([
            "name"      => "required",
            "email"     => "required",
            "password"  => "required",
            "role"      => "required",
        ]);

        $user = User::create([
            "name"     => $request->name,
            "email"    => $request->email,
            "password" => bcrypt($request->password),
            "role"     => $request->role
        ]);

        return redirect('/dashboard/user')->with('success', 'add user success');
    }
    //function delete user
    public function deleteUser($id){
        $user = User::find($id)->first();
        $user->delete();
        return back()->with('success', 'user deleted');
    }
    // function update user
    public function updateUser(Request $request, $id){
        $request->validate([
            "name"      => "required",
            "email"     => "required",
            "password"  => "required",
            "role"      => "required",
        ]);
        $user = User::find($id);
        $user->update([
            "name"     => $request->name,
            "email"    => $request->email,
            "password" => bcrypt($request->password),
            "role"     => $request->role
        ]);
        return back()->with('success', 'user updated');
    }
    /// Dashboard - Product Stock - view
    public function viewProduct() {
        return view('pages.product.index');
    }
    // Function add product
    public function createProduct(Request $request) {
        $request->validate([
            "name" => "required",
            "price" => "required",
            "stock" => "required",
            "img" => "required",
        ]);

        
        $file = $request->img;
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $path = 'uploads/product/img';
        $file->move(public_path($path), $filename);

        //generate code
        $code = User::max('id') + 1;

        $user = Product::create([
            "name" => $request->name,
            "price" => $request->price,
            "stock" => $request->stock,
            "code"  => 'P' . $code,
            "img"  => $file
        ]);
        dd($user);
        return back()->with('success', 'data product created');
    }
}
