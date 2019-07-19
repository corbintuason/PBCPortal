<template>
  <div>
    <!-- Dynamic Navbar -->
    <donor-navbar></donor-navbar>
    <!-- Actual Content-->

    <div class="content-wrapper">
      <div class="content">
        <div class="container-fluid">
          <div class="row mt-3">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">Managing Agencies</div>
                  <div class="card-tools">
                    <button class="btn btn-success">Add Agency</button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">My Agencies</div>
                  <div class ="card-tools"> 
                    <button class="btn btn-success">Join New Agency</button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                        <agencies-table> </agencies-table>
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
      my_donations: []
    };
  },
  components: {
  },
  methods: {

  },

  mounted() {
      this.$http.get('api/user').then(response => {
        console.log(response.body);
})
  }
};
</script>
