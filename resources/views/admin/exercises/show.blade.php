@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Exercise 
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                        Name
                        </th>
                        <td>
                            {{ $exercise->name }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Shoulder
                        </th>
                        <td>
                            <p style="margin-bottom: 0;">Min: {{ $exercise->s_min ?? '' }}</p>
                            <p style="margin-bottom: 0;">Max: {{ $exercise->s_max ?? '' }}</p>
                        </td>
                    </tr>
                    
                    <tr>
                        <th>
                            Elbow
                        </th>
                        <td>
                            <p style="margin-bottom: 0;">Min: {{ $exercise->e_min ?? '' }}</p>
                            <p style="margin-bottom: 0;">Max: {{ $exercise->e_max ?? '' }}</p>
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