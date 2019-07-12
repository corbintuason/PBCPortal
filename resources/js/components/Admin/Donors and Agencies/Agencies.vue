<template>
  <div>
    <!-- Dynamic Navbar -->
    <navbar></navbar>
    <!-- Actual Content-->
    <div class="content-wrapper">
      <div class="content">
        <div class="container-fluid">
          <div class="row mt-3 justify-content-center">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">Agencies</div>
                  <div class="card-tools">
                    <button class="btn btn-success" data-toggle ="modal" data-target = "#addAgency">Add Agency</button>
                  </div>
                </div>

                <div class="card-body">
                  <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                      <input
                        class="form-control form-control-navbar"
                        type="search"
                        placeholder="Search"
                        aria-label="Search"
                      >
                      <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                          <i class="fa fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                  <hr>
                  <table class="table table-lg table-striped">
                    <thead>
                      <tr>
                        <th>Agency ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Address</th>
                        <th>Last MBD</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="agency in agencies" :key="agency.id">
                        <td>{{agency.id}}</td>
                        <td>{{agency.name}}</td>
                        <td>Active</td>
                        <td>{{agency.address}}</td>
                        <td>50 days ago</td>
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

    <!-- Modal for Adding Agency -->

    <div class="modal fade" id="addAgency" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add New Agency</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="createAgency">
            <div class="modal-body">
              <!-- Input Name -->
              <div class="form-group">
                <input
                  v-model="agency.name"
                  type="text"
                  name="name"
                  placeholder="Name"
                  class="form-control"
                >
              </div>

              <!-- Input email -->
              <div class="form-group">
                <input
                  v-model="agency.email"
                  type="email"
                  name="email"
                  placeholder="Enter Email Address"
                  class="form-control"
                >
              </div>

              <!-- Add Address -->
              <div class="form-group">
                <input
                  v-model="agency.address"
                  type="text"
                  name="address"
                  placeholder="Address"
                  class="form-control"
                >
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      users:{},
      agencies: {},
      agency:{
        name: "",
        email: "",
        address: "",
      }
    };
  },
  methods:{
    loadAgencies() {
      axios.get("/api/agency").then(({ data }) => (this.agencies = data.data));
    },
    createAgency() {
      this.agency
        .post("/api/agency")
        .then(() => {
          this.$Progress.start();
          console.log("posting");
          Fire.$emit("AfterAgencyCreated");
          console.log("posted");
          $("#addAgency").modal("hide");
          toast.fire({
            type: "success",
            title: "Agency created successfully"
          });
          this.$Progress.finish();
        })
        .catch(() => {
          console.log("naku");
        });
    }
  },
  created() {
    console.log("Component mounted.");
    this.loadAgencies();
   
      Fire.$on("AfterAgencyCreated", () => {
      this.loadAgencies();
    });
  }
};
</script>
