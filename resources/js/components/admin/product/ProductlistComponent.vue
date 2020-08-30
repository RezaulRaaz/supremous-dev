<template>
<div>
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Product List</h4>
            <section>
                <table class="table ">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Publish Status</th>
                                <th scope="col">Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(product,index) in products">
                                    <td>{{index+1}}</td>
                                    <td class="product-name">
                                        {{product.product_name}}
                                    </td>
                                    <td class="product-category">{{product.publish_status}}</td>
                                    <td>
                                        <div class="chip chip-primary">
                                            <div class="chip-body">
                                                <div class="chip-text">{{product.stock_status}}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-action">
                                       <a :href="'/admin/edit/product/'+product.id"> <span class="action-edit"><i class="feather icon-edit"></i></span></a>
                                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                                    </td>
                                </tr>
                            </tbody>
                    </table>
            </section>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        name: "ProductlistComponent",
        data(){
            return{
                products: [],
                pagination: {
                    current_page: 1
                },
                images:null
            }
        },
        mounted(){
            this.GetProduct();
        },
        methods:{
            GetProduct(){
               axios.get('/admin/get/products?page='+this.pagination.current_page)
                    .then((response) => {
                    this.products=response.data.data;
                    this.pagination=response.data.meta;
                });
            },
        }
    }
</script>

<style scoped>

</style>
