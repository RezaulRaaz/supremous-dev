<template>
    <div>
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
            api-key="4v9qs4xphj2l9euoe90il4igrk2idwti1xps8h6zac4svef4"
        />
    </div>
</template>

<script>
    import Editor from '@tinymce/tinymce-vue'
    export default {
        components: {
            'editor': Editor
        },
        name: "EditorComponent",
        data(){
            return{
                description:''
            }
        },
    }
</script>

<style scoped>

</style>
