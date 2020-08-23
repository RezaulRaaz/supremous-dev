<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <vue-editor></vue-editor>
                        <h4>tiny</h4>
                        <editor
                            :init="{
                             height: 500,
                             menubar: true,
                             plugins: [
                               'advlist autolink lists link image charmap print preview anchor',
                               'searchreplace visualblocks code fullscreen ',
                               'insertdatetime media table paste code emoticons help wordcount',
                               'image'
                             ],
                             toolbar:
                               'formatselect | bold italic forecolor  backcolor link | \
                               alignleft aligncenter alignright alignjustify | image emoticons |\
                               bullist numlist outdent indent | removeformat'
                           }"
                            v-model="description"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Editor from '@tinymce/tinymce-vue';
    export default {
        components: {
            'editor': Editor
        },
        data(){
            return{
                description:'',
                theme: "modern",

            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }


</script>
<style>
    .tox-notifications-container{display:none!important;}
</style>
