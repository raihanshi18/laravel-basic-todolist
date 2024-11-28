<?php

namespace App\Http\Controllers;

use App\Models\ListStudent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = new ListStudent();
        $data = $student->all();
        return view('students.list', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:100',
            'classes' => 'required|string|max:3|min:1',
            'major' => 'required|string|max:5',
            'birth_date' => 'required|date',
            'photo_profile' => 'required|mimes:jpg,png,svg,jpeg,webp|max:1024'
        ]);
        $time = Carbon::now()->format('Y-m-d_H-i-s');
        $doc = str_replace(" ", "-", $time) . '.' . $request->photo_profile->extension();
        $request->file('photo_profile')->move(public_path('upload/profile'), $doc);

        $student = new ListStudent();
        $student->name = $request->name;
        $student->classes = $request->classes;
        $student->major = $request->major;
        $student->birth_date = $request->birth_date;
        $student->photo_profile = url('/upload/profile') . '/' . $doc;
        $student->photo_profile_name = $doc;
        $student->save();
        return redirect('/list-siswa')->with('success', 'Student has Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = new ListStudent();
        $data = $student->find($id);

        // return($data);
        return view('students.update-list', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:2|max:100',
            'classes' => 'required|string|max:3|min:1',
            'major' => 'required|string|max:5',
            'birth_date' => 'required|date'
        ]);
        $student = new ListStudent;
        $data = $student->find($id);

        if (isset($request->photo_profile)) {
            $request->validate([
                'photo_profile' => 'mimes:jpg|max:1024'
            ]);

            $request->file('photo_profile')->move(public_path('upload/profile'), $data->photo_profile_name);
        }
        $data->name = $request->name;
        $data->classes = $request->classes;
        $data->major = $request->major;
        $data->birth_date = $request->birth_date;   
        $data->save();

        return redirect('/list-siswa')->with('success', 'Student has updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = new ListStudent;
        $data = $student->find($id);
        $path = public_path('upload/profile/' . $data->photo_profile_name);
        File::delete($path);
        $data->delete();
        return redirect('/list-siswa')->with('success', 'Student has deleted');
        // return $data;
    }
}
