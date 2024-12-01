<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5>Events on {{ $date }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if($events->isEmpty())
                <p>No events on this date.</p>
            @else
                <ul>
                    @foreach($events as $event)
                        <li>
                            <strong>{{ $event->title }}</strong><br>
                            Start Date: {{ $event->start_date }}<br>
                            End Date: {{ $event->end_date }}
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="modal-footer">
            <button id="register-event-btn" class="btn btn-primary">Register an Event</button>
        </div>
    </div>
</div>
