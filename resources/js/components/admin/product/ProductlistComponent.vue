<template>
<div>
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Total Product : {{pagination.total}}</h4>
            <section>
                <table class="table ">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Regular Price</th>
                                <th scope="col">Special Price</th>
                                <th scope="col">Publish Status</th>
                                <th scope="col">Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(product,index) in products" :key="index">
                                    <td>{{index+1}}</td>
                                    <td class="product-name">
                                        {{product.product_name}}
                                    </td>
                                      <td class="product-name">
                                        {{'৳ '+product.prd_price.regular_price}}
                                    </td>
                                      <td class="product-name">
                                        {{'৳ '+product.prd_price.special_price}}
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
                                       <a :href="'/admin/edit/product/'+product.id" class="btn btn-sm btn-primary"><span class="action-edit" style="font-size:18px"><i class="feather icon-edit"></i></span></a>
                                      &nbsp;
                                      &nbsp;
                                      &nbsp;
                                      &nbsp;
                                        <button @click="DeleteProduct(product.id)" class="btn btn-sm btn-danger"><span class="action-delete" style="font-size:18px"><i class="feather icon-trash"></i></span></button>
                                    </td>
                                </tr>
                            </tbody>
                    </table>
                    <nav aria-label="Page navigation example">

                        <ul class="pagination justify-content-center">

                            <li class="page-item" :class="{ disabled: pagination.current_page <= 1 }">
                                <a class="page-link" @click.prevent="changePage(1)">First Page</a>
                            </li>

                            <li class="page-item" :class="{ disabled: pagination.current_page <= 1 }">
                                <a class="page-link" @click.prevent="changePage(pagination.current_page - 1)">Previous</a>

                            </li>


                            <li class="page-item" v-for="page in pages"  :key="page" :class="isCurrentPage(page) ? 'active' : ''">
                                <a class="page-link" @click.prevent="changePage(page)">{{ page }}
                                    <span v-if="isCurrentPage(page)" class="sr-only">(current)</span>
                                </a>

                             </li>



                            <li class="page-item" :class="{ disabled: pagination.current_page >= pagination.last_page }">
                                <a class="page-link" @click.prevent="changePage(pagination.current_page + 1)">Next
                                </a>
                             </li>

                            <li class="page-item" :class="{ disabled: pagination.current_page >= pagination.last_page }">
                                <a class="page-link" @click.prevent="changePage(pagination.last_page)">Last page</a>
                            </li>
                       </ul>
                    </nav>
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
                offset:8,
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
             DeleteProduct(id){
                axios.get('/admin/delete/product/'+id)
                .then((response) => {
                    this.$noty.success(response.data.success)
                    this.GetProduct();

                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
            },
              changePage(page) {
                if (page > this.pagination.last_page) {
                    page = this.pagination.last_page;
                }
                this.pagination.current_page = page;
                this.GetProduct();
            },
            isCurrentPage(page){
                return this.pagination.current_page === page
            },

        },
        computed:{
             pages() {
                let pages = []
                let from = this.pagination.current_page - Math.floor(this.offset / 2)
                if (from < 1) {
                    from = 1
                }
                let to = from + this.offset -1
                if (to > this.pagination.last_page) {
                    to = this.pagination.last_page
                }
                while (from <= to) {
                    pages.push(from)
                    from++
                }
                return pages
            }
        }

}

</script>

<style scoped>

</style>
