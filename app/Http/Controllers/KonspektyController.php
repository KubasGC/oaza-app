<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Request;
use Validator;

class KonspektyController extends Controller
{
    public function getIndex()
    {
        $cats = DB::table('konspekty_cat')->select();
        return view('template.konspekty.index', ['cats' => $cats]);
    }

    public function getKategoria($id)
    {
        $cats = DB::table('konspekty_cat')->select();
        $konspekty = DB::table('konspekty')->leftJoin('users', 'konspekty.createdby', '=', 'users.id')->select('konspekty.*', 'users.firstname',
            'users.lastname')->where(['konspekty.catid' => $id])
            ->get();
        return view('template.konspekty.index', ['cats' => $cats, 'konspekty' => $konspekty]);
    }

    public function getKonspekt($konspektid)
    {
        $cats = DB::table('konspekty_cat')->select();
        $konspekt = DB::table('konspekty')->leftJoin('users', 'konspekty.createdby', '=', 'users.id')->select('konspekty.*', 'users.firstname',
        'users.lastname')->where(['konspekty.id' => $konspektid])->first();
        return view('template.konspekty.konspekt', ['cats' => $cats, 'konspekt' => $konspekt]);
    }

    public function getDodaj()
    {
        if(Auth::guest()) return redirect()->route('main.login.get');
        $cats = DB::table('konspekty_cat')->select();
        return view('template.konspekty.nowy', ['cats' => $cats]);
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
        DB::table('konspekty')->insert(['catid' => Request::get('cat'), 'title' => Request::get('title'), 'createdby' => Auth::user()->id,
            'created' => time(), 'content' => Request::get('content')]);
        return redirect()->route('konspekty.index.get');
    }
}
