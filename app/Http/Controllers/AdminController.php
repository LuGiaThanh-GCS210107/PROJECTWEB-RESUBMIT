<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Artist;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\Customer;

class AdminController extends Controller
{
    public function adminLogin()
    {
        return view('adminLogin');
    }

    public function loginAdmin(Request $request)
    {
        $admin = Admin::where('adminID', '=', $request->id)->first();
        if ($admin) {
            if (Hash::check($request->password, $admin->adminPassword))
            {
                $request->Session()->put('loginId', $admin->adminID);
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'Wrong password.');
            }
        } else {
            return back()->with('fail', 'This username is not registered.');
        }
    }
    public function dashboard(){
        $data = array();
        if (Session::has('loginId')) {
        $data = Admin::where('adminID', '=', Session::get('loginId'))->first();
        }
        
        return view('dashboard', compact('data'));
    }

  
   public function logout()
    {
        if(Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('/');}
    }
    
    public function table()
    {   
        $data2 = Product::get();
        $data = array();
        if (Session::has('loginId')) {
        $data = Admin::where('adminID', '=', Session::get('loginId'))->first();
        }
             
        return view('table', compact('data', 'data2'));
    }

    public function information($id){
        $data = Admin::where('adminID', '=', $id)->first();
        return view('adminInfo', compact('data'));
    }

    public function saveAdmin(Request $request)
    {   
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required'
            ]);
        $id = $request->id;
        Admin::where('adminID','=',$id)->update(
            [
                'adminName'=>$request->name,
                'adminEmail'=>$request->email
            ]
        );
        return redirect()->back()->with('success', 'Admin Updated Successfully!');
    }

    public function table3()
    {   
        $data2 = Customer::get();
        $data = array();
        if (Session::has('loginId')) {
        $data = Admin::where('adminID', '=', Session::get('loginId'))->first();
        }
             
        return view('table3', compact('data', 'data2'));
    }

    public function delete($id)
    {   
        $data = Customer::where('customerID', '=',$id)->delete();
        return redirect()->back()->with('success', 'User Deleted Successfully!');
    }

    public function table2()
    {   
        $data2 = Artist::get();
        $data = array();
        if (Session::has('loginId')) {
        $data = Admin::where('adminID', '=', Session::get('loginId'))->first();
        }
             
        return view('table2', compact('data', 'data2'));
    }
}
