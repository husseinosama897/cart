<template>
  <div>
      <div class="orders">
          <div class="order mb-4" v-for="(order, index) in orders" :key="index">
              <button class="btn btn-sm btn-danger" @click="deleteOrder(index)" 
              style="position: absolute;top: 0;left: 0;border-radius: 20px 0 0 0;">
                  <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' width='14' height='14' fill='#fff'><path d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/></svg>
              </button>
              <div class="photo">
                  <img src="/front/images/purple-marble-cups-mockup-psd-handmade-experimental-art_53876-111290.png" alt="">
              </div>
              <div class="row details mt-4">
                  <p class="w-75" style="margin: 0 auto;">وصف المنتج الذي تم اخيارة وصف المنتج الذي تم اخيارة وصف المنتج الذي تم اخيارة وصف المنتج الذي تم اخيارة وصف المنتج الذي تم اخيارة</p>
                <div class="col-md-8 pt-3 d-flex m-auto position-relative">
                    
                    <input type="text" class="form-control" v-if="order.product_id !== ''" v-model="order.nameProduct" v-on:keyup="getProduct" style="direction: rtl;">
                    <input type="text" class="form-control" v-if="order.nameProduct == ''" v-model="searchGetProduct" v-on:keyup="getProduct" style="direction: rtl;">

                    <div class="drop-search" id="drop-search" v-if="searchGetProduct !== ''" v-bind:class="{ active: isActive, }">
                        <ul class="ps-0 mb-0">
                            <li v-for="(product, index) in products" :key="index" >
                                <a @click="addIdProduct(index, product.id,product.supplier_id, product.name, product.price)">
                                <span class="name-search" style="display: flex;align-items: center;">
                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="7.5" cy="7.5" r="6.5" stroke="#3A4046" stroke-width="2"></circle>
                                    </svg>                                                    
                                    <span>{{ product.name }}</span>
                                </span>                                          
                                </a>
                            </li>
                            <li v-if="!products.length">
                                <a>
                                <span class="name-search" style="display: flex;align-items: center;">
                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="7.5" cy="7.5" r="6.5" stroke="#3A4046" stroke-width="2"></circle>
                                    </svg>                                                    
                                    <span>لا يوجد منتج بهذا الاسم</span>
                                </span>                                          
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8 pt-3 d-flex m-auto">
                    <input type="number" class="form-control" v-model="order.quantity" style="direction: rtl;">
                </div>
                <div class="col-md-8 pt-3 d-flex m-auto">
                    <textarea class="form-control" placeholder="ملاحظات للطباعة" v-model="order.notes" id="" cols="15" rows="5">
                        
                    </textarea>
                </div>
                <div class="col-md-8 p-2 d-flex m-auto">
                    <div class="col-12 pt-3">
                        <input type="file" name="image" @change="onFileChange(index, $event)" class="form-control" accept="image/*">
                    </div>
                </div>
              </div>
          </div>
          <div class="row gap-2 justify-content-sm-start" style="max-width: 1024px;width: 100%;">
            <button class="btn btn-outline-success col-auto" @click="createOrder">اضافه منتج اخر</button>
            <button class="btn btn-primary col-auto" @click="sendOrder" style="background-color: #00786D !important;border: none !important">طلب الان</button>
          </div>

      </div>
  </div>
</template>

<script>
export default {
   name: 'CreatePacking',
    data() {
       return{
           image:[],
           isActive: false,
           orders: [
               {
                   product_id: '',
                   product_price: 0,
                   quantity: 1,
                   notes: '',
                   image: null,
                   nameProduct: '',
                   supplier_id: ''
               },
           ],
           url: null,
           searchGetProduct: '',
           products: [],
       }
    },
    mounted() {
    },
    methods: {
        onFileChange(index, e) {
            const file = e.target.files[0];
       this.orders[index].image = file

 
        },
        createOrder: function () { 
            this.orders.push({
                product_id: '',
                product_price: 0,
                quantity: 0,
                notes: '',
                image: null,
                nameProduct: '',
                supplier_id: ''
            });
        },
        deleteOrder: function (index) { 
            this.orders.splice(index, 1)
        },
        getProduct: function (){
            axios.post('/getCup/', {
                'name': this.searchGetProduct,
            }).then((response) => {
                console.log(response);
                this.products = response.data.data;
                this.isActive = true;
            })
            .catch();
        },
        addIdProduct: function(index, idProduct, supplier_id, nameProduct, priceProduct){

            this.orders.forEach((item, indexx) => {
                if(idProduct !== item.product_id){
                    this.orders[index].product_id = idProduct;
                    this.orders[index].nameProduct = nameProduct;
                                this.orders[index].supplier_id = supplier_id
                    this.isActive = false;
                    this.orders[index].product_price = priceProduct;
                }else{
                   item.quantity += 1;
                   this.orders.splice(index, 1)
                }
            });
        },
        sendOrder: function () {  
            
     	const config = {
   
                   headers: { 'content-type': 'multipart/form-data' }
   
               }
   
               let formData = new FormData();

         
   

    
    this.orders.forEach((element,index) => {
       
   if(element.image !== undefined && element.image !== null){
       
   formData.append('files-' + index, element.image);

   Vue.set(element,'exist_image',1)
   }else{
       Vue.set(element,'exist_image',0)
   }
    
   });
   
formData.append('packing',JSON.stringify(this.orders));
            axios.post('/insertcup/',formData, {
                   headers: {
                       'Content-Type': 'multipart/form-data' },
   }).then((response) => {
                this.$toastr.s(response.data.msg);
            })
            .catch();
        }
    },
    computed: {
    },
}
</script>

<style>

</style>