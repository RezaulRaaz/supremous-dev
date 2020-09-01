import Example from './components/ExampleComponent'
import Brand from './components/admin/BrandComponent'
import Category from './components/admin/CategoryComponent'
import Variation from './components/admin/VariationComponent'
import ProductComponent from './components/admin/product/ProductComponent'
import ProductlistComponent from './components/admin/product/ProductlistComponent'
import ProducteditComponent from './components/admin/product/ProducteditComponent.vue'
import SocialComponent from './components/admin/settings/SocialComponent.vue'

var components={
    'example-component':Example,
    'brand-component':Brand,
    'category-component':Category,
    'variation-component':Variation,

    'product-component':ProductComponent,
    'list-component':ProductlistComponent,
    'productedit-component':ProducteditComponent,


    'social-component':SocialComponent,
}


export default components
