document.addEventListener('DOMContentLoaded', function () {
    fetch('http://localhost:5000/getShoppingCart/')
        .then(response => response.json())
        .then(data => loadShoppingCart(data['data']));
});

function loadShoppingCart(data) {
    const table2 = document.querySelector('#shop-table-body');
    if (data.length === 0) {
        table2.innerHTML = "<tr><td class='no-data' colspan='3'>No Data</td></tr>";
        return;
    }
    let html = ""
    data.forEach(function ({courseID, courseName, days, beginTime, endTime, instructor}) {
        html += "<tr>";
        html += `<td>${courseName}</td>`;
        html += `<td>${days}</td>`;
        html += `<td>${beginTime}-${endTime}</td>`;
        html += `<td>${instructor}</td>`;
        html += `<td><button onclick="location.href='studentHome.php';" data-name="${courseName}", data-days="${days}", data-beginT="${beginTime}", data-endT="${endTime}"  
                                                                        class="enroll-btn">Enroll</button>`;
        html += `<td><button onclick="location.href='studentHome.php';" data-id="${courseName}" class="enroll-btn">Delete</button>`;
        html += "</tr>"
    })

    table2.innerHTML = html;
    let tableHTML = "";

    document.querySelector("#shop-table-body").addEventListener('click', function (event) {
        console.log(event.target.dataset.id);
        if(event.target.className === "delete-btn"){
            deleteCartByName(event.target.dataset.id);
        }
        if(event.target.className === "enroll-btn"){
            addToShoppingCart(event.target.dataset.id,
                event.target.dataset.name,
                event.target.dataset.days,
                event.target.dataset.beginT,
                event.target.dataset.endT);
        }
    });
}

function deleteCartByName(name) {
    fetch('http://localhost:5000/deleteCart/' + name, {
        method: 'DELETE'
    })
        .then(response => response.json())
        .then(data => console.log(data));
}

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