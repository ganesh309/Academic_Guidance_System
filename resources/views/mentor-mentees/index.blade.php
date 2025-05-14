<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<style>
    body,
    html {
        background: url('/images/pic3.jpg') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        position: relative;
    }

    /* Faded overlay */
    body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.88);
        z-index: -1;
    }

    .main-content {
        margin-left: 260px;
        padding: 40px 30px;
    }

    .card {
        border: none;
        border-radius: 15px;
        background-color: #ffffffd9;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.07);
    }

    .card h2 {
        font-weight: 600;
        color: #2d3436;
    }

    .table {
        border-radius: 10px;
        overflow: hidden;
    }

    .table thead {
        background-color: #374785;
        color: #fff;
    }

    .table th,
    .table td {
        text-align: center;
        vertical-align: middle;
        padding: 16px;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f1f4fb;
    }

    .table tbody tr:hover {
        background-color: #cfe2ff;
        transition: background-color 0.3s ease;
    }

    .mentee-list {
        list-style-type: none;
        padding-left: 0;
        margin: 0;
    }

    .mentee-list li {
        background-color: #dde7ff;
        margin: 6px auto;
        padding: 8px 14px;
        border-radius: 6px;
        width: fit-content;
        display: inline-block;
    }

    .no-data {
        text-align: center;
        font-style: italic;
        color: #888;
    }

    @media (max-width: 768px) {
        .main-content {
            margin-left: 0;
            padding: 20px;
        }

        .table th,
        .table td {
            font-size: 14px;
        }
    }
</style>

@include('layouts.sidebar')

<body>

    <div class="main-content">
        <div class="card p-4">
            <h2 class="text-center mb-4">📋 Mentor & Mentee List</h2>
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>👨‍🏫 Mentor Name</th>
                            <th>👨‍🎓 Mentee Names</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mentors as $mentor)
                        <tr>
                            <td>{{ $mentor->faculty->fname ?? 'N/A' }} {{ $mentor->faculty->lname ?? 'N/A' }}</td>
                            <td>
                                @forelse($mentor->mentees as $mentee)
                                <ul class="mentee-list mx-auto">
                                    <li>🎓 {{ $mentee->student->fname ?? 'N/A' }} {{ $mentee->student->lname ?? 'N/A' }}</li>
                                </ul>
                                @empty
                                <span class="text-muted">🙅 No mentees assigned</span>
                                @endforelse
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="no-data">😕 No mentors found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @include('layouts.footer')
</body>

</html>