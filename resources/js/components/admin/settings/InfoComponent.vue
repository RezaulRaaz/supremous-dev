<template>
    <div>
         <div class="row">

            <div class="col-12">
                <div class="form-group">
                    <label for="country">Country</label>
                      <v-select v-model="country" :options="coutries"></v-select>

                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="currency">Currency</label>
                    <select id="currency" v-model="currency" class="form-control">
                        <option v-for="currency in currencies" :value="currency[0].symbol" >{{currency[0].code+'('+currency[0].symbol+')'}}</option>
                    </select>
                </div>
            </div>
            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                <button @click.prevent="Info" type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                    changes</button>
                <button type="reset" class="btn btn-outline-warning">Cancel</button>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return{
                coutries:[],
                currencies:[],
                country:'Bangladesh',
                currency:'৳'
            }
        },
        mounted(){
            this.getCountries();
            this.getinfo();
        },
        methods:{
                Info(){
                axios.post('/admin/add/info',{
                        country: this.country,
                        currency: this.currency,
                    })
                    .then((response) => {
                        this.$noty.success(response.data.success)
                    })
                    .catch((e) => {
                        // Warning
                        console.log(e)
                    });
                },
              getCountries(){
                 axios.get('https://restcountries.eu/rest/v2/all')
                .then((response) => {
                        response.data.map(data => {
                            this.coutries.push(data.name)
                            this.currencies.push(data.currencies)
                        });
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
            },
             getinfo(){
                axios.get('/admin/get/info')
                    .then((res) => {
                        this.country=res.data.info.country;
                        this.currency=res.data.info.currency;
                    })
                    .catch((e) => {
                        // Warning
                        console.log(e)
                    });
                },
        }
    }
</script>
<style scoped>

</style>
