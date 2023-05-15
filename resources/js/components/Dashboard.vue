<template>
    <DashboardNavbar></DashboardNavbar>
    <div class="container dashboard">
        <h2 class="text-center m-5">Admin Dashboard</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <current-orders></current-orders>
            </div>
            <div class="col-md-6">
                <create-pizza></create-pizza>
                <hr class="my-5">
                <remove-pizza></remove-pizza>
            </div>
        </div>
    </div>
</template>

<script>
import CurrentOrders from './Dashboard/CurrentOrders.vue';
import CreatePizza from './Dashboard/CreatePizza.vue';
import RemovePizza from './Dashboard/RemovePizza.vue';
import DashboardNavbar from './Dashboard/DashboardNavbar.vue';

export default {
    components: {
        CurrentOrders,
        CreatePizza,
        RemovePizza,
        DashboardNavbar
    }
};
</script>