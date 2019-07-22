<template>
  <div>
    <!-- Dynamic Navbar -->
    <navbar></navbar>
    <!-- Actual Content-->

    <div class="content-wrapper">
      <div class="content">
        <div class="container-fluid">
          <div class="row mt-3">
            <div class="col-md-8">
              <div class = "card">
                <div class = "card-header">
                  <div class = "card-title">
                    Blood Stocks
                  </div>
                </div>
                <div class = "card-body">
              <blood-stocks></blood-stocks>

                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">Expiring Blood Units</div>
                </div>
                <div class="card-body">
                  <table class="table table-sm table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Days Left</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>12345</td>
                        <td>2</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <!-- Upcoming MBDs-->
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">Upcoming MBDs</div>
                </div>
                <div class="card-body"></div>
              </div>
            </div>
          </div>
          <div class = "row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">MBD Requests</div>
                </div>
                <div class="card-body">
                  <mbd-requests> </mbd-requests>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">Active Blood Requests</div>
                </div>
                <div class="card-body"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import bloodstocks from "../Reusables/BloodStocks.vue";
import mbdRequests from "../Reusables/MBDs/MBDRequests.vue";
export default {
  components: {
    "blood-stocks": bloodstocks,
    "mbd-requests" : mbdRequests
  },

  mounted() {
    console.log("Component mounted.");
    
  }
};
</script>
