@extends('layouts.admin')
@section('content')
{{-- @can('users_manage')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.doctors.create") }}">
                Add Doctor
            </a>
        </div>
    </div>
@endcan --}}
<div class="card">
    <div class="card-header">
        {{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="patient_table" class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>    
                    <th width="10">

</th>    
                        <th>
                            Photo
                        </th>
                        <th>
                            NIC
                        </th>
                        <th>
                            E-mail
                        </th>
                        <th>
                            First Name
                        </th>
                        <th>
                            Last Name
                        </th>

                        <th>
                            Date of Birth
                        </th>   

                        <th>
                            Contact No.
                        </th>

                        <th>
                            Address
                        </th> 
                   
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patients as $key => $patient)
                        <tr >
                        <td>

                            </td>
                            <td>
                                <img src="/storage/images/patient/{{ $patient->photo ?? '' }}" height="100" alt="">
                                {{-- {{ $doctor->photo ?? '' }}     --}}
                            </td>
                            <td>
                                {{ $patient->nic ?? '' }}    
                            </td>
                            <td>
                                @php
                                    $temp=App\User::find( $patient->user_id);
                                    echo $temp['email'];
                                @endphp
                                {{-- {{}} --}}
                                {{-- {{ $user->email?? '' }} --}}
                            </td>

                            <td>
                                {{ $patient->f_name ?? '' }}
                            </td>
                            <td>
                                {{ $patient->l_name ?? '' }}
                            </td>

                            <td>
                                {{ $patient->dof?? '' }}
                            </td>

                            <td>
                                {{ $patient->contact_no?? '' }}
                            </td>

                            <td>
                                {{ $patient->address?? '' }}
                            </td>

                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.patients.show', $patient->id) }}">
                                    {{ trans('global.view') }}
                                </a>

                                <a class="btn btn-xs btn-info" href="{{ route('admin.patients.edit', $patient->id) }}">
                                    {{ trans('global.edit') }}
                                </a>

                                {{-- <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                </form> --}}

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('users_manage')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.users.mass_destroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
    
    
  });
  $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})



</script>
@endsection