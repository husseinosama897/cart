<template>
   <div>
       <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">اسم المورد</th>
                                        <th class="wd-15p border-bottom-0">اسم المنتج</th>
                                        <th class="wd-20p border-bottom-0">عدد المبيعات</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(report, index) in reports.data" :key="index">
                                        <td>{{ report.product.supplier.comp }}</td>
                                        <td>{{ report.product.name }}</td>
                                        <td>{{ report.product_count }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
</template>
<script>
import moment from "moment";

export default {
    name: 'productsBySupplier',
    props: {
        category: Array,
    },
    data() {
        return {
            reports: [],
            moment: moment,
        }
    },
    mounted() {
        this.loadreport();
    },
    
    methods: {
        loadreport: function() {
            axios.get('/json_products_by_supplier',{
                // 'category': this.filterCategory,
            })
            .then((response) => {
                this.reports = response.data.data;
            })
            .catch();
        }
    },

}
</script>
