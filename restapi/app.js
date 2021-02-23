const express = require('express')
const mongoose = require('mongoose')
const url = 'mongodb://localhost/employeeDB'

const app = express()

mongoose.connect(url, {useNewUrlParser:true})
const con = mongoose.connection

con.on('open', () => {
    console.log('connected...')
})

app.use(express.json())

const employeeRouter = require('./routes/employee')
app.use('/employee',employeeRouter)

app.listen(9000, () => {
    console.log('Server started')
})