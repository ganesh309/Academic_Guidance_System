<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<style>
    :root {
        --primary-accent: #1E3A8A;
        --secondary-accent: #B91C1C;
        --text-primary: #1F2937;
        --background-light: #F5F5F4;
        --gold-accent: #D4AF37;
        --shadow-soft: 0 4px 15px rgba(0, 0, 0, 0.1);
        --glass-bg: rgba(255, 255, 255, 0.9);
    }

    body {
        background: #87CEEB;
        font-family: 'Poppins', sans-serif;
        min-height: 100vh;
        overflow-x: hidden;
        color: var(--text-primary);
        position: relative;
        margin: 0;
        padding-top: 80px; /* Adjust for fixed top navbar */
    }

    .nature-bg {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('https://www.transparenttextures.com/patterns/leaf.png') repeat;
        background-size: 200px 200px;
        animation: natureShift 30s linear infinite;
        opacity: 0.3;
        z-index: -2;
    }

    @keyframes natureShift {
        0% { background-position: 0 0; }
        100% { background-position: 200px 200px; }
    }

    .leaves-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        pointer-events: none;
    }

    .leaf {
        position: absolute;
        width: 30px;
        height: 30px;
        background: url('https://www.pngall.com/wp-content/uploads/2016/05/Leaf-PNG-File.png') no-repeat center;
        background-size: contain;
        opacity: 0.7;
        animation: fall linear infinite;
    }

    @keyframes fall {
        0% {
            opacity: 0;
            transform: translateY(-100vh) rotate(0deg);
        }
        20% {
            opacity: 0.8;
        }
        100% {
            opacity: 0.2;
            transform: translateY(100vh) rotate(360deg);
        }
    }

    .container {
        margin: 2rem auto;
        padding: 2rem;
        background: var(--glass-bg);
        border-radius: 20px;
        box-shadow: var(--shadow-soft);
        backdrop-filter: blur(10px);
        animation: fadeIn 1s ease-out;
        max-width: 95%;
        width: 100%;
        position: relative;
        z-index: 1;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    h2 {
        color: var(--text-primary);
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        font-size: 2.5rem;
        text-align: center;
        position: relative;
        text-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h2::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-accent), var(--secondary-accent));
        border-radius: 2px;
    }

    .table-responsive {
        overflow-x: auto;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    .table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin-bottom: 0;
        animation: tableSlide 0.8s ease-out;
    }

    @keyframes tableSlide {
        from { opacity: 0; transform: translateX(-20px); }
        to { opacity: 1; transform: translateX(0); }
    }

    .table-dark {
        background: linear-gradient(45deg, var(--primary-accent), var(--secondary-accent));
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table-dark th {
        padding: 1.2rem;
        border: none;
        position: relative;
        transition: all 0.3s ease;
        text-align: center;
        white-space: nowrap;
    }

    .table-dark th:hover {
        background: rgba(255, 255, 255, 0.1);
        transform: scale(1.02);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        cursor: pointer;
    }

    tbody tr {
        background: linear-gradient(90deg, rgba(255, 255, 255, 0.8), rgba(240, 240, 240, 0.8));
        transition: all 0.3s ease;
        animation: rowHighlight 0.6s ease-out forwards;
    }

    td {
        padding: 1rem;
        color: var(--text-primary);
        font-weight: 400;
        border: 1px solid #E5E7EB; /* Ensure both row and column borders */
        vertical-align: middle;
        text-align: center;
    }

    td:first-child {
        font-weight: 600;
        color: var(--primary-accent);
    }

    .btn {
        background: var(--primary-accent);
        color: white;
        margin-top: 10px;
        border-radius: 5px;
        text-transform: uppercase;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .btn:hover {
        background: var(--secondary-accent);
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

    .badge {
        display: inline-block;
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
        font-weight: 600;
        text-transform: uppercase;
        border-radius: 12px;
        background: var(--gold-accent);
        color: white;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .badge:hover {
        background: var(--secondary-accent);
        color: white;
    }

    .student-name {
        cursor: pointer;
        color: var(--primary-accent);
        text-decoration: underline;
    }

    .student-name:hover {
        color: var(--secondary-accent);
    }

    .modal-content {
        border-radius: 15px;
        border: none;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .modal-header {
        background: linear-gradient(45deg, var(--primary-accent), var(--secondary-accent));
        color: white;
        border-radius: 15px 15px 0 0;
        border-bottom: none;
    }

    .modal-title {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
    }

    .btn-close {
        filter: invert(1);
    }

    #attendanceChart {
        width: 100%;
        height: 400px;
        margin: 0 auto;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
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

    .modal {
        z-index: 1055;
    }

    .modal-backdrop {
        --bs-backdrop-zindex: 0;
    }

    #attendanceChart {
        position: relative;
        z-index: 1060;
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
        color: var(--primary-accent);
    }

    .attendance-chart-container {
        flex: 1;
    }

    .modal-body {
        display: flex;
        gap: 2rem;
        padding: 2rem;
    }

    .modal-xl {
        max-width: 90%;
        width: 1200px;
    }

    .search-container {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .universal-search {
        flex: 1;
        max-width: 400px;
        order: 2;
    }

    .per-page-select {
        flex: 0 0 auto;
        width: 150px;
        order: 1;
    }

    .pagination-container {
        display: flex;
        justify-content: center;
        margin-top: 1.5rem;
    }

    .accordion-button {
        background: #4174b0bd;
        color: white;
        font-weight: 600;
        border-radius: 8px;
        border: none;
        box-shadow: none; 
    }

    .accordion-button:not(.collapsed) {
        background: #575757;
        color: white;
        border: none;
        box-shadow: none;
    }

    .accordion-button::after {
        filter: invert(1); 
    }

    .accordion-item {
        border: none; 
    }

    .accordion-body {
        background: #F9FAFB;
        border-radius: 8px;
        padding: 1.5rem;
    }

    .table-buttons {
        text-align: center;
        margin-bottom: 1rem;
    }
    .row{
        flex-wrap: wrap;
        align-content: flex-end;
        justify-content: space-between;


    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .container {
            margin: 1.5rem auto;
            padding: 1.5rem;
        }

        .modal-xl {
            width: 95%;
        }

        .table-dark th, td {
            padding: 0.8rem;
            font-size: 0.9rem;
        }
    }

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
            width: 98%;
        }

        .search-container {
            flex-direction: column;
            align-items: stretch;
        }

        .universal-search {
            max-width: 100%;
            order: 2;
        }

        .per-page-select {
            width: 100%;
            order: 1;
        }

        .row.g-3 {
            flex-direction: column;
        }

        .col-md-2 {
            width: 100%;
        }
    }

    @media (max-width: 768px) {
        body {
            padding-top: 100px; /* Adjust for mobile navbar height */
        }

        h2 {
            font-size: 2rem;
        }

        .container {
            margin: 1rem auto;
            padding: 1rem;
        }

        .table-dark th, td {
            padding: 0.6rem;
            font-size: 0.85rem;
        }

        #attendanceChart {
            height: 300px;
        }

        .modal-xl {
            width: 100%;
            max-width: 100%;
        }

        .accordion-body {
            padding: 1rem;
        }
    }

    @media (max-width: 576px) {
        h2 {
            font-size: 1.75rem;
        }

        .table-dark th, td {
            padding: 0.5rem;
            font-size: 0.8rem;
        }

        .btnARE {
            padding: 0.6rem 1rem;
            font-size: 0.9rem;
        }

        .btn {
            padding: 0.6rem 1rem;
            font-size: 0.9rem;
        }

        .student-info img {
            width: 120px;
            height: 120px;
        }

        .universal-search {
            width: 100%;
        }
    }

    /* Accessibility */
    .btn:focus, .student-name:focus, .accordion-button:focus, .form-select:focus {
        outline: 2px solid var(--secondary-accent);
        outline-offset: 2px;
    }
</style>
<body>
    @include('layouts.sidebar') <!-- Assuming this is the top navbar -->
    <div class="nature-bg"></div>
    <div class="leaves-container" id="leaves-container"></div>
    <div class="text-center">
        <h2>Student List</h2>
    </div>

    <div class="container">
        <form method="GET" action="{{ route('students.index') }}" class="mb-4">
            <div class="search-container">
                <div class="per-page-select">
                    <select name="per_page" class="form-select">
                        @foreach([5, 10, 25, 50, 100] as $perPageOption)
                            <option value="{{ $perPageOption }}" {{ request('per_page', 5) == $perPageOption ? 'selected' : '' }}>{{ $perPageOption }} per page</option>
                        @endforeach
                    </select>
                </div>
                <div class="universal-search">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search by Name, UID, Email, etc.">
                </div>
            </div>

            <div class="accordion" id="advancedFilters">
                <div class="accordion-item">
                    <h1 class="accordion-header">
                        <button class="accordion-button collapsed" style="padding: 10px;" type="button" data-bs-toggle="collapse" data-bs-target="#advancedFilterCollapse" aria-expanded="false" aria-controls="advancedFilterCollapse">
                            Advanced Filters
                        </button>
                    </h1>
                    <div id="advancedFilterCollapse" class="accordion-collapse collapse" data-bs-parent="#advancedFilters">
                        <div class="accordion-body">
                            <div class="row g-3">
                                <div class="col-md-2">
                                    <select name="gender" class="form-select">
                                        <option value="">All Genders</option>
                                        @foreach($genders as $gender)
                                            <option value="{{ $gender->id }}" {{ request('gender') == $gender->id ? 'selected' : '' }}>{{ $gender->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select name="batch" class="form-select">
                                        <option value="">All Batches</option>
                                        @foreach($batches as $batch)
                                            <option value="{{ $batch->id }}" {{ request('batch') == $batch->id ? 'selected' : '' }}>{{ $batch->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select name="semester" class="form-select">
                                        <option value="">All Semesters</option>
                                        @foreach($semesters as $semester)
                                            <option value="{{ $semester->id }}" {{ request('semester') == $semester->id ? 'selected' : '' }}>{{ $semester->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select name="school" class="form-select">
                                        <option value="">All Schools</option>
                                        @foreach($schools as $school)
                                            <option value="{{ $school->id }}" {{ request('school') == $school->id ? 'selected' : '' }}>{{ $school->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select name="degree" class="form-select">
                                        <option value="">All Degrees</option>
                                        @foreach($degrees as $degree)
                                            <option value="{{ $degree->id }}" {{ request('degree') == $degree->id ? 'selected' : '' }}>{{ $degree->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-buttons">
                <button type="submit" class="btn btn-primary me-2">Search</button>
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Reset</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Registration No</th>
                            <th>Name</th>
                            <th>UID</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Batch</th>
                            <th>Semester</th>
                            <th>SGPA</th>
                            <th>Gender</th>
                            <th>School</th>
                            <th>Degree</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr style="animation-delay: {{ $loop->index * 0.1 }}s;">
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->registration_no }}</td>
                                <td>
                                    <a href="#" class="student-name" data-id="{{ $student->id }}">{{ $student->fname }} {{ $student->lname }}</a>
                                </td>
                                <td>{{ $student->uid }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->mobile }}</td>
                                <td>{{ optional($student->batch)->name ?? 'N/A' }}</td>
                                <td>{{ optional($student->semester)->name ?? 'N/A' }}</td>
                                <td>{{ $student->sgpa ?? 'N/A' }}</td>
                                <td>{{ optional($student->gender)->name ?? 'N/A' }}</td>
                                <td>{{ optional($student->school)->name ?? 'N/A' }}</td>
                                <td>{{ optional($student->degree)->name ?? 'N/A' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-container">
                {!! $students->appends(request()->query())->links('pagination::bootstrap-5') !!}
            </div>
        </form>

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


    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script>
        // Floating leaf animation
        document.addEventListener('DOMContentLoaded', function() {
            const leavesContainer = document.getElementById('leaves-container');
            const leafCount = 20; // Reduced for performance on mobile

            for (let i = 0; i < leafCount; i++) {
                createLeaf();
            }

            function createLeaf() {
                const leaf = document.createElement('div');
                leaf.className = 'leaf';

                const startX = Math.random() * window.innerWidth;
                const duration = Math.random() * 8 + 4;
                const delay = Math.random() * 5;
                const size = Math.random() * 15 + 8;

                leaf.style.left = `${startX}px`;
                leaf.style.animationDuration = `${duration}s`;
                leaf.style.animationDelay = `${delay}s`;
                leaf.style.width = `${size}px`;
                leaf.style.height = `${size}px`;
                leaf.style.transform = `rotate(${Math.random() * 360}deg)`;

                leavesContainer.appendChild(leaf);

                leaf.addEventListener('animationend', () => {
                    leaf.remove();
                    createLeaf();
                });
            }

            // Initialize modal
            const attendanceModal = new bootstrap.Modal(document.getElementById('attendanceModal'));
            let chart = null;

            // Student name click handler
            document.querySelectorAll('.student-name').forEach(function(element) {
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
                                // Try common extensions
                                const uid = data.student.uid;
                                studentImage.src = `{{ asset('studentImages') }}/${uid}.jpg`;
                                studentImage.onerror = () => {
                                    studentImage.src = `{{ asset('studentImages') }}/${uid}.png`;
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

                            // Create new chart with modern styling
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
                                colors: ['#3B82F6', '#EF4444', '#10B981', '#F59E0B', '#8B5CF6', '#EC4899'],
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
                                    text: 'Click a month to view subject-wise attendance',
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
                                        text: 'Number of Attendances',
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
                                    enabled: false
                                },
                                plotOptions: {
                                    column: {
                                        borderRadius: 8,
                                        borderWidth: 0,
                                        pointPadding: 0.1,
                                        groupPadding: 0.15,
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
                                    headerFormat: '<span style="font-size: 14px; font-weight: bold">{series.name}</span><br>',
                                    pointFormat: '<span>{point.name}</span>: <b>{point.y}</b> attendances<br/>'
                                },
                                series: [{
                                    name: 'Attendance',
                                    colorByPoint: true,
                                    data: data.monthly
                                }],
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
                                    series: data.drilldown
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
                // Reset student info
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