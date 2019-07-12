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
                  <h3 class="card-title">Blood Discard</h3>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <p>MBD / Walk-in</p>
                    </div>
                    <div class="col-md-4">
                      <p>Donation ID</p>
                    </div>
                    <div class="col-md-4">
                      <p>Component</p>
                    </div>
                  </div>
                  <div class="row">
                    <table class="table table-condensed table-hover table-bordered">
                      <thead>
                        <tr>
                          <th colspan="2" class="text-center">Donation Schedule</th>
                          <th colspan="4"></th>
                          <th colspan="6" class="text-center">Blood Components</th>
                        </tr>
                        <tr>
                          <th class="text-center">AGENCY</th>
                          <th class="text-center">DATE</th>
                          <th class="text-center">DONATION ID</th>
                          <th class="text-center">BLOOD TYPE</th>
                          <th class="text-center">BLOOD TEST</th>
                          <th>BLOOD LABELING</th>
                          <th class="text-center" style="font-size: 10px;">WHOLE BLOOD</th>
                          <th class="text-center">PACKED RBC</th>
                          <th class="text-center" style="font-size: 10px;">PLATELET CONCENTRATE</th>
                          <th class="text-center" style="font-size: 10px;">FRESH FROZEN PLASMA</th>
                          <th class="text-center" style="font-size: 10px;">CRYOPRECIPITATE</th>
                          <th class="text-center" style="font-size: 10px;">CRYOSUPERNATE</th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                    </table>
                  </div>
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
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
