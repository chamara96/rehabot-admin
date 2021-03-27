@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Patient 
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
                            <img src="/storage/images/patient/{{ $patient->photo ?? '' }}" height="100" alt="">
                            {{-- {{ $patient->photo ?? '' }}     --}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        NIC
                        </th>
                        <td>
                            {{ $patient->nic }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            First Name
                        </th>
                        <td>
                            {{ $patient->f_name }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Last Name
                        </th>
                        <td>
                            {{ $patient->l_name }}
                        </td>
                    </tr>

                    <tr>
                    <th>
                        E-mail
                    </th>
                    <td>
                        @php
                        $temp=App\User::find( $patient->user_id);
                        echo $temp['email'];
                    @endphp
                </td>
                </tr>

                    <tr>
                        <th>
                            Date of Birth
                        </th>
                        <td>
                            {{ $patient->dof }}
                        </td>
                    </tr>



                    <tr>
                        <th>
                            Contact No.
                        </th>
                        <td>
                            {{ $patient->contact_no }}
                        </td>
                    </tr>

                                         
 

                    <tr>
                        <th>
                            Address
                        </th>
                        <td>
                            {{ $patient->address }}
                        </td>
                    </tr>

                    <tr>

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