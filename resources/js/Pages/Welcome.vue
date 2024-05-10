<template>
    <!-- Banners Start -->
    <section class="banner" style="background-image: url('/assets/img/banner-bg.png')">
        <!-- Main-menu Strat -->
        <div class="mein-menu">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <div class="container">
                    <a class="navbar-brand text-white" :href="route('welcome')">
                        ZE
<!--                        <img src="/assets/img/logo2.png" width="200"   class="logo" alt="Zig.Exchange">-->
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <InertiaLink class="nav-link" aria-current="page" :href="route('welcome')">Home</InertiaLink>
                            </li>
                            <li class="nav-item">
                                <InertiaLink class="nav-link" :href="route('DesignTwo')">Design Two</InertiaLink>
                            </li>
                            <li class="nav-item">
                                <InertiaLink class="nav-link" href="#">Contact Us</InertiaLink>
                            </li>

                            <li class="nav-item">
                                <InertiaLink class="nav-link" href="#">FAQ</InertiaLink>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Main-menu End -->
        <!-- Banner Start -->
        <div class="hero-area">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-7 ">
                        <div class="banner-content">
                            <h1 class="head">ZiG. Exchange</h1>
                            <p class="text">
                                Save on fees, obtain the best exchange rates with our real-time comparison
                            </p>
<!--                            <img src="/assets/img/laptop-man.png" class="man-lap" alt="">-->
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="hero-form glass">
                            <p class="text">I'd like to Exchange</p>
                            <div class="courrency-select">
                                    <div class="form-group">
                                        <input type="text"
                                               name="number"
                                               placeholder="00.00"
                                               class="form-control border-bottom-white"
                                               v-model="form.amount"
                                               @input="convertEx"
                                        >
                                    </div>

                                <div class="language-select">
                                    <vv-select
                                        v-model="form.base_currency"
                                        class="select-bar"
                                        :options="$page.props.currencies"
                                        label="code"
                                        :reduce="(option) => option.code"
                                        :clearable="false"
                                        @option:selected="getNewData"
                                    />
                                </div>
                            </div>

                            <p class="text">Currency To</p>
                            <div class="courrency-select">
                                <div class="form-group">
                                    <input
                                        type="text"
                                        name="number"
                                        placeholder="00.00"
                                        class="form-control border-bottom-white"
                                        v-model="form.exchange_amount"
                                        @input="convertExFrom"

                                    >
                                </div>

                                <div  class="language-select">
                                    <vv-select
                                        v-model="form.exchange_currency"
                                        class="select-bar"
                                        :options="$page.props.currencies"
                                        label="code"
                                        :reduce="(option) => option.code"
                                        :clearable="false"
                                        @option:selected="convertEx"
                                    />
                                </div>
                            </div>

                            <a type="submit" class="button button-1">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner End -->
    </section>

</template>
<script >

import GuestLayout from '@/Layouts/GuestLayout.vue'
export default {

    layout:GuestLayout,

    data(){
        return{

            form:this.$inertia.form({
                amount:1,
                base_currency:this.$page.props.base_currency,
                exchange_currency:this.$page.props.exchange_currency,
                exchange_amount:this.$page.props.exchange_amount
            })
        }
    },

    mounted() {
        this.convertEx()
    },

    methods:{

        convertEx(){
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
