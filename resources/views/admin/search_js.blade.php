@section('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    //search user
    $(document).ready(function(){
        $(document).on('keyup', function(e){
            e.preventDefault();
            let search_str = $('#search_user').val();
            $.ajax({
                url: "{{ route('search.user') }}",
                method: 'GET',
                data: {search_str: search_str},
                success: function(response) {
                    $('.show-user').html(response);
                    if(response.status == 'nothing_found') {
                        $('.show-user').html('<div class="alert alert-danger">No user found</div>')
                    }
                }
            });
        })
    })
</script>
@endsection
