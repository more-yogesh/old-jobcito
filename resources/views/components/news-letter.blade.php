<form method="post" class="newsletter" id="newsletter">
    @csrf
    <input type="email" name="subscriber_email" placeholder="Enter your email address">
    <button type="submit"><i class="icon-feather-arrow-right"></i></button>
</form>
@push('component-js')
    <script>
        $('#newsletter').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route("subscriber.store") }}',
                method: 'POST',
                data: $('#newsletter').serialize(),
                success: function (data) {
                    $('#newsletter').fadeOut();
                    $('#subscriber-form').html('Great! Now we\'ll be in touch!');
                },
                error: function (error) {
                    var formErrors = error.responseJSON.errors;
                    $('#email-errors').text('');
                    if (formErrors.subscriber_email[0] != '') {
                        $('#email-errors').text(formErrors.subscriber_email[0]);
                    }
                }
            });
        });
    </script>
@endpush
