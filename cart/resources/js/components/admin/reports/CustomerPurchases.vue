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
                                        <th class="wd-15p border-bottom-0">الاسم</th>
                                        <th class="wd-15p border-bottom-0">البريد الالكتروني</th>
                                        <th class="wd-15p border-bottom-0">اجمالي سعر المشتريات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(report, index) in reports.data" :key="index">
                                        <td>{{ report.name }}</td>
                                        <td>{{ report.email }}</td>
                                        <td>{{ report.order_sum_billing_total }}</td>
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
    name: 'CustomerPurchases',
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
            axios.get('/json_customer_purchases',{
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
