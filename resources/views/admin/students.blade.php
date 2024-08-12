@extends('admin.layouts.main')
@section('main-section')

<div class="container p-5">
    <div>
        <h1>Students</h1>
    </div>
    <hr class="mb-5">
    <div class="top-actions d-flex">
        <div style="flex: 1;">
            <a href="#" class="btn btn-secondary">Export</a>
        </div>
        <div style="margin-left:auto;">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                Add New
            </button>
        </div>
    </div>

    @if(!$students->isEmpty())
    <div class="table-responsive">
    <table class="table table-bordered bg-white text-dark text-center p-3 mt-4 shadow rounded-3 align-middle">
        <thead>
            <tr class="table-dark">
                <th>Id</th>
                <th>Student Name</th>
                <th>Photo</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Admission Year</th>
                <th>Graduation Stream</th>
                <th>Admission Category</th>
                <th colspan="2">Operation</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($students as $i => $student)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $student->fname ." ". $student->mname ." ". $student->lname}}</td>
                    <td><img src="{{ url('/assets/admin/images/students/') }}/{{ $student->photo }}" alt="Photo" width="50"></td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->mobile }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->admission_year }}</td>
                    <td>{{ $student->graduation_stream }}</td>
                    <td>{{ $student->admission_cat }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editStudentModal{{ $student->id }}">
                            Edit
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteStudentModal{{ $student->id }}">
                            Delete
                        </button>
                    </td>
                </tr>

                <!-- Confirm Delete Modal -->
                <div class="modal fade" id="confirmDeleteStudentModal{{ $student->id }}" tabindex="-1" aria-labelledby="confirmDeleteStudentModalLabel{{ $student->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteStudentModalLabel">Confirm Deletion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this student?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <a href="{{ url('/student/delete/' . $student->id) }}" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="editStudentModal{{ $student->id }}" tabindex="-1" aria-labelledby="editStudentModalLabel{{ $student->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editStudentModalLabel{{ $student->id }}">Edit Student</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="post" action="{{ url('/student/edit') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <input type="hidden" name="stud_id" value="{{ $student->stud_id }}">
                                        
                                        <div class="mb-3">
                                            <label for="txtenroll{{ $student->stud_id }}" class="form-label">Enrollment Number</label>
                                            <input type="text" class="form-control" name="enroll" id="txtenroll{{ $student->stud_id }}" value="{{ $student->enroll }}">
                                            <span class="text-danger mt-2">@error('enroll') {{ $message }} @enderror</span>
                                        </div>
                    
                                        <div class="mb-3">
                                            <label for="txtfname{{ $student->stud_id }}" class="form-label">First Name</label>
                                            <input type="text" class="form-control" name="fname" id="txtfname{{ $student->stud_id }}" value="{{ $student->fname }}">
                                            <span class="text-danger mt-2">@error('fname') {{ $message }} @enderror</span>
                                        </div>
                    
                                        <div class="mb-3">
                                            <label for="txtmname{{ $student->stud_id }}" class="form-label">Middle Name</label>
                                            <input type="text" class="form-control" name="mname" id="txtmname{{ $student->stud_id }}" value="{{ $student->mname }}">
                                            <span class="text-danger mt-2">@error('mname') {{ $message }} @enderror</span>
                                        </div>
                    
                                        <div class="mb-3">
                                            <label for="txtlname{{ $student->stud_id }}" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" name="lname" id="txtlname{{ $student->stud_id }}" value="{{ $student->lname }}">
                                            <span class="text-danger mt-2">@error('lname') {{ $message }} @enderror</span>
                                        </div>
                    
                                        <div class="mb-3">
                                            <label class="form-label">Gender</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="genderMale{{ $student->stud_id }}" value="m" {{ $student->gender == 'm' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="genderMale{{ $student->stud_id }}">Male</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="genderFemale{{ $student->stud_id }}" value="f" {{ $student->gender == 'f' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="genderFemale{{ $student->stud_id }}">Female</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="genderOther{{ $student->stud_id }}" value="o" {{ $student->gender == 'o' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="genderOther{{ $student->stud_id }}">Other</label>
                                            </div>
                                        </div>
                    
                                        <div class="mb-3">
                                            <label for="txtmobile{{ $student->stud_id }}" class="form-label">Mobile</label>
                                            <input type="text" class="form-control" name="mobile" id="txtmobile{{ $student->stud_id }}" value="{{ $student->mobile }}">
                                            <span class="text-danger mt-2">@error('mobile') {{ $message }} @enderror</span>
                                        </div>
                    
                                        <div class="mb-3">
                                            <label for="txtaltmobile{{ $student->stud_id }}" class="form-label">Alternative Mobile</label>
                                            <input type="text" class="form-control" name="alt_mobile" id="txtaltmobile{{ $student->stud_id }}" value="{{ $student->alt_mobile }}">
                                            <span class="text-danger mt-2">@error('alt_mobile') {{ $message }} @enderror</span>
                                        </div>
                    
                                        <div class="mb-3">
                                            <label for="txtwmobile{{ $student->stud_id }}" class="form-label">WhatsApp Mobile</label>
                                            <input type="text" class="form-control" name="wmobile" id="txtwmobile{{ $student->stud_id }}" value="{{ $student->wmobile }}">
                                            <span class="text-danger mt-2">@error('wmobile') {{ $message }} @enderror</span>
                                        </div>
                    
                                        <div class="mb-3">
                                            <label for="txtemail{{ $student->stud_id }}" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" id="txtemail{{ $student->stud_id }}" value="{{ $student->email }}">
                                            <span class="text-danger mt-2">@error('email') {{ $message }} @enderror</span>
                                        </div>
                    
                                        <div class="mb-3">
                                            <label for="txtadmission_year{{ $student->stud_id }}" class="form-label">Admission Year</label>
                                            <input type="text" class="form-control" name="admission_year" id="txtadmission_year{{ $student->stud_id }}" value="{{ $student->admission_year }}">
                                            <span class="text-danger mt-2">@error('admission_year') {{ $message }} @enderror</span>
                                        </div>
                    
                                        <div class="mb-3">
                                            <label for="txtaadhar{{ $student->stud_id }}" class="form-label">Aadhar</label>
                                            <input type="text" class="form-control" name="aadhar" id="txtaadhar{{ $student->stud_id }}" value="{{ $student->aadhar }}">
                                            <span class="text-danger mt-2">@error('aadhar') {{ $message }} @enderror</span>
                                        </div>
                    
                                        <div class="mb-3">
                                            <label for="txtcaste_type{{ $student->stud_id }}" class="form-label">Caste Type</label>
                                            <input type="text" class="form-control" name="caste_type" id="txtcaste_type{{ $student->stud_id }}" value="{{ $student->caste_type }}">
                                            <span class="text-danger mt-2">@error('caste_type') {{ $message }} @enderror</span>
                                        </div>
                    
                                        <div class="mb-3">
                                            <label for="txtabc_id{{ $student->stud_id }}" class="form-label">ABC ID</label>
                                            <input type="text" class="form-control" name="abc_id" id="txtabc_id{{ $student->stud_id }}" value="{{ $student->abc_id }}">
                                            <span class="text-danger mt-2">@error('abc_id') {{ $message }} @enderror</span>
                                        </div>
                    
                                        <div class="mb-3">
                                            <label for="txtaddress{{ $student->stud_id }}" class="form-label">Address</label>
                                            <textarea class="form-control" name="address" id="txtaddress{{ $student->stud_id }}">{{ $student->address }}</textarea>
                                            <span class="text-danger mt-2">@error('address') {{ $message }} @enderror</span>
                                        </div>
                    
                                        <div class="mb-3">
                                            <label for="txtgraduation_stream{{ $student->stud_id }}" class="form-label">Graduation Stream</label>
                                            <input type="text" class="form-control" name="graduation_stream" id="txtgraduation_stream{{ $student->stud_id }}" value="{{ $student->graduation_stream }}">
                                            <span class="text-danger mt-2">@error('graduation_stream') {{ $message }} @enderror</span>
                                        </div>
                    
                                        <div class="mb-3">
                                            <label for="txtacpc_rollno{{ $student->stud_id }}" class="form-label">ACPC Roll Number</label>
                                            <input type="text" class="form-control" name="acpc_rollno" id="txtacpc_rollno{{ $student->stud_id }}" value="{{ $student->acpc_rollno }}">
                                            <span class="text-danger mt-2">@error('acpc_rollno') {{ $message }} @enderror</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="txtdob{{ $student->stud_id }}" class="form-label">Date of Birth</label>
                                            <input type="date" class="form-control" name="dob" id="txtdob{{ $student->stud_id }}" value="{{ $student->dob }}">
                                            <span class="text-danger mt-2">@error('dob') {{ $message }} @enderror</span>
                                        </div>
                    
                                        <div class="mb-3">
                                            <label for="txtvoterid{{ $student->stud_id }}" class="form-label">Voter ID</label>
                                            <input type="text" class="form-control" name="voterid" id="txtvoterid{{ $student->stud_id }}" value="{{ $student->voterid }}">
                                            <span class="text-danger mt-2">@error('voterid') {{ $message }} @enderror</span>
                                        </div>
                    
                                        <div class="mb-3">
                                            <label for="txtcity{{ $student->stud_id }}" class="form-label">City</label>
                                            <input type="text" class="form-control" name="city" id="txtcity{{ $student->stud_id }}" value="{{ $student->city }}">
                                            <span class="text-danger mt-2">@error('city') {{ $message }} @enderror</span>
                                        </div>
                    
                                        <div class="mb-3">
                                            <label for="txtdistrict{{ $student->stud_id }}" class="form-label">District</label>
                                            <input type="text" class="form-control" name="district" id="txtdistrict{{ $student->stud_id }}" value="{{ $student->district }}">
                                            <span class="text-danger mt-2">@error('district') {{ $message }} @enderror</span>
                                        </div>
                    
                                        <div class="mb-3">
                                            <label for="txtstate{{ $student->stud_id }}" class="form-label">State</label>
                                            <input type="text" class="form-control" name="state" id="txtstate{{ $student->stud_id }}" value="{{ $student->state }}">
                                            <span class="text-danger mt-2">@error('state') {{ $message }} @enderror</span>
                                        </div>
                    
                                        <div class="mb-3">
                                            <label for="txtpincode{{ $student->stud_id }}" class="form-label">Pincode</label>
                                            <input type="text" class="form-control" name="pincode" id="txtpincode{{ $student->stud_id }}" value="{{ $student->pincode }}">
                                            <span class="text-danger mt-2">@error('pincode') {{ $message }} @enderror</span>
                                        </div>
                    
                                        <div class="mb-3">
                                            <label for="txtadmission_cat{{ $student->stud_id }}" class="form-label">Admission Category</label>
                                            <input type="text" class="form-control" name="admission_cat" id="txtadmission_cat{{ $student->stud_id }}" value="{{ $student->admission_cat }}">
                                            <span class="text-danger mt-2">@error('admission_cat') {{ $message }} @enderror</span>
                                        </div>
                    
                                        <div class="mb-3">
                                            <label for="txtminority{{ $student->stud_id }}" class="form-label">Minority</label>
                                            <select class="form-select" name="minority" id="txtminority{{ $student->stud_id }}">
                                                <option value="0" {{ $student->minority == '0' ? 'selected' : '' }}>No</option>
                                                <option value="1" {{ $student->minority == '1' ? 'selected' : '' }}>Yes</option>
                                            </select>
                                            <span class="text-danger mt-2">@error('minority') {{ $message }} @enderror</span>
                                        </div>
                    
                                        <div class="mb-3">
                                            <label for="txtadmission_round{{ $student->stud_id }}" class="form-label">Admission Round</label>
                                            <input type="text" class="form-control" name="admission_round" id="txtadmission_round{{ $student->stud_id }}" value="{{ $student->admission_round }}">
                                            <span class="text-danger mt-2">@error('admission_round') {{ $message }} @enderror</span>
                                        </div>
                    
                                        <div class="mb-3">
                                            <label for="txttfw{{ $student->stud_id }}" class="form-label">TFW</label>
                                            <select class="form-select" name="tfw" id="txttfw{{ $student->stud_id }}">
                                                <option value="0" {{ $student->tfw == '0' ? 'selected' : '' }}>No</option>
                                                <option value="1" {{ $student->tfw == '1' ? 'selected' : '' }}>Yes</option>
                                            </select>
                                            <span class="text-danger mt-2">@error('tfw') {{ $message }} @enderror</span>
                                        </div>
                    
                                        <div class="mb-3">
                                            <label for="txtphoto{{ $student->stud_id }}" class="form-label">Photo</label>
                                            <div>
                                                <img src="{{ url('/assets/admin/images/students/') }}/{{ $student->photo }}" alt="Photo" width="150">
                                            </div>
                                            <input type="file" class="form-control" id="txtphoto{{ $student->stud_id }}" name="photo">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
        @else
        <div class="p-5 m-5 text-center">
            <h1>No students</h1>
        </div>
        @endif
    <!-- Add Modal -->
   <!-- Add Student Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStudentModalLabel">Add New Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ url('/student/add') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="txtfname" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="fname" id="txtfname" required>
                    </div>
                    <div class="mb-3">
                        <label for="txtmname" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" name="mname" id="txtmname">
                    </div>
                    <div class="mb-3">
                        <label for="txtlname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lname" id="txtlname" required>
                    </div>
                    <div class="mb-3">
                        <label for="txtgender" class="form-label">Gender</label>
                        <select class="form-select" name="gender" id="txtgender" required>
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                            <option value="o">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="txtenroll" class="form-label">Enrollment Number</label>
                        <input type="text" class="form-control" name="enroll" id="txtenroll" required>
                    </div>
                    <div class="mb-3">
                        <label for="txtmobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" name="mobile" id="txtmobile" required>
                    </div>
                    <div class="mb-3">
                        <label for="txtaltmobile" class="form-label">Alternate Mobile</label>
                        <input type="text" class="form-control" name="alt_mobile" id="txtaltmobile">
                    </div>
                    <div class="mb-3">
                        <label for="txtwmobile" class="form-label">WhatsApp Mobile</label>
                        <input type="text" class="form-control" name="wmobile" id="txtwmobile">
                    </div>
                    <div class="mb-3">
                        <label for="txtemail" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="txtemail" required>
                    </div>
                    <div class="mb-3">
                        <label for="txtadmissionyear" class="form-label">Admission Year</label>
                        <input type="number" class="form-control" name="admission_year" id="txtadmissionyear" required>
                    </div>
                    <div class="mb-3">
                        <label for="txtaadhar" class="form-label">Aadhar Number</label>
                        <input type="text" class="form-control" name="aadhar" id="txtaadhar">
                    </div>
                    <div class="mb-3">
                        <label for="txtcaste" class="form-label">Caste Type</label>
                        <input type="text" class="form-control" name="caste_type" id="txtcaste">
                    </div>
                    <div class="mb-3">
                        <label for="txtabcid" class="form-label">ABC ID</label>
                        <input type="text" class="form-control" name="abc_id" id="txtabcid">
                    </div>
                    <div class="mb-3">
                        <label for="txtaddress" class="form-label">Address</label>
                        <textarea class="form-control" name="address" id="txtaddress" rows="2" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="txtgraduationstream" class="form-label">Graduation Stream</label>
                        <input type="text" class="form-control" name="graduation_stream" id="txtgraduationstream">
                    </div>
                    <div class="mb-3">
                        <label for="txtacpcrollno" class="form-label">ACPC Roll Number</label>
                        <input type="text" class="form-control" name="acpc_rollno" id="txtacpcrollno">
                    </div>
                    <div class="mb-3">
                        <label for="txtdob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" name="dob" id="txtdob" required>
                    </div>
                    <div class="mb-3">
                        <label for="txtvoterid" class="form-label">Voter ID</label>
                        <input type="text" class="form-control" name="voterid" id="txtvoterid">
                    </div>
                    <div class="mb-3">
                        <label for="txtcity" class="form-label">City</label>
                        <input type="text" class="form-control" name="city" id="txtcity" required>
                    </div>
                    <div class="mb-3">
                        <label for="txtdistrict" class="form-label">District</label>
                        <input type="text" class="form-control" name="district" id="txtdistrict" required>
                    </div>
                    <div class="mb-3">
                        <label for="txtstate" class="form-label">State</label>
                        <input type="text" class="form-control" name="state" id="txtstate" required>
                    </div>
                    <div class="mb-3">
                        <label for="txtpincode" class="form-label">Pincode</label>
                        <input type="text" class="form-control" name="pincode" id="txtpincode" required>
                    </div>
                    <div class="mb-3">
                        <label for="txtadmissioncat" class="form-label">Admission Category</label>
                        <input type="text" class="form-control" name="admission_cat" id="txtadmissioncat">
                    </div>
                    <div class="mb-3">
                        <label for="txtminority" class="form-label">Minority</label>
                        <select class="form-select" name="minority" id="txtminority">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="txtadmissionround" class="form-label">Admission Round</label>
                        <input type="text" class="form-control" name="admission_round" id="txtadmissionround">
                    </div>
                    <div class="mb-3">
                        <label for="txttfw" class="form-label">TFW</label>
                        <select class="form-select" name="tfw" id="txttfw">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="txtphoto" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="txtphoto" name="photo" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Student</button>
                </div>
            </form>
        </div>
    </div>
</div>


</div>

@endsection

