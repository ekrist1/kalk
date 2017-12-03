<template>
    <div>
        <div id="content "class="px-6 pb-8 pt-20 md:pt-16 w-full max-w-lg mx-auto mt-4">
                <form class="w-full">
                      <div class="mb-4">
                          <label class="block text-green-dark text-xl font-light md:text-center" for="inline-full-name">
                            Regn ut din BMI
                          </label>
                    </div>
                    <div class="md:w-2/3">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="Height">
                            Høyde (cm)
                        </label>
                        <input class="bg-grey-lighter appearance-none border-2 border-grey-dark hover:border-purple rounded w-full py-2 px-4 text-grey-darker" id="høyde" name="høyde" type="text" v-model="Height" v-validate="'required|min_value:140|max_value:230|digits:3'" placeholder="Skriv inn tall">
                        <span v-show="errors.has('høyde')" class="text-red-dark text-sm">{{ errors.first('høyde') }}</span>
                    </div>
                    <div class="md:w-2/3 mt-4">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="Weight">
                        Vekt (kg)
                        </label>
                        <input class="bg-grey-lighter appearance-none border-2 border-grey-dark hover:border-purple rounded w-full py-2 px-4 text-grey-darker" id="vekt" name="vekt" type="text" v-model="Weight" v-validate="'required|min_value:20|max_value:250'" placeholder="Skriv inn tall">
                        <span v-show="errors.has('vekt')" class="text-red-dark text-sm">{{ errors.first('vekt') }}</span>
                    </div>
                    <div class="mt-3">
                    <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4" v-bind:class="{ 'opacity-50 cursor-not-allowed': errors.any() }" @click.prevent="calculateBMI">
                      Se din BMI
                    </button>
                        <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4" @click.prevent="clearForm">
                            Nullstill
                        </button>
                    </div>
                </form>
                <div class="mt-3">
                    <p class="font-bold text-lg"> Din BMI er: {{ bmiResult }} {{ bmiMessage }}</p>
                </div>
                <div class="mt-3">
                    <p class="text-sm">Annonse</p>
                    <p v-html="adamazon"></p>
                </div>
                <div class="mt-4">
                    <p>BMI står for «Body Mass Index» og regnes ut fra vekt og høyde. Denne kalkulatoren gir deg raskt oversikt om du har normalvekt, eller om du er overvektig/undervektig  </p>
                </div>
                <div class="mt-4">
                    <p>NB: Barn opp til 17 år har andre normalverdier enn voksne. BMI-grensene gjelder heller ikke for gravide eller om du har høy muskelmasse.</p>
                </div>
                <div class="mt-4">
                    <p class="font-bold">Skala</p>
                    <p>
                        Under 18,5 Undervektig<br>
                        18,5 - 24,9 Normal kroppsvekt<br>
                        25 - 29,9 Overvektig<br>
                        over 30 Fedme
                    </p>
                </div>
            <ads :pagead="ads"></ads>
        </div>

    </div>
</template>

<script>
    import Ads from './Ads';
    export default {
        components: { Ads },
        data() {
            return {
                Height: '',
                Weight: '',
                bmiResult: '',
                bmiMessage: '',
                adamazon: '',
                ads: {
                    title: 'Lei av gamle serier? Prøv Amazon Prime gratis 30 dager',
                    link: 'http://amzn.to/2zYek73',
                    image: '/storage/amazon.png'
                }
            } 
        },
        methods: {
             calculateBMI: function () {
                    if (this.errors.any()) {
                        return
                    }
                    this.bmiResult = Math.round(this.Weight / Math.pow(this.Height, 2) * 10000);
                    this.showBMIMessage()
            },
            showBMIMessage: function () {
                 if (this.bmiResult < 18.5) {
                     this.bmiMessage = '(Du er undervektig)';
                     this.adamazon = '<a href="http://amzn.to/2Bmmtz3" target="_blank">Gå opp i vekt? Prøv ut og kjøp «Naturade Weight Gain Instant Nutrition Drink Mix, Vanilla, 40.6 Ounce» fra Amazon</a> '
                 }
                 else if (this.bmiResult >= 18.5 && this.bmiResult <= 24.9 ) {
                     this.bmiMessage = '(Du har normalvekt)';
                     this.adamazon = '<a href="http://amzn.to/2zr1Q3C" target="_blank">Hold deg i form? Prøv ut og kjøp «Baetea 14 Day Teatox Detox Herbal Tea Supplement (14 Tea Bags)» fra Amazon</a> '
                }
                 else if (this.bmiResult >= 25 && this.bmiResult <= 29.9 ) {
                     this.bmiMessage = '(Du har overvektig)';
                     this.adamazon = '<a href="http://amzn.to/2A7nT2f" target="_blank">Gå ned i vekt? Prøv ut og kjøp «Naturade Weight Gain Instant Nutrition Drink Mix, Vanilla, 40.6 Ounce» fra Amazon</a> '
                 }
                 else if (this.bmiResult >= 30 && this.bmiResult <= 34.9 ) {
                     this.bmiMessage = '(Du har fedme klasse 1)';
                     this.adamazon = '<a href="http://amzn.to/2A7nT2f" target="_blank">Gå ned i vekt? Prøv ut og kjøp «Naturade Weight Gain Instant Nutrition Drink Mix, Vanilla, 40.6 Ounce» fra Amazon</a> '
                 }
                 else if (this.bmiResult >= 35 && this.bmiResult <= 39.9 ) {
                     this.bmiMessage = '(Du har fedme klasse 2)';
                     this.adamazon = '<a href="http://amzn.to/2A7nT2f" target="_blank">Gå ned i vekt? Prøv ut og kjøp «Naturade Weight Gain Instant Nutrition Drink Mix, Vanilla, 40.6 Ounce» fra Amazon</a> '
                 }
                 else if (this.bmiResult >= 40) {
                     this.bmiMessage = '(Du har fedme klasse 3)';
                     this.adamazon = '<a href="http://amzn.to/2A7nT2f" target="_blank">Gå ned i vekt? Prøv ut og kjøp «Naturade Weight Gain Instant Nutrition Drink Mix, Vanilla, 40.6 Ounce» fra Amazon</a> '
                 }
            },
            clearForm: function () {
                this.Height = '';
                this.Weight = '';
                this.bmiMessage = '';
                this.bmiResult = '';
            }

        }
    }
</script>
