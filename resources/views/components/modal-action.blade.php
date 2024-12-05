@props(['action', 'data'])

<div class="modal-dialog">
    <form id="form-action" action="{{ $action }}" method="post">
        @csrf
        <div class="modal-content text-white" style="background-color: #2b2b2b;">
        <div class="modal-header text-white" style="background-color: #2b2b2b;">
            <h5 class="modal-title text-white" style="background-color: #2b2b2b;">Register Event Dates</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: invert(1);"></button>
        </div>
        <div class="modal-body">
            {{ $slot }}
        </div>
        <div class="ms-3">
            <a target="_blank" href="https://wa.me/+628561810555" class="text-white">Contact Me (+628561810555)</a>
        </div>
        <div class="modal-footer mt-3">
            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
            <button type="submit" class="btn btn-outline-light">Save changes</button>
        </div>
        </div>
    </form>
  </div>
