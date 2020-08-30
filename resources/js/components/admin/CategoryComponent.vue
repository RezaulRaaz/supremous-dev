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
                                    <a href="#" data-toggle="modal" data-target="#deleteCategory"><span class="badge badge-danger">X</span></a>
                                </td>
                               <div class="modal-danger mr-1 mb-1 d-inline-block">
                                    <!-- Modal -->
                                    <div class="modal fade text-left" id="deleteCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger white">
                                                    <h5 class="modal-title" id="myModalLabel120">Warning!!</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                        Are you sure you want to Delete this?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button"  @click="deleteCategory(category.id,index)" class="btn btn-danger" data-dismiss="modal">Yes</button>
                                                    <button type="button" aria-label="Close" class="btn btn-primary" data-dismiss="modal">No</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                },

            deleteCategory(id){
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
</script>

<style scoped>

</style>
