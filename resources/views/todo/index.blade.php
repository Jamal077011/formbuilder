<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>
</head>
<body>
    <div class="panel panel-default">
        <div class="panel-body">
            <p style="font-size:20px; font-weight:bold;">Laravel 10 Ajax POST Request Example | Laravelia</p>
            <form class="mt-3" id="form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="joining_date">Joining date</label>
                    <input type="date" name="joining_date" id="joining_date" class="form-control">
                </div>
                <div class="form-group">
                    <label for="joining_salary">Joining salary</label>
                    <input type="number" name="joining_salary" id="joining_salary" class="form-control">
                </div>
                <button type="button" class="btn btn-success submit-form" style="background:green" id="create_new">Create Employee</button>
            </form>
        </div>
    </div>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">

    $(".submit-form").click(function(e){
        e.preventDefault();
        var data = $('#form-data').serialize();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
        $.ajax({
            type: 'POST',
            url: "{{ route('store') }}",
            data: data,

            beforeSend: function(){
                $('#create_new').html('....Please wait');
            },
            success: function(response){
                alert(response.success);
            },
            complete: function(response){
                $('#create_new').html('Create New');
            }
        });
	});
</script>
</body>
</html>
