<template>
    <div>
        <frontend-header :isLoggedIn="true"/>
        Welcome {{ name }} to User Dashboard
    </div>
</template>

<script>
import FrontendHeader from '../frontend/shared/FrontendHeader.vue';
export default {
  components: { FrontendHeader },
    name: "Dashboard",
    data() {
        return {
            name: null,
            isLoggedin:false,
        }
    },
    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        if (window.Laravel.user.role == 'admin') {
            window.location.href = "/admin/home";
        }
        next();
    }
}
</script>
