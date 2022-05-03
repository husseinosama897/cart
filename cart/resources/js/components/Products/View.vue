<template>
  <div>
      <div class="container">
          <div class="product-details">
              <div class="row">
                  <div class="photos col-4">
                      <img src="/front/images/kisspng-pepsi-logo-fizzy-drinks-cola-graphic-design-wework-logo-5b5bd94502e9b0.1963383115327460530119.png" alt="">
                  </div>
                  <div class="details col-8">
                      <h1>اسم المنتج</h1>
                      <p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة</p>
                      <div class="sup-details mb-2 row">
                          <span class="col-3">اسم المورد : بيبسي</span>
                          <span class="col-3">اسم الصنف : بيبسي</span>
                      </div>
                      <div class="product-price row mb-2">
                        <span class="col-3">السعر : 20 ر.س</span>
                        <div class="qty col-3">
                            <input hidden="" type="hidden" class="product_id" value="85">
                           <label class="form-label" for="quantity">الكمية</label>
                           <input class="form-control qty" type="number" id="quantity" min="1" value="1" style="padding: 10px;border-radius: 2px;width: 100px;height: 36px;">
                        </div>
                      </div>
                  </div>

              </div>
          </div>
      </div>
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>