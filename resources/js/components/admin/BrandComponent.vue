<template>
    <div>
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Add New Brand</h4>
                <h4 class="header-title">{{abc}}</h4>
                <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <form enctype="multipart/form-data" method="post" @submit.prevent="submitForm">
                            <div class="form-group">
                                <label for="name">Brand Name</label>
                                <input type="text" v-model="brandName" class="form-control" placeholder="Brand Name" name="Brand_name" id="name" aria-describedby="emailHelp">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Brand Image</label>
                                        <input @change="imageSelected" type="file" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <img height="100" width="100" :src="imagepreview">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dsc">Brand Description</label>
                                <vue-editor id="dsc" v-model="BrandDsc"></vue-editor>
                            </div>
                            <button type="submit" class="btn btn-secondary">Save</button>
                            </form>
                        </div>
                    <div class="col-lg-6 col-sm-12">
                        <h5>All Brands</h5>
                        <p>{{spinner}}</p>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(Brand,index) in brands">
                                <th scope="row">{{index+1}}</th>
                                <td>{{Brand.Brand_name}}</td>
                                <td>
                                    <img v-if="Brand.image" :src="'/images/brand/'+Brand.image" width="60ox" height="60px"
                                         alt="..." class="img-thumbnail">
                                </td>
                                <td>
                                    <a href="#" @click="editClick('click brand')"><span class="badge badge-secondary">Edit</span></a>
                                    <a href="#" @click.prevent="handleClick(Brand.id,index)"><span class="badge badge-danger">X</span></a>
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
        name: "BrandComponent",
        data(){
            return{
                sBrands:this.$store.getters.GetBrand,
                brandName:'',
                BrandDsc:'',
                image:null,
                imagepreview:'',
                spinner:''

            }
        },
        mounted() {

        },
        created() {
            this.getBrand()
        },
        methods:{
            editClick(data){
                this.$store.dispatch('changeAbcData',data)
            },
            imageSelected(e) {
                this.image = e.target.files[0];
                let reader = new FileReader();
                reader.readAsDataURL(this.image);
                reader.onload = e => {
                    this.imagepreview = e.target.result;
                };
            },
            submitForm() {
                let data = new FormData();
                data.append('image', this.image);
                data.append('Brand_name', this.brandName);
                data.append('Desc', this.BrandDsc);
                axios.post('/admin/add/brand', data)
                    .then((response) => {
                        this.image = null,
                        this.imagepreview = ''
                        this.BrandDsc = '',
                        this.brandName = ''
                        this.$noty.success(response.data.success)
                        this.getBrand()
                    })
                    .catch((e) => {
                        // Warning
                        this.$noty.warning(e.response.data.errors.Brand_name[0])
                    });
            },
            getBrand() {
                this.$store.dispatch('getBrand')
            },
            handleClick(id){
                 axios.get('/admin/brand/delete/'+id)
                .then((response) => {
                    this.$noty.success(response.data.success)
                    // handle success
                    this.getBrand()
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
            }
        },

        computed:{
            abc(){
                return this.$store.getters.abc
            },
            brands(){
                return this.$store.getters.brands
            }
        }
    }
</script>

<style scoped>

</style>
