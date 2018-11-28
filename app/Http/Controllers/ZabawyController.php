<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Request;
use Validator;

class ZabawyController extends Controller
{
    public function getIndex()
    {
        $cats = DB::table('zabawy_cat')->select();
        return view('template.zabawy.index', ['cats' => $cats]);
    }

    public function getKategoria($id)
    {
        $cats = DB::table('zabawy_cat')->select();
        $zabawy = DB::table('zabawy')->leftJoin('users', 'zabawy.createdby', '=', 'users.id')->select('zabawy.*', 'users.firstname',
            'users.lastname')->where(['zabawy.catid' => $id])
            ->get();
        return view('template.zabawy.index', ['cats' => $cats, 'zabawy' => $zabawy]);
    }

    public function getZabawa($zabawaid)
    {
        $cats = DB::table('zabawy_cat')->select();
        $zabawa = DB::table('zabawy')->leftJoin('users', 'zabawy.createdby', '=', 'users.id')->select('zabawy.*', 'users.firstname',
            'users.lastname')->where(['zabawy.id' => $zabawaid])->first();
        return view('template.zabawy.zabawa', ['cats' => $cats, 'zabawa' => $zabawa]);
    }

    public function getDodaj()
    {
        if(Auth::guest()) return redirect()->route('main.login.get');
        $cats = DB::table('zabawy_cat')->select();
        return view('template.zabawy.nowy', ['cats' => $cats]);
    }

    public function postDodaj()
    {
        if(Auth::guest()) return redirect()->route('main.login.get');
        $validator = Validator::make(Request::all(),
            [
                'title' => 'required',
                'cat' => 'required|numeric',
                'content' => 'required'
            ],
            [
                'title.required' => 'Nie podano tytułu.',
                'cat.required' => 'Nie wybrano kategorii.',
                'content.required' => 'Nie wprowadzono treści.'
            ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        DB::table('zabawy')->insert(['catid' => Request::get('cat'), 'title' => Request::get('title'), 'createdby' => Auth::user()->id,
            'created' => time(), 'content' => Request::get('content')]);
        return redirect()->route('zabawy.index.get');
    }
}
