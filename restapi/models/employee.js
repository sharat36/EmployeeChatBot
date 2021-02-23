const mongoose = require('mongoose')


const employeeSchema = new mongoose.Schema({

    name: {
        type: String,
        required: true
    },
    dept: {
        type: String,
        required: true
    },
    location: {
        type: String,
        required: true,
        default: "Hyderabad"
    }

})

module.exports = mongoose.model('Employee',employeeSchema)