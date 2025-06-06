<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="description" content="DCG Registration">

    @if(isset($title))
    <title>{{ $title }}</title>
    @elseif(request()->has('title'))
    <title>{{ request('title') }}</title>
    @else
    <title>Default Title</title>
    @endif

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('css/googleapisFont.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/toggleEye.all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/google-fonts/1.0.0/families/Poppins.css" rel="stylesheet">
   
    
    <script>
        let ch1 = "{{isset($error)}}";
        
        let errorMessage = "{{ request('error') ?? '' }}";
        if (ch1) {
            errorMessage = "{{ isset($error) ? $error : null }}";
        }
        

        let ch2 = "{{isset($success)}}";

        let successMessage = "{{ request('success') ?? '' }}";
        if (ch2) {
            successMessage = "{{ isset($success) ? $success : null }}";
        }
        

        let ch3 = "{{isset($delete_message)}}";

        let deleteMessage = "{{ request('delete_message') ?? null }}";
        if (ch3) {
            successMessage = "{{ isset($delete_message) ? $success : null }}";
        }
        
    </script>
</head>