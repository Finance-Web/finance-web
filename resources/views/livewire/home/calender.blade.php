<div class="full-calender">
    <div class="card">
        <div class="card-header">
            <h5>Full Calender</h5>
            <div class="card-header-right">
                <!--Button Panggil Pop Up-->
                <div class="text-center">
                    <a href="" class="btn btn-default btn-sm icofont icofont-edit"
                        data-toggle="modal" data-target="#modalControlEvent"></a>
                    <a href="" class="btn btn-default btn-sm icofont icofont-plus"
                        data-toggle="modal" data-target="#modalCreateEvent"></a>
                </div>
            </div>
        </div>
        <div class="card-block">
            <div class="row">
                <div class="col">
                    <button class="btn btn-sm btn-primary" wire:click="$emit('calenderRender')"><i class="icofont icofont-refresh"></i>Refresh</button>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div wire:ignore id='calender'></div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-error">
        <div class="card text-center">
            <div class="card-block">
                <div class="m-t-10">
                    <i class="icofont icofont-warning text-white bg-c-yellow"></i>
                    <h4 class="f-w-600 m-t-25">Not supported</h4>
                    <p class="text-muted m-b-0">Full Calender not supported
                        in this device
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!--Modal Pop Up Form control events-->
    @include('livewire.home.modals.event-control')

    <!--Modal Pop Up Form create events-->
    @include('livewire.home.modals.event-create')

    <!--Modal Pop Up Form edit events-->
    @include('livewire.home.modals.event-edit')

    <!--Modal Pop Up Form view/show employee-->
    @include('livewire.home.modals.event-show')

    <!--Modal Pop Up Confirm delete events-->
    @include('livewire.home.modals.event-delete')

    @push('calender-script')
        <script type="text/javascript">
            var calender = {!! $calendar !!};
            window.livewire.on('calenderRender', () => {
                $('#calender').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,listMonth'
                    },
                    navLinks: true,
                    businessHours: false,
                    editable: false,
                    droppable: false,
                    events: calender
                });
            });
        </script>
        @stack('event-create-script')
        @stack('event-edit-script')
        @stack('event-delete-script')
    @endpush
</div>
