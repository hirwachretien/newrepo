const express = require('express');
const mongoose = require('mongoose');
const cors = require('cors');
const bodyParser = require('body-parser');
const app = express();

// Database setup
mongoose.connect('mongodb://localhost:27017/myshop', {
    useNewUrlParser: true,
    useUnifiedTopology: true
});

// Middleware
app.use(cors());
app.use(bodyParser.json());

// Define a schema and model
const productSchema = new mongoose.Schema({
    name: String,
    price: Number,
    imageUrl: String
});

const Product = mongoose.model('Product', productSchema);

// API endpoints
app.get('/api/products', async (req, res) => {
    const products = await Product.find();
    res.json({ products });
});

app.listen(3000, () => {
    console.log('Server is running on port 3000');
});
