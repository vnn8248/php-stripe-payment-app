// Create an instance of the Stripe object with your publishable API key
const stripe = Stripe('pk_test_51IWo1NLVREWMGHkp8MoPEYMm62jC38LdE7asoUjVld8W4POkHcZxzoSvnq5whWGqmn8RMbDDRMso7aCV7pNzcO8U0096CU0vBT');

// Create an instance of elements
const elements = stripe.elements();

// Custom styling
const style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};



// Create an instance of the card element
const card = elements.create('card', { style: style });

// Add an instance of the card element into the card-element div
card.mount('#card-element');

// Handle real-time validation errors from the card element
card.addEventListener('change', function (event) {
  const displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission
const form = document.getElementById('payment-form');
form.addEventListener('submit', function (event) {
  event.preventDefault();

  stripe.createToken(card).then(function (result) {
    if (result.error) {

      // Inform the user if there was an error
      const errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {

      // Send token to server
      stripeTokenHandler(result.token);
    }
  })
});

function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  const form = document.getElementById('payment-form');
  const hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit form
  form.submit();
};