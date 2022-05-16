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
                <div class="col-md-8 pt-3 d-flex m-auto">
                    <select class="form-select" aria-label="Default select example" v-model="order.productName">
                        <option value="Hello">Hello</option>
                        <option value="Hello">Hello</option>
                        <option value="Hello">Hello</option>
                        <option value="Hello">Hello</option>
                    </select>
                </div>
                <div class="col-md-8 pt-3 d-flex m-auto">
                    <input type="number" class="form-control" v-model="order.qty" style="direction: rtl;">
                </div>
                <div class="col-md-8 pt-3 d-flex m-auto">
                    <textarea class="form-control" placeholder="ملاحظات للطباعة" v-model="order.notes" id="" cols="15" rows="5">
                        
                    </textarea>
                </div>
                <div class="col-md-8 p-2 d-flex m-auto">
                    <div class="col-12 pt-3">
                        <input type="file" name="attached" @change="onFileChange(index, $event)" class="form-control" accept="image/*">
                    </div>
                </div>
              </div>
          </div>
          <div class="row gap-2 justify-content-sm-start" style="max-width: 1024px;width: 100%;">
            <button class="btn btn-outline-success col-auto" @click="createOrder">اضافه منتج اخر</button>
            <button class="btn btn-primary col-auto" style="background-color: #00786D !important;border: none !important">طلب الان</button>
          </div>

      </div>
  </div>
</template>

<script>
export default {
   name: 'CreatePacking',
    data() {
       return{
           orders: [
               {
                   productName: '',
                   qty: 0,
                   notes: '',
                   attached: null
               },
               {
                   productName: '',
                   qty: 0,
                   notes: '',
                   attached: null
               },
           ],
           url: null
       }
    },
    mounted() {
    },
    methods: {
        onFileChange(index, e) {
            const file = e.target.files[0];
            this.url = file;
            this.orders[index].attached = file;
        },
        createOrder: function (param) { 
            this.orders.push({
                productName: '',
                qty: 0,
                notes: '',
                attached: null
               });
        },
        deleteOrder: function (index) { 
            this.orders.splice(index, 1)
        }
    },
    computed: {
    },
}
</script>

<style>

</style>