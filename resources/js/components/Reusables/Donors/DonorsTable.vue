<template>
<div class = "container">
 <table class="table table-striped">
    <thead>
      <tr>
        <th>Donor ID</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Email</th>
        <th v-if="seeDonorProgress">Status</th>
        <th v-if ="shouldSelect"></th>

      </tr>
    </thead>
    <tbody>

      <tr v-for="(donor, index) in donors" :key="index">
        <td><a href = "#" @click.prevent="showDonorModal(donor)"> {{donor.id}} </a> </td>
        <td>{{donor.last_name}}</td>
        <td>{{donor.first_name}}</td>
        <td>{{donor.email}}</td>
        <td v-if="seeDonorProgress"> <a href = "#" @click.prevent="openDonorProgress(donor)"> Status </a></td>
        <td v-if ="shouldSelect"> <b-form-radio v-model="selected_donor" :value="donor"></b-form-radio> </td>
      </tr>
    </tbody>
  </table>
<donor-modal v-if="modal_donor != null" :donor="modal_donor"> </donor-modal>

<donor-progress v-if="donor_progress != null && donation_progress !=null" :donor="donor_progress" :mbd="mbd" :donation="donation_progress"> </donor-progress>


</div>
 
</template>

<script>
import donorModal from 'C:/xampp/htdocs/PBCPortal/resources/js/components/Reusables/DonorModal.vue';
import donorProgress from 'C:/xampp/htdocs/PBCPortal/resources/js/components/Reusables/Donors/DonorProgress.vue';

export default {
  data() {
    return {
        modal_donor: null,
        selected_donor:{},
        donation_progress: null, 
        donor_progress: null
    };
  },
  props: {
    donors: Array,
    shouldSelect: Boolean,
    seeDonorProgress: Boolean,
    mbd: Object,
  },
  components:{
      'donor-modal': donorModal,
      'donor-progress': donorProgress
  },
  watch:{
      selected_donor: function (val) {
      this.$emit('donor_change', val);
    }
  },
  methods:{
      showDonorModal(donor){
      this.modal_donor = donor    
      this.$bvModal.show('donor-modal');
    },
      loadDonationProgress() {
      var donation = this.mbd.donation_list.find(donation_list => donation_list.donation.donor_id === this.donor_progress.id);
      this.donation_progress = donation;
    },
    openDonorProgress(donor){
      this.donor_progress = donor;  
      this.loadDonationProgress();
      this.$bvModal.show('donor-progress');
    },
    mounted(){
      console.log(this.seeDonorProgress);
    }
  }
};
</script>