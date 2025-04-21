const initialUrl = "http://127.0.0.1:8000/students";

function urlFilter() {
    let queryString = '';

    const countryId = $('#country').val();
    const stateId = $('#state').val();
    const districtId = $('#district').val();
    const schoolId = $('#school').val();
    const dateOfBirthFrom = $('#date_of_birth_from').val();
    const dateOfBirthTo = $('#date_of_birth_to').val();
    const gender = $('#gender').val();
    const search = $('#search').val();

    if (countryId) {
        queryString += 'country_id=' + countryId + '&';
    }
    if (stateId) {
        queryString += 'state_id=' + stateId + '&';
    }
    if (districtId) {
        queryString += 'district_id=' + districtId + '&';
    }
    if (schoolId) {
        queryString += 'school_id=' + schoolId + '&';
    }
    if (dateOfBirthFrom) {
        queryString += 'date_of_birth_from=' + dateOfBirthFrom + '&';
    }
    if (dateOfBirthTo) {
        queryString += 'date_of_birth_to=' + dateOfBirthTo + '&';
    }
    if (gender) {
        queryString += 'gender=' + gender + '&';
    }
    if (search) {
        queryString += 'search=' + search + '&';
    }

    if (queryString.length > 0) {
        queryString = queryString.slice(0, -1);
    }

    const newUrl = initialUrl + (queryString ? '?' + queryString : '');
    window.location.href = newUrl;
};
