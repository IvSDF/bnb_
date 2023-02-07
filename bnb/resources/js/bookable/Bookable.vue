<template>
    <div class="row">
        <div class="col-md-8 pb-4">
            <div class="card">
                <div class="card-body">
                    <div v-if="!louding">
                        <h2>{{ bookable.title }}</h2>
                        <hr />
                        <article>{{ bookable.description }}</article>
                    </div>
                    <div v-else>Louding...</div>
                </div>
            </div>
            <review-list :bookable-id="this.$route.params.id"></review-list>
        </div>
        <div class="col-md-3 pb-4">
            <availability :bookable-id="this.$route.params.id"></availability>
        </div>

    </div>
</template>

<script>
import Availability from "./Availability";
import ReviewList from "./ReviewList.vue";
export default {
    components: {
        Availability,
        ReviewList
    },
    data() {
      return {
          bookable: null,
          louding: false
      };
    },
    created() {
        this.louding = true;
        axios.get(`/api/bookables/${this.$route.params.id}`).then(response => {
            this.bookable = response.data.data;
            this.louding = false;
        });

    }
};
</script>
