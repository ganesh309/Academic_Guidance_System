<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentees List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f0f2f5;
        }
        
        .container {
            max-width: 1400px;
            padding: 2rem;
        }

        /* Card Styles */
        .card-mentee {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .card-mentee:hover {
            transform: translateY(-5px) rotateX(5deg) rotateY(1deg);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        }

        /* Table Styles */
        .table-responsive {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .table {
            background: white;
            margin: 0;
        }

        .table thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .table-hover tbody tr {
            transition: all 0.3s ease;
        }

        .table-hover tbody tr:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Button Styles */
        .btn-assign {
            background: linear-gradient(135deg, #00b4d8, #0077b6);
            border: none;
            border-radius: 8px;
            padding: 8px 20px;
            transition: all 0.3s ease;
        }

        .btn-assign:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 180, 216, 0.3);
        }

        /* Modal Styles */
        .modal-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-bottom: none;
            border-radius: 15px 15px 0 0;
            padding: 1.5rem;
        }

        .modal-title {
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .modal-body {
            padding: 1.5rem;
            background: #f8f9fa;
        }

        .modal-footer {
            border-top: none;
            background: #fff;
            border-radius: 0 0 15px 15px;
            padding: 1rem 1.5rem;
        }

        .mentor-select {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .mentor-select:focus {
            border-color: #00b4d8;
            box-shadow: 0 0 0 3px rgba(0, 180, 216, 0.2);
        }

        .mentor-detail-table {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .mentor-detail-table td {
            padding: 12px 15px;
            border-color: #f1f3f5;
        }

        .assign-btn {
            background: linear-gradient(135deg, #00b4d8, #0077b6);
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .assign-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 180, 216, 0.3);
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .table-responsive {
                display: none;
            }
            
            .mobile-cards {
                display: block;
            }
            
            .modal-dialog {
                margin: 1rem;
            }
        }

        /* Animations */
        @keyframes modalEntry {
            from {
                transform: rotateX(-20deg) translateZ(100px);
                opacity: 0;
            }
            to {
                transform: rotateX(0) translateZ(0);
                opacity: 1;
            }
        }

        .modal-content {
            animation: modalEntry 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 15px;
        }
    </style>
</head>
@include('layouts.sidebar')
<body>

<div class="container mt-4" style="margin-left: 260px;">
    <h2 class="mb-4 fw-bold text-primary" data-aos="fade-down">Mentees List (SGPA < 6)</h2>

    <!-- Desktop Table -->
    <div class="table-responsive d-none d-md-block" data-aos="zoom-in">
        <table class="table table-hover">
            <thead class="text-white">
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
                <tr data-aos="fade-right">
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
    <div class="mobile-cards d-md-none">
        @forelse($students as $student)
        <div class="card-mentee mb-3" data-aos="fade-up">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title fw-bold">{{ $student->fname }} {{ $student->lname }}</h5>
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
                <button class="btn btn-assign w-100 mt-2 text-white" data-bs-toggle="modal" data-bs-target="#assignMentorModal{{ $student->id }}">
                    Assign Mentor
                </button>
            </div>
        </div>
        @empty
        <div class="text-center py-4">No mentees found with SGPA below 6.</div>
        @endforelse
    </div>
</div>

<!-- Modals -->
@foreach($students as $student)
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
                    <table class="mentor-detail-table w-100">
                        <tr>
                            <td class="text-muted">UID</td>
                            <td class="fw-medium">{{ $student->uid }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Name</td>
                            <td class="fw-medium">{{ $student->fname }} {{ $student->lname }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Current SGPA</td>
                            <td class="fw-medium text-danger">{{ $student->sgpa }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Select Mentor</td>
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
                    <table class="mentor-detail-table w-100">
                        <tr>
                            <td class="text-muted">Mentee Name</td>
                            <td class="fw-medium">{{ $student->fname }} {{ $student->lname }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">New Mentor</td>
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



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert -->

<script>
    AOS.init({
        duration: 800,
        once: true,
        easing: 'ease-in-out-quad'
    });

    @if(session('success'))
    Swal.fire({
        title: 'Success!',
        text: '{{ session("success") }}',
        icon: 'success',
        confirmButtonColor: '#0077b6',
        confirmButtonText: 'OK'
    });
    @endif

    @if($errors->has('mentor_id'))
        Swal.fire({
            title: 'Error!',
            text: '{{ $errors->first("mentor_id") }}',
            icon: 'error',
            confirmButtonColor: '#d33'
        });
@endif

</script>
</body>
</html>