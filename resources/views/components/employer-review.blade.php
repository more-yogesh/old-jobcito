<div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
    <div class="sign-in-form">
        <ul class="popup-tabs-nav">
            <li><a href="#tab">Leave a Review</a></li>
        </ul>
        <div class="popup-tabs-container">
            <div class="popup-tab-content" id="tab">
                <div class="welcome-text">
                    <h3>What is it like to work at {{ $CompanyName }}?</h3>
                    <form method="post" id="review-form">
                        @csrf
                        <input type="hidden" name="employer_profile" value="{{ $profileId }}">
                        <div class="clearfix"></div>
                        <div class="leave-rating-container">
                            <div class="leave-rating margin-bottom-5">
                                <input type="radio" name="rating" required id="rating-1" value="1">
                                <label for="rating-1" class="icon-material-outline-star"></label>
                                <input type="radio" name="rating" required id="rating-2" value="2">
                                <label for="rating-2" class="icon-material-outline-star"></label>
                                <input type="radio" name="rating" required id="rating-3" value="3">
                                <label for="rating-3" class="icon-material-outline-star"></label>
                                <input type="radio" name="rating" required id="rating-4" value="4">
                                <label for="rating-4" class="icon-material-outline-star"></label>
                                <input type="radio" name="rating" required id="rating-5" value="5">
                                <label for="rating-5" class="icon-material-outline-star"></label>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <span class="invalid-input" id="review-error">
                        </span>
                        <div class="row">
                            <div class="col-xl-12 margin-top-10">
                                <div class="input-with-icon-left">
                                    <i class="icon-material-outline-rate-review"></i>
                                    <input type="text" class="input-text with-border" name="title"
                                           id="reviewtitle" placeholder="Review Title" required/>
                                </div>
                                <span class="invalid-input" id="title-error">

                        </span>
                            </div>
                        </div>
                        <textarea class="with-border" placeholder="Review" name="message" id="message" cols="7"
                                  required></textarea>
                        <span class="invalid-input" id="message-error">

                        </span>
                        <button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit">
                            Leave a Review
                            <i class="icon-material-outline-arrow-right-alt"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js-hooks')
    <script>
        $(document).ready(function () {
            $('#review-form').submit(function (event) {
                event.preventDefault();
                $.ajax({
                    method: 'POST',
                    url: '{{ route('employee-review') }}',
                    data: $('#review-form').serialize(),
                    success: function (data) {
                        // window.location.reload();
                    },
                    error: function (error) {
                        if (error.responseJSON.errors == undefined) {
                            // window.location.reload();
                        }
                        var formErrors = error.responseJSON.errors;
                        $('#review-error').text('');
                        $('#message-error').text('');
                        $('#title-error').text('');
                        if (formErrors.title) {
                            $('#title-error').text(formErrors.title);
                        }
                        if (formErrors.message) {
                            $('#message-error').text(formErrors.message);
                        }
                        if (formErrors.rating) {
                            $('#review-error').text(formErrors.rating);
                        }
                    }
                });
            });
        });
    </script>
@endsection
