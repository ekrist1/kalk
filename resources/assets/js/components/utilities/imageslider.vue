<template>
    <div>
        <div class="items-center flex">
             <img class="w-32 h-32 rounded-full mr-4 mr-auto ml-auto" :src="images[Math.abs(currentNumber) % images.length]" alt="Produktbilder" />
        </div>
        <div class="mt-4 text-center">
            <a href="#" @click="prev" class="text-grey">Forrige bilde</a>  <a href="#" @click="next" class="ml-3 text-grey">Neste bilde</a>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['initialImages'],
        data () {
            return {
                images: [],
                currentNumber: 0

            }
        },
        mounted() {
            this.images = this.initialImages;
        },
        methods: {
            next: function() {
                this.currentNumber += 1
            },
            prev: function() {
                this.currentNumber -= 1
            }
        }
    }
</script>