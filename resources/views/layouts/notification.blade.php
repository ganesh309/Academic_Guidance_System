    @if(isset($title))
    <title>{{ $title }}</title>
    @elseif(request()->has('title'))
    <title>{{ request('title') }}</title>
    @else
    <title>Default Title</title>
    @endif

    <script>
        let ch1 = "{{isset($error)}}";
        console.log(ch1);
        let errorMessage = "{{ request('error') ?? '' }}";
        if (ch1) {
            errorMessage = "{{ isset($error) ? $error : null }}";
        }
        console.log(errorMessage);

        let ch2 = "{{isset($success)}}";

        let successMessage = "{{ request('success') ?? '' }}";
        if (ch2) {
            successMessage = "{{ isset($success) ? $success : null }}";
        }
        console.log(successMessage);

        let ch3 = "{{isset($delete_message)}}";

        let deleteMessage = "{{ request('delete_message') ?? null }}";
        if (ch3) {
            successMessage = "{{ isset($delete_message) ? $success : null }}";
        }
        console.log(deleteMessage);
    </script>

