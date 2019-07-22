<template>
  <div>
    <!-- <button type = "button" @click="openAddSchedule" class = "btn btn-success"> Add Schedule </button> -->
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Date</th>
          <th>Venue</th>
          <th>Start Time</th>
          <th>End Time</th>
          <th>Expected # of Donors </th>
          <th> </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(schedule, schedule_index) in mbd.schedules" :key="schedule_index">
          <td>{{schedule.date}}</td>
          <td>{{schedule.venue}}</td>
          <td>{{schedule.start_time}}</td>
          <td>{{schedule.end_time}}</td>
          <td>{{schedule.expectedDonors}}</td>
          <td> </td>
        </tr>
        <tr v-for="(add_schedule, add_schedule_index) in add_schedules" :key="add_schedule_index">
          <td>
            <input type="date" v-model="add_schedule.date" class="form-control" />
          </td>
          <td>
            <input type="text" v-model="add_schedule.venue" class="form-control" />
          </td>
          <td>
            <input type="time" v-model="add_schedule.start_time" class="form-control" />
          </td>
          <td>
            <input type="time" v-model="add_schedule.end_time" class="form-control" />
          </td>
          <td>
            <input type="number" v-model="add_schedule.expectedDonors" class="form-control" />
          </td>
          <td>
            <div class="btn-group">
              <button type="button" class="btn btn-info" @click="addSchedule(add_schedule_index)">
                <i class="fas fa-plus"></i>
              </button>
              <button type="button" class="btn btn-danger" @click="removeSchedule(add_schedule_index)">
                <i class="fas fa-minus-circle"></i>
              </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <button @click="updateSchedules" class="float-right btn btn-success"> Update Schedules </button>
  </div>
</template>

<script>
import addSchedule from "../../../../Reusables/MBDs/ShowMBD.vue";
export default {
  data() {
    return {
      add_schedules:[
        {
          date:'',
          venue: '',
          start_time: '',
          end_time: '',
          expectedDonors: '',
        }
      ]
    };
  },
  props: {
    mbd: Object
  },
  methods:{
    updateSchedules() {
      this.add_schedules.forEach((val, index) => {
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
              title: "Updated schedules for MBD " + this.mbd.name
            });
            this.$Progress.finish();
            Fire.$emit("RenderMBD");
          })
      });
    },
    removeSchedule(rowID) {
      if (!this.blockRemoval) this.add_schedules.splice(rowID, 1);
    },
    addSchedule(index) {
      var date = null;
      var start_time = null;
      var end_time = null;
      var venue = null;
      var expectedDonors = null;
      this.add_schedules.push({
        date: date,
        start_time: start_time,
        end_time: end_time,
        venue: venue,
        expectedDonors: expectedDonors
      });
    },
  },
  created() {
    
  }
};
</script>