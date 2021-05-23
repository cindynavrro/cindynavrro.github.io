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
    const { term, courseName } = request.body;

    console.log(request.body);
    const db = dbService.getDbServiceInstance();
    const result = db.insertNewCourse(term, courseName);

    result
        .then(data => response.json({success : true}))
        .catch(err => console.log(err));
});

let i = 1;
//read
app.get('/getAll', (request, response) => {
    console.log('Test' + i++)

    const db = dbService.getDbServiceInstance();
    const result = db.getAllData();

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

app.listen(process.env.PORT, () => console.log('Running'));