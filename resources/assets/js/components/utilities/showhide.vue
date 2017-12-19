<template>
    <div>
        <a href="#" @click="toggle = !toggle" class="font-bold text-blue">{{ toggle ? shotLessText : showMoreText }}</a>
        <p v-if="toggle">{{ text }}</p>
    </div>
</template>

<script>
    export default {
        props: ['text'],
        data () {
            return {
                toggle: false,
                showMoreText: '+ Vis mer',
                shotLessText: '- Vis mindre'

            }
        }
    }
</script>