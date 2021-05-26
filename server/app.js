const express = require('express');
const app = express();
const cors = require('cors');
const dotenv = require('dotenv');
dotenv.config();

const dbService = require('./dbService')

app.use(cors());
app.use(express.json());
app.use(express.urlencoded({extended : false }));

//create
app.post('/insert', (request, response) => {
    const { term, department, name, description, beginTime, endTime, days, capacity}
        = request.body;

    //console.log(request.body);
    const db = dbService.getDbServiceInstance();
    const result = db.insertNewCourse(term,department, name, description, beginTime, endTime, days, capacity);

    result
        .then(data => response.json({data: data}))
        .catch(err => console.log(err));

});

app.post('/shoppingCart', (request, response) => {
    const { cID, cName, cDays, beginT, endT } = request.body
    const db = dbService.getDbServiceInstance();
    const result = db.insertToShopping(cID, cName, cDays, beginT, endT);

    result
        .then(data => response.json({data: data}))
        .catch(err => console.log(err));
});

app.post('/studentSchedule', (request, response) => {
    const { cName, cDays, beginT, endT } = request.body
    const db = dbService.getDbServiceInstance();
    const result = db.insertToSchedule(cName, cDays, beginT, endT);

    result
        .then(data => response.json({data: data}))
        .catch(err => console.log(err));
});

let i = 1;
//read
app.get('/getAll', (request, response) => {
    console.log('Test' + i++)

    const db = dbService.getDbServiceInstance();
    const result = db.getAllData();
    //
    // result.then(function (result){
    //     console.log(result);
    // })

    //  response.json({
    //     success: true
    // })

    result
        .then(data => response.json({data: data}))
        .catch(err => console.log(err));
})

app.get('/getShoppingCart', (request, response) => {
    console.log('shop');
    const db = dbService.getDbServiceInstance();
    const result = db.getShoppingCart();

    // result.then(function (result){
    //     console.log(result);
    // })
    result
        .then(data => response.json({data: data}))
        .catch(err => console.log(err));
})

// app.get('/getStudentSchedule', (request, response) => {
//     const db = dbService.getDbServiceInstance();
//     const result = db.getStudentSchedule();
//
//     result
//         .then(data => response.json({data: data}))
//         .catch(err => console.log(err));
// })

//delete
app.delete('/delete/:id', (request, response) => {
    const { id } = request.params;

    const  db = dbService.getDbServiceInstance();
    const result = db.deleteRowByID(id);
    // result
    //     .then(data => response.json({success: true}))
    //     .catch(err => console.log(err));
});



app.listen(process.env.PORT, () => console.log('Running'));