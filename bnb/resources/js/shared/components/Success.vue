<template>
    <div class="text-center success">
        <i class="fa-thin fa-thumbs-up"></i>
        <h1 class="mt-4">Success!</h1>
        <h2>
            <slot></slot>
        </h2>
    </div>
</template>

<style scoped>
.success {
    color: #999;
    font-size: 10rem;
}
</style>
