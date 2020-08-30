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
                                    <option v-for="stocks in stock" :value="stocks">{{stocks}}</option>
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
                    <div class="form-check form-check-inline">
                        <input v-model="updateForm.publish_status" class="form-check-input" checked type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label"  for="inlineCheckbox1">Publish</label>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h4 class="header-title">Category</h4>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" class="form-control">
                            <option v-for="cat in category" :value="cat.id">{{cat.Category_name}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subcategory">Sub Category</label>
                        <select id="subcategory"  class="form-control">
                            <option value="">Select Category..</option>
                            <option  value=""></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h4 class="header-title">Brands</h4>
                    <div class="form-group">
                        <label for="fd">Brands</label>
                        <select id="fd" class="form-control">
                            <option value="">Select Brand..</option>
                            <option value="brand.id">fgfdgfd</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h4 class="header-title">Image</h4>
                    <div class="form-group">
                        <label for="img">Image</label>
                        <input  multiple type="file" name="image" ref="files" class="form-control-file" id="img">
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <h4 class="header-title">Variants</h4>
                    <div class="row">
                        <div class="col-4">
                         <span>
                            <select  class="form-control">
                               <option value="">Select Variant..</option>
                               <option  value="variation.id">fgsfdg</option>
                           </select>
                        </span>
                        </div>
                        <div class="col-6">
                         <span>

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
                        <input type="text" class="form-control" id="video">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>
<script>
export default {
    name: "ProducteditComponenr",
    props:[
        'product',
        'price',
        'inventory',
        'category',
        'release'
    ],
    data(){
        return {
            stock:['In Stock','Out Of Stock','On Backorder'],
            updateForm:{
                name:this.product.product_name,
                description:this.product.description,
                short_description:this.product.short_description,
                regular_price:this.price.regular_price,
                special_price:this.price.special_price,
                cost_per_price:this.price.cost_per_price,
                tax_per_price:this.price.tax_per_price,
                supplier_price:this.price.supplierPrice,
                sku:this.inventory.sku,
                barcode:this.inventory.barcode,
                available:this.inventory.available,
                continue_selling:this.inventory.continue_selling,
                weight:this.inventory.weight,
                stock:this.product.stock_status,
                publish_status:this.product.publish_status,
                release_date:this.release.release_date,
            }
        }
    },
    created() {

    },
    method:{

    },
    computed:{

    }
}
</script>
