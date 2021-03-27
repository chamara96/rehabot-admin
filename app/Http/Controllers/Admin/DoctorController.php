<?php

namespace App\Http\Controllers\Admin;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        $users = User::select('id', 'email')->get();
        // dd($users);
        return view('admin.doctors.index', compact('doctors', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);

        $img_ext = $request->file('doctor_photo')->getClientOriginalExtension();
        $filename = time() . '.' . $img_ext;
        $request->file('doctor_photo')->move(public_path('storage/images/doctor'), $filename);

        $request->merge([
            // 'created_by' => $created_by,
            'photo' => $filename,
            'user_id' => 1,
        ]);

        // dd($request->except(['doctor_photo']));
        Doctor::create($request->except(['doctor_photo']));
        return redirect()->route('admin.doctors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return view('admin.doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        return view('admin.doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        if ($request->hasFile('doctor_photo')) {
            $img_ext = $request->file('doctor_photo')->getClientOriginalExtension();
            $filename = time() . '.' . $img_ext;
            $request->file('doctor_photo')->move(public_path('storage/images/doctor'), $filename);

            $request->merge([
                // 'created_by' => $created_by,
                'photo' => $filename,
                // 'user_id' => 1,
            ]);
        }

        $doctor->update($request->except(['doctor_photo']));
        return redirect()->route('admin.doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
