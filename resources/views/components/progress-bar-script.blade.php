<script>
    @if ($event) window.livewire.on('{{ $event }}', params => { @endif

    @if ($event)
        var container = document.getElementById(params.slug)
    @else
        var container = document.getElementById('{{ $slug }}')
    @endif

    var bar = new ProgressBar.Circle(container, {
        color: '#fff',
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 5,
        trailWidth: 3,
        trailColor: '#4A5568',
        easing: 'easeInOut',
        duration: 2500,
        text: {
            autoStyleContainer: false
        },
        from: {
            color: '#48BB78',
            width: 5
        },
        to: {
            color: '#48BB78',
            width: 5
        },
        // Set default step function for all animate calls
        step: function(state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);

            var value = Math.round(circle.value() * 100);
            if (value === 0) {
                circle.setText('0%');
            } else {
                circle.setText(value + '%');
            }

        }
    });

    @if ( $rating === '-' )
        bar.setText('-');
    @else
        @if($event)
            bar.animate(params.rating / 100); // Number from 0.0 to 1.0
        @else
            bar.animate({{ $rating }} / 100); // Number from 0.0 to 1.0
        @endif
    @endif

    @if ($event) }) @endif

</script>
