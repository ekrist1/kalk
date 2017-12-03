<template>
    <div>
        <p class="text-xs mt-2">Annonse</p>
        <a :href="ad.link">
            <div class="border-2 border-dashed border-grey bg-white p-1">
                <h2 class="text-lg text-center mb-2">{{ ad.title }}</h2>
                <img class="w-full" :src="ad.image" alt="Amazon ad">
            </div>
        </a>
    </div>
</template>

<script>
    export default {
        props: ['pagead'],
        data () {
            return {
                ad: []
            }
        },
        mounted() {
            this.ad = this.pagead
        }
    }
</script>