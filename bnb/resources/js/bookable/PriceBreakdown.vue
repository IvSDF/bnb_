<template>
    <div>
        <h6 class="text-uppercase text-secondary fw-bolder">Price</h6>

        <div
            v-for="(days, price) in price.breakdown"
            :key="price"
            class="pt-2 pb-2 border-bottom border-top d-flex justify-content-between"
        >
            <span>
                Days:
            </span>
            <span>
                {{ days }}
            </span>
        </div>
        <div
            v-for="(d, price) in price.breakdown"
            :key="price"
            class="pt-2 pb-2 border-bottom border-top d-flex justify-content-between">
            <span>
               Price:
            </span>
            <span>
                ${{ price }}
            </span>
        </div>

        <div class="pt-2 pb-2 font-weight-bolder d-flex justify-content-between">
            <span>Total price:</span>
            <span>${{ price.total}}</span>
            </div>
    </div>

</template>

<script>
export default {
    name: "PriceBreakdown",
    props: {
        price: Object
    }
}
</script>

