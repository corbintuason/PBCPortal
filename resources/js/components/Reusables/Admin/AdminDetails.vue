<template>
  <b-modal id="admin-modal">
    <template slot="modal-title">{{admin.full_name}}</template>
    <div class="modal-body">
      <div class="row-title">Basic Information</div>
      <div class="row">
        <div class="col-md-3">
          <!-- Insert Picture -->
        </div>
        <div class="col-md-9">
          <table class="table table-sm">
            <thead></thead>
            <tbody>
              <tr>
                <th>Full Name:</th>
                <td>{{admin.full_name}}</td>
              </tr>
              <tr>
                <th>Email:</th>
                <td>{{admin.email}}</td>
              </tr>
              <tr>
                <th>Account Created:</th>
                <td>{{admin.created_at}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class = "row-title mt-3"> Assigned MBD Activities </div>
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>Date Assigned</th>
            <th>Start Time</th>
            <th>End Time</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(schedule, index) in admin.schedules" :key="index">
            <td>{{schedule.date}}</td>
            <td>{{schedule.start_time}}</td>
            <td>{{schedule.end_time}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </b-modal>
</template>

<script>
export default {
  data() {
    return {};
  },
  props: {
    admin: Object
  },
  methods: {}
};
</script>