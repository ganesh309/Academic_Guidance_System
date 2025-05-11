<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
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
            margin-top: 5rem;
            padding: 2rem;
            background: var(--glass-bg);
            border-radius: 20px;
            box-shadow: var(--shadow-soft);
            backdrop-filter: blur(10px);
            animation: fadeIn 1s ease-out, scaleUp 1.5s ease-in-out;
            max-width: 90%;
            position: relative;
            z-index: 1;
            margin-left: 270px;
        }

        .mt-5 {
            margin-left: 300px;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes scaleUp {
            0% { transform: scale(0.9); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        h2 {
            color: var(--text-primary);
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 2rem;
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

        .table {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
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
        }

        .table-dark th:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }

        tbody tr {
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.8), rgba(240, 240, 240, 0.8));
            transition: all 0.3s ease;
            animation: rowHighlight 0.6s ease-out forwards;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
        }

        td {
            padding: 1rem;
            color: var(--text-primary);
            font-weight: 400;
            border: 1px solid #E5E7EB;
            vertical-align: middle;
        }

        td:first-child {
            font-weight: 600;
            color: var(--primary-accent);
        }

        .btn {
            background: var(--primary-accent);
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            text-transform: uppercase;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .btn:hover {
            background: var(--secondary-accent);
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
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

        /* Modal styles */
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

        /* Highcharts container */
        #attendanceChart {
            width: 100%;
            height: 500px;
            margin: 0 auto;
        }

        .highcharts-background {
            fill: transparent;
        }

        .highcharts-container {
            font-family: 'Poppins', sans-serif !important;
        }

        .highcharts-title {
            font-family: 'Playfair Display', serif !important;
            font-weight: 700 !important;
        }

        .modal {
    z-index: 1055; /* Ensure it's above the backdrop */
}
.modal-backdrop {
    --bs-backdrop-zindex: 0;
}

#attendanceChart {
    position: relative;
    z-index: 1060; /* Above modal content */
}

    </style>
</head>
<body>
    @include('layouts.sidebar')
    <div class="nature-bg"></div>
    <div class="leaves-container" id="leaves-container"></div>
    <div class="mb-1" style="margin-left: 260px;">
        <h2 class="mb-4">Student List</h2>
    </div>

    <div class="container mt-5" style="margin-left: 260px;">
        <form method="GET" action="{{ route('students.index') }}" class="mb-4">
            <div class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search by Name, UID, Email, etc.">
                </div>
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
                <div class="col-md-2">
                    <select name="per_page" class="form-select">
                        @foreach([5, 10, 25, 50, 100] as $perPageOption)
                            <option value="{{ $perPageOption }}" {{ request('per_page', 5) == $perPageOption ? 'selected' : '' }}>{{ $perPageOption }} per page</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 d-flex">
                    <button type="submit" class="btn btn-primary w-100 me-2">Search</button>
                    <a href="{{ route('students.index') }}" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>

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

            <!-- Attendance Modal -->
            <div class="modal fade" id="attendanceModal" tabindex="-1" aria-labelledby="attendanceModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="attendanceModalLabel">Student Attendance</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="attendanceChart" style="height: 500px;"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-3">
                {!! $students->appends(request()->query())->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script>
        // Floating leaf animation
        document.addEventListener('DOMContentLoaded', function() {
            const leavesContainer = document.getElementById('leaves-container');
            const leafCount = 30;

            for (let i = 0; i < leafCount; i++) {
                createLeaf();
            }

            function createLeaf() {
                const leaf = document.createElement('div');
                leaf.className = 'leaf';

                const startX = Math.random() * window.innerWidth;
                const duration = Math.random() * 10 + 5;
                const delay = Math.random() * 5;
                const size = Math.random() * 20 + 10;

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
                            // Destroy previous chart if exists
                            if (chart) {
                                chart.destroy();
                            }

                            // Create new chart
                            chart = Highcharts.chart('attendanceChart', {
                                chart: {
                                    type: 'column',
                                    backgroundColor: 'transparent',
                                    height: 500
                                },
                                title: {
                                    text: 'Monthly Attendance Overview',
                                    style: {
                                        fontFamily: 'Playfair Display, serif',
                                        fontWeight: 'bold'
                                    }
                                },
                                subtitle: {
                                    text: 'Click a month to view subject-wise attendance'
                                },
                                xAxis: {
                                    type: 'category'
                                },
                                yAxis: {
                                    title: {
                                        text: 'Number of Attendances'
                                    }
                                },
                                legend: {
                                    enabled: false
                                },
                                plotOptions: {
                                    series: {
                                        borderWidth: 0,
                                        dataLabels: {
                                            enabled: true,
                                            format: '{point.y}'
                                        },
                                        cursor: 'pointer',
                                        point: {
                                            events: {
                                                click: function() {
                                                    // Handle drilldown click
                                                    if (this.drilldown) {
                                                        chart.setTitle({
                                                            text: this.name + ' Attendance'
                                                        });
                                                    }
                                                }
                                            }
                                        }
                                    }
                                },
                                tooltip: {
                                    headerFormat: '<span style="font-size:14px">{series.name}</span><br>',
                                    pointFormat: '<span>{point.name}</span>: <b>{point.y}</b><br/>'
                                },
                                series: [{
                                    name: 'Attendance',
                                    colorByPoint: true,
                                    data: data.monthly
                                }],
                                drilldown: {
                                    activeAxisLabelStyle: {
                                        textDecoration: 'none',
                                        fontStyle: 'italic'
                                    },
                                    activeDataLabelStyle: {
                                        textDecoration: 'none'
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

            // Reset chart when modal is closed
            document.getElementById('attendanceModal').addEventListener('hidden.bs.modal', function () {
                if (chart) {
                    chart.destroy();
                    chart = null;
                }
            });
        });
    </script>
</body>
</html>

