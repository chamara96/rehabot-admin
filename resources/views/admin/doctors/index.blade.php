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
            <table id="doctor_table" class=" table table-bordered table-striped table-hover datatable datatable-User">
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
                            Registered No
                        </th>
                        <th>
                            Contact No.
                        </th>

                        <th>
                            Address
                        </th> 
                        <th>
                            Experience
                        </th>                      
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($doctors as $key => $doctor)
                        <tr >
                        <td>

                            </td>
                            <td>
                                <img src="/storage/images/doctor/{{ $doctor->photo ?? '' }}" height="100" alt="">
                                {{-- {{ $doctor->photo ?? '' }}     --}}
                            </td>
                            <td>
                                {{ $doctor->nic ?? '' }}    
                            </td>

                            <td>
                                @php
                                    $temp=App\User::find( $doctor->user_id);
                                    echo $temp['email'];
                                @endphp
                                {{-- {{}} --}}
                                {{-- {{ $user->email?? '' }} --}}
                            </td>


                            <td>
                                {{ $doctor->f_name ?? '' }}
                            </td>
                            <td>
                                {{ $doctor->l_name ?? '' }}
                            </td>
                            <td>
                                {{ $doctor->reg_no ?? '' }}
                            </td>
                            <td>
                                {{ $doctor->contact_no?? '' }}
                            </td>

                            <td>
                                {{ $doctor->address?? '' }}
                            </td>
                            <td>
                                {{ $doctor->experience ?? '' }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.doctors.show', $doctor->id) }}">
                                    {{ trans('global.view') }}
                                </a>

                                <a class="btn btn-xs btn-info" href="{{ route('admin.doctors.edit', $doctor->id) }}">
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