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
        padding-top: 80px;
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
        cursor: pointer;
        text-decoration: underline;
    }

    .card-title:hover {
        color: var(--accent-gradient-start);
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

    .student-name {
        cursor: pointer;
        color: var(--primary-gradient-start);
        text-decoration: underline;
    }

    .student-name:hover {
        color: var(--accent-gradient-start);
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
        display: flex;
        gap: 2rem;
    }

    .modal-footer {
        border-top: none;
        background: #ffffff;
        border-radius: 0 0 20px 20px;
        padding: 1rem 1.5rem;
    }

    .modal-xl {
        max-width: 90%;
        width: 1200px;
    }

    .modal {
        z-index: 1055;
    }

    .modal-backdrop {
        --bs-backdrop-zindex: 0;
        position: unset;
    }

    .student-info {
        text-align: center;
        padding-right: 1.5rem;
        max-width: 200px;
    }

    .student-info img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 1rem;
    }

    .student-info p {
        margin: 0.5rem 0;
        font-size: 0.9rem;
        color: var(--text-primary);
    }

    .student-info p strong {
        color: var(--primary-gradient-start);
    }

    .attendance-chart-container {
        flex: 1;
    }

    #attendanceChart {
        width: 100%;
        height: 400px;
        margin: 0 auto;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        position: relative;
        z-index: 1060;
    }

    .highcharts-background {
        fill: #F9FAFB;
    }

    .highcharts-container {
        font-family: 'Poppins', sans-serif !important;
    }

    .highcharts-title {
        font-family: 'Playfair Display', serif !important;
        font-weight: 700 !important;
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
        width: 30%;
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

    /* Chart-Specific Styles from students_index.blade.php */
    .btn {
        background: var(--primary-gradient-start);
        color: white;
        margin-top: 10px;
        border-radius: 5px;
        text-transform: uppercase;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .btn:hover {
        background: var(--accent-gradient-start);
        transform: scale(1.05);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-secondary {
        background: #6B7280;
    }

    .btn-secondary:hover {
        background: #4B5563;
        transform: scale(1.05);
    }

    /* Responsive Modal Styles */
    @media (max-width: 992px) {
        .modal-body {
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }

        .student-info {
            padding-right: 0;
            margin-bottom: 1.5rem;
            max-width: 100%;
        }

        .modal-xl {
            width: 95%;
        }
    }

    @media (max-width: 768px) {
        body {
            padding-top: 100px;
        }

        .modal-xl {
            width: 98%;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-title {
            font-size: 1.25rem;
        }

        #attendanceChart {
            height: 300px;
        }
    }

    @media (max-width: 576px) {
        .modal-xl {
            width: 100%;
            max-width: 100%;
        }

        .modal-body {
            padding: 1rem;
        }

        .student-info img {
            width: 120px;
            height: 120px;
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
    .btn-assign:focus, .assign-btn:focus, .mentor-select:focus, .student-name:focus, .card-title:focus {
        outline: 2px solid var(--accent-gradient-start);
        outline-offset: 2px;
    }
</style>
<body>
    @include('layouts.sidebar')

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
                        <td>
                            <a href="#" class="student-name" data-id="{{ $student->id }}">{{ $student->fname }} {{ $student->lname }}</a>
                        </td>
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
                        <h5 class="card-title" data-id="{{ $student->id }}">{{ $student->fname }} {{ $student->lname }}</h5>
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

        <!-- Attendance Modal -->
        <div class="modal fade" id="attendanceModal" tabindex="-1" aria-labelledby="attendanceModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="attendanceModalLabel">Student Attendance</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="student-info">
                            <img id="studentImage" src="" alt="Student Image" style="display: none;">
                            <p><strong>UID:</strong> <span id="studentUid"></span></p>
                            <p><strong>Degree:</strong> <span id="studentDegree"></span></p>
                            <p><strong>Semester:</strong> <span id="studentSemester"></span></p>
                            <p><strong>Batch:</strong> <span id="studentBatch"></span></p>
                        </div>
                        <div class="attendance-chart-container">
                            <div id="attendanceChart" style="height: 400px;"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
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

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const attendanceModal = new bootstrap.Modal(document.getElementById('attendanceModal'));
            let chart = null;

            // Handle clicks on student names (table) and card titles (mobile)
            document.querySelectorAll('.student-name, .card-title').forEach(function(element) {
                element.addEventListener('click', function(e) {
                    e.preventDefault();
                    const studentId = this.dataset.id;

                    fetch(`{{ url('/students') }}/${studentId}/attendance-chart`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(`HTTP error! Status: ${response.status}`);
                            }
                            return response.json();
                        })
                        .then(data => {
                            // Update student image and details
                            const studentImage = document.getElementById('studentImage');
                            const studentUid = document.getElementById('studentUid');
                            const studentDegree = document.getElementById('studentDegree');
                            const studentSemester = document.getElementById('studentSemester');
                            const studentBatch = document.getElementById('studentBatch');

                            // Set image source
                            if (data.student && data.student.image_filename) {
                                studentImage.src = `{{ asset('studentImages') }}/${data.student.image_filename}`;
                                studentImage.style.display = 'block';
                            } else if (data.student && data.student.uid) {
                                studentImage.src = `{{ asset('studentImages') }}/${data.student.uid}.jpg`;
                                studentImage.onerror = () => {
                                    studentImage.src = `{{ asset('studentImages') }}/${data.student.uid}.png`;
                                    studentImage.onerror = () => {
                                        studentImage.src = '';
                                        studentImage.style.display = 'none';
                                    };
                                };
                                studentImage.style.display = 'block';
                            } else {
                                studentImage.src = '';
                                studentImage.style.display = 'none';
                            }

                            // Set student details
                            studentUid.textContent = data.student?.uid ?? 'N/A';
                            studentDegree.textContent = data.student?.degree?.name ?? 'N/A';
                            studentSemester.textContent = data.student?.semester?.name ?? 'N/A';
                            studentBatch.textContent = data.student?.batch?.name ?? 'N/A';

                            // Destroy previous chart if exists
                            if (chart) {
                                chart.destroy();
                            }

                            // Prepare monthly data for total classes and attendance
                            const monthlyTotalClasses = data.monthly.map(item => ({
                                name: item.name,
                                y: item.total_classes
                            }));

                            const monthlyAttendance = data.monthly.map(item => ({
                                name: item.name,
                                y: item.y,
                                drilldown: item.drilldown
                            }));

                            // Prepare drilldown data for subjects
                            const drilldownSeries = data.drilldown.map(drill => ({
                                id: drill.id,
                                name: drill.name,
                                data: drill.data.map(item => [
                                    item.subject,
                                    item.total_classes,
                                    item.attendance
                                ])
                            }));

                            // Create new chart
                            chart = Highcharts.chart('attendanceChart', {
                                chart: {
                                    type: 'column',
                                    backgroundColor: '#F9FAFB',
                                    borderRadius: 10,
                                    height: 400,
                                    animation: {
                                        duration: 1000,
                                        easing: 'easeOutBounce'
                                    }
                                },
                                colors: ['#6B7280', '#3B82F6', '#EF4444'],
                                title: {
                                    text: 'Monthly Attendance Overview',
                                    style: {
                                        fontFamily: 'Playfair Display, serif',
                                        fontWeight: 'bold',
                                        fontSize: '20px',
                                        color: '#1F2937'
                                    }
                                },
                                subtitle: {
                                    text: 'Click an attendance column to view subject-wise details',
                                    style: {
                                        fontFamily: 'Poppins, sans-serif',
                                        color: '#6B7280',
                                        fontSize: '12px'
                                    }
                                },
                                xAxis: {
                                    type: 'category',
                                    labels: {
                                        style: {
                                            fontFamily: 'Poppins, sans-serif',
                                            fontSize: '11px',
                                            color: '#1F2937'
                                        }
                                    },
                                    lineColor: '#E5E7EB',
                                    tickColor: '#E5E7EB'
                                },
                                yAxis: {
                                    title: {
                                        text: 'Number of Classes',
                                        style: {
                                            fontFamily: 'Poppins, sans-serif',
                                            fontSize: '12px',
                                            color: '#1F2937'
                                        }
                                    },
                                    labels: {
                                        style: {
                                            fontFamily: 'Poppins, sans-serif',
                                            fontSize: '11px',
                                            color: '#1F2937'
                                        }
                                    },
                                    gridLineColor: '#E5E7EB',
                                    gridLineDashStyle: 'Dash'
                                },
                                legend: {
                                    enabled: true,
                                    align: 'center',
                                    verticalAlign: 'bottom',
                                    itemStyle: {
                                        fontFamily: 'Poppins, sans-serif',
                                        fontSize: '12px'
                                    }
                                },
                                plotOptions: {
                                    column: {
                                        borderRadius: 8,
                                        borderWidth: 0,
                                        pointPadding: 0.05,
                                        groupPadding: 0.1,
                                        dataLabels: {
                                            enabled: true,
                                            format: '{point.y}',
                                            style: {
                                                fontFamily: 'Poppins, sans-serif',
                                                fontSize: '11px',
                                                fontWeight: 'bold',
                                                color: '#FFFFFF',
                                                textOutline: '1px contrast'
                                            },
                                            backgroundColor: 'rgba(0, 0, 0, 0.7)',
                                            borderRadius: 5,
                                            padding: 5
                                        },
                                        animation: {
                                            duration: 800
                                        }
                                    }
                                },
                                tooltip: {
                                    backgroundColor: '#FFFFFF',
                                    borderRadius: 10,
                                    borderWidth: 0,
                                    shadow: true,
                                    padding: 10,
                                    style: {
                                        fontFamily: 'Poppins, sans-serif',
                                        fontSize: '12px',
                                        color: '#1F2937'
                                    },
                                    pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> {series.name.toLowerCase()}<br/>'
                                },
                                series: [
                                    {
                                        name: 'Total Classes',
                                        data: monthlyTotalClasses,
                                        color: '#6B7280'
                                    },
                                    {
                                        name: 'Attendance',
                                        data: monthlyAttendance,
                                        color: '#3B82F6'
                                    }
                                ],
                                drilldown: {
                                    animation: {
                                        duration: 500
                                    },
                                    activeAxisLabelStyle: {
                                        fontFamily: 'Poppins, sans-serif',
                                        textDecoration: 'none',
                                        fontStyle: 'italic',
                                        color: '#1F2937'
                                    },
                                    activeDataLabelStyle: {
                                        fontFamily: 'Poppins, sans-serif',
                                        textDecoration: 'none',
                                        color: '#1F2937'
                                    },
                                    series: drilldownSeries.map(drill => ({
                                        id: drill.id,
                                        name: drill.name,
                                        type: 'column',
                                        data: drill.data.map(item => ({
                                            name: item[0],
                                            y: item[1], // Total classes
                                            custom: { attendance: item[2] } // Store attendance
                                        })),
                                        additionalSeries: [{
                                            name: 'Attendance',
                                            data: drill.data.map(item => ({
                                                name: item[0],
                                                y: item[2] // Attendance
                                            })),
                                            color: '#3B82F6'
                                        }]
                                    }))
                                },
                                events: {
                                    drilldown: function(e) {
                                        const chart = this;
                                        const drilldownSeries = e.seriesOptions;
                                        if (drilldownSeries.additionalSeries) {
                                            setTimeout(() => {
                                                drilldownSeries.additionalSeries.forEach(series => {
                                                    chart.addSeries(series, false);
                                                });
                                                chart.redraw();
                                            }, 0);
                                        }
                                    }
                                }
                            });

                            // Show modal
                            attendanceModal.show();
                        })
                        .catch(error => {
                            console.error('Error fetching attendance data:', error);
                            alert('Failed to load attendance data. Please try again.');
                        });
                });
            });

            // Reset chart and student info when modal is closed
            document.getElementById('attendanceModal').addEventListener('hidden.bs.modal', function () {
                if (chart) {
                    chart.destroy();
                    chart = null;
                }
                document.getElementById('studentImage').src = '';
                document.getElementById('studentImage').style.display = 'none';
                document.getElementById('studentUid').textContent = '';
                document.getElementById('studentDegree').textContent = '';
                document.getElementById('studentSemester').textContent = '';
                document.getElementById('studentBatch').textContent = '';
            });
        });
    </script>
    @include('layouts.footer')
</body>
</html>