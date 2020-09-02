import Example from './components/ExampleComponent'
import Brand from './components/admin/BrandComponent'
import Category from './components/admin/CategoryComponent'
import Variation from './components/admin/VariationComponent'
import ProductComponent from './components/admin/product/ProductComponent'
import ProductlistComponent from './components/admin/product/ProductlistComponent'
import ProducteditComponent from './components/admin/product/ProducteditComponent.vue'
import SocialComponent from './components/admin/settings/SocialComponent.vue'
import ChangePasswordComponent from './components/admin/settings/ChangePasswordComponent.vue'
import InfoComponent from './components/admin/settings/InfoComponent.vue'

import PaginateComponent from './components/admin/partial/PaginateComponent.vue'



var components={
    'example-component':Example,
    'brand-component':Brand,
    'category-component':Category,
    'variation-component':Variation,

    'product-component':ProductComponent,
    'list-component':ProductlistComponent,
    'productedit-component':ProducteditComponent,

    'password-component':ChangePasswordComponent,
    'social-component':SocialComponent,

    'info-component':InfoComponent,

    'paginate-component':PaginateComponent,
}


export default components
