@extends('index')
@section('contents')
<div class="d-flex justify-contents-between align-items-center">
    <a href="{{ url()->previous() }}">back</a>
    <h1 class="text-center flex-grow-1">Post List</h1>
    <div></div>
</div>
<table id="post_table">
    <thead>
        <tr>
            <th>#</th>
            <th>Created At</th>
            <th>Contents</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
@endsection
@push('script')
<script>
    var path = window.location.pathname;
    var id = path.split('/').pop();
    console.log(id);
    
    $(function() {
        $('#post_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.showPosts', ':id') }}".replace(':id', id),
            columns: [
                {data: 'id', name: 'id', render: function(data, type, row, meta) {
                    return meta.row + 1;
                }},
                {data: 'created_at', name: 'created_at'},
                {data: 'contents', name: 'contents'},
            ]
        })
    });
  
</script>
@endpush