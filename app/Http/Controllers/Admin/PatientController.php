<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Patient;
use App\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::all();
        $users=User::select('id','email')->get();
        // dd($users);
        return view('admin.patients.index', compact('patients','users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        $img_ext = $request->file('patient_photo')->getClientOriginalExtension();
        $filename = time() . '.' . $img_ext;
        $request->file('patient_photo')->move(public_path('storage/images/patient'), $filename);

        $request->merge([
            // 'created_by' => $created_by,
            'photo' => $filename,
            'user_id' => 1,
        ]);

        // dd($request->except(['doctor_photo']));
        Patient::create($request->except(['patient_photo']));
        return redirect()->route('admin.patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        return view('admin.patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return view('admin.patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        // dd($request->all());
        if($request->hasFile('patient_photo')){
        $img_ext = $request->file('patient_photo')->getClientOriginalExtension();
        $filename = time() . '.' . $img_ext;
        $request->file('patient_photo')->move(public_path('storage/images/patient'), $filename);

        $request->merge([
            // 'created_by' => $created_by,
            'photo' => $filename,
            // 'user_id' => 1,
        ]);
        }

        $patient->update($request->except(['patient_photo']));
        return redirect()->route('admin.patients.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
