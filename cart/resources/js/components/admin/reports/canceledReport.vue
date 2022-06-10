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
                                        <th class="wd-15p border-bottom-0" style="text-transform: capitalize;text-align: left;">Name</th>
                                        <th class="wd-15p border-bottom-0" style="text-transform: capitalize;text-align: left;">Email</th>
                                        <th class="wd-20p border-bottom-0" style="text-transform: capitalize;text-align: left;">Phone</th>
                                        <th class="wd-15p border-bottom-0" style="text-transform: capitalize;text-align: left;">Total Price</th>
                                        <th class="wd-25p border-bottom-0" style="text-transform: capitalize;text-align: left;">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(ArrivedOrder, index) in ArrivedOrders.data" :key="index">
                                        <td style="text-align: left;">{{ ArrivedOrder.billing_name }}</td>
                                        <td style="text-align: left;">{{ ArrivedOrder.billing_email }}</td>
                                        <td style="text-align: left;">{{ ArrivedOrder.billing_number }}</td>
                                        <td style="text-align: left;">{{ ArrivedOrder.billing_total }}</td>
                                        <td style="text-align: left;">{{  moment(ArrivedOrder.created_at).format("DD-MM-YYYY") }}</td>
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
    name: 'canceledReport',
    props: {
        category: Array,
    },
    data() {
        return {
            ArrivedOrders: [],
            moment: moment,
        }
    },
    mounted() {
        this.loadArrivedOrder();
    },
    
    methods: {
        loadArrivedOrder: function() {
            axios.post('/jsoncanceledOrderReport',{
                // 'category': this.filterCategory,
            })
            .then((response) => {
                this.ArrivedOrders = response.data.data;
            })
            .catch();
        }
    },

}
</script>
