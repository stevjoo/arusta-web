<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header text-white" style="background-color: #2b2b2b;">
            <h5>Events on {{ $date }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: invert(1);"></button>
        </div>
        <div class="modal-body text-white" style="background-color: #2b2b2b;">
            @if($events->isEmpty())
                <p class="fw-semibold">No events on this date.</p>
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
        <div class="modal-footer" style="background-color: #2b2b2b;">
            <button id="register-event-btn" class="btn btn-outline-light">Register an Event</button>
        </div>
    </div>
</div>
