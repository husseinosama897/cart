<template>
  <div>
      <div class="container">
          <div class="product-details">
              <div class="row">
                  <div class="photos col-4 owl-carousel">
                      <img 
                      :src="'/uploads/product/' + product.img" style="height: 350px;
    object-fit: contain;">
                      <img src="/front/images/kisspng-pepsi-logo-fizzy-drinks-cola-graphic-design-wework-logo-5b5bd94502e9b0.1963383115327460530119.png" alt="" style="height: 350px;
    object-fit: contain;">
                  </div>
                  <div class="details col-8">
                      <h1 class="mb-2">{{ product.name }}</h1>
                      <p style="width: 80%;margin-bottom: 20px;line-height: 1.6rem">{{ product.dis }}</p>
                      <div class="sup-details mb-4 row">
                          <span class="col-3">اسم المورد :  <span class="" style="color: #00786D">{{ supplier.comp }}</span></span>
                          <span class="col-3">اسم الصنف :  <span class="" style="color: #00786D">{{ category.name }}</span></span>
                      </div>
                      <div class="product-price row mb-4">
                        <span class="col-3">السعر : {{ product.price }} ر.س</span>
                        <div class="qty col-3">
                            <input hidden="" type="hidden" class="product_id" value="85">
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label class="form-label" for="quantity">الكمية</label>
                                </div>
                                <div class="col-auto">
                                    <input class="form-control qty" type="number" id="quantity" v-model="quantity" min="1" style="padding: 10px;border-radius: 2px;width: 100px;height: 36px;direction: rtl;">
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="baw mb-4">
                          <button class="btn btn-sm btn-primary py-2 px-3 mx-2">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="#fff">
                                <path fill="none" d="M0 0h24v24H0z"/>
                                <path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-3.5-6H14a.5.5 0 1 0 0-1h-4a2.5 2.5 0 1 1 0-5h1V6h2v2h2.5v2H10a.5.5 0 1 0 0 1h4a2.5 2.5 0 1 1 0 5h-1v2h-2v-2H8.5v-2z"/>
                              </svg>
                              شراء الان
                          </button>
                            <button class="btn btn-sm btn-primary py-2 px-3 mx-2" @click="addProductInCart(product.id)">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="#fff"><path fill="none" d="M0 0h24v24H0z"/><path d="M4 16V4H2V2h3a1 1 0 0 1 1 1v12h12.438l2-8H8V5h13.72a1 1 0 0 1 .97 1.243l-2.5 10a1 1 0 0 1-.97.757H5a1 1 0 0 1-1-1zm2 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm12 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg>
                             اضف الى العربة
                          </button>
                            <button class="btn btn-sm btn-primary py-2 px-3 mx-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="#fff"><path fill="none" d="M0 0H24V24H0z"/><path d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228zm6.826 1.641c-1.5-1.502-3.92-1.563-5.49-.153l-1.335 1.198-1.336-1.197c-1.575-1.412-3.99-1.35-5.494.154-1.49 1.49-1.565 3.875-.192 5.451L12 18.654l7.02-7.03c1.374-1.577 1.299-3.959-.193-5.454z"/></svg>
                             اضف الى قائمة الرغبات
                          </button>
                      </div>
                  </div>
              </div>
          </div>
          <div class="related-products">
              <div class="row">
                    <div class="product" v-for="(relatedProduct, index) in related" :key="index">
                        <div class="photo my-3">
                            <a :href="'/product/' + relatedProduct.slug + '/' + relatedProduct.id">
                                <img :src="'/uploads/product/' + relatedProduct.img" :alt="relatedProduct.name">
                            </a>
                        </div>
                        <div class="details">
                            <div class="name">
                                <a :href="'/product/' + relatedProduct.slug + '/' + relatedProduct.id">
                                    <span style="display: -webkit-box;
                                    -webkit-line-clamp: 1;
                                    -webkit-box-orient: vertical;
                                    overflow: hidden;min-height: 1.25rem;">
                                    {{ relatedProduct.name }}
                                    </span>
                                </a>
                                <span>{{ relatedProduct.price }} <span>ر.س</span> </span>
                            </div>
                            <p>وصف المنتج وصف المنتج وصف المنتج وصف المنتج وصف المنتج وصف المنتج </p>
                            <a href="#" class="bulk-buy">
                                شراء بالجملة
                            </a>
                            <a href="#" class="supplier-cart">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M6 9h13.938l.5-2H8V5h13.72a1 1 0 0 1 .97 1.243l-2.5 10a1 1 0 0 1-.97.757H5a1 1 0 0 1-1-1V4H2V2h3a1 1 0 0 1 1 1v6zm0 14a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm12 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg>
                                عربة التسوق
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
    name: 'View',
    props: {
        supplier: Object,
        category: Object,
        product: String, 
        related: Array,
    },
    data() {
        return {
            quantity: 1,
            responseMsg: '',
        }
    },
    mounted() {
    },
    methods: {
        addProductInCart: function($product){
            axios.post('/storeincart/'+ $product, {
                'quantity': this.quantity,
            })
            .then((response) => {
                this.$toastr.s(response.data.msg);
            });
            // .catch();
        }
    },
}
</script>

<style>

</style>