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
                                        <th class="wd-15p border-bottom-0">Name</th>
                                        <th class="wd-15p border-bottom-0">Email</th>
                                        <th class="wd-20p border-bottom-0">Phone</th>
                                        <th class="wd-15p border-bottom-0">Total Price</th>
                                        <th class="wd-25p border-bottom-0">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(report, index) in reports.data" :key="index">
                                        <td>{{ report.billing_name }}</td>
                                        <td>{{ report.billing_email }}</td>
                                        <td>{{ report.billing_number }}</td>
                                        <td>{{ report.billing_total }}</td>
                                        <td>{{  moment(report.created_at).format("DD-MM-YYYY") }}</td>
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
    name: 'report',
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
        loadreport: function(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }
            axios.post('/jsonArrivedOrderReport?page=' + page,{
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
