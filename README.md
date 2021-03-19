# php-stripe-payment-app
Currently in progress!


# Summary
This project involes a payment form that connects to [Stripe's API](https://stripe.com/docs). 

After configuring the Stripe API, the credit/debit card element gets injected via JavaScript into the form.

Stripe provides a test card number for [testing transactions](https://stripe.com/docs/payments/integration-builder). The number is "424242..." repeating until the card number field is filled. It must be a number consisting for alternating 4's and 2's in order for the field to be validated. Note: the expiration date, CVC, and zip code fields can be any numbers.

The form gets processed and "charges" the person which can be view on the Stripe dashboard.

The app redirects the user to a success page and the transaction ID is displayed. 

# Dependencies
- XAMPP for Windows
- stripe-php (installed with Composer)
- Stripe account (free)

# More to come
- MySQL database to store customers and transactions
- PDO to interact with the database
- Admin pages with authentication to view customers and transactions

#Inspiration
Brad Traversy!
