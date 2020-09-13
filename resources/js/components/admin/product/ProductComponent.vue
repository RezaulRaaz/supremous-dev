<template>
    <div>
        <div class="col-12 ml-5">
            <div class="row">
                <div class="col-xl-6 col-lg-6 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Add Product</h4>
                            <form>
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input v-model="form.name" type="text" class="form-control" placeholder="Product Name" id="name" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="categoryDsc"><strong>Product Description</strong></label>
                                    <vue-editor v-model="form.description" id="categoryDsc" ></vue-editor>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input"  type="checkbox" checked  id="short" value="option1">
                                    <label class="form-check-label" for="short">Short Description</label>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Short Description</label>
                                    <textarea v-model="form.shortDsc"  class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card  mt-3">
                        <div class="card-body">
                            <h4 class="header-title">Product Pricing</h4>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="regular">Regular Price</label>
                                        <input v-model="form.regularPrice" type="text" class="form-control" placeholder="Regular Price" id="regular" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="s">Special Price</label>
                                        <input v-model="form.specialPrice" type="text" class="form-control" placeholder="Special Price" id="s" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="cost">Cost Per Piece</label>
                                        <input v-model="form.costPerPiece" type="text" class="form-control" placeholder="Price" id="cost" aria-describedby="emailHelp">
                                        <small id="emailHelp" class="form-text text-muted">Customers won’t see this</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="tax">Tax Per Piece(Optional)</label>
                                        <input v-model="form.taxPerPiece" type="text" class="form-control" placeholder="Price" id="tax" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                    <div class="col-6">
                                    <div class="form-group">
                                        <label for="tax">Supplier Price</label>
                                        <input v-model="form.supplierPrice" type="text" class="form-control" placeholder="Price" id="tax" aria-describedby="emailHelp">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                            <div class="card  mt-3">
                <div class="card-body">
                    <h4 class="header-title">Wight</h4>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="Sku">Product Weight</label>
                                <input v-model="form.weight" type="text" class="form-control" placeholder="Gram" aria-describedby="emailHelp">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    <div class="card  mt-3">
                        <div class="card-body">
                            <h4 class="header-title">Inventory</h4>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="Sku">SKU (Stock Keeping Unit)</label>
                                        <input v-model="form.Sku" type="text" class="form-control" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="special">Barcode/Qr code(Optional)</label>
                                        <input v-model="form.barcode" type="text" class="form-control" id="special" aria-describedby="emailHelp">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">QUANTITY</h4>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="sku">Available</label>
                                        <input v-model="form.quantity" type="number" class="form-control" value="0" id="sku" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="sr">Stock status</label>
                                        <select v-model="form.stockStatus" id="sr" class="form-control">
                                            <option v-for="stocks in stock" :value="stocks" :key="stocks">{{stocks}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" v-model="form.continue" type="checkbox" id="continue" value="option1">
                                        <label class="form-check-label" for="continue">Continue selling when out of stock</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Product Release Date(Optional)</h4>
                            <div class="form-group">
                                <label for="example-datetime-local-input" class="col-form-label">Date and time</label>
                                <input  v-model="form.realeaseTime" class="form-control" type="datetime-local"  id="example-datetime-local-input">
                            </div>
                             <div class="form-group">
                                <label for="subcategory">Slect Position</label>
                                <select v-model="form.positionSelect" class="form-control">
                                    <option v-for="pos in position" :value="pos" :key="pos">{{pos}}</option>

                                </select>
                            </div>
                            <div class="form-check form-check-inline">
                                <input v-model="form.publish" class="form-check-input" checked type="checkbox" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label"  for="inlineCheckbox1">Publish</label>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <h4 class="header-title">Category</h4>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select v-model="form.categoryId" id="category" @change="getSubCategory" class="form-control">
                                    <option value="">Select Category..</option>
                                    <option v-for="category in categories" :value="category.id" :key="category.id">{{category.Category_name}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="subcategory">Sub Category</label>
                                <select id="subcategory" v-model="form.subCategoryId" class="form-control">
                                    <option value="">Select Category..</option>
                                    <option v-for="subCategories in subCategory" :key="subCategories.id" :value="subCategories.id" >{{subCategories.Category_name}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <h4 class="header-title">Brands</h4>
                            <div class="form-group">
                                <label for="fd">Brands</label>
                                <select id="fd" v-model="form.brand" class="form-control">
                                    <option value="">Select Brand..</option>
                                    <option v-for="brand in brands" :key="brand.id" :value="brand.id">{{brand.Brand_name}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <h4 class="header-title">Image</h4>
                            <div class="form-group">
                                <label for="img">Image</label>
                                <input @change="imageChange" multiple type="file" name="image" ref="files" class="form-control-file" id="img">
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <h4 class="header-title">Variants</h4>
                            <div class="row">
                                <div class="col-4">
                                 <span>
                                    <select v-model="form.variationId" @change="att" class="form-control">
                                       <option value="">Select Variant..</option>
                                       <option v-for="variation in Variations" :key="variation.id" :value="variation.id">{{variation.name}}</option>
                                   </select>
                                </span>
                                </div>
                                <div class="col-6">

                                 <span>
                                     <multiselect
                                         v-model="form.selected"
                                         :multiple="true"
                                         :options="options"
                                     ></multiselect>
                                </span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <h4 class="header-title">Video</h4>
                            <div class="form-group">
                                <label for="video">Product review Youtube Video Link (optional)</label>
                                <input v-model="form.yVideoLink" type="text" class="form-control" id="video">
                            </div>
                        </div>
                    </div>
                    <button @click="addProduct" class="btn mt-3 float-right btn-primary">{{spiner}}&nbsp; &nbsp;<span class="spinner-border spinner-border-sm" v-if="spnnerLoding"></span></button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        name: "ProductComponent",
        data(){
            return{
                spnnerLoding:false,
                spiner:'Save',
                images:[],
                imagePreview:[],
                shortDsc:false,
                options: [],
                stock:['In Stock','Out Of Stock','On Backorder'],
                position:['Fetured','Newest','Popular'],
                form:{
                    variationId:'',
                    selectAttribute:this.stringfy,
                    realeaseTime:'',
                    name:'',
                    description:'',
                    shortDsc:'',
                    regularPrice:'',
                    specialPrice:'',
                    costPerPiece:'',
                    taxPerPiece:'',
                    positionSelect:'Newest',
                    Sku:'',
                    barcode:'',
                    quantity:0,
                    stockStatus:'In Stock',
                    continue:true,
                    publish:true,
                    categoryId:'',
                    subCategoryId:'',
                    brand:'',
                    yVideoLink:'',
                    selected: [],
                    supplierPrice: '',
                    weight: null,
                }
            }
        },
        created() {
            this.getBrand();
            this.getCategory();
            this.getVariation();
        },
        mounted() {

        },
        methods:{
            getBrand() {
                this.$store.dispatch('getBrand')
            },
            getCategory(){
               this.$store.dispatch('getCategory')
            },
            getSubCategory(){
                this.$store.dispatch('getSubCategory',this.form.categoryId)
            },
            getVariation(){
                this.$store.dispatch('getVariation')
            },
            getVariatiosAtt(){
                this.$store.dispatch('getVariationAttribute',this.form.variationId)
            },
            att(){
                axios.get('/admin/get/sub/variation/'+this.form.variationId)
                .then((response) => {
                     this.options=[]
                    this.stringfy;
                    response.data.attributeResult.map((getDa)=>{
                        return this.options.push(getDa.name);
                    });

             })
            },
            imageChange() {
                for (let i = 0; i < this.$refs.files.files.length; i++) {
                    this.images.push(this.$refs.files.files[i]);
                }
            },
            addProduct(){
                this.spiner='Saving',
                this.spnnerLoding=true;
                var self=this
                let formData =new FormData();
                for (let i=0;i<this.images.length;i++){
                    let file = self.images[i];
                    formData.append('files['+i+']',file);
                }
                formData.append('ProductName',this.form.name)
                formData.append('realeaseTime',this.form.realeaseTime)
                formData.append('description',this.form.description)
                formData.append('shortDsc',this.form.shortDsc)
                formData.append('regularPrice',this.form.regularPrice)
                formData.append('specialPrice',this.form.specialPrice)
                formData.append('costPerPiece',this.form.costPerPiece)
                formData.append('taxPerPiece',this.form.taxPerPiece)
                formData.append('supplierPrice',this.form.supplierPrice)
                formData.append('Sku',this.form.Sku)
                formData.append('barcode',this.form.barcode)
                formData.append('quantity',this.form.quantity)
                formData.append('stockStatus',this.form.stockStatus)
                formData.append('continue_selling',this.form.continue)
                formData.append('status',this.form.publish)
                formData.append('categoryId',this.form.categoryId)
                formData.append('subCategoryId',this.form.subCategoryId)
                formData.append('brand',this.form.brand)
                formData.append('selectAttribute',JSON.stringify(this.form.selected))
                formData.append('variationId',this.form.variationId)
                formData.append('selected',this.form.selected)
                formData.append('yVideoLink',this.form.yVideoLink)
                formData.append('weight',this.form.weight)
                formData.append('positionSelect',this.form.positionSelect)
                const config ={
                    headers:{"content-type" : "multipart/form-data"}
                }
                axios.post('/admin/add/product',formData,config)
                    .then((response) => {
                        this.spiner='Save'
                        this.spnnerLoding=false;
                        this.$noty.success(response.data.success)
                    })
                    .catch((e) => {
                       this.spiner='Not save'
                      this.spnnerLoding=false;
                });
            }

        },
        computed:{

            brands(){
                 return this.$store.getters.brands
            },
            categories(){
                return this.$store.getters.Category
            },
            subCategory(){
                return this.$store.getters.SubCategory
            },
            Variations(){
                return this.$store.getters.Variations
            },
        },
        watch:{

        }
    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped>
    .multiselect {
        box-sizing: content-box;
        display: block;
        position: relative;
        width: 200px;
        min-height: 40px;
        text-align: left;
        color: #35495e;
    }
</style>
