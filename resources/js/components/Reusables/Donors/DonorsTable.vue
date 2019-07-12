<template>
<div class = "container">
 <table class="table table-striped">
    <thead>
      <tr>
        <th>Donor ID</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="donor in donors" :key="donor.id">
        <td><a href = "#" @click="showDonorModal(donor)"> {{donor.id}} </a> </td>
        <td>{{donor.last_name}}</td>
        <td>{{donor.first_name}}</td>
        <td>{{donor.email}}</td>
        <td v-if ="shouldSelect"> <b-form-radio v-model="selected_donor" :value="donor"></b-form-radio> </td>
      </tr>
    </tbody>
  </table>
<donor-modal :donor="modal_donor" :donations="modal_donations"> </donor-modal>

</div>
 
</template>

<script>
import donorModal from 'C:/xampp/htdocs/PBCPortal/resources/js/components/reusables/DonorModal.vue';
export default {
  data() {
    return {
        modal_donor: {},
        modal_donations: [],
        selected_donor:{},

    };
  },
  props: {
    donors: Array,
    shouldSelect: Boolean,
  },
  components:{
      'donor-modal': donorModal
  },
  watch:{
      selected_donor: function (val) {
      this.$emit('donor_change', val);
    }
  },
  methods:{
          showDonorModal(donor){
      this.modal_donor = donor;
      axios
        .get("/api/blood_unit",{
          params: {
            donor_id: this.modal_donor.donor_id
          }
        })
        .then(response => (this.modal_donations = response.data.data))
      this.$bvModal.show('donor-modal');
    }
  }
};
</script>