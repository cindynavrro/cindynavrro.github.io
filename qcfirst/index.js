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
            courseBeginTime : document.querySelector('#beginTime').value.toString(),
            courseEndTime : document.querySelector('#endTime').value,
            courseDays: getCheckedValues(),
            courseCapacity : document.querySelector('#courseCap').value
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
                endTime: aCourse.courseEndTime,
                days: aCourse.courseDays,
                capacity: aCourse.courseCapacity

            })
        })
            .then(response => response.json())
            .then(data => insertRowIntoTable(data['data']));
    }
};



function insertRowIntoTable(data){

}

document.querySelector("#table-body").addEventListener('click', function (event){
    //console.log(event.target.dataset.id);
    if(event.target.className === "delete-row-btn") {
        deleteRowById(event.target.dataset.id);
    }
})

    function deleteRowById(id) {
        fetch('http://localhost:5000/delete/' + id, {
            method: 'DELETE'
        })
            .then(response => response.json())
            .then(data => console.log(data));
    }


function loadHTMLTable(data) {
    const table = document.querySelector('#table-body');
    if(data.length === 0){
        table.innerHTML = "<tr><td class='no-data' colspan='3'>No Data</td></tr>";
        return;
    }
    let tableHTML = "";

    data.forEach(function ({courseID, courseName, days, beginTime, endTime}) {
        tableHTML += "<tr>";
        tableHTML += `<td>${courseName}</td>`;
        tableHTML += `<td>${days}</td>`;
        tableHTML += `<td>${beginTime}-${endTime}</td>`
        if(document.getElementById("cntr")){
            tableHTML += `<td><button onclick="location.href='instructorHome.html';" class="delete-row-btn" data-id="${courseID}">Delete</button></td>`
        }
        tableHTML += "</tr>";
    });
    table.innerHTML = tableHTML;

}

function getCheckedValues() {
    let checkbox = document.querySelectorAll('input[type="checkbox"]:checked');
    let days = "";
    for (let i = 0; i < checkbox.length; i++) {
        if (checkbox[i].checked) {
            days = days + checkbox[i].value + "/";
        }
    }
    days = days.slice(0, days.length - 1);
    return days;
}


