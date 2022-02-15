<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postcard;

class GuestController extends Controller
{
    public function home() {
        return view('pages.home');
    }

    public function list() {
        $postcards = Postcard::all();

        return json_encode($postcards);
    }

    public function create() {
        return view('pages.create');
    }

    public function store(Request $request) {
        $data = $request -> validate ([
            'sender' => 'required|string',
            'address' => 'required|string',
            'text' => 'required|string',
            'image' => 'required',
        ]);
        
        $image = $data['image'];
        $imageName = rand(100000, 999999) . '-' . time() . '.' . $image-> getClientOriginalExtension();

        $image -> storeAs('/postcards-images/', $imageName, 'public');
        
        $data['image'] = $imageName;

        $postcard = Postcard::create($data);
        $postcard -> save;

        return redirect() -> route('home');
    }
}
