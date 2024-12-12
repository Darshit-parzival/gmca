@extends('admin.layouts.main')
@section('main-section')
    <div class="container p-5">
        <div class="mb-4">
            <h1>Social Links Management</h1>
        </div>
        <hr />
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Platform</th>
                    <th>URL</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($social_data as $socialLink)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><i class="mdi mdi-{{ $socialLink->social_platform }}"></i>
                            {{ ucfirst($socialLink->social_platform) }}</td>
                        <td>{{ $socialLink->social_link }}</td>
                        <td>
                            @if ($socialLink->status)
                                <div class="text-success">Active</div>
                            @else
                                <div class="text-danger">Inactive</div>
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editSocialLinkModal{{ $socialLink->social_id }}">Edit</button>
                        </td>
                    </tr>

                    <!-- Edit Social Link Modal -->
                    <div class="modal fade" id="editSocialLinkModal{{ $socialLink->social_id }}" tabindex="-1"
                        aria-labelledby="editSocialLinkModalLabel{{ $socialLink->social_id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post" action="{{ url('/admin/social/edit/') }}">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editSocialLinkModalLabel{{ $socialLink->social_id }}">
                                            Edit
                                            <b class="text-primary h3">"{{ ucfirst($socialLink->social_platform) }}"</b>
                                            Social
                                            Link
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <input type="hidden" name="id" value="{{ $socialLink->social_id }}" />
                                        <div class="mb-3">
                                            <label for="editUrl" class="form-label">URL</label>
                                            <input type="url" name="socialLink" class="form-control"
                                                value="{{ $socialLink->social_link }}" id="editUrl">
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" class="form-check-input" name="status" id="isActive"
                                                value="1" {{ $socialLink->status ? 'checked' : '' }}>

                                            <label class="form-check-label" for="isActive">Active</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
