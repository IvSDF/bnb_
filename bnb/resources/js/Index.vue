<template>
    <div>
        <nav class="navbar bg-white border-bottom navbar-light">
            <router-link class="navbar-brand mr-auto px-3" :to="{ name: 'home' }">BNB</router-link>
            <router-link class="btn nav-button" :to="{ name: 'basket' }">
                Basket
                <span v-if="itemsInBasket" class="badge badge-secondary color">{{ itemsInBasket }}</span>
            </router-link>
        </nav>
        <div class="container mt-4 mb-4 pr-4 pl-4"><router-view></router-view></div>
    </div>
</template>

<script>
import { mapState, mapGetters } from "vuex";

export default {
    data() {
        return {
          lastSearch: this.$store.state.lastSearch
        };
    },
    computed: {
        ...mapState({
            lastSearchComputed: 'lastSearch'
        }),
        ...mapGetters({
            itemsInBasket: 'itemsInBasket'
        }),
    }
}
</script>

<style>
.color {
    background-color: #636464;
    color: #edf2f7;
}
</style>
