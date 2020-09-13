<template>
    <div>
         <div class="row">
                <div class="col-12 mb-3">
                    <a href="javascript: void(0);" class="btn btn-primary">Connect Facebook
                        <strong>Massenger</strong></a>
                    <br>
                    <br>
                   <div class="row">
                        <div class="col-6 mb-1">
                           <div class="form-group">
                            <div class="controls">
                                    <label for="account-username">Facebook Page Id</label>
                                    <input type="text" v-model="page_id" class="form-control"  placeholder="Facebook page id" >
                                </div>
                            </div>
                               <button type="button" @click="AddInfo"  class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                        changes</button>
                        </div>
                        <div class="col-4 mb-1">
                           <div class="form-group">
                            <div class="controls">
                                    <label for="account-username">Massenger Color</label>
                                    <small id="emailHelp" class="form-text text-muted">{{color}}</small>
                                    <input type="color" v-model="color" class="form-control"  placeholder="Facebook page id" >
                                </div>
                            </div>
                        </div>

                   </div>
                </div>
            </div>
    </div>
</template>
<script>
export default {
    name:'ConnectPluginsComponent',
    props:[
        'massenger'
    ],
    data(){
        return{
            page_id:this.massenger.Page_id,
            color:this.massenger.color,
        }
    },
    methods:{
        AddInfo() {
            axios.post('/admin/add/massenger', {
                    page_id:this.page_id,
                    color: this.color,
             })
                .then((response) => {
                    this.$noty.success(response.data.success)
                })
                .catch((e) => {
                    // Warning
                    this.$noty.warning(e.response.data.errors.Brand_name[0])
                });
        },
    }
}
</script>
