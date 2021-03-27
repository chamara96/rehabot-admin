@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Doctor 
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Photo
                        </th>
                        <td>
                            <img src="/storage/images/doctor/{{ $doctor->photo ?? '' }}" height="100" alt="">
                            {{-- {{ $doctor->photo ?? '' }}     --}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        NIC
                        </th>
                        <td>
                            {{ $doctor->nic }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            E-mail
                        </th>
                        <td>
                            @php
                            $temp=App\User::find( $doctor->user_id);
                            echo $temp['email'];
                        @endphp
                    </td>
                    </tr>
                    

                    <tr>
                        <th>
                            First Name
                        </th>
                        <td>
                            {{ $doctor->f_name }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Last Name
                        </th>
                        <td>
                            {{ $doctor->l_name }}
                        </td>
                    </tr>
                    
                    <tr>
                        <th>
                            Registered No
                        </th>
                        <td>
                            {{ $doctor->reg_no }}
                        </td>
                    </tr>


                    <tr>
                        <th>
                            Contact No.
                        </th>
                        <td>
                            {{ $doctor->contact_no }}
                        </td>
                    </tr>



                    <tr>
                        <th>
                            Address
                        </th>
                        <td>
                            {{ $doctor->address }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Experience
                        </th>
                        <td>
                            {{ $doctor->experience }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>

            <!-- <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('Channel') }}
            </a> -->
        </div>


    </div>
</div>
@endsection