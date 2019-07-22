<template>
  <div>
    <b-modal id="show-mbd" size="lg" hide-footer>
      <template slot="modal-title">{{mbd.name}}</template>
      <div class="modal-body">
        <div class="row-title">Basic Details </div>
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

        <div class = "btn-group float-right">
          <button
          type="button"
          @click="rejectMBD"
          class="btn btn-danger"
        >Reject MBD</button>
        <button
          type="button"
          @click="approveMBD"
          class="btn btn-success"
        >Approve MBD</button>
        </div>
        
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
    
    approveMBD(){
      axios.put("/api/mbd/" + this.mbd.id, {
        status: "Approved"
      }).then(() => {
        this.$Progress.start();
          toast.fire({
            type: "success",
            title: "MBD " + this.mbd.name + "updated to Approved"
          });
          this.$Progress.finish();
      }).then(() => {
        this.$bvModal.hide('show-mbd');
        this.$router.push("/bloodPrograms/MBDs/" + this.mbd.id);
      })
    },

    rejectMBD(){

    }
  },

  mounted() {}
};
</script>