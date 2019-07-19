<template>
  <div>
    <b-modal id="mbd-request" size="lg" hide-footer>
      <template slot="modal-title">MBD Request</template>
      <div class="modal-body">
        <div class="row-title">{{mbd.name}}</div>
        <div class="row">
          <div class="col-md-12">
            <div class="container">
              <div v-if="mbd.agency!=null" class="row-sub-category">
                <a href="#" @click.prevent="openAgency">Agency: {{mbd.agency.name}}</a>
              </div>
              <div class="row-sub-category">Date Requested: Now</div>
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="row-title">MBD Details</div>
            <button
              type="button"
              class="btn btn-dark float-right"
              @click="seeSchedules"
            >See Schedules</button>
            <table class="table table-sm table-striped" style="text-align:center;">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Date</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Venue</th>
                  <th>Expected # of Donors</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(schedule, index) in schedules" :key="index">
                  <td>{{index + 1}}</td>
                  <td>
                    <input type="date" v-model="schedule.date" class="form-control" />
                  </td>
                  <td>
                    <input type="time" v-model="schedule.start_time" class="form-control" />
                  </td>
                  <td>
                    <input type="time" v-model="schedule.end_time" class="form-control" />
                  </td>
                  <td>
                    <input type="text" v-model="schedule.venue" class="form-control" />
                  </td>
                  <td>
                    <input type="number" v-model="schedule.expectedDonors" class="form-control" />
                  </td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-info" @click="addSchedule(index)">
                        <i class="fas fa-plus"></i>
                      </button>
                      <button type="button" class="btn btn-warning" @click="removeSchedule(index)">
                        <i class="fas fa-plus"></i>
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <button
          type="button"
          @click="approveRequest"
          class="btn btn-success float-right"
        >Approve Request</button>
      </div>

      <!-- If Donor does not have any donations -->
    </b-modal>
    <agency v-if="mbd.agency!=null" :agency="mbd.agency"></agency>
    <see-schedules></see-schedules>
  </div>
</template>

<script>
import agency from "../../Reusables/Agencies/Agency.vue";
import seeSchedules from "../../Reusables/MBDs/MBDSchedules.vue";
export default {
  data() {
    return {
      blockRemoval: false,
      schedules: [
        {
          date: null,
          start_time: null,
          end_time: null,
          venue: null,
          expectedDonors: null
        }
      ]
    };
  },
  components: {
    agency,
    "see-schedules": seeSchedules
  },
  props: {
    mbd: Object
  },
  watch: {
    schedules() {
      this.blockRemoval = this.schedules.length <= 1;
    }
  },

  methods: {
    openAgency() {
      this.$bvModal.show("agency");
    },
    removeSchedule(rowID) {
      if (!this.blockRemoval) this.schedules.splice(rowID, 1);
    },
    addSchedule(index) {
      var date = null;
      var start_time = null;
      var end_time = null;
      var venue = null;
      var expectedDonors = null;
      // if(this.schedules.length > 0){
      //     console.log("index" + index);
      //     var previous_schedule = this.schedules[index-1];
      //     date = previous_schedule.date,
      //     time = previous_schedule.time,
      //     venue = previous_schedule.venue,
      //     expectedDonors = previous_schedule.expectedDonors
      // }

      this.schedules.push({
        date: date,
        start_time: start_time,
        end_time: end_time,
        venue: venue,
        expectedDonors: expectedDonors
      });
    },

    seeSchedules() {
      this.$bvModal.show("full-schedule");
    },
    approveRequest() {
      this.schedules.forEach((val, index) => {
        axios
          .post("/api/mbd_schedule", {
            mbd_id: this.mbd.id,
            start_time: val.start_time,
            end_time: val.end_time,
            venue: val.venue,
            expectedDonors: val.expectedDonors,
            date: val.date
          })
          .then(() => {
            this.$Progress.start();
            toast.fire({
              type: "success",
              title: "MBD " + this.mbd.name + " approved!"
            });
            this.$Progress.finish();
          })
          .then(() => {
            axios
              .put("/api/mbd/" + this.mbd.id, {
                status: "Approved"
              })
              .then(() => {
                this.$bvModal.hide("mbd-request");
              });
          });
      });
    }
  },

  mounted() {}
};
</script>