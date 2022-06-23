<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function dashboard()
    {
        $data = Articles::orderBy('upvote', 'DESC')->get();
        return view('index',['articles'=>$data]);
    }

    public function create()
    {
        return view('create');
    }


    public function save(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        
        Articles::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => Carbon::parse(now())->format('Y-m-d'),
        ]);
        return redirect()->route('dashboard')->with('success','Article successfully posted');
    }

    public function delete($id)
    {
        $deletedata = Articles::find($id);
        $deletedata->delete();
        return redirect('/');
    }

    public function upvote($id)
    {
        $data = Articles::find($id);
        $votecount = $data->upvote;
        $data->upvote = $votecount+1;
        $data->update();
        return redirect('/');
    }

    public function downvote($id)
    {
        $data = Articles::find($id);
        $votecount = $data->downvote;
        $data->downvote = $votecount+1;
        $data->update();
        return redirect('/');
    }

    public function edit($id)
    {
        $data = Articles::find($id);
        return view('edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $updatedata = Articles::find($id);
        $updatedata->title = $request->input('title');
        $updatedata->description = $request->input('description');
        $updatedata->update();
        return redirect('/')->with('success', "Data updated successfully");
    }

}
