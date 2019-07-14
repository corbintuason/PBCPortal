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

      <tr v-for="donor in donors" :key="donor.id">
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
<donor-progress v-if="donor_progress != null" :donor="donor_progress"> </donor-progress>


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
        donor_progress: null,

    };
  },
  props: {
    donors: Array,
    shouldSelect: Boolean,
    seeDonorProgress: Boolean,
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
    openDonorProgress(donor){
      this.donor_progress = donor;
      this.$bvModal.show('donor-progress');
    },
    mounted(){
      console.log(this.seeDonorProgress);
    }
  }
};
</script>