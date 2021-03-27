@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Add Doctor
    </div>

    <div class="card-body">
        <form action="{{ route("admin.doctors.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('nic') ? 'has-error' : '' }}">
                <label for="nic">NIC*</label>
                <input type="number" id="nic" name="nic" class="form-control" value="{{ old('nic', isset($doctor) ? $doctor->name : '') }}" required>
                @if($errors->has('nic'))
                    <em class="invalid-feedback">
                        {{ $errors->first('nic') }}
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

            <div class="form-group {{ $errors->has('f_name') ? 'has-error' : '' }}">
                <label for="f_name">First Name*</label>
                <input type="text" id="f_name" name="f_name" class="form-control" value="{{ old('f_name', isset($doctor) ? $doctor->f_name : '') }}" required>
                @if($errors->has('f_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('f_name') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('l_name') ? 'has-error' : '' }}">
                <label for="l_name">Last Name*</label>
                <input type="text" id="l_name" name="l_name" class="form-control" value="{{ old('l_name', isset($doctor) ? $doctor->l_name : '') }}" required>
                @if($errors->has('l_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('l_name') }}
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

            <div class="card-body">
                <form action="{{ route("admin.doctors.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">E-mail*</label>
                        <input type="number" id="email" name="email" class="form-control" value="{{ old('email', isset($doctor) ? $doctor->name : '') }}" required>
                        @if($errors->has('email'))
                            <em class="invalid-feedback">
                                {{ $errors->first('email') }}
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
                <input type="file" id="doctor_photo" name="doctor_photo" class="form-control" value="{{ old('doctor_photo', isset($doctor) ? $doctor->doctor_photo : '') }}" required>
                @if($errors->has('doctor_photo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('doctor_photo') }}
                    </em>
                @endif
                
            </div>
            {{-- <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                <label for="roles">{{ trans('cruds.user.fields.roles') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
               
                @if($errors->has('roles'))
                    <em class="invalid-feedback">
                        {{ $errors->first('roles') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.roles_helper') }}
                </p>
            </div> --}}
            <div>
                <input class="btn btn-danger" type="submit" value="Add" >
            </div>
        </form>


    </div>
</div>
@endsection