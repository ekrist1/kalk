<template>
    <div>
        <button
                class="mt-3" @click="toggleCompanyProfile">{{ showCompanyProfile ? closeCompanyProfileText : showCompanyProfileText}}
        </button>
        <p v-if="showCompanyProfile" class="mt-4 text-darker">Firmabeskrivelse: {{ vendordescription }}</p>
    </div>
</template>

<script>
    export default {
        props: ['vendordescription'],
        data () {
            return {
                showCompanyProfile: false,
                showCompanyProfileText: 'Vis mer informasjon',
                closeCompanyProfileText: 'vis mindre informasjon'
            }
        },
        methods: {
            toggleCompanyProfile: function () {
                this.showCompanyProfile = !this.showCompanyProfile
            }
        }
    }
</script>