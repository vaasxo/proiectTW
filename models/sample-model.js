let products = require('../data/products')
const { v4: uuidv4 } = require('uuid')
const { writeDataToFile } = require('../utils')

//low level function using promise
function findAll() {
    return new Promise((resolve, reject) => {
        resolve(products)
    })
}

function findById(id) {
    return new Promise((resolve, reject) => {
        const product = products.find((p) => p.id === id)
        resolve(product)
    })
}

function create(product) {
    return new Promise((resolve, reject) => {
        const newProduct = {id: uuidv4(), ...product}
        products.push(newProduct)
        writeDataToFile('./data/products.json', products)
        resolve(newProduct)
    })
}

function update(id, product) {
    return new Promise((resolve, reject) => {
        const index = products.findIndex((p) => p.id === id)
        products[index] = {id, ...product}
        writeDataToFile('./data/products.json', products)
        resolve([products[index]])
    })
}

function remove(id) {
    return new Promise((resolve, reject) => {
        //we only get the products that we don't have the ID specified, and we overwrite the json file
        products = products.filter((p)=> p.id !== id)
        writeDataToFile('./data/products.json', products)
        resolve()
    })
}

//we're using this function in another file, so we need to export it
module.exports = {
    findAll,
    findById,
    create,
    update,
    remove
}