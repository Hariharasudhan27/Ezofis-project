from flask import Flask, render_template, request
import joblib

app = Flask(__name__)

# Load the trained model from the .pkl file
model = joblib.load('models/model.pkl')

@app.route('/', methods=['GET', 'POST'])
def index():
    prediction = None
    if request.method == 'POST':
        input_data = [float(request.form['temp_max']), float(request.form['temp_min'])]
        prediction = model.predict([input_data])[0]
        prediction = round(prediction, 2)  # Round prediction to 2 decimal places
    return render_template('index.html', prediction=prediction)

if __name__ == '__main__':
    app.run(debug=True)