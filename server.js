var express = require('express')
var bp = require('body-parser')
var mysql = require('mysql')

let app = express()
app.use(bp.json())
app.use(express.urlencoded({extended:true}))
