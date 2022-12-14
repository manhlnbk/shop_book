@extends('admin.main')
@Section('content')

    <div class="container box">
        <h3 align="center">Tìm kiếm</h3><br />   
        <div class="form-group">
            <input type="text" name="keyword" id="keyword" class="form-control input-lg" placeholder="Enter Name" />
        <div id="keywordList"><br>
        </div>
    </div>
    {{ csrf_field() }}
    </div>
    <table class="table">
            <thread>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Active</th>
                    <th><a href="create"><button type="button" class="btn btn-success">Thêm</button></a></th>
                </tr>
            </thread>
            <tbody class="show-data">
                @include('admin.users.search.search', ['paginator' => $users])
            </tbody>
    </table>
    
        <ul class="pagination">@include('admin.users.search.paginate', ['paginator' => $users])</ul>


@endSection
@Section('script')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
<!-- active button -->
<script>
let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    elems.forEach(function(html) {
    let switchery = new Switchery(html,  { size: 'small' });
    });
</script>
<script>
    $(document).ready(function(){
    $('.js-switch').change(function () {
        let active = $(this).prop('checked') === true ? 0 : 1;
        let userId = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{route('users.update.active')}}',
            data: {'active': active, 'user_id': userId},
            success: function (data) {
                console.log(data.message);
            }
            });
        });
    });
</script>
<!-- search button -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>s
<script>
    $(document).ready(function (){
        $('#keyword').keyup(function (){
            var name = $(this).val();
            $.ajax({
                url: " {{ route('index') }}",
                method: "GET",
                data: {name},
                success: function (data) {
                    $('.show-data tr').remove()
                    $('.show-data').html(data.data)
                    $('.pagination li').remove()
                    $('.pagination').html(data.paginator)
                }
            });
        });
        // pagination
        $(document).on('click','.data-paginate', function(e) {
             e.preventDefault();
             var page = $(this).attr('data-url');
             $.ajax({
                url: page,
                success: function(data) {
                    $('.show-data tr').remove()
                    $('.show-data').html(data.data)
                    $('.pagination li').remove()
                    $('.pagination').html(data.paginator)
                }
             });            
       });  
    });
</script>

@endsection
