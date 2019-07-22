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
                  <div class="card-title">Requested MBDs</div>
                </div>
                <div class="card-body">
                  <mbd-requests> </mbd-requests>
                </div>
              </div>
            </div>
          </div>              

          <div class="row mt-3">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title"> Approved MBDs</div>
                  <div class="card-tools">
                    <div class="btn-group" role="group">
                      <button
                        type="button"
                        class="btn btn-dark"
                        data-toggle="modal"
                        @click="openAddMBD"
                      >Add MBD</button>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <mbd-approved> </mbd-approved>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <add-mbd :agencies="agencies"> </add-mbd>
  </div>
</template>

<script>
import mbdRequests from "../../Reusables/MBDs/MBDRequests";
import mbdApproved from "../../Reusables/MBDs/MBDApproved";
import addMBD from "../../Reusables/MBDs/AddMBD";

export default {
  data() {
    return {
      data_fetched: false,
      agencies: [],
      mbd_dates:[],
      mbds: [],
      mbd: {}
    };
  },
  components:{
    "mbd-requests": mbdRequests,
    "mbd-approved": mbdApproved,
    "add-mbd": addMBD,
  },
  methods: {
    openAddMBD(){
      this.$bvModal.show('add-mbd');
    },
    /** LOAD METHODS */
    loadAgencies() {
      axios
        .get("/api/agency")
        .then(response => (this.agencies = response.data.data))
        .then(() => {
          this.data_fetched = true;
        });
    },
    loadMBDs() {
      axios
        .get("/api/mbd")
        .then(response => (this.mbds = response.data.data))
        .then(() => {
          console.log(this.data_fetched);
          this.loadAgencies();
          this.loadMBDDates();
        });
    },

    /** POST METHODS */

    addProgram() {
      axios
        .post("/api/mbd", {
          name: this.mbd.name,
          start_date: this.mbd.start_date,
          end_date: this.mbd.end_date,
          category: this.mbd.category,
          agency_id: this.mbd.agency_id
        })
        .then(() => {
          this.$Progress.start();
          $("#addProgram").modal("hide");
          toast.fire({
            type: "success",
            title: "MBD created successfully"
          });
          this.$Progress.finish();
        }).then(()=>{
          this.loadMBDs();
        })
        .catch(() => {
          console.log("naku");
        });
    },
      loadMBDDates(){
    this.mbds.forEach((val, index)=> {
      this.mbd_dates.push({
        title: val.name,
        date: val.start_date
      });
    });
  },
  },
  created() {
    this.loadMBDs();
    Fire.$on("AfterMBDCreated", () => {
      this.loadMBDs();
    });
    
  }
};
</script>
