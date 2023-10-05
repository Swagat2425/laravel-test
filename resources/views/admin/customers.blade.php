@extends('layouts.admin')

@push('styles')
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush

@section('content')

<main class="container">
    <div class="card">
        <div class="card-body">
            <table id="myTable" class="table table-bordered" style="width:100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Registered Date</th>
                        <th>Total Posts</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</main>

@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    jQuery(function () {
        
        var table = jQuery('#myTable').DataTable({
            processing: true,
            serverSide: true,
            // headers: {'X-CSRFToken': $('meta[name="csrf_token"]').attr('content')},
            ajax: {
                url: "{{ route('admin.get.customers') }}",
                type: 'POST',
                // headers: {'csrf_token': $('meta[name="csrf_token"]').attr('content')},
                data: {
                    // 'csrf_token':$('meta[name=csrf_token]').attr("content")
                    "_token": "{{ csrf_token() }}",
                },
            },
            // data: {
            //     csrf_token:$('meta[name=csrf_token]').attr("content")
            // },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'crt_on', name: 'crt_on'},
                {data: 'total_posts', name: 'total_posts'},
                {data: 'status', name: 'status'},
            ]
        });   
        
        // jQuery("#myTable_wrapper").css("width","100%");
    });
</script>
@endpush