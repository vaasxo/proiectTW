const Product = require('../models/sample-model')
const {getPostData} = require('../utils')

// @desc    Gets all products
// @route   GET /api/products
async function getProducts(request, response) {
    try {
        const products = await Product.findAll()

        response.writeHead(200, {'Content-Type': 'application/json'})
        response.end(JSON.stringify(products))
    } catch (error) {
        console.log(error)
    }
}

// @desc    Gets single product
// @route   GET /api/products/:id
async function getProduct(request, response, id) {
    try {
        const product = await Product.findById(id)
        if (!product) {
            response.writeHead(404, {'Content-Type': 'application/json'})
            response.end(JSON.stringify({message: 'Product not found'}))
        } else {
            response.writeHead(200, {'Content-Type': 'application/json'})
            response.end(JSON.stringify(product))
        }

    } catch (error) {
        console.log(error)
    }
}

// @desc   Create a product
// @route   POST /api/products
async function createProduct(request, response) {
    try {
        const body = await getPostData(request)

        const {title, description, price} = JSON.parse(body)

        const product = {
            title,
            description,
            price
        }

        const newProduct = await Product.create(product)

        //201 - successfully created
        response.writeHead(201, {'Content-Type': 'application/json'})
        return response.end(JSON.stringify(newProduct))

    } catch (error) {
        console.log(error)
    }
}

// @desc   Update a product
// @route   PUT /api/products/:id
async function updateProduct(request, response, id) {
    try {
        const product = await Product.findById(id)

        if(!product){
            response.writeHead(404, {'Content-Type': 'application/json'})
            response.end(JSON.stringify({message: 'Product not found'}))
        } else {
            const body = await getPostData(request)

            const {title, description, price} = JSON.parse(body)

            const productData = {
                title: title || product.title,
                description: description || product.description,
                price: price || product.price
            }

            const updatedProduct = await Product.update(id, productData)

            //201 - successfully updated
            response.writeHead(200, {'Content-Type': 'application/json'})
            return response.end(JSON.stringify(updatedProduct))
        }

    } catch (error) {
        console.log(error)
    }
}

// @desc    Delete product
// @route   DELETE /api/products/:id
async function deleteProduct(request, response, id) {
    try {
        const product = await Product.findById(id)
        if (!product) {
            response.writeHead(404, {'Content-Type': 'application/json'})
            response.end(JSON.stringify({message: 'Product not found'}))
        } else {
            await Product.remove(id)
            response.writeHead(200, {'Content-Type': 'application/json'})
            response.end(JSON.stringify({message: `product ${id} removed`}))
        }

    } catch (error) {
        console.log(error)
    }
}

module.exports = {
    getProducts,
    getProduct,
    createProduct,
    updateProduct,
    deleteProduct
}