document.addEventListener('DOMContentLoaded', function () {
    fetch('http://localhost:5000/getAll')
        .then(response => response.json())
        .then(data => loadHTMLTable(data['data']));
});


window.onload = function() {
    const addBtn = document.getElementById('add-course-btn')
    addBtn.onclick = function () {

        let aCourse = {
            courseTerm: document.querySelector('#term').value,
            courseDepartment : document.querySelector('#department').value,
            courseName: document.querySelector('#course-Name').value,
            courseDescription : document.querySelector('#courseDescription').value,
            courseBeginTime : document.querySelector('#beginTime').value,
            courseEndTime : document.querySelector('#endTime').value
        };

        fetch('http://localhost:5000/insert', {
            headers: {
                'Content-type': 'application/json'
            },
            method: 'POST',
            body: JSON.stringify({
                term: aCourse.courseTerm,
                department: aCourse.courseDepartment,
                name: aCourse.courseName,
                description: aCourse.courseDescription,
                beginTime: aCourse.courseBeginTime,
                endTime: aCourse.courseEndTime
            })
        })
            .then(response => response.json())
            .then(data => insertRowIntoTable(data['data']));
    }
};



function insertRowIntoTable(data){

}

function loadHTMLTable(data) {
    const table = document.querySelector('#table-body')
    if(data.length === 0){
        table.innerHTML = "<tr><td class='no-data' colspan='3'>No Data</td></tr>";
        return;
    }

    let tableHTML = "";

    data.forEach(function ({courseName}) {
        tableHTML += "<tr>";
        tableHTML += `<td>${courseName}</td>`;
        tableHTML += "</tr>";
    });

    table.innerHTML = tableHTML;

}
