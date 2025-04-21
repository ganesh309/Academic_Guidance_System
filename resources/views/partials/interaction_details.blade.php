<table class="table table-bordered">
<tr>
        <td><b>Date</b></td>
        <td>{{ $interaction->date }}</td>
    </tr>
    <tr>
        <td><b>Interaction</b></td>
        <td>{{ $interaction->interaction }}</td>
    </tr>
    <tr>
        <td><b>Problem Understood</b></td>
        <td>{{ $interaction->problem_understood }}</td>
    </tr>
    <tr>
        <td><b>Remedy</b></td>
        <td>{{ $interaction->remedy }}</td>
    </tr>
    <tr>
        <td><b>Observation</b></td>
        <td>{{ $interaction->observation }}</td>
    </tr>
    <tr>
        <td><b>Attendance</b></td>
        <td>{{ $interaction->attendance }}</td>
    </tr>
    <tr>
        <td>
            <a href="{{ route('edit-interactions', [$mentee_id, $interaction->id,$interaction->date]) }}" class="btn btn-info btn-sm"> <i class="bi bi-pencil-square"></i>Edit </a>
        </td>
    </tr>

</table>