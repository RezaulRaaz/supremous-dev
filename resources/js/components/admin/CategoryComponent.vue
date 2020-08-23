<template>
    <div>
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Add New Category</h4>
                <div class="row">
                    <div class="col-4">
                        <form enctype="multipart/form-data" method="post" @submit.prevent="submitForm">
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input v-model="categoryName" type="text" class="form-control" placeholder="Category Name" id="name" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label>Select Parents Category(optional)</label>
                            <select v-model="categoryId"  class="form-control">
                                <option value="" >Chose Category</option>
                                <option v-for="(category,index) in categories" :value="category.id" >{{category.Category_name}}</option>
                            </select>
                        </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Category Image</label>
                                        <input @change="imageSelected" type="file" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <img height="100" width="100" :src="imagePreview">
                                </div>
                            </div>

                        <div class="form-group">
                            <label for="categoryDsc">Category Description</label>
                            <vue-editor id="categoryDsc" v-model="BrandDsc"></vue-editor>
                        </div>
                        <button type="submit" class="btn btn-secondary">Save</button>
                      </form>
                    </div>
                    <div class="col-4">
                        <h5>All Category</h5>
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
                            <tr v-for="(category,index) in categories">
                                <th scope="row">{{index+1}}</th>
                                <td>{{category.Category_name}}</td>
                                <td>
                                    <img v-if="category.Image" :src="'/images/category/'+category.Image" width="60ox" height="60px"
                                         alt="..." class="img-thumbnail">
                                </td>
                                <td>
                                    <a href="#"><span class="badge badge-secondary">Edit</span></a>
                                    <a href="#" @click="deleteCategory(category.id,index)"><span class="badge badge-danger">X</span></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-4">
                        <h5>All Sub Category</h5>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Parent category</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="subCategroy in subCategories">
                                <th scope="row">1</th>
                                <td>{{subCategroy.Category_name}}</td>
                                <td>{{subCategroy.category.Category_name}}</td>
                                <td>
                                    <a href="#"><span class="badge badge-secondary">Edit</span></a>
                                    <a @click="deleteSubCategory(subCategroy.id)" href="#"><span class="badge badge-danger">X</span></a>
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
        name: "CategoryComponent",
        data(){
            return{
                categoryName:'',
                image:null,
                imagePreview:'',
                BrandDsc:'',
                categoryId:'',
                categories:[],
                subCategories:[],
                spinner:''
            }
        },
        mounted() {
           this.GetCategory();
        },
        methods:{
            imageSelected(e) {
                this.image = e.target.files[0];
                let reader = new FileReader();
                reader.readAsDataURL(this.image);
                reader.onload = e => {
                    this.imagePreview = e.target.result;
                };
            },
            submitForm(){
                let data = new FormData();
                data.append('image', this.image);
                data.append('Category_name', this.categoryName);
                data.append('category', this.categoryId);
                data.append('Dsc', this.BrandDsc);
                axios.post('/admin/add/category', data)
                    .then((response) => {
                        this.$noty.success(response.data.success)
                            this.categoryName='',
                            this.categoryId='',
                            this.image= null,
                            this.imagepreview='',
                            this.BrandDsc='',
                            this.GetCategory();
                    })
                    .catch((e) => {

                        this.$noty.warning(e.response.data.errors.Category_name[0])
              });
            },
            GetCategory(){
                this.spinner='Please wait'
                console.log(this.spinner)
                axios.get('/admin/get/category')
                    .then((response) => {
                        this.categories= response.data.category
                        this.spinner=''
                        console.log(this.spinner)
                        this.subCategories= response.data.sub
                })
            },
            deleteSubCategory(id){
                this.$confirm(
                    {
                        message: `Are you sure?`,
                        button: {
                            no: 'No',
                            yes: 'Yes'
                        },
                        /**
                         * Callback Function
                         * @param {Boolean} confirm
                         */
                        callback: confirm => {
                            if (confirm) {
                                axios.get('/admin/subcategory/delete/'+id)
                                    .then((response) => {
                                        this.$noty.success(response.data.success);
                                        this.GetCategory();
                                    })
                                    .catch(function (error) {
                                        // handle error
                                        console.log(error);
                                    })
                                    .then(function () {
                                        // always executed
                                    });
                            }
                        }
                    }
                )
            },

            deleteCategory(id){
                this.$confirm(
                    {
                        message: `Are you sure?`,
                        button: {
                            no: 'No',
                            yes: 'Yes'
                        },
                        /**
                         * Callback Function
                         * @param {Boolean} confirm
                         */
                        callback: confirm => {
                            if (confirm) {
                                axios.get('/admin/category/delete/'+id)
                                    .then((response) => {
                                        this.$noty.success(response.data.success);
                                        this.GetCategory();
                                        // handle success
                                        this.getData()
                                    })
                                    .catch(function (error) {
                                        // handle error
                                        console.log(error);
                                    })
                                    .then(function () {
                                        // always executed
                                    });
                            }
                        }
                    }
                )
            }

        }
    }
</script>

<style scoped>

</style>
