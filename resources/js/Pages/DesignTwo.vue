<template>
    <v-app id="inspire">
        <v-navigation-drawer v-if="$vuetify.display.smAndDown" app v-model="drawer">
            <!--  -->
        </v-navigation-drawer>

        <v-app-bar app class="glass-shadow">
             <img
                 width="50"
                 height="50"
                 src="/assets/img/z-logo.png"
                 class="mx-3 glass"
                 alt="Zig.Exchange"
             />
            <v-spacer/>
            <v-app-bar-nav-icon v-if="$vuetify.display.smAndDown" @click="drawer = !drawer"></v-app-bar-nav-icon>

            <div v-if="$vuetify.display.smAndUp" class="d-flex">
                   <InertiaLink class="nav-link" aria-current="page" :href="route('welcome')">
                       <v-btn>
                           Home
                       </v-btn>
                   </InertiaLink>
                   <InertiaLink class="nav-link" href="#">
                       <v-btn>
                           Contact Us
                       </v-btn>
                   </InertiaLink>
                   <InertiaLink class="nav-link" href="#">
                       <v-btn>
                           FAQ
                       </v-btn>
                   </InertiaLink>
               </div>
        </v-app-bar>

        <v-main>
             <div class="main-hero text-white d-flex flex-column justify-center align-center">
                 <h1 >ZIG. Exchange</h1>
                 <p class="mt-3">Obtain the best exchange rates with our real-time comparison</p>
             </div>
           <v-container>
               <v-card variant="flat" class="welcome-div glass-shadow-lg">
                   <v-tabs  v-model="tab" v-if="$vuetify.display.smAndUp" bg-color="green-darken-4" stacked  grow >
                       <v-tab value="two">
                           <v-icon icon="ph-arrows-clockwise"  />
                           ZIG Conversions
                       </v-tab>

                       <v-tab value="one">
                           <v-icon icon="ph-planet"  />
                           Global FX Rates
                       </v-tab>

                       <v-tab value="three">
                           <v-icon icon="ph-trend-up"  />
                           Historical Values
                       </v-tab>
                   </v-tabs>

                   <v-tabs  v-model="tab" v-else bg-color="green-darken-4"  stacked >
                       <v-tab value="two" class="_12px">
                           <v-icon icon="ph-arrows-clockwise"  />
                           Convert
                       </v-tab>
                       <v-tab value="one" class="_12px">
                           <v-icon icon="ph-planet"  />
                           Global FX Rates
                       </v-tab>
                       <v-tab value="three" class="_12px">
                           <v-icon icon="ph-trend-up"  />
                           History
                       </v-tab>
                   </v-tabs>

                    <v-card-text>
                        <v-tabs-window v-model="tab">
                            <v-tabs-window-item value="two">

                                <v-row class="mt-5">
                                    <v-col cols="12" md="4">
                                        <v-text-field
                                            label="Amount"
                                            v-model="form.zigamount"
                                            @input="zigExchanges"
                                        />

                                        <v-text-field
                                            label="Exchange Amount"
                                            v-model="form.zigexchange_amount"
                                            @input="zigExchangesFrom"
                                        />
                                    </v-col>
                                    <v-col cols="12" md="4">
                                        <v-select
                                            label="From"
                                            variant="outlined"
                                            density="comfortable"
                                            :items="['ZIG']"
                                            chips
                                            v-model="form.zigbase_currency"
                                        >
                                        </v-select>
                                    </v-col>

                                    <v-col cols="12" md="4">
                                        <v-select
                                            label="To"
                                            variant="outlined"
                                            density="comfortable"
                                            :items="$page.props.currencies"
                                            item-value="code"
                                            :item-title="item => item.code +' | '+item.name"
                                            chips
                                            v-model="form.zigexchange_currency"
                                            @update:model-value="zigExchanges"
                                        >
                                            <template v-slot:chip="{ props, item }">
                                                <v-chip

                                                    v-bind="props"
                                                    :prepend-avatar="`https://flagcdn.com/`+item.raw.flag+`.svg`"
                                                >
                                                    {{ item.raw.code +' | '+item.raw.name }}
                                                </v-chip>
                                            </template>
                                        </v-select>
                                    </v-col>

                                </v-row>
                                <v-card>
                                    <v-card-text>
                                        <p class="text-h5"> {{ form.zigamount }}  Zimbabwe Gold =</p>
                                        <p  class="text-h4 my-3">{{  form.zigexchange_amount }} {{ form.zigexchange_currency }}</p>
                                    </v-card-text>
                                </v-card>
                            </v-tabs-window-item>


                            <v-tabs-window-item value="one">
                                 <v-row class="mt-5">
                                     <v-col cols="12" md="4">
                                         <v-text-field
                                             label="Amount"
                                             v-model="form.amount"
                                             @input="convertEx"
                                         />
                                     </v-col>
                                    <v-col cols="12" md="4">
                                        <v-autocomplete
                                            label="From"
                                            variant="outlined"
                                            density="comfortable"
                                            :items="$page.props.currencies"
                                            item-value="code"
                                            :item-title="item => item.code +' | '+item.name"
                                            chips
                                            v-model="form.base_currency"
                                            @update:model-value="getNewData"
                                        >

                                            <template v-slot:chip="{ props, item }">
                                                <v-chip
                                                    style="min-width: 300px"
                                                    v-bind="props"
                                                     :prepend-avatar="`https://flagcdn.com/`+item.raw.flag+`.svg`"
                                                >
                                                    {{ item.raw.code +' | '+item.raw.name }}
                                                </v-chip>
                                            </template>
                                        </v-autocomplete>
                                    </v-col>

<!--                                     <v-col cols="12" md="1" class="text-center">-->
<!--                                         <v-avatar color="primary" class="pa-2" size="50">-->
<!--                                             <img width="60" src="/imgs/marketeq&#45;&#45;exchange.svg" alt=""/>-->
<!--                                         </v-avatar>-->
<!--                                     </v-col>-->

                                     <v-col cols="12" md="4">
                                         <v-autocomplete
                                             label="To"
                                             variant="outlined"
                                             density="comfortable"
                                             :items="$page.props.currencies"
                                             item-value="code"
                                             :item-title="item => item.code +' | '+item.name"
                                             chips
                                             v-model="form.exchange_currency"
                                             @update:model-value="convertEx"
                                         >
                                             <template v-slot:chip="{ props, item }">
                                                 <v-chip
                                                     style="min-width: 300px; background: transparent"
                                                     v-bind="props"
                                                     :prepend-avatar="`https://flagcdn.com/`+item.raw.flag+`.svg`"
                                                 >
                                                     {{ item.raw.code +' | '+item.raw.name }}
                                                 </v-chip>
                                             </template>
                                         </v-autocomplete>
                                     </v-col>

                                 </v-row>
                                <v-card>
                                    <v-card-text>
                                        <p class="text-h5"> {{ form.amount }}  {{ base_currency.name }} =</p>
                                        <p  class="text-h4 my-3">{{ form.exchange_amount }} {{ exchange_currency.name }}</p>
                                    </v-card-text>

                                    <v-row class="d-flex align-center">

                                        <v-col cols="12" md="5">
                                            <v-alert type="info">
                                                <a style="color: white" href="https://www.exchangerate-api.com/docs/overview">
                                                    We use API data
                                                </a>
                                            </v-alert>
                                        </v-col>

                                        <v-col>
                                            <p>
                                                <span class="text-primary">{{  base_currency.name }} </span> to {{  exchange_currency.name }}  conversion — Last updated
                                                {{ $page.props.time_last_update_utc }}
                                            </p>
                                        </v-col>
                                    </v-row>
                                </v-card>
                            </v-tabs-window-item>

                            <v-tabs-window-item value="three">
                                Three
                            </v-tabs-window-item>
                        </v-tabs-window>
                    </v-card-text>
               </v-card>
           </v-container>
        </v-main>
    </v-app>
</template>

<script>
export default {
    data(){
        return{
            tab:'two',
            base_currency:null,
            exchange_currency:null,

            zigamount:1,
            zigexchange_currency:null,
            zigexchange_amount:1,

            form:this.$inertia.form({
                amount:1,
                base_currency:this.$page.props.base_currency,
                exchange_currency:this.$page.props.exchange_currency,
                exchange_amount:this.$page.props.exchange_amount,

                zigamount:1,
                zigbase_currency:'ZIG',
                zigexchange_currency:'USD',
                zigexchange_amount:1
            })
        }
    },

    mounted() {
        this.convertEx()
        this.zigExchanges()
        this.base_currency     = this.$page.props.currencies.find(x => x.code === this.form.base_currency);
        this.exchange_currency = this.$page.props.currencies.find(x => x.code === this.form.exchange_currency);

    },

    methods:{

        zigExchanges(){
            const selectedPrice = this.$page.props.officialGoldPrices;
            let zigValue = (selectedPrice.price/1000) //Gives us ZIG US value
            this.form.zigexchange_amount = (zigValue * this.form.zigamount).toFixed(5);
        },

        zigExchangesFrom(){
            this.form.zigamount  =  (this.form.zigexchange_amount/(this.$page.props.officialGoldPrices.price/1000)).toFixed(5)
        },




        convertEx(){

            this.exchange_currency = this.$page.props.currencies.find(x => x.code === this.form.exchange_currency);
            const bbdExchangeRate     = this.getExchangeRate(this.form.exchange_currency);
            this.form.exchange_amount = (this.form.amount * bbdExchangeRate).toFixed(5);
        },

        getExchangeRate(currencyCode) {
            let exchangeRates  = this.$page.props.conversion_rates
            return exchangeRates[currencyCode];
        },

        convertExFrom(){
            const bbdExchangeRate  = this.getExchangeRate(this.form.exchange_currency);
            this.form.amount       = (this.form.exchange_amount/bbdExchangeRate).toFixed(5);
        },

        getNewData(){
            this.form.get(route('welcome'))
        }
    }
}
</script>
<style>
    .main-hero{
        margin-top: -5px;
        background-image: url("/assets/img/abstract.jpg");
        min-height: 350px;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .welcome-div{
        min-height: 350px;
        margin-top: -8%;
    }

    @media (max-width: 600px) {
        .main-hero h1{
            font-size: 40px !important;
        }

        .main-hero p{
            font-size: 16px !important;
            text-align: center !important;
            height: 200px !important;
        }

        .welcome-div{
            margin-top: -50% !important;
        }
    }
</style>
