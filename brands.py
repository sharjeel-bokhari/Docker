from flask import Flask, jsonify

app = Flask(__name__)

@app.route('/products')
def get_products():
    products = [
        {
            'name': 'Product 1',
            'brand': 'Brand A',
            'price': 10.99
        },
        {
            'name': 'Product 2',
            'brand': 'Brand B',
            'price': 19.99
        },
        # Add more products as needed
    ]
    return jsonify(products)

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5001)