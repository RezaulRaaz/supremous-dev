import axios from "axios"
export default {
    state:{
        name:'Rezaul Hoque Raaz',
        brands:{
            name:'Rezaul Hoque Raaz',
            email:'rhraz.bd@gmail.com',
            phone:'01789812914',
        },
        SubCategory:{},
        category:{},
        allbrand:{},
        variation:{},
        variationAttribute:{}
    },
    getters:{
        GetBrand(state){
            return state.brands
        },
        abc(state){
            return state.name
        },
        brands(state){
            return state.allbrand;
        },
        Category(state){
            return state.category;
        },
        SubCategory(state){
            return state.SubCategory;
        },
        Variations(state){
            return state.variation;
        },
        VariationAttribute(state){
            return state.variationAttribute
        }
    },
    actions:{
        changeAbcData(context,payload){
            context.commit('dataMutate',payload)
        },
        getBrand(context){
            axios.get('/admin/get/brand')
            .then((response) => {
                context.commit('getBarand',response.data.brands)
            })
        },
        getCategory(context){
            axios.get('/admin/get/category')
            .then((response) => {
                context.commit('getCategory', response.data.category)
                // this.subCategories= response.data.sub
            })
        },
        getSubCategory(context,id){
            axios.get('/admin/get/subCategory/'+id)
                .then((response) => {
                    context.commit('getSubCategory', response.data.sub)
                })
        },
        getVariation(context){
            axios.get('/admin/get/variation')
                .then((response) => {
                    context.commit('getVariation',response.data.variationData)
                })
        },
        getVariationAttribute(context,id){
            axios.get('/admin/get/sub/variation/'+id)
                .then((response) => {
                    context.commit('getVariationAtt',response.data.attributeResult)
                })
        }
    },
    mutations:{
        dataMutate(state,payload){
            return state.name=payload
        },
        getBarand(state,payload){
            return state.allbrand=payload
        },
        getCategory(state,payload){
            return state.category=payload
        },
        getSubCategory(state,payload){
            return state.SubCategory=payload
        },
        getVariation(state,payload){
            return state.variation=payload
        },
        getVariationAtt(state,payload){
            return state.variationAttribute=payload
        }
    }

}
