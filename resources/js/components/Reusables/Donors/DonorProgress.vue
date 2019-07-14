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

      <div class="row-title">Donation Progress </div>
        <div class="row">
          <div class = "col-md-4">
              Progress Bar
          </div>
          <div class = "col-md-6">
              <ul class="list-group">
                <li class="list-group-item disabled">Donor History</li>
                <li class="list-group-item">Blood Unit</li>
            </ul>
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

