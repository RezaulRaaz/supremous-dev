<template>
    <div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="account-facebook">Facebook</label>
                <input type="text" v-model="Social.facebook_links" id="account-facebook" class="form-control" placeholder="Add link">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="account-twitter">Twitter</label>
                <input type="text" v-model="Social.twitter_links" id="account-twitter" class="form-control" placeholder="Add link">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="account-google">LinkedIn</label>
                <input type="text" v-model="Social.linked_links" id="account-google" class="form-control" placeholder="Add link">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="account-instagram">Instagram</label>
                <input type="text" v-model="Social.instagram_links" id="account-instagram" class="form-control" placeholder="Add link">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="account-quora">Youtube</label>
                <input type="text" v-model="Social.youtube_links" id="account-quora" class="form-control" placeholder="Add link">
            </div>
        </div>
        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
            <button type="submit" @click.prevent="addSocial" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                changes</button>
            <button type="reset" class="btn btn-outline-warning">Cancel</button>
        </div>
    </div>
    </div>
</template>
<script>
export default {
     name: "SocialComponent",
     data(){
         return{
             Social:{
                facebook_links:'',
                twitter_links:'',
                linked_links:'',
                instagram_links:'',
                youtube_links:'',
                id:'',
             }
         }
     },
     mounted() {
         this.getSocial()
     },
     methods:{
           getSocial(){
                 axios.get('/admin/settings/social/')
                .then((response) => {
                  this.Social = response.data.social
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
            },
            addSocial(){
                axios.post('/admin/settings/social/add',{
                            facebook:this.Social.facebook_links,
                            twitter: this.Social.twitter_links,
                            linked: this.Social.linked_links,
                            instagram:this.Social.instagram_links,
                            youtube:this.Social.youtube_links,
                            id:this.Social.id,
                        })
                    .then((response) => {
                        this.$noty.success(response.data.success)
                        this.getSocial()
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
