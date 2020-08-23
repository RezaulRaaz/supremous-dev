<template>
    <div>
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Variations</h4>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="VariationName">Variation Name</label>
                            <input v-model="variationName" type="text" class="form-control" placeholder="Variation Name" id="VariationName" aria-describedby="emailHelp">
                        </div>
                        <button @click="submitvariation"  class="btn btn-secondary">Save</button>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="inputState">Variation Select</label>
                            <select v-model="variationId" id="inputState" class="form-control">
                                <option value="">Select Variation..</option>
                                <option :value="variation.id" v-for="variation in variations">{{variation.name}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Variation Attribute</label>
                            <input v-model="attributeName" type="text" class="form-control" placeholder="Variation Attribute" id="name" aria-describedby="emailHelp">
                        </div>
                        <button @click="submitAttribute"  class="btn btn-secondary">Save</button>
                    </div>
                    <div class="col-3">
                        <h5>Variation List</h5>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="variation in variations">
                                <th scope="row">1</th>
                                <td>{{variation.name}}</td>
                                <td>
                                    <a href="#"><span class="badge badge-secondary">Edit</span></a>
                                    <a href="#"><span class="badge badge-danger">X</span></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "VariationComponent",
        data(){
           return{
               variationName:'',
               variations:[],
               variationId:'',
               attributeName:'',
               attributeResult:[]
           }
        },
        mounted() {
            this.Getvaritaion();
        },
        methods:{
            submitvariation(){
                axios.post('/admin/add/variation', {
                    name: this.variationName,
                }).then((response)=>{
                    this.$noty.success(response.data.success);
                    this.variationName=''
                    this.Getvaritaion()
                })
                    .catch((e)=>{
                        this.$noty.warning(e.response.data.errors.name[0])
                    });
            },
            Getvaritaion(){
                axios.get('/admin/get/variation')
                    .then((response) => {
                        this.variations=response.data.variationData;
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });
            },

            submitAttribute(){
                axios.post('/admin/add/variation/attribute', {
                    name: this.attributeName,
                    variation_id: this.variationId,
                }).then((response)=>{
                    this.$noty.success(response.data.success);
                    this.attributeName='';
                    this.GetSVariationAttribute()
                })
                    .catch((e)=>{
                        this.$noty.warning(e.response.data.errors.name[0])
                    });
            },
            GetSVariationAttribute(){
                axios.get('/admin/get/sub/variation/'+this.variationId)
                    .then((response) => {
                        this.attributeResult=response.data.attributeResult;
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });
            },
        }
    }
</script>

<style scoped>

</style>
