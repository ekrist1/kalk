<template>
    <div>
        <div id="content" class="px-6 pb-8 pt-20 md:pt-16 w-full max-w-lg mx-auto mt-4">
                <div class="mb-4">
                    <label class="block text-green-dark text-xl font-light md:text-center">
                        Finn den billigste strømleverandøren og beregn strømkostnadene dine
                    </label>
                </div>

            <div class="container mx-auto text-center">
                <img src="/storage/energy.svg" alt="Bilde av energi">
            </div>

            <ul class="list-reset flex">
                <li class="mr-6">
                    <a class="text-green font-bold hover:text-green-darker border-b-4 border-green-dark" href="#vendor">Strømkalkulator</a>
                </li>
                <li class="mr-6">
                    <a class="text-green font-bold hover:text-green-darker border-b-4 border-green-dark" href="#prices">Om spotpriser</a>
                </li>
            </ul>

            <div class="mt-4">
                <p>I Norge er kraftmarkedet deregulert og det er fri konkurranse mellom strømleverandørene i markedet. Som forbruker kan du benytte denne konkurransen til å få billigere strøm. </p>
            </div>
            <div class="mt-4">
                <p>Kraftmarkedet er komplekst, men enkelt forklart man man si at produsentene av kraft selger mye av strømmen sin
                på den Nordiske strømbørsen Nordpool. Strømleverandørene kjøper strømmen sin på børsen.</p><br>
                <p> Prisene på strømbørsen endres fra time til time
                    basert på tilbud og etterspørsel i markedet. Når strømleverandørene kommuniserer at de selger spotprisavtaler, betyr dette at de selger strømmen til
                    forbrukeren til den prisen leverandøren kjøper strømmen for på børsen.</p>
            </div>
            <div class="mt-4">
            </div>
            <div id="vendor" class="md:w-1/3">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="kwh">
                    Hvor mye strøm bruker du i løpet av året?
                </label>
                <input class="bg-grey-lighter appearance-none border-2 border-grey-dark hover:border-purple rounded w-full py-2 px-4 text-grey-darker" id="kwh" name="kwh" type="number" v-model="kwh" v-validate="'required|min_value:1|max_value:1000000'" placeholder="Skriv inn tall">
                <span v-show="errors.has('kwh')" class="text-red-dark text-sm">{{ errors.first('kwh') }}</span>
                <p class="text-xs mt-1">For å finne en estimert pris på spotprisavtalene, skriv inn ditt årsforbruk på strøm (kWh)</p>
            </div>
            <div class="md:w-1/3 mt-3">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="spot">
                    Spotpris <a href="#prices" class="text-green">(Dagens spotpriser)</a>
                </label>
                <input class="bg-grey-lighter appearance-none border-2 border-grey-dark hover:border-purple rounded w-full py-2 px-4 text-grey-darker" id="spot" name="spot" type="text" v-model="spot" v-validate="'required|min_value:0|max_value:300'" placeholder="Skriv inn tall">
                <span v-show="errors.has('spot')" class="text-red-dark text-sm">{{ errors.first('spot') }}</span>
                <p class="text-xs mt-1">Spotsprisen oppgitt er basert gjennomsnittsprisen i Norge. Oppdateres daglig. </p>
            </div>
            <p class="mt-4">
            <button class="text-blue font-bold hover:text-blue-darker" @click="sortKey = 'asc'">Laveste pris</button> |
            <button class="text-blue font-bold hover:text-blue-darker" @click="sortKey = 'desc'">Høyeste pris</button></p>
            <div class="flex flex-wrap">
                <div class="mt-4 mb-4 mr-3 border-2 border-grey p-4 bg-grey-lightest sm:w-full md:w-full" v-for="(vendor, index) in sortedVendors" :key="vendor.id">
                    <p class="text-sm text-green-dark" v-if="index === 0 && sortKey === 'asc'">Strømvinner</p>
                    <h3 class="text-lg font-bold text-darkest mb-3">{{ vendor.company }}</h3>
                    <p class="text-darker">Avtalenavn: {{ vendor.agreement_type }}</p>
                    <p class="text-darker">Påslag spotpris: {{ vendor.price }} øre/kWh</p>
                    <p class="text-darker">Gebyr: {{ vendor.fee }}</p>
                    <powercontact :vendordescription="vendor.description"></powercontact>
                    <div class="flex items-center bg-orange text-white text-sm font-bold px-4 py-3 mt-6" role="alert">
                        <svg fill="#FFFFFF" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <defs>
                                <path d="M0 0h24v24H0V0z" id="a"/>
                            </defs>
                            <clipPath id="b">
                                <use overflow="visible" xlink:href="#a"/>
                            </clipPath>
                            <path clip-path="url(#b)" d="M23 8c0 1.1-.9 2-2 2-.18 0-.35-.02-.51-.07l-3.56 3.55c.05.16.07.34.07.52 0 1.1-.9 2-2 2s-2-.9-2-2c0-.18.02-.36.07-.52l-2.55-2.55c-.16.05-.34.07-.52.07s-.36-.02-.52-.07l-4.55 4.56c.05.16.07.33.07.51 0 1.1-.9 2-2 2s-2-.9-2-2 .9-2 2-2c.18 0 .35.02.51.07l4.56-4.55C8.02 9.36 8 9.18 8 9c0-1.1.9-2 2-2s2 .9 2 2c0 .18-.02.36-.07.52l2.55 2.55c.16-.05.34-.07.52-.07s.36.02.52.07l3.55-3.56C19.02 8.35 19 8.18 19 8c0-1.1.9-2 2-2s2 .9 2 2z"/>
                        </svg>
                        <p class="ml-3">Estimert pris per mnd.: {{ vendor.consumer_price | roundCalculatedPrice }},-</p>
                    </div>
                    <p class="text-xs mt-1 text-darker">Vær obs på at enkelte områder i Nord-Norge er fritatt moms og andre avgifter slik
                    at den estimerte prisen kan være lavere i disse områdene. Nettleie kommer i tillegg.</p>
                </div>
            </div>

            <ads :pagead="ads"></ads>

            <div id="prices" class="mt-4">
                <h3 class="text-lg">Spotpriser</h3>
                <p class="mt-3">Prisene på strøm kan variere avhengig av hvilket prisområde du bor i. Norge er delt inn i 5 prisområder. Årsaken til at prisene varierer mellom
                geografiske områder er grunnet flaskehalser i overføringskapasiteten. Prisene på kraft i de ulike prisområdene påvirkes av hvor mye etterspørsel
                    det er og hvor stort tilbud det er på energi. Dersom det i perioder regner veldig mye i ett prisområde så kan prisene her bli lavere enn i andre
                prisområder</p>

                <p class="mt-3">Mye av elektrisiteten i Norge er basert på vann- og vindkraft og prisene vil da variere ut i fra
                    etterspørselen i markedet og tilgangen til energi.</p>

                <p class="mt-3">For en vanlig privatperson og forbruker er det svært vanskelig å konkret kunne beregne strømkostnadene om
                du har en spotavtale siden prisene varierer time for time, og dag for dag. Denne oversikten gir en god indikasjon på hvor mye strømselskapene betaler når du kjøper strøm
                på Nord Pool børsen. Når vi kalkulerer prisene i kalkulatoren ovenfor tar vi utgangspunkt i gjennomsnittsprisen siste kvartal som
                er tilgjengelig på SSB sine nettsider.</p>
            </div>
            <div class="mt-4">
                <div class="mt-4 mb-4 border-2 border-grey p-4" v-for="price in prices">
                    <h3 class="text-lg font-bold text-grey-darker mb-3">{{ price.area }}</h3>
                    <p>Pris (kWh): {{ (price.price / 1000).toFixed(4) }} eksl.mva</p>
                    <p>Sist oppdatert: {{ price.last_updated | formatDate }}</p>
                    <p>Beskrivelse: {{ price.description }}</p>

                </div>
            </div>

        </div>

    </div>
</template>

<script>
    import moment from 'moment'
    import Powercontact from './PowerContact.vue';
    import Ads from './Ads';

    export default {
        components: { Powercontact, Ads },
        props: {
            initialVendors: {
                type: Array
            },
            prices: {
                type: Array
            },
            elspotaverage: {
                type: Number
            }
        },
        data () {
            return {
                kwh: 12000,
                spot: {
                    type: Number
                },
                vendors: [],
                sortKey: 'asc',
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
            }
        },
        computed: {
            sortedVendors() {
                for (let i = 0; i < this.vendors.length; i++) {
                    this.$set(this.vendors[i], 'consumer_price', parseFloat(this.vendors[i].fee) + ((this.kwh / 12) * (parseFloat(this.spot) + (this.vendors[i].price / 100))))
                }
                return _.orderBy(this.vendors, 'consumer_price', this.sortKey);
            }
        },
        mounted() {
          this.spot = this.elspotaverage;
          this.vendors = this.initialVendors;
        },
        methods: {

        },

    }
</script>