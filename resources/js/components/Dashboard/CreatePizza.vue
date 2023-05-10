<template>
    <div>
        <h3 class="text-center mb-3">Add New Pizza</h3>
        <form @submit.prevent="addPizza">
            <div class="mb-3">
                <label for="pizza-name" class="form-label">Pizza Name</label>
                <input type="text" class="form-control" id="pizza-name" v-model="newPizza.name" required>
            </div>
            <div class="mb-3">
                <label for="pizza-description" class="form-label">Description</label>
                <textarea class="form-control" id="pizza-description" v-model="newPizza.description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="pizza-price" class="form-label">Price</label>
                <input type="number" class="form-control" id="pizza-price" v-model.number="newPizza.price" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Pizza</button>
        </form>
        <div v-if="message" :class="[messageClass, 'mt-3']">{{ message }}</div>
    </div>
</template>

<script>
import { ref } from 'vue';

export default {
    setup() {
        const newPizza = ref({
            name: '',
            description: '',
            price: ''
        });
        const message = ref('');
        const messageClass = ref('');

        const addPizza = () => {
            // make an API call to add new pizza to database
            axios.post('/api/pizzas', newPizza.value)
                .then(response => {
                    // clear newPizza object
                    newPizza.value = {
                        name: '',
                        description: '',
                        price: ''
                    };
                    // show success message
                    message.value = 'Pizza Created Successfully';
                    messageClass.value = 'text-success';
                    setTimeout(() => {
                        message.value = '';
                        messageClass.value = '';
                    }, 3000);
                })
                .catch(error => {
                    console.log(error);
                    // show error message
                    message.value = 'Error';
                    messageClass.value = 'text-danger';
                    setTimeout(() => {
                        message.value = '';
                        messageClass.value = '';
                    }, 3000);
                });
        };

        return {
            newPizza,
            addPizza,
            message,
            messageClass
        };
    }
};
</script>

<!-- 
    NEW PIZZAS TO ADD TO DATABASE:
Pizza Marinara: Topped with a tomato-based sauce flavored with garlic and oregano.
Pizza Quattro Formaggi: Topped with four different types of cheese.
Pizza Capricciosa: Topped with tomato sauce, mozzarella cheese, ham, mushrooms, artichokes, and olives.
Pizza Diavola: Topped with tomato sauce, mozzarella cheese, and spicy salami. 
-->