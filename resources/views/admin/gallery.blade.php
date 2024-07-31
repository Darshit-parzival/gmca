@extends('admin.layouts.main')
@section('main-section')
<style>
.image-container {
    position: relative;
    height: 100px;
    background-size: cover;
    background-position: center;
}

.image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.image-actions {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 5px;
    background-color: rgba(0, 0, 0, 0.5); 
    color: white;
    display: flex; 
    justify-content: space-between;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.position-relative:hover .image-actions {
    opacity: 1; 
}

</style>
<div class="container p-5">
    <div>
        <h1>Event Gallery</h1>
    </div>
    @if($events->count())
        <div class="accordion" id="eventsAccordion">
            @foreach ($events as $i => $event)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $i }}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}" aria-expanded="false" aria-controls="collapse{{ $i }}">
                        {{ $event->name }}
                    </button>
                </h2>
                <div id="collapse{{ $i }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $i }}" data-bs-parent="#eventsAccordion">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-3 mb-3 border d-flex justify-content-center align-items-center">
                                <button class="btn btn-primary">Add New</button>
                            </div>
                            
                            @foreach ($event->galleries as $image)
                            <div class="col-md-3 mb-3 border position-relative">
                                <div class="image-container" style="background-image: url('{{ asset('/assets/admin/images/gallery/' . $image->image) }}');height:200px">
                                    <div class="image-actions d-flex flex-row px-2 py-1">
                                        <a href="" class="btn btn-success btn-sm me-2">Active</a>
                                        <a href="#" class="btn btn-danger btn-sm ms-auto">Delete</a>
                                    </div>
                                </div>
                            </div>
                            
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach 
        </div>
    @else
        <div class="p-5 m-5 text-center">
            <h1>No Events Yet!</h1>
        </div>
    @endif

    <div class="mt-4">
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>
</div>
@endsection
