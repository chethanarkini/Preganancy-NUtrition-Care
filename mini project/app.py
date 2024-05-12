from flask import Flask, render_template, request, jsonify
import numpy as np
import tensorflow as tf
from tensorflow.keras.models import load_model
import pickle
from tensorflow.keras.preprocessing.sequence import pad_sequences
import json

app = Flask(__name__, template_folder='.', static_folder='static')


# Load the model
model = load_model('chat_model.h5')

# Load the tokenizer
with open('tokenizer.pickle', 'rb') as handle:
    tokenizer = pickle.load(handle)

# Load the label encoder
with open('label_encoder.pickle', 'rb') as enc:
    lbl_encoder = pickle.load(enc)

def predict_intent(text):
    # Tokenize the text
    x_test = tokenizer.texts_to_sequences([text])
    # Pad the sequences
    x_test = pad_sequences(x_test, maxlen=20, padding='post', truncating='post')
    # Predict the intent
    predictions = model.predict(x_test)
    # Get the predicted tag
    tag = lbl_encoder.inverse_transform([np.argmax(predictions)])
    return tag[0]

@app.route('/')
def home():
    return render_template('home_after.html')

@app.route('/chat', methods=['POST'])
def chat():
    user_message = request.json['message']
    intent = predict_intent(user_message)
    # Get the response based on the predicted intent
    response = get_response(intent)
    return jsonify({'response': response})

def get_response(intent):
    data = load_data()
    for intent_info in data['intents']:
        if intent_info['tag'] == intent:
            responses = intent_info['responses']
            return np.random.choice(responses)

def load_data(file_path='intents2.json'):
    with open(file_path) as file:
        data = json.load(file)
    return data

if __name__ == "__main__":
    app.run(debug=True)
