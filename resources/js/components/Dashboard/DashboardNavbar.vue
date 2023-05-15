<template>
    <nav class="navbar navbar-expand-lg bg-transparent">
        <div class="container w-50">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/menu" class="nav-link">Menu</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <Logout class="nav-link"></Logout>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
import Logout from './Logout.vue';

export default {
    name: 'DashboardNavbar',
    components: {
        Logout
    }
}
</script>
