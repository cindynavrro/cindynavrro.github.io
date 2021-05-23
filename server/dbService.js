const mysql = require('mysql');
const dotenv = require('dotenv');
let instance = null;
dotenv.config();

const connection = mysql.createConnection({
    host: process.env.HOST,
    user: process.env.USER,
    password: process.env.PASSWORD,
    database: process.env.DATABASE,
    port: process.env.DB_PORT
});

connection.connect((err) => {
    if(err) {
        console.log(err.message);
    }
    console.log('db' + connection.state)
})

//functions to interact with data
class DbService {
    static getDbServiceInstance() {
        //if instance is not null; creates new instance of the service
        return instance ? instance : new DbService();
    }

    async getAllData() {
        try {
            const response = await new Promise((resolve, reject) => {
                const query = "SELECT * FROM course";
                connection.query(query, (err, result) => {
                    if (err) reject(new Error(err.message));
                    resolve(result);
                })
            });
            //console.log(response)
            return response;
        } catch (error) {
            console.log(error);
        }
    }

    async insertNewCourse(term, department, name, description, beginTime, endTime, days, capacity) {
        try {
            const insertID = await new Promise((resolve, reject) => {
                const query = "INSERT INTO course" +
                    " (term, department, courseName, courseDescription, beginTime, endTime, days, courseCapacity)" +
                    " VALUES (?,?,?,?,?,?,?,?);";
                connection.query(query, [term, department, name, description, beginTime, endTime, days, capacity],
                    (err, result) => {
                        if (err) reject(new Error(err.message));
                        resolve(result.insertId);
                    })
            });
            console.log(insertID);
            return {
                id: insertID,
                courseName: name,
                days: days,
                beginTime: beginTime,
                endTime: endTime
            };

        } catch (error) {
            console.log(error);
        }
    }

    async deleteRowByID(id) {
        id = parseInt(id);
        try{
            const response = await new Promise((resolve, reject) => {
                const query = "DELETE from course where courseID = ? ";
                connection.query(query, [id], (err, result) => {
                        if (err) reject(new Error(err.message));
                        resolve(result);
                    })
            });
            console.log(response);
        } catch (error) {
            console.log(error);
        }

    }

}



module.exports = DbService;