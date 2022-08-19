<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function add2()
    {   
        $data = Artist::get();
        return view('add2', compact('data'));
    }
    public function saveArtist(Request $request)
    {   
        $request->validate(
        [
            'id' => 'required',
            'name' => 'required'
        ]);
        $art = new Artist();
        $art->artistID = $request->id;
        $art->artistName = $request->name;
        $art->save();

        return redirect()->back()->with('success', 'Artist Added Successfully!');
    }
    public function edit2($id)
    {   
        $data = Artist::where('artistID','=',$id)->first();        
        return view('edit2',compact('data'));
    }
    public function update2(Request $request)
    {   
        $request->validate(
            [
                'name' => 'required'
            ]);
        $id = $request->id;
        Artist::where('artistID','=',$id)->update(
            [
                'artistName'=>$request->name
            ]
        );
        return redirect()->back()->with('success', 'Artist Updated Successfully!');
    }
    public function delete($id)
    {   
        $data = Artist::where('artistID', '=',$id)->delete();
        return redirect()->back()->with('success', 'Artist Deleted Successfully!');
    }
}
