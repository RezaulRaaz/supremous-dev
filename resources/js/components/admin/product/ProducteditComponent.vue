<template>
    <div>
        <div class="row">
        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Add Product {{id}}</h4>
                    <form>
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" v-model="updateForm.name" class="form-control" placeholder="Product Name" id="name" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="categoryDsc"><strong>Product Description</strong></label>
                            <vue-editor v-model="updateForm.description"  id="categoryDsc" ></vue-editor>
                        </div>
                        <div class="form-check form-check-inline">
                            <input  class="form-check-input"  type="checkbox" checked  id="short" value="option1">
                            <label class="form-check-label" for="short">Short Description</label>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Short Description</label>
                            <textarea  v-model="updateForm.short_description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
                                <input type="text" v-model="updateForm.regular_price" class="form-control" placeholder="Regular Price" id="regular" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="s">Special Price</label>
                                <input  type="text" v-model="updateForm.special_price" class="form-control" placeholder="Special Price" id="s" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="cost">Cost Per Piece</label>
                                <input type="text" v-model="updateForm.cost_per_price" class="form-control" placeholder="Price" id="cost" aria-describedby="emailHelp">
                                <small id="emailHelp" class="form-text text-muted">Customers won’t see this</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tax">Tax Per Piece(Optional)</label>
                                <input  type="text" v-model="updateForm.tax_per_price" class="form-control" placeholder="Price" id="tax" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tax">Supplier Price</label>
                                <input  type="text" v-model="updateForm.supplier_price" class="form-control" placeholder="Price" id="tax" aria-describedby="emailHelp">
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
                                <input v-model="updateForm.sku"  type="text" class="form-control" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="special">Barcode/Qr code(Optional)</label>
                                <input v-model="updateForm.barcode" type="text" class="form-control" id="special" aria-describedby="emailHelp">
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
                                <input  type="text" v-model="updateForm.weight" class="form-control" placeholder="Gram" aria-describedby="emailHelp">
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
                                <input v-model="updateForm.available" type="number" class="form-control" value="0" id="sku" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="sr">Stock status</label>
                                <select v-model="updateForm.stock"  id="sr" class="form-control">
                                    <option v-for="stocks in stock" :value="stocks" :key="stocks">{{stocks}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check form-check-inline">
                                <input v-model="updateForm.continue_selling"  class="form-check-input" type="checkbox" id="continue" value="option1">
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
                        <input v-model="updateForm.release_date" class="form-control" type="datetime-local"  id="example-datetime-local-input">
                    </div>
                          <div class="form-group">
                                <label for="subcategory">Slect Position</label>
                                <select v-model="updateForm.positionSelect" class="form-control">
                                    <option v-for="pos in position" :value="pos" :key="pos">{{pos}}</option>
                                </select>
                            </div>
                    <div class="form-check form-check-inline">
                        <input v-model="updateForm.publish_status" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label"  for="inlineCheckbox1">Publish</label>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h4 class="header-title">Category</h4>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select v-model="updateForm.categoryId" @change="getSubCategory()" id="category" class="form-control">
                            <option v-for="cat in category" :value="cat.id" :key="cat.id">{{cat.Category_name}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subcategory">Sub Category</label>
                        <select v-model="updateForm.subCategoryId" id="subcategory"  class="form-control">
                            <option v-for="category in subCategory"  :value="category.id" :key="category.id">{{category.Category_name}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h4 class="header-title">Brands</h4>
                    <div class="form-group">
                        <label for="fd">Brands</label>
                        <select v-model="updateForm.brandId" id="fd" class="form-control">
                            <option v-for="brand in brands" :value="brand.id" :key="brand.id">{{brand.Brand_name}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h4 class="header-title">Image</h4>
                    <div class="form-group">
                        <label for="img">Image(250 width x 300 height)</label>
                        <input @change="imageChange" multiple type="file" name="image" ref="files" class="form-control-file" id="img">
                    </div>
                       <span v-for="(picture,i) in this.updateForm.pictures" :key="i">
                        <img :src="'/images/products/'+picture" width="100" height="100">
                    </span>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <h4 class="header-title">Variants</h4>
                    <div class="row">
                        <div class="col-4">
                         <span>
                            <select v-model="updateForm.variantionId" @change="att"  class="form-control">
                               <option v-for="variants in Variations"  :value="variants.id" :key="variants.id">{{variants.name}}</option>
                           </select>
                        </span>
                        </div>
                        <div class="col-6">
                             <span>
                                    <multiselect
                                        v-model="updateForm.selected"
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
                        <input v-model="updateForm.ylink" type="text" class="form-control" id="video">
                    </div>
                </div>
            </div>
               <button @click="ProductUpdate" class="btn mt-3 float-right btn-primary">{{spiner}}</button>
        </div>
    </div>
    </div>
</template>
<script>
export default {
    name: "ProducteditComponenr",
    props:[
        'product',
        'inventory',
        'category',
        'release',
        'categoryprd',
        'prdbrand',
        'prdvairiants'
    ],
    data(){
        return {
            position:['Fetured','Newest','Popular'],
            stock:['In Stock','Out Of Stock','On Backorder'],
            options:[],
            images:[],
            spiner:'Update',
            updateForm:{
                id:this.product.id,
                name:this.product.product_name,
                description:this.product.description,
                short_description:this.product.short_description,

                positionSelect:'Fetured',

                regular_price:'',
                special_price:'',
                cost_per_price:'',
                tax_per_price:'',
                supplier_price:'',

                sku:this.inventory.sku,
                barcode:this.inventory.barcode,
                available:this.inventory.available,
                continue_selling:this.inventory.continue_selling,
                weight:this.inventory.weight,
                stock:this.product.stock_status,
                publish_status:this.product.publish_status,
                release_date:this.release.release_date,
                categoryId:this.categoryprd.category_id,
                subCategoryId:this.categoryprd.subcategory_id,
                brandId:this.prdbrand.brand_id,
                variantionId :this.prdvairiants.variantion_id ,
                selected:[],
                varitaion_attribute:'',
                images:this.product.images,
                ylink:this.product.youtube_link,
                pictures:[],

            },
        }
    },
    mounted() {
            this.getSubCategory()
            this.getBrand();
            this.getVariation();
            this.att();
            this.variatnsParse();
            this.imageParse();
            this.getProduct();
    },
    methods:{
          getSubCategory(){
                this.$store.dispatch('getSubCategory',this.updateForm.categoryId)
            },
            getProduct(){
                axios.get('/admin/get/edit/products/'+this.updateForm.id)
                .then((response) => {
                   this.updateForm.regular_price=response.data.price.regular_price;
                   this.updateForm.special_price=response.data.price.special_price;
                   this.updateForm.supplier_price=response.data.price.supplierPrice;
                   this.updateForm.cost_per_price=response.data.price.cost_per_price;
                   this.updateForm.tax_per_price=response.data.price.tax_per_price;
                 })
            },
            getBrand() {
                this.$store.dispatch('getBrand')
            },
              getVariation(){
                this.$store.dispatch('getVariation')
            },
            att(){
                axios.get('/admin/get/sub/variation/'+this.updateForm.variantionId)
                .then((response) => {
                     this.options=[],
                     this.finalvariants
                     console.log(response.data.attributeResult)
                    response.data.attributeResult.map((getDa)=>{
                        return this.options.push(getDa.name);
                    });
                 })
            },
            variatnsParse(){
               this.updateForm.varitaion_attribute= this.prdvairiants.variants_attribute;
            },
             imageParse(){
               this.updateForm.pictures= JSON.parse(this.updateForm.images);
            },
            imageChange() {
                 for (let i = 0; i < this.$refs.files.files.length; i++) {
                this.images.push(this.$refs.files.files[i]);
            }
            },
            ProductUpdate(){
                this.spiner='Updating'
                var self=this
                let formData =new FormData();
                for (let i=0;i<this.images.length;i++){
                    let file = self.images[i];
                    formData.append('files['+i+']',file);
                }
                formData.append('id',this.updateForm.id)
                formData.append('ProductName',this.updateForm.name)
                formData.append('description',this.updateForm.description)
                formData.append('shortDsc',this.updateForm.short_description)
                formData.append('yVideoLink',this.updateForm.ylink)
                formData.append('status',this.updateForm.publish_status)
                formData.append('stockStatus',this.updateForm.stock)

                formData.append('regularPrice',this.updateForm.regular_price)
                formData.append('specialPrice',this.updateForm.special_price)
                formData.append('costPerPiece',this.updateForm.cost_per_price)
                formData.append('taxPerPiece',this.updateForm.tax_per_price)
                formData.append('supplierPrice',this.updateForm.supplier_price)

                formData.append('Sku',this.updateForm.sku)
                formData.append('barcode',this.updateForm.barcode)
                formData.append('quantity',this.updateForm.available)
                formData.append('weight',this.updateForm.weight)
                formData.append('continue_selling',this.updateForm.continue_selling)

                formData.append('realeaseTime',this.updateForm.release_date)
                formData.append('positionSelect',this.updateForm.positionSelect)

                formData.append('categoryId',this.updateForm.categoryId)
                formData.append('subCategoryId',this.updateForm.subCategoryId)

                formData.append('brand',this.updateForm.brandId)

                formData.append('variationId',this.updateForm.variantionId)
                formData.append('selected',JSON.stringify(this.updateForm.selected))
                const config ={
                    headers:{"content-type" : "multipart/form-data"}
                }
                axios.post('/admin/update/product',formData,config)
                    .then((response) => {
                        this.spiner='Update'
                        this.$noty.success(response.data.success)
                    })
                    .catch((e) => {
                       console.log(e)
                    });
            }
    },
    computed:{
        finalvariants(){
            let fin = JSON.parse(this.updateForm.varitaion_attribute);
            return this.updateForm.selected = fin;
        },
         stringfy(){
                let stringto=JSON.stringify(this.updateForm.selected);
               return this.updateForm.varitaion_attribute=stringto.toString();
            },
        subCategory(){
                return this.$store.getters.SubCategory
        },
        brands(){
                return this.$store.getters.brands
        },
        Variations(){
            return this.$store.getters.Variations
        },
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
