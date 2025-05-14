<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<style>
    :root {
        --primary-gradient-start: #667eea;
        --primary-gradient-end: #764ba2;
        --accent-gradient-start: #00b4d8;
        --accent-gradient-end: #0077b6;
        --text-primary: #1F2937;
        --background-light: #f0f2f5;
        --shadow-soft: 0 4px 15px rgba(0, 0, 0, 0.1);
        --glass-bg: rgba(255, 255, 255, 0.95);
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: var(--background-light);
        min-height: 100vh;
        margin: 0;
        overflow-x: hidden;
        padding-top: 80px; /* Adjust for fixed top navbar */
        color: var(--text-primary);
    }

    .container {
        max-width: 95%;
        width: 100%;
        margin: 2rem auto;
        padding: 1.5rem;
        background: var(--glass-bg);
        border-radius: 20px;
        box-shadow: var(--shadow-soft);
        backdrop-filter: blur(10px);
        animation: fadeIn 0.8s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    h2 {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        font-size: 2.5rem;
        text-align: center;
        margin-bottom: 2rem;
        color: var(--text-primary);
        text-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        position: relative;
    }

    h2::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-gradient-start), var(--primary-gradient-end));
        border-radius: 2px;
    }

    /* Card Styles */
    .card-mentee {
        background: #ffffff;
        border: none;
        border-radius: 15px;
        box-shadow: var(--shadow-soft);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin-bottom: 1.5rem;
    }

    .card-mentee:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }

    .card-body {
        padding: 1.5rem;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
    }

    /* Table Styles */
    .table-responsive {
        border-radius: 15px;
        overflow-x: auto;
        box-shadow: var(--shadow-soft);
        background: #ffffff;
    }

    .table {
        margin: 0;
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table thead {
        background: linear-gradient(135deg, var(--primary-gradient-start), var(--primary-gradient-end));
        color: #ffffff;
    }

    .table th {
        padding: 1.2rem;
        background: lightsteelblue;
        text-align: center;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: none;
    }

    .table tbody tr {
        transition: all 0.3s ease;
    }

    .table tbody tr:hover {
        background: rgba(240, 242, 245, 0.8);
        transform: scale(1.01);
    }

    .table td {
        padding: 1rem;
        vertical-align: middle;
        text-align: center;
        border: 1px solid #e9ecef;
    }

    /* Button Styles */
    .btn-assign {
        background: linear-gradient(135deg, var(--accent-gradient-start), var(--accent-gradient-end));
        color: #ffffff;
        border: none;
        border-radius: 10px;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        text-transform: uppercase;
        transition: all 0.3s ease;
 measurement: 2025-05-14T12:00:00Z
    }

    .btn-assign:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0, 180, 216, 0.3);
    }

    .badge.bg-danger {
        background: #ef4444 !important;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
    }

    /* Modal Styles */
    .modal-content {
        border-radius: 20px;
        border: none;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        animation: modalEntry 0.4s ease-out;
    }

    @keyframes modalEntry {
        from { transform: translateY(50px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    .modal-header {
        background: linear-gradient(135deg, var(--primary-gradient-start), var(--primary-gradient-end));
        color: #ffffff;
        border-bottom: none;
        border-radius: 20px 20px 0 0;
        padding: 1.5rem;
    }

    .modal-title {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        font-size: 1.5rem;
    }

    .modal-body {
        padding: 2rem;
        background: #f8f9fa;
    }

    .modal-footer {
        border-top: none;
        background: #ffffff;
        border-radius: 0 0 20px 20px;
        padding: 1rem 1.5rem;
    }

    .modal-dialog {
        max-width: 800px; /* Increased modal width */
        width: 90%;
        margin: 1.75rem auto;
    }

    .mentor-select {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 0.75rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        width: 100%;
    }

    .mentor-select:focus {
        border-color: var(--accent-gradient-start);
        box-shadow: 0 0 0 3px rgba(0, 180, 216, 0.2);
        outline: none;
    }

    .mentor-detail-table {
        background: #ffffff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        width: 100%;
    }

    .mentor-detail-table td {
        padding: 1rem;
        border: 1px solid #f1f3f5;
        vertical-align: middle;
    }

    .mentor-detail-table td:first-child {
        color: #6b7280;
        font-weight: 500;
        width: 30%; /* Adjusted for wider modal */
    }

    .assign-btn {
        background: linear-gradient(135deg, var(--accent-gradient-start), var(--accent-gradient-end));
        color: #ffffff;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .assign-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0, 180, 216, 0.3);
    }

    /* Responsive Modal Styles */
    @media (max-width: 991px) {
        .modal-dialog {
            max-width: 90%;
            margin: 1rem auto;
        }

        .mentor-detail-table td:first-child {
            width: 40%;
        }
    }

    @media (max-width: 768px) {
        body {
            padding-top: 100px; /* Adjust for mobile navbar height */
        }

        .modal-dialog {
            max-width: 95%;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-title {
            font-size: 1.25rem;
        }

        .mentor-detail-table td {
            padding: 0.75rem;
            font-size: 0.9rem;
        }
    }

    @media (max-width: 576px) {
        .modal-dialog {
            max-width: 98%;
            margin: 0.5rem auto;
        }

        .modal-body {
            padding: 1rem;
        }

        .mentor-select {
            font-size: 0.9rem;
        }

        .assign-btn {
            padding: 0.6rem 1rem;
            font-size: 0.9rem;
        }
    }

    /* Other Responsive Styles */
    @media (min-width: 992px) {
        .mobile-cards {
            display: none;
        }
    }

    @media (max-width: 991px) {
        .table-responsive {
            display: none;
        }

        .mobile-cards {
            display: block;
        }

        .container {
            margin: 1.5rem auto;
            padding: 1rem;
        }

        h2 {
            font-size: 2rem;
        }

        .card-mentee {
            margin-bottom: 1rem;
        }
    }

    @media (max-width: 768px) {
        h2 {
            font-size: 1.75rem;
        }

        .card-body {
            padding: 1rem;
        }

        .btn-assign {
            padding: 0.6rem 1rem;
            font-size: 0.9rem;
        }
    }

    @media (max-width: 576px) {
        .container {
            margin: 1rem auto;
            padding: 0.75rem;
        }

        .card-title {
            font-size: 1.1rem;
        }

        .btn-assign {
            font-size: 0.85rem;
        }
    }

    /* Accessibility */
    .btn-assign:focus, .assign-btn:focus, .mentor-select:focus {
        outline: 2px solid var(--accent-gradient-start);
        outline-offset: 2px;
    }
</style>
<body>
    @include('layouts.sidebar') <!-- Assuming this is the top navbar -->

    <div class="container">
        <h2 data-aos="fade-down">Mentees List</h2>

        <!-- Desktop Table -->
        <div class="table-responsive d-none d-lg-block" data-aos="zoom-in">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Degree</th>
                        <th>School</th>
                        <th>SGPA</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                    <tr data-aos="fade-right" style="animation-delay: {{ $loop->index * 0.1 }}s;">
                        <td>{{ $loop->iteration }}</td>
                        <td class="fw-bold">{{ $student->fname }} {{ $student->lname }}</td>
                        <td>{{ $student->degree->name ?? 'N/A' }}</td>
                        <td>{{ $student->school->name ?? 'N/A' }}</td>
                        <td><span class="badge bg-danger">{{ $student->sgpa ?? 'N/A' }}</span></td>
                        <td>
                            @if($student->mentee)
                            <button class="btn btn-assign text-white me-2"
                                    data-bs-toggle="modal"
                                    data-bs-target="#changeMentorModal{{ $student->id }}">
                                Change Mentor
                            </button>
                            @else
                            <button class="btn btn-assign text-white me-2"
                                    data-bs-toggle="modal"
                                    data-bs-target="#assignMentorModal{{ $student->id }}">
                                Assign Mentor
                            </button>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">No mentees found with SGPA below 6.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Mobile Cards -->
        <div class="mobile-cards d-lg-none">
            @forelse($students as $student)
            <div class="card-mentee" data-aos="fade-up" style="animation-delay: {{ $loop->index * 0.1 }}s;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title">{{ $student->fname }} {{ $student->lname }}</h5>
                        <span class="badge bg-danger">{{ $student->sgpa }}</span>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p class="text-muted mb-1">Degree</p>
                            <p class="fw-medium">{{ $student->degree->name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-6">
                            <p class="text-muted mb-1">School</p>
                            <p class="fw-medium">{{ $student->school->name ?? 'N/A' }}</p>
                        </div>
                    </div>
                    @if($student->mentee)
                    <button class="btn btn-assign w-100 mt-2 text-white"
                            data-bs-toggle="modal"
                            data-bs-target="#changeMentorModal{{ $student->id }}">
                        Change Mentor
                    </button>
                    @else
                    <button class="btn btn-assign w-100 mt-2 text-white"
                            data-bs-toggle="modal"
                            data-bs-target="#assignMentorModal{{ $student->id }}">
                        Assign Mentor
                    </button>
                    @endif
                </div>
            </div>
            @empty
            <div class="text-center py-4">No mentees found with SGPA below 6.</div>
            @endforelse
        </div>
    </div>

    <!-- Modals -->
    @foreach($students as $student)
    <!-- Assign Mentor Modal -->
    <div class="modal fade" id="assignMentorModal{{ $student->id }}" tabindex="-1" aria-labelledby="assignMentorLabel{{ $student->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('assign.mentor') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Assign Mentor to {{ $student->fname }} {{ $student->lname }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="mentor-detail-table">
                            <tr>
                                <td>UID</td>
                                <td class="fw-medium">{{ $student->uid }}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td class="fw-medium">{{ $student->fname }} {{ $student->lname }}</td>
                            </tr>
                            <tr>
                                <td>Current SGPA</td>
                                <td class="fw-medium text-danger">{{ $student->sgpa }}</td>
                            </tr>
                            <tr>
                                <td>Select Mentor</td>
                                <td>
                                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                                    <select name="mentor_id" class="form-select mentor-select" required>
                                        <option value="">Choose Mentor</option>
                                        @foreach($faculties->where('school_id', $student->school_id) as $faculty)
                                        <option value="{{ $faculty->id }}">{{ $faculty->fname }} {{ $faculty->lname }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn assign-btn text-white">Assign Mentor</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Change Mentor Modal -->
    <div class="modal fade" id="changeMentorModal{{ $student->id }}" tabindex="-1" aria-labelledby="changeMentorLabel{{ $student->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('assign.mentor') }}" method="POST">
                @csrf
                <input type="hidden" name="student_id" value="{{ $student->id }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Change Mentor for {{ $student->fname }} {{ $student->lname }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="mentor-detail-table">
                            <tr>
                                <td>Mentee Name</td>
                                <td class="fw-medium">{{ $student->fname }} {{ $student->lname }}</td>
                            </tr>
                            <tr>
                                <td>New Mentor</td>
                                <td>
                                    <select name="mentor_id" class="form-select mentor-select" required>
                                        <option value="">Select Mentor</option>
                                        @foreach($faculties->where('school_id', $student->school_id) as $faculty)
                                        <option value="{{ $faculty->id }}"
                                                {{ optional(optional($student->mentee)->mentor)->faculty_id == $faculty->id ? 'selected' : '' }}>
                                            {{ $faculty->fname }} {{ $faculty->lname }}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn assign-btn text-white">Update Mentor</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endforeach

    @include('layouts.footer')
</body>
</html>