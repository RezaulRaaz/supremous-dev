<template>
    <div>
         <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label for="account-new-password">New Password</label>
                        <input type="password" v-model="password" required  id="account-new-password" class="form-control" placeholder="New Password" required data-validation-required-message="The password field is required" minlength="6">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label for="account-retype-new-password">Retype New
                            Password</label>
                        <input type="password" v-model="Confirm_passord" required name="con-password" class="form-control" required id="account-retype-new-password" data-validation-match-match="password" placeholder="New Password" data-validation-required-message="The Confirm password field is required" minlength="6">
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                <button @click.prevent="ChangePassord" type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                    changes</button>
                <button type="reset" class="btn btn-outline-warning">Cancel</button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name:'ChangePasswordComponent',
    data(){
        return{
            password:'',
            Confirm_passord:'',
        }
    },
    methods:{
            ChangePassord(){
                axios.post('/admin/settings/change/password',{
                    password:this.password,
                    Confirm_passord: this.Confirm_passord,
                })
                .then((response) => {
                    if(response.data.success){
                        this.$noty.success(response.data.success)
                    }
                    if(response.data.notmatched){
                        this.$noty.error(response.data.notmatched)
                    }
                })
                .catch(function (error) {
                    // handle error
                    console.log(error.errors.Confirm_passord)
                })
                .then(function () {
                    // always executed
                });
        }
    }
}
</script>
