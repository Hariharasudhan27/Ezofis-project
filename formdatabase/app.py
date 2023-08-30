from flask import Flask, render_template, request, jsonify
import random

app = Flask(__name__)

def generate_random_wind():
    return round(random.uniform(1, 10), 2)

@app.route('/', methods=['GET', 'POST'])
def index():
    if request.method == 'POST':
        try:
            temp_max = float(request.form['temp_max'])
            temp_min = float(request.form['temp_min'])

            if not (-30 <= temp_max <= 30) or not (-20 <= temp_min <= 20):
                return render_template('prdindex.html', error="Enter the correct value between the specified range.")

            wind = generate_random_wind()
            return render_template('prdindex.html', wind=wind)

        except ValueError:
            return render_template('prdindex.html', error="Invalid input. Please enter numeric values.")

    return render_template('prdindex.html', wind=None, error=None)

if __name__ == "__main__":
    app.run(debug=True)
