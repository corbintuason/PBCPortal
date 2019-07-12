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
                  <div class="card-title">Upcoming MBDs</div>
                  <div class="card-tools">
                    <div class="btn-group" role="group">
                      <button
                        type="button"
                        class="btn btn-light"
                        data-toggle="modal"
                        data-target="#fullSchedule"
                      >See Schedules</button>
                      <button
                        type="button"
                        class="btn btn-dark"
                        data-toggle="modal"
                        data-target="#addProgram"
                      >Add Program</button>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>MBD Name</th>
                        <th>Organization</th>
                        <th>Category</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="mbd in mbds" :key="mbd.id">
                        <td>
                          <router-link to = "#">{{mbd.name}}</router-link>
                        </td>
                        <td>{{mbd.agency_id}}</td>
                        <td>{{mbd.category}}</td>
                        <td>{{mbd.start_date}}</td>
                        <td>{{mbd.end_date}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <!-- Modal for Adding Programs -->
          <div
            class="modal fade"
            id="addProgram"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
          >
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add MBD</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form @submit.prevent="addProgram">
                  <div class="modal-body">
                    <!-- Input Name -->
                    <div class="form-group">
                      <label for="mbd_name"> Enter MBD Name </label>
                      <input
                        v-model="mbd.name"
                        id="mbd_name"
                        type="text"
                        name="name"
                        placeholder="Enter MBD Name"
                        class="form-control"
                      >
                    </div>

                    <div class="form-group">
                      <label for="mbd_agency"> Agency </label>

                      <select
                        v-model="mbd.agency_id"
                        name="agency_id"
                        class="form-control"
                      >
                        <option value ="" selected disabled>Please Select an Agency</option>
                        <option
                          v-for="agency in agencies"
                          :key="agency.id"
                          :value="agency.id"
                        >{{agency.name}}</option>
                      </select>
                    </div>

                    <!-- Input email -->
                    <div class="form-group">
                      <label for="mbd_start_date"> MBD Start Date </label>

                      <input
                        v-model="mbd.start_date"
                        id="mbd_start_date"
                        type="date"
                        name="start_date"
                        placeholder="Enter Start Date"
                        class="form-control"
                      >
                    </div>

                    <!-- Input password -->
                    <div class="form-group">
                      <label for="mbd_end_date"> Enter MBD Name </label>

                      <input
                        v-model="mbd.end_date"
                        id="mbd_end_date"
                        type="date"
                        name="end_date"
                        placeholder="Enter End Date"
                        class="form-control"
                      >
                    </div>

                    <!-- Select Role -->
                    <div class="form-group">
                      <label for="mbd_category"> Category </label>
                      <select
                        v-model="mbd.category"
                        id="mbd_category"
                        name="category"
                        class="form-control"
                      >
                        <option value selected disabled>Select a Category</option>
                        <option value="I">Category I</option>
                        <option value="II">Category II</option>
                        <option value="III">Category III</option>
                      </select>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Schedule MBD</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Modal for seeing Full Schedule -->
          <div class="modal fade" id="fullSchedule" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <div class="modal-title">Full Schedule</div>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <FullCalendar defaultView="dayGridMonth" :plugins="calendarPlugins" :width="1000"></FullCalendar>
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
import FullCalendar from "@fullcalendar/vue";
import dayGridPlugin from "@fullcalendar/daygrid";

export default {
  data() {
    return {
      agencies: {},
      components: {
        FullCalendar
      },
      calendarPlugins: [dayGridPlugin],

      mbds: {},
      mbd:{
       
      }
    };
  },
  methods: {
    /** LOAD METHODS */
    loadAgencies() {
      axios.get("/api/agency").then(({ data }) => (this.agencies = data.data));
    },
    loadMBDs() {
      axios.get("/api/mbd").then(({ data }) => (this.mbds = data.data));
    },

    /** POST METHODS */

    addProgram() {
      this.mbd
        .post("/api/mbd")
        .then(() => {
          this.$Progress.start();
          console.log("posting");
          Fire.$emit("AfterMBDCreated");
          console.log("posted");
          $("#addProgram").modal("hide");
          toast.fire({
            type: "success",
            title: "MBD created successfully"
          });
          this.$Progress.finish();
        })
        .catch(() => {
          console.log("naku");
        });
    }
  },
  created() {
    this.loadAgencies();
    this.loadMBDs();
    Fire.$on("AfterMBDCreated", () => {
      this.loadMBDs();
    });
  }
};
</script>
