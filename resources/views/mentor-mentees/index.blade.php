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
        background: url('/images/pic3.jpg') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Poppins', sans-serif;
        min-height: 100vh;
        overflow-x: hidden;
        color: var(--text-primary);
        position: relative;
        margin: 0;
        padding-top: 80px;
    }

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
        margin: 1rem 0 2rem;
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

    tbody tr:nth-child(even) {
        background: linear-gradient(90deg, rgba(245, 245, 245, 0.8), rgba(230, 230, 230, 0.8));
    }

    td {
        padding: 1rem;
        color: var(--text-primary);
        font-weight: 400;
        border: 1px solid #E5E7EB;
        vertical-align: middle;
        text-align: center;
    }

    td:first-child {
        font-weight: 600;
        color: var(--primary-accent);
    }

    .mentee-badge {
        display: inline-block;
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
        font-weight: 500;
        border-radius: 12px;
        background: var(--gold-accent);
        color: white;
        margin: 0.25rem;
        transition: all 0.3s ease;
    }

    .mentee-badge:hover {
        background: var(--secondary-accent);
        transform: scale(1.05);
    }

    .no-data {
        text-align: center;
        font-style: italic;
        color: #6B7280;
        padding: 2rem;
    }

    .mentee_names{
        display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    align-content: center;
    flex-wrap: wrap;
    }
    .tr_border{
        
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .container {
            margin: 1.5rem auto;
            padding: 1.5rem;
        }

        .table-dark th, td {
            padding: 0.8rem;
            font-size: 0.9rem;
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

        .mentee-badge {
            font-size: 0.8rem;
            padding: 0.4rem 0.8rem;
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
    }

    .mentee-badge:focus {
        outline: 2px solid var(--secondary-accent);
        outline-offset: 2px;
    }
</style>

@include('layouts.sidebar')

<body>
    <div class="nature-bg"></div>
    <div class="leaves-container" id="leaves-container"></div>

    <div class="text-center">
        <h2>📋 Mentor & Mentee List</h2>
    </div>

    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>👨‍🏫 Mentor Name</th>
                        <th>👨‍🎓 Mentee Names</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mentors as $mentor)
                        <tr class="tr_border" style="animation-delay: {{ $loop->index * 0.1 }}s;">
                            <td>{{ $mentor->faculty->fname ?? 'N/A' }} {{ $mentor->faculty->lname ?? 'N/A' }}</td>
                            <td class="mentee_names">
                                @forelse($mentor->mentees as $mentee)
                                    <div style="display: flex; align-items: center; gap: 0.5rem; flex-wrap: wrap; margin-bottom: 0.5rem;">
                                        <span class="mentee-badge">🎓 {{ $mentee->student->fname ?? 'N/A' }} {{ $mentee->student->lname ?? 'N/A' }}</span>
                                        
                                        @if(in_array($mentee->id, $mentee_ids_with_interactions))
                                            <button 
                                                class="btn btn-sm btn-outline-danger report-btn"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#reportModal"
                                                data-mentee-id="{{ $mentee->id }}"
                                                data-mentee-name="{{ $mentee->student->fname ?? 'N/A' }} {{ $mentee->student->lname ?? '' }}"
                                            >
                                                📝 Report
                                            </button>                                
                                        @endif
                                    </div>
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

    <!-- Blade File (mentor-mentees/index.blade.php) -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reportModalLabel">AI-Generated Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="loadingIndicator" class="text-center d-none">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-2">Generating AI report...</p>
                </div>
                <div id="aiReportContent"></div>
                <div id="errorMessage" class="alert alert-danger d-none"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

   <script>
    document.querySelectorAll('.report-btn').forEach(button => {
        button.addEventListener('click', () => {
            const menteeId = button.getAttribute('data-mentee-id');
            const menteeName = button.getAttribute('data-mentee-name');


            const loadingIndicator = document.getElementById('loadingIndicator');
            const aiReportContent = document.getElementById('aiReportContent');
            const errorMessage = document.getElementById('errorMessage');

            // Clear previous content
            aiReportContent.innerHTML = '';
            errorMessage.classList.add('d-none');
            loadingIndicator.classList.remove('d-none');

            // Fetch report (replace URL with your actual route)
            fetch(`/generate-report/${menteeId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to fetch report.');
                    }
                    return response.text(); // Or `.json()` depending on your API
                })
                .then(data => {
                    loadingIndicator.classList.add('d-none');
                    aiReportContent.innerHTML = `<h6><strong>${menteeName}</strong></h6><p>${data}</p>`;
                })
                .catch(error => {
                    loadingIndicator.classList.add('d-none');
                    errorMessage.textContent = `❌ ${error.message}`;
                    errorMessage.classList.remove('d-none');
                });
        });
    });
</script>




    @include('layouts.footer')
</body>
</html>
