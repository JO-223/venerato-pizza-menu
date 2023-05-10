<script>
import axios from 'axios';
import Navbar from './Navbar.vue';



export default {
    name: 'Welcome',
    components: {
        Navbar,
    },

    mounted() {
        axios.get('/api/pizzas')
            .then(response => {
                this.pizzas = response.data;
            });
    },

    data() {
        return {
            pizzas: [],
            cart: []
        }
    },

    methods: {
        addToCart(pizza) {
            // check if the pizza is already in the cart
            let item = this.cart.find(item => item.pizza.id === pizza.id);
            if (item) {
                // if the pizza is already in the cart, increase the quantity
                item.quantity++;
            } else {
                // if the pizza is not in the cart, add it with a quantity of 1
                this.cart.push({
                    pizza: pizza,
                    quantity: 1
                });
            }
        },

        removeFromCart(item) {
            // remove the item from the cart
            let index = this.cart.indexOf(item);
            this.cart.splice(index, 1);
        },

        placeOrder() {
            // create a form element
            let form = document.createElement('form');
            form.method = 'POST';
            form.action = '/order';

            // add CSRF token
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            let csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = csrfToken;
            form.appendChild(csrfInput);

            // add cart data as a hidden input
            let cartInput = document.createElement('input');
            cartInput.type = 'hidden';
            cartInput.name = 'cart';
            cartInput.value = JSON.stringify(this.cart);
            form.appendChild(cartInput);

            // Add a hidden input field for the total_price value
            let totalPriceInput = document.createElement('input');
            totalPriceInput.type = 'hidden';
            totalPriceInput.name = 'total_price';
            totalPriceInput.value = this.total;
            form.appendChild(totalPriceInput);

            // append the form to the body and submit it
            document.body.appendChild(form);
            form.submit();
        }
    },

    computed: {
        total() {
            return this.cart.reduce((total, item) => total + item.pizza.price * item.quantity, 0);
        }
    }
}
</script>

<template>
    <!-- NAVBAR -->
    <navbar></navbar>
    <!-- MENU -->
    <div class="container text-center text-white mt-4" id="pizza-menu">
        <h2>Pizza Menu</h2>
        <div class="row" v-for="pizza in pizzas" :key="pizza.id">
            <div @click="addToCart(pizza)" class="col-xl-8 col-md-9 col-9 mt-3">
                <div>
                    <h3>{{ pizza.name }}</h3>
                    <p>{{ pizza.description }}</p>
                </div>
            </div>
            <div class="col-xl-3 col-md-2 col-1 mt-md-5 mt-4">
                <p>{{ pizza.price }}</p>
            </div>
        </div>
    </div>
    <!-- CART -->
    <div class="container text-center text-white mt-1 mt-md-5" id="cart">
        <h2>Cart</h2>
        <div class="row mb-3" v-for="item in cart" :key="item.pizza.id">
            <div class="col-6">
                <h3>{{ item.pizza.name }}</h3>
            </div>
            <div class="col-2">
                <p>{{ item.pizza.price }}</p>
            </div>
            <div class="col-1">
                <input type="number" v-model="item.quantity" min="1">
            </div>
            <div class="col-1">
                <button @click="removeFromCart(item)" class="btn" id="remove-item">X</button>
            </div>
        </div>
        <div class="row my-md-4">
            <div class="col-7">
                <h3 class="mt-3">Total: € {{ total }}</h3>
            </div>
            <div class="col-xl-2 col-md-4 col-3 mb-5">
                <button @click="placeOrder" class="btn">Order now</button>
            </div>
        </div>
    </div>
</template>

<style></style>