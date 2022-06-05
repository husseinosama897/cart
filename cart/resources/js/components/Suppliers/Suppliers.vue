<template>
<div>
    <div class="filter">
        <div class="container">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M10 14L4 5V3h16v2l-6 9v6l-4 2z"></path></svg>
            <span>فلتر</span>
        </div>
    </div>
    <div class="container d-flex">
        <aside class="">
            <div class="container">
                <div class="supplier-aside">
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
                                <input class="form-check-input" type="checkbox" :value="item.id" v-model="filterCategory" @change="loadSuppliers(item.id)" id="flexCheckDefault">
                            </div>
                            </form>
                        </div>
                </div>
            </div>
        </aside>
        <div class="supplier-products">
            <div class="supplierProductContainer">
                <div v-for="(supplier, index) in suppliers.data" :key="index" class="product supplierProduct">
                    <div class="photo my-3">
                        <a :href="'/suppliers/' + supplier.slug + '/' + supplier.id">
                            <img :src="'/uploads/suppliers/' + supplier.image" alt="">
                        </a>
                    </div>
                    <div class="details">
                        <div>
                            <p>{{supplier.comp}} شركة تم التعاقد معها تورد من خلالنا : </p>
                            <div class="row">
                                <div class="col-6">
                                    <ul class="p-0">
                                        <li class="my-1"  v-for="category in supplier.category" :key="category.id">- زيوت</li>
                                    
                                    </ul>
                                </div>
                             
                            </div>
                        </div>
                        <a :href="'/suppliers/' + supplier.slug + '/' + supplier.id" class="supplier-cart">
                           زيارة صفحة المورد
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: 'Suppliers',
    props: {
        category: Array,
    },
    data() {
        return {
            suppliers: [],
            Categories: [],
            filterCategory: [],
        }
    },
    mounted() {
        this.loadSuppliers();
        this.Categories = this.category;
    },
    
    methods: {
        loadSuppliers: function() {
            axios.post('/json/suppliers',{
                'category': this.filterCategory,
            })
            .then((response) => {
                this.suppliers = response.data.data;
            })
            .catch();
        }
    },
}
</script>

<style>

</style>