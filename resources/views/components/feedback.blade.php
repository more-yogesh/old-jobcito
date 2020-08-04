<div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
    <div class="sign-in-form">
        <ul class="popup-tabs-nav">
            <li><a href="#tab">Feedback Message</a></li>
        </ul>
        <div class="popup-tabs-container">
            <div class="popup-tab-content" id="tab">
                <div class="welcome-text">
                    <h3>Please Enter Your Valuable Feedback</h3>
                </div>
                <form id="feedback-message">
                    @csrf
                    <textarea name="message" type="text" cols="10" placeholder="Message"
                              class="with-border is-invalid"></textarea>
                    <div id="error" class="invalid-feedback"></div>
                    <button class="button margin-top-35 full-width button-sliding-icon ripple-effect"
                            type="submit" name="submit">Send<i
                            class="icon-material-outline-arrow-right-alt"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
@push('component-js')
    <script>
        $('#feedback-message').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                url: '{{route('feedback.store')}}',
                type: 'POST',
                data: $('#feedback-message').serialize(),
                success: function (data) {
                    $('#feedback-message')[0].reset();
                    Snackbar.show({
                        text: data.success,
                        pos: 'bottom-center',
                        showAction: true,
                        actionText: '&times',
                        duration: 3000,
                        textColor: '#fff',
                        backgroundColor: '#38b653'
                    });
                    $('#error').empty();
                    $('.mfp-close').click();
                },
                error: function (data) {
                    $("#error").html(data.responseJSON.errors.message);
                    $('#message').empty();
                }
            });
        });
    </script>
@endpush
