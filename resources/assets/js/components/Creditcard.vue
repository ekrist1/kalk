<template>
    <div>
        <div id="creditcard" class="md:w-1/3">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="kreditt">
                Kredittbeløp?
            </label>
            <input class="bg-grey-lighter appearance-none border-2 border-grey-dark hover:border-purple rounded w-full py-2 px-4 text-grey-darker" id="kreditt" name="kreditt" type="text" v-model="creditvalue" v-validate="'required|min_value:1|max_value:1000000'" placeholder="Skriv inn tall">
            <span v-show="errors.has('kreditt')" class="text-red-dark text-sm">{{ errors.first('kreditt') }}</span>
            <p class="text-xs mt-1">Skriv inn kredittbeløp for å få beregnet kostnadene på de ulike kortene</p>
        </div>
        <p class="mt-4">
            <button class="text-blue font-bold hover:text-blue-darker" @click="sortedCards('asc')">Laveste eff. rente</button> |
            <button class="text-blue font-bold hover:text-blue-darker" @click="sortedCards('desc')">Høyeste eff. rente</button></p>
        <div class="flex flex-wrap">
            <div class="mt-4 mb-4 mr-3 border-2 border-grey p-4 bg-grey-lightest sm:w-full md:w-full" v-for="(creditcard, index) in creditcards" :key="creditcard.id">
                <h3 class="text-lg font-bold text-darkest mb-3">{{ creditcard.name }}</h3>
                <div class="flex flex-wrap -mx-2">
                    <div class="w-full md:w-1/3 px-2">
                        <div class="bg-grey-light h-16">
                            <p class="text-sm text-center pt-2 text-grey-dark">Effektiv rente</p>
                            <p class="text-3xl font-light text-center">{{ creditcard.effective_interest_rate | fixedCalculatedPrice}} % </p>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-2">
                        <div class="bg-grey h-16">
                            <p class="text-sm text-center pt-2 text-grey-darkest">Årsgebyr</p>
                            <p class="text-3xl font-light text-center">{{ creditcard.yearly_fee }} kr </p>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-2">
                        <div class="bg-grey-light h-16">
                            <p class="text-sm text-center pt-2 text-grey-dark">Rentefri kreditt</p>
                            <p class="text-3xl font-light text-center">{{ creditcard.interestfree_days }} dager </p>
                        </div>
                    </div>
                    <div class="w-full px-2 mt-2" v-if="creditcard.affiliate_url">
                        <a v-bind:href="creditcard.affiliate_url" target="_blank" class="bg-grey-light hover:bg-grey text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center w-full">
                            <span class="ml-auto mr-auto">Søknad {{ creditcard.name }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-external-link"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                        </a>
                    </div>
                    <button v-if="creditcard.showMore" class="text-blue font-bold hover:text-blue-darker ml-2 mt-2" @click="creditcard.showMore = !creditcard.showMore">
                        Vis mindre informasjon <img src="/storage/ic_expand_less.svg">
                    </button>
                    <button v-if="!creditcard.showMore" class="text-blue font-bold hover:text-blue-darker ml-2 mt-2" @click="creditcard.showMore = !creditcard.showMore">
                         Vis mer informasjon <img src="/storage/ic_expand_more.svg">
                    </button>
                    <div class="w-full px-2 mt-4" v-if="creditcard.showMore">
                        <div class="border">
                            <p class="p-2 font-bold">Gebyrer</p>
                            <p class="p-2">{{ creditcard.no_withdrawal_fixed_fee }} kr + {{ creditcard.no_withdrawal_percentage_fee | fixedCalculatedPrice }} % rente ved uttak</p>
                            <p class="p-2" v-if="creditcard.foreign_currency_fee">Valutapåslag ved uttak i utlandet: {{ creditcard.foreign_currency_fee }}%</p>
                            <p class="p-2 font-bold" v-if="creditcard.description">Beskrivelse</p>
                            <p class="p-2">{{ creditcard.description }}</p>

                        </div>
                    </div>
                </div>
                <p class="mt-3">Renteeksempel:</p>
                <div class="flex items-center bg-indigo text-white text-sm font-bold px-4 py-3 mt-1" role="alert">
                   <img src="/storage/ic_timeline.svg">
                    <p class="ml-3">
                        En kreditt på {{ creditvalue.toLocaleString('de-DE') }} vil koste deg ca.
                        {{ calculateInterest(creditvalue, creditcard.effective_interest_rate) | roundCalculatedPrice}},-
                        kr per. mnd over 12 mnd. Totale kredittkostnader over 12 mnd. er på ca.
                        kr {{ (calculateInterest(creditvalue, creditcard.effective_interest_rate) * 12) - creditvalue | roundCalculatedPrice }},-
                    </p>
                </div>
                <p class="text-xs mt-1 text-darker">* Kredittkostnadene er estimater og kan avvike noe fra fakturaen du får fra kredittkortselskapet  </p>
            </div>
        </div>

        <ads :pagead="ads"></ads>

    </div>
</template>

<script>
    import moment from 'moment'
    import Powercontact from './PowerContact.vue';
    import Ads from './Ads';

    export default {
        components: { Powercontact, Ads },
        props: {
            initialCreditcards: {
                type: Array
            },
        },
        data () {
            return {
                creditvalue: 15000,
                creditcards: [],
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
            }

        },
        computed: {

        },
        mounted() {
            this.creditcards = this.initialCreditcards;
        },
        methods: {
            sortedCards(sortKey) {
                this.creditcards = _.orderBy(this.creditcards, 'effective_interest_rate', sortKey);
            },
            calculateInterest(amount, interest) {
                if (this.errors.any()) {
                    return
                }
                let i = interest / 100 / 12; //monthly interest rate
                let months = 12; //number of payments months
                return amount * i * (Math.pow(1 + i, months)) / (Math.pow(1 + i, months) - 1);
            },
        },

    }
</script>