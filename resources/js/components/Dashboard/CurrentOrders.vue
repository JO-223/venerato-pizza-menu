<template>
    <div>
        <h3 class="text-center mb-3">Pending Orders</h3>
        <table class="table table-striped text-white">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Total Price</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="order in orders" :key="order.id">
                    <td :style="{ 'text-decoration': order.textDecoration }">{{ order.id }}</td>
                    <td :style="{ 'text-decoration': order.textDecoration }">{{ order.total_price }}</td>
                    <td :style="{ 'text-decoration': order.textDecoration }">{{ order.status }}</td>
                    <td><button class="btn" @click="updateOrderStatus(order)">{{ order.buttonText }}</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
  
<script>
import { reactive } from 'vue';
import axios from 'axios';

export default {
    setup() {
        const orders = reactive([]);

        // method to fetch current orders data
        function fetchOrders() {
            // make an API call to get current orders data and update orders array
            axios.get('/api/orders')
                .then(response => {
                    response.data.forEach(order => {
                        orders.push({
                            ...order,
                            textDecoration: 'none',
                            buttonText: 'mark as done'
                        });
                    });
                })
                .catch(error => {
                    console.log(error);
                });
        }

        function updateOrderStatus(order) {
            // Update the status of the order
            if (order.status === 'done') {
                order.status = 'pending';
                order.textDecoration = 'none';
                order.buttonText = 'mark as done';
            } else {
                order.status = 'done';
                // Add line-through formatting to the text of the order
                order.textDecoration = 'line-through';
                order.buttonText = 'mark as pending';
            }

            // Update the database with the new status
            axios.put(`/api/orders/${order.id}`, { status: order.status })
                .catch(error => {
                    console.log(error);
                });
        }

        // fetch current orders data when component is mounted
        fetchOrders();

        return {
            orders,
            updateOrderStatus
        };
    }
};
</script>