<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Form;
use App\Enum\GenderEnum;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'check.privileges']);
    }
    public function index()
    {
        $user = Auth::user();

        // Check if the user has the required privilege
        $hasPrivilege = $user && $user->hasPrivilege(); 
        $data = Form::get();
        return view('forms.list',compact('data','hasPrivilege'));
    }

    public function add($id = 0)
    {
        $data = [];
        $enumValues = GenderEnum::cases();

        // Retrieve the authenticated user
        $user = Auth::user();

        // Check if the user has the required privilege
        $hasPrivilege = $user && $user->hasPrivilege(); // Assumes hasPrivilege() method exists in User model

        if ($id > 0) {
            $data = Form::find($id);
        }

        // Pass the privilege check result to the view
        return view('forms.store', compact('enumValues', 'data', 'hasPrivilege'));
    }


    public function store(Request $request)
    {
        $user = Auth::user();

        $hasPrivilege = $user && $user->hasPrivilege();


        if ($request->id > 0) {
            $item = Form::find($request->id);
        } else {
            $item = new Form();
        }

        $item->name = $request->name;
        $item->phone_number = $request->phone_number;
        $item->gender = $request->gender;
        $item->save();
        return redirect('form/list')->with('success', 'Successfully Saved');
    }

    public function delete($id)
    {
        $user = Auth::user();

        // Check if the user has the required privilege
        $hasPrivilege = $user && $user->hasPrivilege();
        $item = Form::find($id);

        if ($item) {
            $item->delete();
            return redirect('form/list');
        } else {
            return redirect('form/list');
        }
    }
}
