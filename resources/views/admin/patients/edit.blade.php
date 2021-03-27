@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Patient Details
    </div>

    <div class="card-body">
        <form action="{{ route("admin.patients.update", [$patient->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('nic') ? 'has-error' : '' }}">
                <label for="nic">NIC*</label>
                <input type="number" id="nic" name="nic" class="form-control" value="{{ old('nic', isset($patient) ? $patient->nic : '') }}" disabled>
                @if($errors->has('nic'))
                    <em class="invalid-feedback">
                        {{ $errors->first('nic') }}
                    </em>
                @endif
                
            </div>

      

            <div class="form-group {{ $errors->has('f_name') ? 'has-error' : '' }}">
                <label for="f_name">First Name*</label>
                <input type="text" id="f_name" name="f_name" class="form-control" value="{{ old('f_name', isset($patient) ? $patient->f_name : '') }}" disabled>
                @if($errors->has('f_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('f_name') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('l_name') ? 'has-error' : '' }}">
                <label for="l_name">Last Name*</label>
                <input type="text" id="l_name" name="l_name" class="form-control" value="{{ old('l_name', isset($patient) ? $patient->l_name : '') }}" disabled>
                @if($errors->has('l_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('l_name') }}
                    </em>
                @endif
            </div>
            
            <div class="form-group {{ $errors->has('experience') ? 'has-error' : '' }}">
                <label for="experience">E-mail*</label>
                @php
                $temp=App\User::find( $patient->user_id);
                $p_email=$temp['email'];
                @endphp
                <input type="text"  class="form-control" value="{{ $p_email}}" disabled>
                @if($errors->has('experience'))
                    <em class="invalid-feedback">
                        {{ $errors->first('experience') }}
                    </em>
                @endif                
            </div>
            
            <div class="form-group {{ $errors->has('dof') ? 'has-error' : '' }}">
                <label for="dof">Date of Birth*</label>
                <input type="date" id="dof" name="dof" class="form-control" value="{{ old('dof', isset($patient) ? $patient->dof : '') }}" required>
                @if($errors->has('dof'))
                    <em class="invalid-feedback">
                        {{ $errors->first('dof') }}
                    </em>
                @endif
            </div>


            <div class="form-group {{ $errors->has('contact_no') ? 'has-error' : '' }}">
                <label for="contact_no">Contact No*</label>
                <input type="number" id="contact_no" name="contact_no" class="form-control" value="{{ old('contact_no', isset($patient) ? $patient->contact_no : '') }}" required>
                @if($errors->has('contact_no'))
                    <em class="invalid-feedback">
                        {{ $errors->first('contact_no') }}
                    </em>
                @endif                
            </div>



            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address">Address*</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ old('address', isset($patient) ? $patient->address : '') }}" required>
                @if($errors->has('address'))
                    <em class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </em>
                @endif                
            </div>

            <div class="form-group {{ $errors->has('patient_photo') ? 'has-error' : '' }}">
                <label for="patient_photo">Photo</label>
                <input type="file" id="patient_photo" name="patient_photo" class="form-control" value="{{ old('patient_photo', isset($patient) ? $patient->patient_photo : '') }}" >
                @if($errors->has('patient_photo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('patient_photo') }}
                    </em>
                @endif

                <img src="/storage/images/patient/{{ $patient->photo ?? '' }}" height="100" alt="">
                
            </div>
            
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection