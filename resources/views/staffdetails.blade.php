@extends('layouts.main')

@section('main-section')

<style>
    /* Layout Styling */
    .staff-details-container {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 30px;
    }

    .staff-info {
        flex: 0 0 25%;
        max-width: 25%;
        padding: 20px;
        text-align: center;
        background: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .staff-info img {
        width: 90%;
        height: auto;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    .staff-info .staff-name {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .staff-info .staff-designation {
        font-size: 18px;
        color: #777;
        margin-bottom: 15px;
    }

    .staff-info .staff-contact {
        font-size: 14px;
        color: #555;
        margin-bottom: 5px;
    }

    .staff-tabs {
        flex: 0 0 75%;
        max-width: 75%;
        padding-left: 20px;
    }

    .nav-tabs {
        border-bottom: 2px solid #2d3e50;
        margin-bottom: 20px;
    }

    .nav-tabs>li>a {
        color: #2d3e50;
        font-weight: bold;
        padding: 10px 20px;
        border-radius: 4px 4px 0 0;
    }

    .nav-tabs>li.active>a{
        background-color: #2d3e50 !important;
        color: #fff !important;
    }
    .nav-tabs>li>a:hover {
        background-color: #576473;
        color: #fff;
    }

    /* Tab Content Styling */
    .tab-content table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .tab-content th,
    .tab-content td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: left;
    }

    .no-data-note {
        color: #777;
        font-style: italic;
    }

    th {
        background-color: #f9f9f9;
        font-weight: bold;
    }

    @media (max-width: 768px) {
        .staff-info {
            flex: 0 0 100%;
            /* Full width for mobile */
            max-width: 100%;
            margin: 5px 0;
            /* Adjust margin for mobile */
        }

        .staff-tabs {
            flex: 0 0 100%;
            /* Full width for mobile */
            max-width: 100%;
            padding-left: 0;
            /* Remove left padding */
        }

        .nav-tabs {
            font-size: 14px;
            /* Smaller tab font size for mobile */
        }

        .nav-tabs>li>a {
            padding: 8px 10px;
            /* Smaller tab padding for mobile */
        }

        .tab-content table {
            font-size: 12px;
            /* Smaller table font size for mobile */
        }

        .tab-content th,
        .tab-content td {
            padding: 8px;
            /* Smaller padding for table cells on mobile */
        }
    }
</style>

<div class="staff-details-container">
    <!-- Staff Information Section -->
    <div class="staff-info">
        <img src="{{ asset('assets/admin/images/admins/' . $staffdata->photo) }}" alt="staff photo">
        <div class="staff-name">{{ $staffdata->name }}</div>
        <div class="staff-designation">{{ $staffdata->designation }}</div>
        <div class="staff-contact">Email: {{ $staffdata->email }}</div>
        <div class="staff-contact">Phone: {{ $staffdata->phone }}</div>
        <div class="staff-contact">Experience: {{ $staffdata->exp_year }} years</div>
    </div>

    <!-- Tabs Section -->
    <div class="staff-tabs">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#education">Education</a></li>
            <li><a data-toggle="tab" href="#experience">Experience</a></li>
            <li><a data-toggle="tab" href="#expert-lectures">Expert Lectures</a></li>
            <li><a data-toggle="tab" href="#training">Training</a></li>
            <li><a data-toggle="tab" href="#staff-background">Staff Background</a></li>
        </ul>

        <div class="tab-content">
            <!-- Education Tab -->
            <div id="education" class="tab-pane fade in active">
                @if ($educations->isEmpty())
                <p class="no-data-note">No data Updated</p>
                @else
                <table>
                    <thead>
                        <tr>
                            <th>Degree</th>
                            <th>University</th>
                            <th>Percentage / CGPA</th>
                            <th>Year of Passing</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($educations as $education)
                        <tr>
                            <td>{{ $education->degree }}</td>
                            <td>{{ $education->university }}</td>
                            <td>{{ $education->percentage ? $education->percentage . '%' : $education->cgpa }}</td>
                            <td>{{ $education->passyear }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>

            <!-- Experience Tab -->
            <div id="experience" class="tab-pane fade">
                @if ($experience->isEmpty())
                <p class="no-data-note">No data Updated</p>
                @else
                <table>
                    <thead>
                        <tr>
                            <th>Designation</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Organization</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($experience as $exp)
                        <tr>
                            <td>{{ $exp->designation }}</td>
                            <td>{{ $exp->from }}</td>
                            <td>{{ $exp->to }}</td>
                            <td>{{ $exp->organization }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>

            <!-- Expert Lectures Tab -->
            <div id="expert-lectures" class="tab-pane fade">
                @if ($expertLectures->isEmpty())
                <p class="no-data-note">No data Updated</p>
                @else
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Details</th>
                            <th>Location</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($expertLectures as $lecture)
                        <tr>
                            <td>{{ $lecture->title }}</td>
                            <td>{{ $lecture->details }}</td>
                            <td>{{ $lecture->location }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>

            <!-- Training Tab -->
            <div id="training" class="tab-pane fade">
                @if ($trainings->isEmpty())
                <p class="no-data-note">No data Updated</p>
                @else
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Organizer</th>
                            <th>Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trainings as $training)
                        <tr>
                            <td>{{ $training->title }}</td>
                            <td>{{ $training->organizer }}</td>
                            <td>{{ $training->duration }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>

            <!-- Staff Background Tab -->
            <div id="staff-background" class="tab-pane fade">
                <select id="background-type" class="form-control" style="width: 200px; margin-bottom: 20px;">
                    <option value="" selected>Select Background Type</option>
                    @php
                        $uniqueTypes = $backgrounds->unique('type');
                    @endphp
                    @foreach ($uniqueTypes as $background)
                        <option value="{{ $background->type }}">{{ ucfirst($background->type) }}</option>
                    @endforeach
                </select>

                <div id="background-content">
                    <p class="no-data-note" style="display: none;">No data Updated</p>
                    <p id="no-type-selected" style="color: red;">No type is selected</p>
                    <table class="table table-bordered" style="display: none;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    const backgrounds = @json($backgrounds);

    document.getElementById('background-type').addEventListener('change', function() {
        const selectedType = this.value;
        const backgroundContent = document.getElementById('background-content');
        const table = backgroundContent.querySelector('table');
        const tbody = table.querySelector('tbody');
        tbody.innerHTML = ''; // Clear previous data

        // Show no type selected message if the default option is selected
        const noTypeSelectedMessage = document.getElementById('no-type-selected');

        if (selectedType) {
            let hasData = false;

            // Loop through backgrounds to find matching type
            backgrounds.forEach(background => {
                if (background.type === selectedType && background.status == 1) {
                    hasData = true;
                    tbody.innerHTML += `
                        <tr>
                            <td>${background.name}</td>
                            <td>${background.details}</td>
                        </tr>
                    `;
                }
            });

            if (hasData) {
                noTypeSelectedMessage.style.display = 'none';
                backgroundContent.querySelector('.no-data-note').style.display = 'none';
                table.style.display = 'table';
            } else {
                noTypeSelectedMessage.style.display = 'none';
                backgroundContent.querySelector('.no-data-note').style.display = 'block';
                table.style.display = 'none';
            }
        } else {
            noTypeSelectedMessage.style.display = 'block'; // Show message when default is selected
            backgroundContent.querySelector('.no-data-note').style.display = 'none';
            table.style.display = 'none';
        }
    });
</script>

@endsection