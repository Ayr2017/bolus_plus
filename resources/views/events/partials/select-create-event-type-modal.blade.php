<!-- Modal -->
<div class="modal fade" id="select_create_event_modal" tabindex="-1" aria-labelledby="select_create_event_modalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="select_create_event_modal_label">Select event type for create</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @foreach($event_types as $event_type)
                    <p>
                        <a href="{{route('events.create',['event_type' => $event_type->name])}}">
                            {!! $event_type->icon() !!} {{$event_type->description()}}
                        </a>
                    </p>

                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-outline-primary">Save</button>
            </div>
        </div>
    </div>
</div>
