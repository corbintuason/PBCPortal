<template>
  <b-modal id="donor-progress">
    <template slot="modal-title">{{donor.first_name}} {{donor.last_name}}</template>
    <div class="modal-body">
      <!-- If Donor has any donations -->
      <div class="row-title">Basic Information</div>
      <div class="row">
        <div class="col-md-3">
          <!-- Insert Picture -->
        </div>
        <div class="col-md-9">
          <table class="table table-sm">
            <thead></thead>
            <tbody>
              <tr>
                <th>Full Name:</th>
                <td>{{donor.full_name}}</td>
              </tr>
              <tr>
                <th>Email:</th>
                <td>{{donor.email}}</td>
              </tr>
              <tr>
                <th>Account Created:</th>
                <td>{{donor.created_at}}</td>
              </tr>
              <tr>
                <th>Account Created:</th>
                <td>{{donor.created_at}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="row-title">{{mbd.name}}</div>
      <div class="row-sub-category">Donation Progress</div>

      <div v-if="donation_progress!=null" class="row">
        <div class="col-md-12">
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th>Requirement</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <a href="#" @click.prevent="openDonorHistory" :donation="donation_progress">Donor History</a>
                </td>
                <th>
                  <i class="fas fa-check-square green"></i>
                </th>
              </tr>
              <tr>
                <td>Blood Unit</td>
                <th>
                  <i class="fas fa-check-square green"></i>
                </th>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <donor-history :donor="donor" :donation="donation_progress"></donor-history>
    </div>
  </b-modal>
</template>

<script>
import donorHistory from "C:/xampp/htdocs/PBCPortal/resources/js/components/Reusables/Donors/DonorHistory.vue";

export default {
  data() {
    return {
      donation_progress: null
    };
  },
  props: {
    donor: Object,
    mbd: Object
  },
  components: {
    "donor-history": donorHistory
  },

  methods: {
    openDonorHistory() {
      this.$bvModal.show("donor-history");
    },
    checkDonationProgress() {
      var mbd_id = this.mbd.id;
      
      var donation = this.mbd.donation_list.find(donation_list => donation_list.donation.donor_id == this.donor.id);
      console.log(donation);
      this.donation_progress = donation;
    }
  },

  mounted() {
    this.checkDonationProgress();
  }
};
</script>

