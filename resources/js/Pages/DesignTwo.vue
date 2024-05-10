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
                   <InertiaLink class="nav-link" aria-current="page" :href="route('DesignTwo')">
                       <v-btn>
                           Home
                       </v-btn>
                   </InertiaLink>
                   <InertiaLink class="nav-link" :href="route('welcome')">
                       <v-btn variant="flat" color="error">
                           Design One
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
                       <v-tab value="one">
                           <v-icon icon="ph-planet"  />
                           Global FX Rates
                       </v-tab>

                       <v-tab value="two">
                           <v-icon icon="ph-arrows-clockwise"  />
                           ZIG Conversions
                       </v-tab>

                       <v-tab value="three">
                           <v-icon icon="ph-trend-up"  />
                           Historical Values
                       </v-tab>
                   </v-tabs>

                   <v-tabs  v-model="tab" v-else bg-color="green-darken-4"  stacked >
                       <v-tab value="one" class="_12px">
                           <v-icon icon="ph-planet"  />
                           Global FX Rates
                       </v-tab>

                       <v-tab value="two" class="_12px">
                           <v-icon icon="ph-arrows-clockwise"  />
                           Convert
                       </v-tab>

                       <v-tab value="three" class="_12px">
                           <v-icon icon="ph-trend-up"  />
                           History
                       </v-tab>
                   </v-tabs>

                    <v-card-text>
                        <v-tabs-window v-model="tab">
                            <v-tabs-window-item value="one">
                                 <v-row class="mt-5">
                                     <v-col cols="12" md="3">
                                         <v-text-field
                                             label="Amount"
                                             v-model="form.amount"
                                         />
                                     </v-col>
                                    <v-col cols="12" md="4">
                                        <v-autocomplete
                                            label="From"
                                            variant="outlined"
                                            density="comfortable"
                                            :items="$page.props.currencies"
                                            item-value="currency_id"
                                            :item-title="item => item.currency_id +' | '+item.name"
                                            chips
                                            v-model="form.from"
                                        >

                                            <template v-slot:chip="{ props, item }">
                                                <v-chip
                                                    style="width: 250px"
                                                    v-bind="props"
                                                     :prepend-avatar="`https://flagcdn.com/`+item.raw.code_2+`.svg`"
                                                >
                                                    {{ item.raw.currency_id +' | '+item.raw.name }}
                                                </v-chip>
                                            </template>
                                        </v-autocomplete>
                                    </v-col>

                                     <v-col cols="12" md="1" class="text-center">
                                         <v-btn
                                             color="primary"
                                             icon="ph-swap"
                                             size="large"
                                         />
                                     </v-col>

                                     <v-col cols="12" md="4">
                                         <v-autocomplete
                                             label="To"
                                             variant="outlined"
                                             density="comfortable"
                                             :items="$page.props.currencies"
                                             item-value="currency_id"
                                             :item-title="item => item.currency_id +' | '+item.name"
                                             chips
                                             v-model="form.to"
                                         >
                                             <template v-slot:chip="{ props, item }">
                                                 <v-chip
                                                     v-bind="props"
                                                     :prepend-avatar="`https://flagcdn.com/`+item.raw.code_2+`.svg`"
                                                 >
                                                     {{ item.raw.currency_id +' | '+item.raw.name }}
                                                 </v-chip>
                                             </template>
                                         </v-autocomplete>
                                     </v-col>

                                 </v-row>
                                <v-card>
                                    <v-card-text>
                                        <p class="text-h5">10.00 Zimbabwean Dollars =</p>
                                        <p  class="text-h4 my-3">0.6830065 Euros</p>
                                        <p>1 ZWL = 0.0680919 EUR </p>
                                        <p> 1 EUR = 14.6860 ZWL </p>
                                    </v-card-text>

                                    <v-row class="d-flex align-center">

                                        <v-col cols="12" md="6">
                                            <v-alert type="info">
                                                We use API data
                                            </v-alert>
                                        </v-col>

                                        <v-col>
                                            <p>
                                                <span class="text-primary">Zimbabwean Dollar</span> to Euro conversion — Last updated May 10, 2024, 07:11 UTC
                                            </p>
                                        </v-col>
                                    </v-row>
                                </v-card>
                            </v-tabs-window-item>

                            <v-tabs-window-item value="two">
                                Two
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
            drawer: null,
            tab: null,

            form:this.$inertia.form({
                amount:1,
                from:'zwl',
                to:'usd',
            })
        }
    },


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
        }

        .welcome-div{
            min-height: 250px !important;
            margin-top: -30% !important;
        }
    }
</style>
