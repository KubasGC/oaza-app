<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MasterController extends Controller
{
    public function getIndex()
    {
    	return view("template.main.main");
    }

    public function getLogin()
    {
        if(Auth::check()) return redirect()->route('main.index.get');
    	return view('template.auth.login');
    }

    public function postLogin(Request $request)
    {
        if(Auth::check()) return redirect()->route('main.index.get');
        $val = Validator::make($request->all(),
            [
                'user' => 'required|max:255',
                'pass' => 'required'
            ],
            [
                'user.required' => 'Musisz podać nazwę użytkownika.',
                'user.max' => 'Nazwa użytkownika może posiadać maksymalnie :max znaków.',
                'pass.required' => 'Musisz podać hasło.'
            ]);
        if($val->fails())
        {
            return redirect()->back()->withInput()->withErrors($val->errors());
        }
        if(Auth::attempt(['name' => $request->get('user'), 'pass' => $request->get('pass')]))
        {
            return redirect()->route('main.index.get');
        }
        else
        {
            $val->errors()->add('user', 'Taka kombinacja nazwy użytkownika i hasła nie została rozpoznana w systemie. Spróbuj ponownie.');
            return redirect()->back()->withErrors($val->errors());
        }
    }

    public function getLogout()
    {
        if(Auth::check()) Auth::logout();
        return redirect()->route('main.index.get');
    }
}
