<template>
    <a href="" @click="logout">Logout</a>
</template>

<script>
export default {
    name: 'Logout',
    methods: {
        logout() {
            // Get the CSRF token from the XSRF-TOKEN cookie
            const csrfToken = document.cookie
                .split('; ')
                .find(row => row.startsWith('XSRF-TOKEN'))
                .split('=')[1];

            // Make a POST request to the /logout endpoint with the CSRF token in the headers
            axios.post('/logout', {}, {
                headers: {
                    'X-XSRF-TOKEN': csrfToken
                }
            })
                .then(response => {
                    // Reload the page to redirect to the welcome view
                    window.location.reload();
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
};
</script>