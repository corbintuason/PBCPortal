<template>
  <div>
    <!-- Dynamic Navbar -->
    <navbar></navbar>
    <!-- Actual Content-->
    <div class="content-wrapper">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card mt-3">
                <div class="card-header">
                  <h3 class="card-title">Blood Reactions</h3>
                </div>
                <div class="card-body">
                  <div class="panel panel-header">ha</div>
                  <table class="table table-md table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Donation ID</th>
                        <th>Blood Type</th>
                        <th>Blood Bag</th>
                        <th>Whole Blood</th>
                        <th>Packed RBC</th>
                        <th>Platelet Concentrate</th>
                        <th>Fresh Frozen Plasma</th>
                        <th>Cryoprecipitate</th>
                        <th>Cryosupernate</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- NVBSP20180000453-->
                      <tr>
                        <td>1</td>
                        <td>NVBSP2018000453</td>
                        <td>-</td>
                        <td>SINGLE</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer">
                  <div class="card-tools">
                    <button class="btn btn-success float-right">Update</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      donations: {},
      reactions: {}
    };
  },
  methods: {
    loadDonations() {
      axios
        .get("/api/donation")
        .then(response => (this.donations = response.data.data));
    },
    bloodReact() {}
  },
  mounted() {
    this.loadDonations();
    console.log("Component mounted.");
  }
};
</script>
