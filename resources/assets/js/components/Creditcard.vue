<template>
    <div>
        <div id="content" class="px-6 pb-8 pt-20 md:pt-16 w-full max-w-lg mx-auto mt-4">
            <div class="mb-4">
                <label class="block text-green-dark text-xl font-light md:text-center">
                    Finn ut hva kredittkortet koster deg og hvilke kort som gir de beste fordelene
                </label>
            </div>

            <div class="container mx-auto text-center">
                <img src="/storage/credit.svg" alt="Bilde av kreditt" height="350px">
            </div>

            <ul class="list-reset flex">
                <li class="mr-6">
                    <a class="text-green font-bold hover:text-green-darker border-b-4 border-green-dark" href="#creditcard">Kredittkortoversikt</a>
                </li>
                <li class="mr-6">
                    <a class="text-green font-bold hover:text-green-darker border-b-4 border-green-dark" href="#about">Om kredittkort</a>
                </li>
            </ul>

            <div class="mt-4">
                <p>Kredittkort er et betalingskort som gir deg kreditt ved betaling av varer og tjenester. Som forbruker spare penger ved å velge det rette kredittkortet. </p>
            </div>
            <div class="mt-4">
                <p>Når du kjøper varer og tjenester låner du penger av banken eller kredittforetaket. Rentesatsen på kredittkort er svært høy og
                ofte høyre enn vanlige forbrukslån. Det er også fordeler med å bruke kredittkort. Mange selskap tilbyr en rentefri
                periode der du ikke betaler rente for pengene du låner. En annen fordel er at mange kort har reiseforsikring inkludert
                om du bruker kortet til å kjøpe reisen.</p><br>
            </div>
            <div class="mt-4">
            </div>
            <div id="creditcard" class="md:w-1/3">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="kreditt">
                    Kredittbeløp?
                </label>
                <input class="bg-grey-lighter appearance-none border-2 border-grey-dark hover:border-purple rounded w-full py-2 px-4 text-grey-darker" id="kreditt" name="kreditt" type="text" v-model="creditvalue" v-validate="'required|min_value:1|max_value:1000000'" placeholder="Skriv inn tall">
                <span v-show="errors.has('kreditt')" class="text-red-dark text-sm">{{ errors.first('kreditt') }}</span>
                <p class="text-xs mt-1">Skriv inn kredittbeløp for å få beregnet kostnadene på de ulike kortene</p>
            </div>
            <p class="mt-4">
                <button class="text-blue font-bold hover:text-blue-darker" @click="sortKey = 'asc'">Laveste pris</button> |
                <button class="text-blue font-bold hover:text-blue-darker" @click="sortKey = 'desc'">Høyeste pris</button></p>
            <div class="flex flex-wrap">
                <div class="mt-4 mb-4 mr-3 border-2 border-grey p-4 bg-grey-lightest sm:w-full md:w-full" v-for="(creditcard, index) in creditcards" :key="creditcard.id">
                    <h3 class="text-lg font-bold text-darkest mb-3">{{ creditcard.name }}</h3>
                    <p class="text-darker">Avtalenavn: </p>

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
                        <p class="ml-3">Estimert pris per mnd.: ,-</p>
                    </div>
                    <p class="text-xs mt-1 text-darker">Vi tar forbehold om feil</p>
                </div>
            </div>

            <ads :pagead="ads"></ads>

            <div id="prices" class="mt-4">
                <h3 class="text-lg">Om kredittkort</h3>
                <p class="mt-3">I Norge finnes det flere hundre ulike typer kredittkort. Vår oversikt gir det muligheten til å velge
                det kredittkortet som passer deg best.</p>
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
            initialCreditcards: {
                type: Array
            },
        },
        data () {
            return {
                creditvalue: '',
                creditcards: [],
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

        },
        mounted() {
            this.creditcards = this.initialCreditcards;
        },
        methods: {
            sortedCards() {
                return _.orderBy(this.creditcards, 'name', this.sortKey);
            }
        },

    }
</script>