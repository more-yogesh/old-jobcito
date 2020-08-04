<ul id="notification-bar">
    {{-- Dynamically appending to this element using bellow ajax --}}
</ul>
<div id="read-more"></div>

@push('component-js')
    <script>
        $(document).ready(function () {
            $.ajax({
                url: "{{ route('notifications') }}",
                method: "GET",
                success: function (notification) {
                    $('#notification-counts').html(notification.total);
                    let notifications = ``;
                    $.each(notification.data, function (key, value) {
                        notifications += `<li class="notifications-not-read">
                                            <a href="${value.data.notificationLink.link}?notification=${value.id}">
                                                <span class="notification-icon">
                                                    <i class="icon-material-outline-group"></i></span>
                                                <span class="notification-text">
                                                ${value.data.notificationLink.text}
                                            </span>
                                            </a>
                                        </li>`;
                    });
                    if (notification.total >= 0) {
                        $('#read-more').html(`<a href="{{ route('notification.paginate') }}"
                                                class="header-notifications-button ripple-effect button-sliding-icon">
                                                    View All Notifications
                                                <i class="icon-material-outline-arrow-right-alt"></i>
                                                </a>`);
                    }
                    if (notification.total == 0) {
                        notifications = `<li class="notifications-not-read">
                                              <a href="javascript:void(0)">
                                                <span class="notification-icon">
                                                    <i class="icon-material-outline-group"></i></span>
                                                <span class="notification-text">
                                                No new Notification
                                            </span>
                                            </a>
                                        </li>`;
                    }

                    $('#notification-bar').html(notifications);
                }
            });
        });
    </script>
@endpush
