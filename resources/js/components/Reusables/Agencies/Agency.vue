<template>
  <div>
    <b-modal id="agency" size="xl" hide-footer>
      <template slot="modal-title">{{agency.name}}</template>
      <div class="modal-body">
        <div class="row-title mt-3">Basic Details</div>
        <div class="row">
          <div class="col-md-9">
            <table class="table table-sm table-striped">
              <thead></thead>
              <tbody>
                <tr>
                  <th>Address</th>
                  <td>{{agency.address}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row mt-2">
          <div class = "col-md-12">
          <div class="info-box bg-danger">
            <span class="info-box-icon">
              <i class="fas fa-comments"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text"></span>
              <span class="info-box-number">70%</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
              <span class="progress-description">A+</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </div>
          
        </div>

        <div class="row-title mt-3">MBD History</div>
        <div class="row">
          <div class="col-md-4">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>0%</h3>
                <p>Donor Retention Rate</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>0%</h3>
                <p>MBD Cancellation Rate</p>
              </div>
            </div>
          </div>
          <!-- <div class = "col-md-4">
            <div class = "row-sub-category"> Donor Retention Rate: </div>
          </div>-->
        </div>

        <div class="row-title mt-3">Overall Donor Performance Summary</div>
        <div class="row">
          <div class="col-md-4">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>0%</h3>
                <p>Donor Retention Rate</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>0%</h3>
                <p>Average Number of Donors Per Day</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>0%</h3>
                <p>Overall Blood Unit Passing Rate</p>
              </div>
            </div>
          </div>
        </div>

          <div class="row-title mt-3">All MBDs</div>
        <div class="row">
          <div class="col-md-12">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>MBD Name</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(mbd, index) in agency.mbds" :key="index">
                  <td>{{mbd.name}}</td>
                  <td>{{mbd.status}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </b-modal>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  props: {
    agency: Object
  }
};
</script>