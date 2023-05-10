<template>
    <div>
        <h3 class="text-center mb-3">Remove Pizza</h3>
        <form @submit.prevent="removePizza">
            <div class="mb-3">
                <label for="pizza-name" class="form-label">Pizza Name</label>
                <input type="text" class="form-control" id="pizza-name" v-model="removePizzaName" required>
            </div>
            <button type="submit" class="btn btn-danger">Remove Pizza</button>
        </form>
        <div v-if="message" :class="[messageClass, 'mt-3']">{{ message }}</div>
    </div>
</template>

<script>
import { ref } from 'vue';

export default {
    setup() {
        const removePizzaName = ref('');
        const message = ref('');
        const messageClass = ref('');

        const removePizza = () => {
            // make an API call to remove pizza from database
            axios.delete(`/api/pizzas`, { data: { name: removePizzaName.value } })
                .then(response => {
                    // clear removePizzaName variable
                    removePizzaName.value = '';
                    // show success message
                    message.value = 'Pizza Removed Successfully';
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
            removePizzaName,
            removePizza,
            message,
            messageClass
        };
    }
};
</script>