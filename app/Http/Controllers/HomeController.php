<?php

namespace App\Http\Controllers;
use App\Models\Activity;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        $activity = new Activity;
        $data = $activity->all();
        return view('home', compact('data'));
    }

    function add() {
        return view('add');
    }

    public function store(Request $request){
        ($request)->validate([
            'activity_name' => 'required|min:4|max:20|'
        ],
        [
            'activity_name.required'=>'SEMUA HARUS TERISI!',
            'activity_name.min'=>'MINIMAL KARAKTER HARUS 5!',
            'activity_name.max'=>'MAXIMAL KARAKTER HARUS 20!',
        ]);

        $activity = new Activity;
        $activity->activity_name = $request->activity_name;
        $activity->save();

        // $activity->create([
        //     'activity_name' => $request->activity_name
        // ]);

        return redirect('/')->with('success', 'Activity has Added');
    }

    public function update(Request $request, string $id){
        ($request)->validate([
            'activity_name' => 'required|min:4|max:20|'
        ],
        [
            'activity_name.required'=>'SEMUA HARUS TERISI!',
            'activity_name.min'=>'MINIMAL KARAKTER HARUS 5!',
            'activity_name.max'=>'MAXIMAL KARAKTER HARUS 20!',
        ]);

        $activity = new Activity;
        $data = $activity->find($id);
        $data->activity_name = $request->activity_name;
        $data->save();

        // $activity->create([
        //     'activity_name' => $request->activity_name
        // ]);

        return redirect('/')->with('success', 'Activity has Added');
    }

    public function destroy(string $id){
        $activity = new Activity;
        $data = $activity->find($id);
        $data->delete();
        return redirect('/')->with('success', 'Activity has deleted');

    }

    public function show(string $id){
        $activity = new Activity;
        $data = $activity->find($id);
        if(!isset($data)){
            return abort(404,'Activity not found');
        }
        return view('update', compact('data'));
    }
}
