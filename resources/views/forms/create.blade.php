<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <div id="build-wrap" ></div>
    <button id="getJSON" class="submit-form">save</button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>

    <script type="text/javascript">

    var fbEditor = document.getElementById('build-wrap');
    var formBuilder = $(fbEditor).formBuilder();
    $(".submit-form").click(function(e){
        e.preventDefault();
            // alert(formBuilder.actions.getData('json', true));
    var formData = formBuilder.actions.getData('json', true);
    console.log(formData);

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
    $.ajax({
        url: "{{ route('forms.store')}}",
        type: 'POST',
        data:  {
      form_data: JSON.stringify(formData) // Convert the form data to JSON string
    },

        success: function(response) {
        // Handle the success response
        },
        error: function(xhr, status, error) {
        // Handle the error response
        }
    });
    });

    </script>
</body>
</html>
