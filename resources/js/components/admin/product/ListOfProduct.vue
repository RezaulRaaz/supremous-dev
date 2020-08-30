<template>
    <div>
        <div class="card">
            <div class="card-body">
               <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ListOfProduct",
        data(){
            return{
                products:[],
            }
        },
        mounted() {
            this.att();
        },
        method:{
               att(){
                axios.get('/admin/get/products')
                    .then((response) => {
                        console.log(response.data)
               })
            },
        }
    }
</script>

<style scoped>

</style>
