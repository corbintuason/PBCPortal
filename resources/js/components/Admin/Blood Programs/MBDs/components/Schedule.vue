<template>
  <div class = "col-md-8">
    <button type = "button" @click="openAddSchedule" class = "btn btn-success"> Add Schedule </button>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Date</th>
            <th>Venue</th>
            <th>Start Time</th>
            <th>End Time</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(schedule, index) in mbd.schedules" :key="index">
            <td>{{schedule.date}}</td>
            <td>{{schedule.venue}}</td>
            <td>{{schedule.start_time}}</td>
            <td>{{schedule.end_time}}</td>
          </tr>
        </tbody>
      </table>
  </div>
</template>

<script>
import addSchedule from '../../../../Reusables/MBDs/MBDRequest.vue';
export default {
  data() {
    return {};
  },
  props: {
    mbd: Object
  },
  created() {}
};
</script>