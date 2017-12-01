<template>
    <div>
    <div id="content" class="px-6 pb-8 pt-20 md:pt-16 w-full max-w-lg mx-auto mt-4">
        <form class="w-full">
            <div class="mb-6">
                <label class="block text-green-dark text-xl font-light md:text-center" for="inline-full-name">
                    Beregn hvor mye maling du behøver
                </label>
            </div>
            <div class="md:w-2/3">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="Size">
                    Hvor mange kvadratmeter (m²) er rommet du skal male?
                </label>
                <input class="bg-grey-lighter appearance-none border-2 border-grey-dark hover:border-purple rounded w-full py-2 px-4 text-grey-darker" id="størrelse" name="størrelse" type="text" v-model="Size" v-validate="'required|min_value:1|max_value:999'" placeholder="Skriv inn tall">
                <span v-show="errors.has('størrelse')" class="text-red-dark text-sm">{{ errors.first('størrelse') }}</span>
            </div>
            <div class="mt-3">
                <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4" v-bind:class="{ 'opacity-50 cursor-not-allowed': errors.any() }" @click.prevent="calculatePaint">
                    Beregn
                </button>
                <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4" @click.prevent="clearForm">
                    Nullstill
                </button>
            </div>
        </form>
        <div class="mt-3" v-if="paintResult1">
            <p class="font-bold text-lg"> Du behøver mellom: {{ paintResult2 }} og {{ paintResult1 }} liter maling for å male ett strøk på {{ Size }} kvadratmeter</p>
        </div>
        <div class="mt-3" v-if="paintResult1">
            <p class="text-sm">Annonse</p>
            <p v-html="ads"></p>
        </div>
        <div class="mt-4">
            <p>Denne kalkulatoren viser et estimat på hvor mye maling du behøver ved maling på en behandlet gipsvegg. Vi har tatt utgangspunkt i malingen Jotun Lady Wonderwall/Balance</p>
        </div>
        <div class="mt-4">
            <p>Ved utregning av areal (m2) trekker de fra vinduer, dører og andre elementer som ikke skal males.</p>
        </div>
        <div class="mt-4">
            <p class="font-bold">Utregning av kvadratmeter (m²):</p>
            <p>
                Areal = lengde * bredde<br>
                <br>
                Eksempel: Veggens areal = 4,8 meter * 4,1 meter = 19,68 m²
            </p>
        </div>
    </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                Size: '',
                paintResult1: '',
                paintResult2: '',
                paintMessage: '',
                ads: ''
            }
        },
        methods: {
            calculatePaint: function () {
                if (this.errors.any()) {
                    return
                }
                this.paintResult1 = Math.ceil(this.Size / 8);
                this.paintResult2 = Math.ceil(this.Size / 10);
                this.showPaintMessage()
            },
            showPaintMessage: function () {
                    this.paintMessage = '';
                    this.ads = '<a href="http://amzn.to/2hW4qY2" target="_blank">Behøver du maleutstyr? Kjøp «Presa Premium Paint Brushes Set, 5 Piece» fra Amazon</a> '
            },
            clearForm: function () {
                this.Size = '';
                this.paintMessage = '';
                this.paintResult1 = '';
                this.paintResult2 = '';
            }

        }
    }

</script>