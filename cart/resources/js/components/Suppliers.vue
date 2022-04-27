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
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z"></path></svg>
                            </div>
                            <div class="form-check mb-2">
                                <label class="form-check-label" for="flexCheckChecked">
                                    الكل
                                    </label>
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked="">
                            </div>
                            <div class="form-check mb-2">
                                <label class="form-check-label" for="flexCheckDefault">
                                    السيروب والمنكهات
                                    </label>
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            </div>
                        </div>
                </div>
            </div>
        </aside>
        <div class="supplier-products">
            <div class="row" style="column-gap: 10px;">
                <div v-for="(supplier, index) in suppliers.data" :key="index" class="product col-xl-3 col-md-4 col-sm-6">
                    <div class="photo">
                        <img src="/front/images/N28862998A_1.jpg" alt="">
                    </div>
                    <div class="details">
                        <div>
                            <p>{{supplier.comp}} شركة تم التعاقد معها تورد من خلالنا : </p>
                            <div class="row">
                                <div class="col-6">
                                    <ul class="p-0">
                                        <li class="my-1">- زيوت</li>
                                        <li class="my-1">- سمنة</li>
                                        <li class="my-1">- زيوت</li>
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <ul class="p-0">
                                        <li class="my-1">- زيوت</li>
                                        <li class="my-1">- سمنة</li>
                                        <li class="my-1">- زيوت</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="supplier-cart">
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
    data() {
        return {
            suppliers: [],
        }
    },
    mounted() {
        this.loadSuppliers();
    },
    
    methods: {
        loadSuppliers: function() {
            axios.get('/json/suppliers')
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