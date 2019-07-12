<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="btn-group float-right" role="group">
          <button
            class="btn btn-warning"
            v-for="(all_date, index) in all_dates"
            :key="index"
          >{{all_date}}</button>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
      <donors-table :shouldSelect='false' :donors="donors"> </donors-table>
        <button @click="showAddDonor" class="float-right btn btn-success">Add Donation</button>
      </div>
    </div>
    <donor-modal
      :donor="modal_donor"
    ></donor-modal>
    <add-donation :MBDName="MBDName"> </add-donation>
  </div>
</template>

<script>
import donorModal from "C:/xampp/htdocs/PBCPortal/resources/js/components/Reusables/DonorModal.vue";
import addDonation from "C:/xampp/htdocs/PBCPortal/resources/js/components/Reusables/AddDonation.vue";
import donorsTable from 'C:/xampp/htdocs/PBCPortal/resources/js/components/reusables/Donors/DonorsTable.vue';

export default {
  data() {
    return {
        modal_donor :{

        },
        // modal_donations:[]
    };
  },
  components: {
    "donor-modal": donorModal,
    "add-donation": addDonation,
    "donors-table": donorsTable
  },
  props: {
    all_dates: Array,
    donors: Array,
    MBDName: String
  },
  methods: {
      showAddDonor(){
      this.$bvModal.show('add-donation');
    },
      showDonorModal(donor){
      this.modal_donor = donor;
      this.$bvModal.show('donor-modal');
    },
    loadDonors() {
      axios.get("/api/donor_lists/", {
        params: {}
      });
    }
  },
  created() {
    this.loadDonors();
  }
};
</script>