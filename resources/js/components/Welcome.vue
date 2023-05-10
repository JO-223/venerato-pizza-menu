<script>
import Navbar from './Navbar.vue';

export default {
    name: 'Welcome',
    components: {
        Navbar,
    },
};
</script>

<template>
    <!-- NAVBAR -->
    <navbar></navbar>
    <div class="container text-center vh-100 d-flex justify-content-center align-items-center" id="welcome">
        <div class="row">
            <div class="col-12">
                <h1>Venerato</h1>
                <h3>Italian Restaurant</h3>
                <a href="/menu" class="btn mt-5">
                    Go to menu
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</template>