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
                                        <!-- <th class="wd-20p border-bottom-0">رقم الهاتف</th> -->
                                        <th class="wd-25p border-bottom-0">تاريخ الانضمام</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(report, index) in reports" :key="index">
                                        <td>{{ report.name }}</td>
                                        <td>{{ report.email }}</td>
                                        <!-- <td>{{ report.number }}</td> -->
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
    name: 'newCustomer',
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
            axios.get('/jsonnewcustomer',{
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
