@extends('admin.layouts.main')
@section('main-section')

<div class="container p-5">
    <div>
        <h1>Contact Data</h1>
    </div>
    <hr class="mb-5">
    <div class="table-responsive">
        <table id="pagetable" class="table table-bordered bg-white text-dark text-center p-3 mt-4 shadow rounded-3 align-middle">
            <thead>
                <tr class="table-dark">
                    <th>ID</th>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $i => $contact)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $contact->type }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->mobile }}</td>
                    <td>
                        @if($contact->status==0)
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#replyModal{{ $contact->c_id }}">
                                Reply
                            </button>
                        </div>
                        @else
                            <label class="text-success p-2">Replied</label>
                        @endif
                    </td>
                </tr>

                <!-- Reply Modal -->
                <div class="modal fade" id="replyModal{{ $contact->c_id }}" tabindex="-1" aria-labelledby="replyModalLabel{{ $contact->c_id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="replyModalLabel{{ $contact->c_id }}">Reply to {{ $contact->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="post" action="{{ url('/admin/contact/reply') }}">
                                @csrf
                                <input type="hidden" name="c_id" value="{{ $contact->c_id }}">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="originalMessage" class="form-label">Original Message</label>
                                        <textarea class="form-control" id="originalMessage" rows="3" readonly>{{ $contact->message }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="replyMessage" class="form-label">Your Reply</label>
                                        <textarea class="form-control" name="replyMessage" id="replyMessage" rows="3" required></textarea>
                                    </div>
                                </div>
                                
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Send Reply</button>
                                    </div>
                               
                                
                               
                            </form>
                        </div>
                    </div>
                </div>

                @endforeach
            </tbody>
        </table>
    </div>

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
