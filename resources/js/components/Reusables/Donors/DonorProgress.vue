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

      <div class="row">
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
                  <a
                    href="#"
                    @click.prevent="openDonorHistory"
                    :donation="donation_progress"
                  >Donor History</a>
                </td>
                <th>
                  <i class="fas fa-check-square green"></i>
                </th>
              </tr>
              <tr>
                <td>
                  <a
                    href="#"
                    @click.prevent="openBloodUnit"
                    :donation="donation_progress"
                  >Blood Unit</a>
                </td>
                <td>
                  <i class="fas fa-check-square green"></i>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        
      </div>
      <donor-history :donor="donor" :donation="donation"></donor-history>
      <donor-blood-unit :donor="donor" :donation="donation"></donor-blood-unit>
    </div>
  </b-modal>
  
</template>

<script>
import donorHistory from "C:/xampp/htdocs/PBCPortal/resources/js/components/Reusables/Donors/DonorHistory.vue";
import donorBloodUnit from "C:/xampp/htdocs/PBCPortal/resources/js/components/Reusables/Donors/DonorBloodUnit.vue";

export default {
  data() {
    return {
      donation_progress: null
    };
  },
  props: {
    donor: Object,
    mbd: Object,
    donation: Object,
  },
  components: {
    "donor-history": donorHistory,
    "donor-blood-unit": donorBloodUnit
  },

  methods: {
    openDonorHistory() {
      this.$bvModal.show("donor-history");
    },
    openBloodUnit() {
      this.$bvModal.show("donor-blood-unit");
    },
  
  },

  mounted() {
    
  }
};
</script>

