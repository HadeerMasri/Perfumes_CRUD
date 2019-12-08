<?php

namespace App\Http\Controllers;

use App\Image;
use App\Perfume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfumes = Perfume::all();
        return view('perfume.index',compact('perfumes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perfumes = Perfume::all();
        return view('perfume.create', compact('perfumes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['user_id'] = Auth::id();
        $perfume = Perfume::create($request->all());

        if ($request->hasFile('images')) {
            $images = $request->file('images');

            $imagesPath = [];
            foreach ($images as $image) {
                $imagesPath[] = new Image([
                    'path' => $image->store('PerfumesImages')
                ]);
            }
            $perfume->images()->saveMany($imagesPath);
        }
        return redirect()->route('perfume.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perfume = Perfume::find($id);
        return view('perfume.show',compact('perfume'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perfume = Perfume::find($id);
        return view('perfume.edit',compact('perfume'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');


        $perfume = Perfume::find($id);
        $perfume->name = $name;
        $perfume->description = $description;
        $perfume->price = $price;
        if ($request->hasFile('images')) {
            $images = $request->file('images');

            $imagesPath = [];
            foreach ($images as $image) {
                $imagesPath[] = new Image([
                    'path' => $image->store('PerfumesImages')
                ]);
            }
            $perfume->images()->saveMany($imagesPath);
        }
        $perfume->save();
        return redirect()->route('perfume.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Perfume::find($id)->delete();
        return redirect()->back();
    }
}
