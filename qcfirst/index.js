document.addEventListener('DOMContentLoaded', function () {
    fetch('http://localhost:5000/getAll')
        .then(response => response.json())
        .then(data => loadHTMLTable(data['data']));
    fetch('http://localhost:5000/getShoppingCart')
        .then(response => response.json())
        .then(data => loadShoppingCart(data['data']));
    // fetch('http://localhost:5000/getStudentSchedule')
    //     .then(response => response.json())
    //     .then(data => loadSchedule(data['data']));
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
    console.log(event.target.dataset.id);
    if(event.target.className === "delete-row-btn") {
        deleteRowById(event.target.dataset.id);
    }
    if(event.target.className === "add-cart-btn") {
        addToShoppingCart(event.target.dataset.id,
            event.target.dataset.name,
            event.target.dataset.days,
            event.target.dataset.begin,
            event.target.dataset.end);
    }
    if(event.target.className === "enroll-btn") {
        addToStudentSchedule(
            event.target.dataset.name,
            event.target.dataset.days,
            event.target.dataset.begin,
            event.target.dataset.end);
    }
})

    function deleteRowById(id) {
        fetch('http://localhost:5000/delete/' + id, {
            method: 'DELETE'
        })
            .then(response => response.json())
            .then(data => console.log(data));
    }


// document.querySelector("#shoppingTable-body").addEventListener('click', function (event){
//     console.log(event.target.dataset.id);
//     // if(event.target.className === "add-cart-btn") {
//     //     addToShoppingCart(event.target.dataset.id,
//     //                       event.target.dataset.name,
//     //                       event.target.dataset.days,
//     //                       event.target.dataset.begin,
//     //                       event.target.dataset.end);
//     // }
// })
    function addToShoppingCart(id, name, days, beginT, endT) {
        fetch('http://localhost:5000/shoppingCart', {
            headers: {
                'Content-type': 'application/json'
            },
            method: 'POST',
            body: JSON.stringify({
                cID: id,
                cName: name,
                cDays: days,
                beginT: beginT,
                endT: endT
            })
        })
            .then(response => response.json())
            .then(data => insertRowIntoTable(data['data']));
    }

document.querySelector(".enroll-btn").addEventListener('click', function (event){
    console.log(event.target);
})
    function addToStudentSchedule(name, days, beginT, endT){
        fetch('http://localhost:5000/studentSchedule', {
            headers: {
                'Content-type': 'application/json'
            },
            method: 'POST',
            body: JSON.stringify({
                cName: name,
                cDays: days,
                beginT: beginT,
                endT: endT
            })
        })
            .then(response => response.json())
            .then(data => insertRowIntoTable(data['data']));
    }

//
// function loadSchedule(data) {
//     const table = document.querySelector('#table-body');
//     if(data.length === 0){
//         table.innerHTML = "<tr><td class='no-data' colspan='3'>No Data</td></tr>";
//         return;
//     }
//     let tableHTML = "";
//
//     data.forEach(function ({courseID, courseName, days, beginTime, endTime}) {
//         tableHTML += "<tr>";
//         tableHTML += `<td>${courseName}</td>`;
//         tableHTML += `<td>${days}</td>`;
//         tableHTML += `<td>${beginTime}-${endTime}</td>`;
//         tableHTML += "</tr>";
//     });
//     table.innerHTML = tableHTML;
// }
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
        tableHTML += `<td>${beginTime}-${endTime}</td>`;
        if(document.getElementById("cntr")){
            tableHTML += `<td><button onclick="location.href='instructorHome.html';" class="delete-row-btn" data-id="${courseID}">Delete</button></td>`
        }
        if(document.getElementById("classListDisplay-table")){
            tableHTML += '<td>TBA</td>';
            tableHTML += '<td class="status">Open</td>';
            tableHTML += `<td><button  onclick="location.href='enrollmentPage.php'" class="add-cart-btn" data-id="${courseID}",
                                                             data-name="${courseName}",
                                                             data-days="${days}",
                                                             data-begin="${beginTime}", data-end="${endTime}">Add</button></td>`
        }

        tableHTML += "</tr>";
    });
    table.innerHTML = tableHTML;
}

function loadShoppingCart(data){
    const table = document.querySelector('#shop-table-body');
    if(data.length === 0) {
        table.innerHTML = "<tr><td class='no-data' colspan='3'>No Data</td></tr>";
        return;
    }

    let tableHTML = "";
    data.forEach(function ({courseID, courseName, days, beginTime, endTime}) {
        tableHTML += `<td>${courseName}</td>`;
        tableHTML += `<td>${days}</td>`;
        tableHTML += `<td>${beginTime}-${endTime}</td>`;
        tableHTML += `<td><button onclick="location.href='studentHome.php' "class="enroll-btn" data-shopname="${courseName}",
                                                                data-sdays="${days}",
                                                                data-sbegin="${beginTime}", data-send="${endTime}">Enroll</button></td>`;
        tableHTML += `<td><button class="delete-btn" data-id="${courseID}">Delete</button></td>`;
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


