@push('component-css')
    <style>
        svg {
            width: 125px;
            height: 125px;
            -webkit-transform: rotate(90deg);
            transform: rotate(90deg);
        }

        .circle-bg {
            stroke: #DDD;
            stroke-width: 1px;
            fill: transparent;
        }

        .circle {
            stroke: #2a41e8;
            stroke-width: 6px;
            stroke-dasharray: 314.2052917480469;
            fill: transparent;
        }

        .percentage {
            font-family: 'Lobster', sans-serif;
            font-size: 25px;
            text-anchor: middle;
            stroke-width: 0;
            fill: #AAA;
        }
    </style>
@endpush

@push('component-js')
    <script>
        var circle = document.querySelector('.circle');
        var length = circle.getTotalLength();

        var text = document.querySelector('.percentage');
        var percentage = text.innerHTML;
        percentage = percentage.replace(' %', '');
        percentage = parseInt(percentage);
        setPercentage(percentage);

        function setPercentage(percentage) {
            percentage = 100 - percentage;
            var new_length = (length / 100) * percentage
            circle.style['stroke-dashoffset'] = new_length;
        }
    </script>
@endpush

<div class="welcome-text">
    <svg version="1.1" width="100px" height="100px" viewBox="-10 -10 120 120">
        <path class="circle-bg" d="M0,50 A50,50,0 1 1 100,50 A50,50,0 1 1 0,50"/>
        <path class="circle" d="M0,50 A50,50,0 1 1 100,50 A50,50,0 1 1 0,50"/>
        <text class="percentage"
              transform="rotate(-90 50 50)"
              xml:space="preserve"
              y="59"
              x="50">{{ $percentage }}%</text>
    </svg>
    <p>
        {{ 100 - $percentage }}% Need more to complete profile!
    </p>
</div>
