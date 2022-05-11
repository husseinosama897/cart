<template>
   <div>
      <section class="section-content padding-y bg">
         <div class="container">
            <div class="row">
               <aside class="col-lg-8">
                  <div class="card cart">
                     <div v-for="(product, index) in carts" :key="index" class="d-sm-flex justify-content-between align-items-center my-2 pb-3 border-bottom card_details">
                        <div class="d-block d-sm-flex align-items-center text-center text-sm-right">
                           <a class="d-inline-block flex-shrink-0 mx-auto me-sm-4 ms-sm-4" :href="'/product/' + product.product.slug + '/' + product.product.id">
                           <img :src="'/uploads/product/' + product.product.img" width="120" style="height: 100px;width: 100px;object-fit: contain;">
                           </a>
                           <div class="pt-2">
                              <span class="product-title fs-base d-block mb-2">
                                 <a :href="'/product/' + product.product.slug + '/' + product.product.id">
                                    {{ product.product.name }}
                                 </a>
                              </span>
                              <div class="fs-sm mb-1"><span class="text-muted me-2">الحجم : </span>2.41 انش</div>
                              <div class="fs-sm mb-1"><span class="text-muted me-2">الالوان : </span>اسود</div>
                              <div class="fs-sm mb-1">
                                 <span class="text-muted me-2 price">سعر المنتج : </span>  {{ product.product.price }} ر.س
                              </div>
                           </div>
                        </div>
                        <div class="pt-2 pt-sm-0 pe-sm-3 mx-auto mx-sm-0 text-center text-sm-start" style="max-width: 9rem;">
                           <input hidden="" type="hidden" class="product_id" value="85">
                           <label class="form-label" for="quantity">الكمية</label>
                           <input class="form-control qty" type="number" id="quantity" min="1" v-model="product.quantity" @change="updateCart(product.id, product.quantity)" style="padding: 10px;border-radius: 2px;width: 100px;height: 36px;">
                           <a @click="deleteCart(product.id)" class="btn px-0 text-danger remove" style="cursor: pointer">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                 <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                 <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                              </svg>
                              <span class="fs-sm">حذف</span>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="mt-3">
                     <a href="/" class="btn btn-light btn-block" style="border-radius: 0.3125rem;text-align: center;max-width: 100%;width: 200px;margin-bottom: 0.5rem;text-align: center;border: 1px solid rgb(56, 102, 223);color: rgb(56, 102, 223);">تابع التسوق</a>
                  </div>
                  <!-- card.// -->
               </aside>
               <!-- col.// -->
               <aside class="col-lg-4">
                  <div class="card cart2">
                     <div class="card-body">
                        <h5 class="text-center">ملخص الطلبية</h5>
                        <dl class="dlist-align">
                           <dt class="text-right">عدد طلبات :</dt>
                           <dd class="text-start">{{ counter }}</dd>
                        </dl>
                        <dl class="dlist-align">
                           <dt class="text-right">اجمالي السعر:</dt>
                           <dd class="text-start">{{ totalPrice }} ر.س</dd>
                        </dl>
                        <hr>
                        <a href="/checkout" class="btn btn-light btn-block w-100" style="border-radius: 0.3125rem;color:#fff;background: rgb(56, 102, 223);text-align: center;max-width: 100%;text-align: center;">
                        إتمام الشراء
                        </a>
                     </div>
                     <!-- card-body.// -->
                  </div>
                  <!-- card.// -->
               </aside>
               <!-- col.// -->
            </div>
         </div>
      </section>
   </div>
</template>
<script>
export default {
   name: 'PakingIndex',
    data() {
       return{
       }
    },
    mounted() {
    },
    methods: {
   },
   computed: {
   },

}
</script>
<style>
</style>