<div wire:ignore.self class="modal fade" id="modalCreateEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Create Event</h4>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-3">
                    <label>Event Name <span class="text-c-red">*</span></label>
                    <div class="input-group input-group-button">
                        <div class="input-group-prepend">
                            <button class="btn btn-sm btn-secondary" wire:click="sendCuti">Cuti? <i class="icofont icofont-arrow-right"></i></button>
                        </div>
                        <input wire:model="event_name" type="text" class="form-control">
                    </div>
                    @error('event_name') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
                <div class="md-form mb-3">
                    <label>Choose number of employees <span class="text-c-red">*</span></label>
                    @if($employees)
                    <input class="form-control mb-2" type="number" wire:model="employee_count" min="0" max="{{ $employees->count() }}">
                    <div class="row">
                    @for($f = 0; $f < $employee_count; $f++)
                    <div class="col-lg-4">
                        <select class="form-control" wire:model="employee_ids.{{ $f }}">
                            <option value="">-- CHOOSE --</option>
                            @foreach($employees as $emp)
                            <option value="{{ $emp->id }}">{{ $emp->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endfor
                    </div>
                    @error('employee_count') <span class="text-danger error">{{ $message }}</span>@enderror
                    @else
                    <input type="text" class="form-control" value="PLEASE, GO BACK & INSERT EMPLOYEE INFO FIRST!!" readonly>
                    @endif
                </div>
                <div class="md-form mb-3">
                    <label>Event Type <span class="text-c-red">*</span></label>
                    <select class="form-control" wire:model="event_type">
                        <option value="">-- SELECT --</option>
                        <option value="One Time">One Time</option>
                        <option value="Recurring Monthly">Recurring Monthly</option>
                        <option value="Recurring Yearly">Recurring Yearly</option>
                    </select>
                    @error('event_type') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
                <div class="md-form mb-3">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <label>Event Start <span class="text-c-red">*</span></label>
                            <input type="datetime-local" class="form-control form-control-sm"
                            wire:model="event_start">
                            @error('event_start') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-12 col-lg-6">
                            <label>Event End <span class="text-c-red">*</span></label>
                            <input type="datetime-local" class="form-control form-control-sm"
                            wire:model="event_end">
                            @error('event_end') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="md-form mb-3">
                    <label>Event Details</label>
                    <textarea class="form-control form-control-sm" wire:model="event_details"></textarea>
                    @error('event_details') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
                <div class="modal-footer d-flex justify-content-right">
                    <div wire:loading.remove wire:target="store">
                        <button wire:click.prevent="cancel" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Cancel</button>
                        <button wire:click.prevent="store" class="btn btn-primary waves-effect waves-light"><i class="icofont icofont-upload"></i> Store</button>
                    </div>
                    <div wire:loading wire:target="store" wire:loading.class="btn btn-info waves-effect waves-light disabled">
                        <i class="icofont icofont-cloud-upload"></i> Loading..
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('event-create-script')
    <script type="text/javascript">
        window.livewire.on('eventStore', () => {
            $('#modalCreateEvent').modal('hide');
        });
    </script>
    @endpush
</div>
