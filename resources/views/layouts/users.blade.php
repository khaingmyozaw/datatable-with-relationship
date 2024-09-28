@extends('index')
@section('contents')
<h1 class="text-center">User List</h1>
<table id="user_table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
@endsection
@push('script')
<script>
    $(function () {
        $('#user_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'created_at', name: 'created_at', render: function(data) {
                    // Convert the date string to js date object;
                    var date = new Date(data);

                    return date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear();

                }},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>
@endpush