<template>
  <div>
              <div class="filter">
            <div class="container">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M10 14L4 5V3h16v2l-6 9v6l-4 2z"/></svg>
                <span>فلتر</span>
            </div>
        </div>
        <div class="container d-flex">
            <aside class="">
                <div class="container">
                    <div class="supplier-aside">
                        <div class="supplier-details">
                            <div class="logo">
                                <img :src="'/uploads/suppliers/' + supplier.img" alt="">
                                <span>{{ supplier.comp }}</span>
                            </div>
                            </div>
                            <div class="categories">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <span class="fs-5">التصنيفات</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z"/></svg>
                                </div>
                                <form method="GET">
                                <div class="form-check mb-2">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        الكل
                                        </label>
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                </div>
                                <div class="form-check mb-2" v-for="(item, index) in Categories" :key="index">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ item.name }}
                                        </label>
                                    <input class="form-check-input" type="checkbox" name="category[]" @click="loadSuppliers(item.id)" id="flexCheckDefault">
                                </div>
                                </form>
                            </div>
                    </div>
                </div>
            </aside>
            <div class="supplier-products">
                <div class="supplierProductContainer">
                    <div v-for="(products, index) in supplierProducts.data" :key="index" class="product supplierProduct">
                        <div class="photo my-3">
                            <img :src="'/uploads/product/' + products.img" alt="">
                        </div>
                        <div class="details">
                            <div class="name">
                                <span style="display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;min-height: 1.25rem;">{{ products.name }}</span>
                                <span>{{ products.price }} <span>SAR</span> </span>
                            </div>
                            <span class="supplier-name">المورد : {{ supplier.comp }}</span>
                            <p>وصف المنتج وصف المنتج وصف المنتج وصف المنتج وصف المنتج وصف المنتج </p>
                            <a href="#" class="bulk-buy">
                                شراء بالجملة
                            </a>
                            <button class="supplier-cart"  @click="addProductInCart(products.id)">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M6 9h13.938l.5-2H8V5h13.72a1 1 0 0 1 .97 1.243l-2.5 10a1 1 0 0 1-.97.757H5a1 1 0 0 1-1-1V4H2V2h3a1 1 0 0 1 1 1v6zm0 14a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm12 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg>
                                عربة التسوق
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
</template>

<script>

export default {
    name: 'Supplier',
    props: {
        slug: String, 
        supplier: Object,
        category: Array,
    },
    data() {
        return {
            supplierProducts: [],
            Categories: [],
        }
    },
    mounted() {
        this.loadSuppliers();
        this.Categories = this.category;
    },
    
    methods: {
        loadCategories: function(){
        },
        loadSuppliers: function(category_id) {
            axios.post('/json/suppliers/'+ this.slug + '?category=' + category_id)
            .then((response) => {
                this.supplierProducts = response.data.data;
            })
            .catch();
        },
        addProductInCart: function($product){
            axios.post('/storeincart/'+ $product, {
                'quantity': 1,
            })
            .then((response) => {
                this.$toastr.s(response.data.msg);
            })
            .catch();
        }
    },
}
</script>

<style>

</style>