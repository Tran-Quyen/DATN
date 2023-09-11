@section('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    //Delete Product
    $(document).ready(function(){
        $(document).on('click', '.delete_product', function(e){
            e.preventDefault();
            let product_id = $(this).data('id')
            let product_name = $(this).data('name')
            if(confirm('Are you sure to delete product ' + product_name + ' ?')) {
                $.ajax({
                    url: "{{ route('delete-product') }}",
                    method: 'post',
                    data: {product_id: product_id},
                    success: function(response){
                        if(response.status == 'success'){
                            $('.table').load(location.href+' .table')
                            $('.msg').append('<h3 class="alert alert-success"> Delete Product Successfully </h3>')
                        }
                    }
                })
            }
        })
    })
    //delete image in edit
    $(document).ready(function(){
        $(document).on('click', '.delete_img', function(e){
            e.preventDefault();
            let img_id = $(this).data('id')
            $.ajax({
                url: "{{ route('delete.img') }}",
                method: 'post',
                data: {img_id: img_id},
                success: function(response){
                    if(response.status == 'success'){
                        $('#img_div').load(location.href+' #img_div')
                    }
                }
            })
        })
    })
    //search product
    $(document).ready(function(){
        $(document).on('keyup', function(e){
            e.preventDefault();
            let search_str = $('#search_product').val();
            $.ajax({
                url: "{{ route('search.product') }}",
                method: 'GET',
                data: {search_str: search_str},
                success: function(response) {
                    $('.show-product').html(response);
                    if(response.status == 'nothing_found') {
                        $('.show-product').html('<div class="alert alert-danger">No product found</div>')
                    }
                }
            });
        })
    })


</script>
@endsection
