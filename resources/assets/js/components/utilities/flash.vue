<template>
    <div v-if="message" class="flex items-center bg-blue text-white text-sm font-bold px-4 py-3 mb-6" role="alert">
        {{ message }}
    </div>
</template>

<script>
    export default {
        props: ['status'],
        data () {
            return {
                message: ''
            }
        },
        mounted () {
            this.message = this.status;
            this.hide()
        },
        methods: {
            hide() {
                setTimeout(() => {
                    this.message = '';
                }, 9000);
            },
        }
    }
</script>