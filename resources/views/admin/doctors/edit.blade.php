@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Doctor Details
    </div>

    <div class="card-body">
        <form action="{{ route("admin.doctors.update", [$doctor->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('nic') ? 'has-error' : '' }}">
                <label for="nic">NIC*</label>
                <input type="number" class="form-control" value="{{ old('nic', isset($doctor) ? $doctor->nic : '') }}" disabled>
                @if($errors->has('nic'))
                    <em class="invalid-feedback">
                        {{ $errors->first('nic') }}
                    </em>
                @endif
                
            </div>

            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                @php
                $temp=App\User::find( $doctor->user_id);
                $d_email= $temp['email'];
                @endphp
                <label for="nic">E-mail*</label>
                <input type="text" class="form-control" value="{{ $d_email }}" disabled>
            </div>

           



            <div class="form-group {{ $errors->has('f_name') ? 'has-error' : '' }}">
                <label for="f_name">First Name*</label>
                <input type="text" id="f_name" name="f_name" class="form-control" value="{{ old('f_name', isset($doctor) ? $doctor->f_name : '') }}" disabled>
                @if($errors->has('f_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('f_name') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('l_name') ? 'has-error' : '' }}">
                <label for="l_name">Last Name*</label>
                <input type="text" id="l_name" name="l_name" class="form-control" value="{{ old('l_name', isset($doctor) ? $doctor->l_name : '') }}" disabled>
                @if($errors->has('l_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('l_name') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('reg_no') ? 'has-error' : '' }}">
                <label for="reg_no">Doctor Registration Number*</label>
                <input type="text" id="reg_no" name="reg_no" class="form-control" value="{{ old('reg_no', isset($doctor) ? $doctor->reg_no : '') }}" required>
                @if($errors->has('reg_no'))
                    <em class="invalid-feedback">
                        {{ $errors->first('reg_no') }}
                    </em>
                @endif
                
            </div>

            <div class="form-group {{ $errors->has('experience') ? 'has-error' : '' }}">
                <label for="experience">Experience*</label>
                <input type="text" id="experience" name="experience" class="form-control" value="{{ old('experience', isset($doctor) ? $doctor->experience : '') }}" required>
                @if($errors->has('experience'))
                    <em class="invalid-feedback">
                        {{ $errors->first('experience') }}
                    </em>
                @endif                
            </div>

            <div class="form-group {{ $errors->has('contact_no') ? 'has-error' : '' }}">
                <label for="contact_no">Contact No*</label>
                <input type="number" id="contact_no" name="contact_no" class="form-control" value="{{ old('contact_no', isset($doctor) ? $doctor->contact_no : '') }}" required>
                @if($errors->has('contact_no'))
                    <em class="invalid-feedback">
                        {{ $errors->first('contact_no') }}
                    </em>
                @endif                
            </div>

            

            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address">Address*</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ old('address', isset($doctor) ? $doctor->address : '') }}" required>
                @if($errors->has('address'))
                    <em class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </em>
                @endif                
            </div>

            <div class="form-group {{ $errors->has('doctor_photo') ? 'has-error' : '' }}">
                <label for="doctor_photo">Photo</label>
                <input type="file" id="doctor_photo" name="doctor_photo" class="form-control" value="{{ old('doctor_photo', isset($doctor) ? $doctor->doctor_photo : '') }}" >
                @if($errors->has('doctor_photo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('doctor_photo') }}
                    </em>
                @endif

                <img src="/storage/images/doctor/{{ $doctor->photo ?? '' }}" height="100" alt="">
                
            </div>
            
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection