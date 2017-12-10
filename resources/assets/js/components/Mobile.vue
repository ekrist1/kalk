<template>
    <div>
        <div id="mobilesubscription" class="md:w-1/3">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="datamengde">
                Sorter på datamengde
            </label>
            <select v-model="datavalue" class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-4 py-2 pr-8 rounded shadow">
                <option selected>Ingen filter</option>
                <option v-for="dataamount in uniqDataValue" v-bind:value="dataamount.data">
                    {{ dataamount.data }} GB
                </option>
            </select>
            <p class="text-xs mt-1">Skriv inn ønsket dataforbruk</p>
        </div>
        <p class="mt-4">
            <button class="text-blue font-bold hover:text-blue-darker" @click="sortedCards('asc')">Laveste pris</button> |
            <button class="text-blue font-bold hover:text-blue-darker" @click="sortedCards('desc')">Høyeste pris</button></p>
        <div class="flex flex-wrap">
            <div class="mt-4 mb-4 mr-3 border-2 border-grey p-4 bg-grey-lightest sm:w-full md:w-full" v-for="(mobilesubscription, index) in filteredSubscriptions" :key="mobilesubscription.id">
                <h3 class="text-lg font-bold text-darkest mb-3">{{ mobilesubscription.name }}</h3>
                <div class="flex flex-wrap -mx-2">
                    <div class="w-full md:w-1/3 px-2">
                        <div class="bg-grey-light h-16">
                            <p class="text-sm text-center pt-2 text-grey-dark">Pris</p>
                            <p class="text-3xl font-light text-center">{{ mobilesubscription.price | fixedCalculatedPrice }} kr </p>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-2">
                        <div class="bg-grey h-16">
                            <p class="text-sm text-center pt-2 text-grey-darkest">Datamengde</p>
                            <p class="text-3xl font-light text-center">{{ mobilesubscription.data }} GB </p>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-2">
                        <div class="bg-grey-light h-16">
                            <p class="text-sm text-center pt-2 text-grey-dark">Fri tale/sms/mms</p>
                            <p class="text-3xl font-light text-center" v-if="mobilesubscription.free_mms">Ja</p>
                            <p class="text-3xl font-light text-center" v-if="!mobilesubscription.free_mms">Nei</p>
                        </div>
                    </div>
                    <button v-if="mobilesubscription.showMore" class="text-blue font-bold hover:text-blue-darker ml-2 mt-2" @click="mobilesubscription.showMore = !mobilesubscription.showMore">
                        Vis mindre informasjon <img src="/storage/ic_expand_less.svg">
                    </button>
                    <button v-if="!mobilesubscription.showMore" class="text-blue font-bold hover:text-blue-darker ml-2 mt-2" @click="mobilesubscription.showMore = !mobilesubscription.showMore">
                        Vis mer informasjon <img src="/storage/ic_expand_more.svg">
                    </button>
                    <div class="w-full px-2 mt-4" v-if="mobilesubscription.showMore">
                        <div class="border">
                            <p class="p-2">Mobilnett: {{ mobilesubscription.network }}</p>
                            <p class="p-2" v-if="mobilesubscription.data_rollover">Data rollover: Ja</p>
                            <p class="p-2" v-if="!mobilesubscription.data_rollover">Data rollover: Nei</p>
                            <p class="p-2 font-bold">Beskrivelse</p>
                            <p class="p-2">{{ mobilesubscription.description }}</p>

                        </div>
                    </div>
                </div>

                <div class="flex items-center bg-indigo text-white text-sm font-bold px-4 py-3 mt-6" role="alert">
                    <img src="/storage/ic_timeline.svg">
                    <p class="ml-3">
                        Dette mobilabonnementet vil koste deg kr {{ calculateYearly(mobilesubscription.price).toLocaleString('de-DE') }} over en 12 månedersperiode.
                    </p>
                </div>
                <p class="text-xs mt-1 text-darker">* Kostnadene er estimater og kan avvike noe fra fakturaen du
                    får fra teleoperatøren (innholdstjenester, gebyrer, overforbruk mm.)</p>
            </div>
        </div>

        <ads :pagead="ads"></ads>

    </div>
</template>

<script>
    import moment from 'moment'
    import Ads from './Ads';

    export default {
        components: { Ads },
        props: {
            initialMobileSubscriptions: {
                type: Array
            },
        },
        data () {
            return {
                datavalue: 'Ingen filter',
                mobilesubscriptions: [],
                ads: {
                    title: 'Lei av gamle serier? Prøv Amazon Prime gratis 30 dager',
                    link: 'http://amzn.to/2zYek73',
                    image: '/storage/amazon.png'
                }
            }
        },
        filters: {
            formatDate: function (value) {
                if (value) {
                    return moment(String(value)).format('DD/MM/YYYY hh:mm')
                }
            },
            roundCalculatedPrice: function (value) {
                return Math.round(value);
            },
            fixedCalculatedPrice: function (value) {
                return _.round(value, 3);
            },


        },
        computed: {
            uniqDataValue () {
                return _.uniqBy(this.mobilesubscriptions, 'data');
            },
            filteredSubscriptions () {
                if(this.datavalue === 'Ingen filter'){
                    return this.mobilesubscriptions;
                }
                return _.filter(this.mobilesubscriptions, {'data': this.datavalue});
            }
        },
        mounted() {
            this.mobilesubscriptions = this.initialMobileSubscriptions;
        },
        methods: {
            sortedCards(sortKey) {
                this.mobilesubscriptions = _.orderBy(this.mobilesubscriptions, 'price', sortKey);
            },
            calculateYearly(price) {
                if (this.errors.any()) {
                    return
                }
                let months = 12; //number of payments months
                return price * months;
            },
        },

    }
</script>