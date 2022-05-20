<template>
    
  <div class="ProductCategoryContainer">
      <div v-for="(product, index) in ProductsCategory.product" :key="index" class="product ProductCategory">
            <div class="photo my-3">
                <img :src="'/uploads/product/' + product.img" alt="">
            </div>
            <div class="details">
                <div class="name">
                    <span style="display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;min-height: 1.25rem;">{{ product.name }}</span>
                    <span>{{ product.price }} <span>SAR</span> </span>
                </div>
                <span class="supplier-name">المورد : </span>
                <p>وصف المنتج وصف المنتج وصف المنتج وصف المنتج وصف المنتج وصف المنتج </p>
                <a href="#" class="bulk-buy">
                    شراء بالجملة
                </a>
                <button class="supplier-cart" >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M6 9h13.938l.5-2H8V5h13.72a1 1 0 0 1 .97 1.243l-2.5 10a1 1 0 0 1-.97.757H5a1 1 0 0 1-1-1V4H2V2h3a1 1 0 0 1 1 1v6zm0 14a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm12 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg>
                    عربة التسوق
                </button>
            </div>
      </div>
  </div>
</template>

<script>
export default {
   name: 'ProductCategory',
   props: ['category',],
    data() {
       return{
          ProductsCategory: {},
       }
    },
    mounted() {
        this.ProductsCategory = this.category;
    },
}
</script>

<style>
 .ProductCategoryContainer{
    display: flex;
    align-items: center;
    position: relative;
    width: 100%;
    flex-wrap: wrap;
}
.ProductCategory{
    margin: 10px;
    width: 100%;

}

@media (min-width: 480px) { 
    .ProductCategory {
        width: calc(50% - 20px);
    }
}

@media (min-width: 768px) { 
    .ProductCategory {
        width: calc(33.33% - 20px);
    }
}
@media (min-width: 992px) { 
    .ProductCategory {
        width: calc(33.33% - 20px);
    }
}
@media (min-width: 1200px) { 
    .ProductCategory {
        width: calc(25% - 20px);
    }
}
</style>