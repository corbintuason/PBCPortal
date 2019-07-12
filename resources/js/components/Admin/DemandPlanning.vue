<template>
  <div>
    <!-- Dynamic Navbar -->
    <navbar></navbar>
    <!-- Actual Content-->
    <div class="content-wrapper">
      <div class="content">
        <div class="container-fluid">
          <div class="row mt-3">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">Demand Planning</div>
                  <div class="card-tools">
                    <!-- Blood Type Button Navigation Bar -->
                    <div class="btn-group btn-group-lg" role="group">
                      <button type="button" class="btn btn-light">Summary</button>
                      <button type="button" class="btn btn-danger">A+</button>
                      <button type="button" class="btn btn-danger">A-</button>
                      <button type="button" class="btn btn-danger">B+</button>
                      <button type="button" class="btn btn-danger">B-</button>
                      <button type="button" class="btn btn-danger">AB+</button>
                      <button type="button" class="btn btn-danger">AB-</button>
                      <button type="button" class="btn btn-danger">O+</button>
                      <button type="button" class="btn btn-danger">O-</button>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <!-- Body will differ depending on the active button-->
                  <div class="row">
                    <div class="col-2">
                      <p class="red" style="font-size:100px;">A+</p>
                    </div>
                    <div class="col-10">
                      <!-- <i class="blue fas fa-arrow-up"></i>
                <p>Increasing in Demand</p>
                <i class="red fas fa-arrow-down"></i>
                <p>Decreasing in Supply</p>
                      <h5>Total Deficiency: 1.2%</h5>-->
                      <table class="table table-sm table-striped text-center">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Supply Trend</th>
                            <th>Demand Trend</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th>WB</th>
                          </tr>
                          <tr>
                            <th>PR</th>
                          </tr>
                          <tr>
                            <th>PC</th>
                          </tr>
                          <tr>
                            <th>FFP</th>
                          </tr>
                          <tr>
                            <th>CRYOP</th>
                          </tr>
                          <tr>
                            <th>CRYOS</th>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <!-- Section for Curve Chart of specified Blood Type -->
                  <div class="row">
                    <div class="col-12">
                      <!-- <div id="curve_chart"></div> -->
                    </div>
                  </div>

                  <!-- Contacting Donors Section -->

                  <!-- Organization Filtering -->
                  <div class="row-title">Donors and Organization Contacts</div>
                  <div class="row"></div>
                  <div class="row">
                    <div class="col-6">
                      <h1 class="row-sub-category">Top Organizations Rich in A+</h1>
                      <table class="table table-sm table-striped">
                        <thead>
                          <tr>
                            <th>Organization</th>
                            <th>Last Donation</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>De La Salle University</td>
                            <td>Yesterday</td>
                            <td>
                              <button class="btn btn-info">Send Emergency Notification</button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <!-- Donor Filtering -->
                    <div class="col-6">
                      <h1 class="row-sub-category">Top Donors Rich in A+</h1>
                      <table class="table table-sm table-striped">
                        <thead>
                          <tr>
                            <th>Donor</th>
                            <th>Last Donation</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Juan Tamad</td>
                            <td>Yesterday</td>
                            <td>
                              <button class="btn btn-info">Send Emergency Notification</button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
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

    };
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
