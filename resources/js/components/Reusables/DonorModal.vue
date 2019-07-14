<template>
  <b-modal id="donor-modal">
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

      <div class="row-title">Personal Information</div>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-sm">
            <thead></thead>
            <tbody>
              <tr>
                <th>Sex:</th>
                <td>{{donor.personal_details.sex}}</td>
              </tr>
              <tr>
                <th>Birthdate:</th>
                <td>{{donor.personal_details.birthdate}}</td>
              </tr>
              <tr>
                <th>Contact Number:</th>
                <td>{{donor.personal_details.contact_number}}</td>
              </tr>
              <tr>
                <th>Civil Status:</th>
                <td>{{donor.personal_details.civil_status}}</td>
              </tr>
              <tr>
                <th>Occupation:</th>
                <td>{{donor.personal_details.occupation}}</td>
              </tr>
              <tr>
                <th>Nationality:</th>
                <td>{{donor.personal_details.nationality}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="row-title">Donation History</div>
      <div v-if="donor.mbd_donations.length">
        <div class="row donor-short-profile">
          <div class="col-md-4">Total Donations: </div>
          <div class="col-md-4">Successful Donations: </div>
          <div class="col-md-4">Unsuccessful Donations: </div>
        </div>
        <div class="row">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Donation ID</th>
                <th>Status</th>
                <th>Donation Date</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="donation in donor.donations" :key="donation.id">
                <td>{{donation.id}}</td>
                <td>{{donation.status}}</td>
                <td>{{donation.created_at}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div v-else class="row">
        <div class="col-md-12">
          <div class="alert alert-danger" role="alert">No Donations Found!</div>
        </div>
      </div>

      <!-- If Donor does not have any donations -->
    </div>
  </b-modal>
</template>

<script>
export default {
  data() {
    return {};
  },
  props: {
    donor: Object,

  },
  methods: {
    close() {
      this.$emit("close");
    }
  },

  mounted() {}
};
</script>

