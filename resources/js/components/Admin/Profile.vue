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
                <div class="card-header">My Profile</div>

                <div class="card-body">
                  <ul style="list-style:none;"></ul>
                  <li style="display:inline-block;">
                    <img src="/img/admin.png" style="width: 10%" />
                  </li>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">My Donations</div>

                <div class="card-body">
                  <table class="table table-sm table-striped">
                    <thead>
                      <tr>
                        <th>Blood Bag ID</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>13245678</td>
                        <td>Sent</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">Incentives Progress</div>

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
export default {
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
