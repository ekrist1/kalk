<template>
    <div>
        <div id="content" class="px-6 pb-8 pt-20 md:pt-16 w-full max-w-lg mx-auto mt-4">
                <div class="mb-4">
                    <label class="block text-grey text-lg font-bold md:text-center">
                        Strømpriser
                    </label>
                </div>


            <ul class="list-reset flex">
                <li class="mr-6">
                    <a class="text-blue font-bold hover:text-blue-darker border-b-4 border-grey" href="#vendor">Sammenlign</a>
                </li>
                <li class="mr-6">
                    <a class="text-blue font-bold hover:text-blue-darker border-b-4 border-grey" href="#prices">Spotpriser</a>
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

            <div id="vendor" class="mt-4">
                <div class="mt-4 mb-4 border-2 border-grey p-4" v-for="vendor in vendors">
                    <h3 class="text-lg font-bold text-grey-darker mb-3">{{ vendor.company }}</h3>
                    <p>Avtaletype: {{ vendor.agreement_type }}</p>
                    <p>Påslag spotpris: {{ vendor.price }} kr</p>
                    <p>Gebyr: {{ vendor.fee }}</p>
                    <p class="mt-4">Firmabeskrivelse: {{ vendor.description }}</p>

                </div>
            </div>

            <div id="prices" class="mt-4">
                <h3 class="text-lg">Spotpriser</h3>
                <p class="mt-3">Prisen på strøm Norge er delt inn i 5 prisområder. Årsaken til at prisene varierer mellom
                geografiske områder er at det er flaskehalser i overføringskapasiteten. Dersom det for eksempel regner ekstremt mye i Nordland så vil
                prisen i dette prisområdet kunne være lavere enn på Østlandet der hvor det kan være mindre vann i magasinene og at prisen dermed blir høyre på Østlandet.</p>

                <p class="mt-3">Mye av elektrisiteten i Norge er basert på vann- og vindkraft og prisene vil da variere ut i fra
                    etterspørselen i markedet og tilgangen til energi</p>
            </div>
            <div class="mt-4">
                <div class="mt-4 mb-4 border-2 border-grey p-4" v-for="price in prices">
                    <h3 class="text-lg font-bold text-grey-darker mb-3">{{ price.area }}</h3>
                    <p>Pris (kWh): {{ price.price }}</p>
                    <p>Sist oppdatert: {{ price.last_updated | formatDate }}</p>
                    <p>Beskrivelse: {{ price.description }}</p>

                </div>
            </div>

        </div>

    </div>
</template>

<script>
    import moment from 'moment'

    export default {
        props: {
            vendors: {
                type: Array
            },
            prices: {
                type: Array
            }
        },
        filters: {
            formatDate: function (value) {
                if (value) {
                    return moment(String(value)).format('DD/MM/YYYY hh:mm')
                }
            }
        },
        data () {
            return {

            }
        },

    }
</script>