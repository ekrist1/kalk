<template>
    <div>
        <div class="tabs is-centered">
            <ul>
                <li v-for="tab in tabs" :key="tab.id" :class="{ 'is-active': isActivated(tab) }"><a @click="selectTab(tab)">{{ tab.name }}</a></li>
            </ul>
        </div>
    </div>

</template>

<script>
    export default {
        props: {
            tabsInitial: {
                type: Array,
            }
        },
        data () {
            return {
                tabs: this.tabsInitial,
                selectedTabIndex: 0,
            }
        },
        methods: {
            selectTab(tab) {
                this.selectedTabIndex = tab.id;
                this.$eventHub.$emit('showTabContentIndex', tab)
            },

            isActivated(tab) {
                return tab.id === this.selectedTabIndex;
            }
        }
    }
</script>