<template>
  <div class="row mt-3">
    <div class="col-md-6">
      <div class="row-sub-category">Assigned Doctor</div>
      <div v-if="selected_mbd_plan_schedule_doctors.length > 0">
        <li
          v-for="(doctor, index) in selected_mbd_plan_schedule_doctors"
          :key="index"
          class="list-group-item"
        >{{doctor.full_name}}</li>
      </div>
      <div v-else>
        <div class="alert alert-danger" role="alert">No Doctor has been assigned!</div>
        <button @click="assignDoctor" class="btn btn-dark float-right">Assign Doctor</button>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row-sub-category">Assigned BCU Employees</div>
      <div class="row">
        <div class="col-md-12">
          <div class="info-box bg-info">
            <div class="info-box-content">
              <span class="info-box-text">Number of BCU employees assigned</span>
              <span class="info-box-number">5/{{selected_mbd_plan_schedule.expectedDonors}}</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>
      </div>
      <button @click="openManpowerList" class="float-right btn btn-dark">Update Manpower List</button>
    </div>
    <manpower-list :mbd="mbd" :selected_mbd_plan_schedule="selected_mbd_plan_schedule"></manpower-list>
    <assign-doctor :mbd="mbd" :selected_mbd_plan_schedule="selected_mbd_plan_schedule"></assign-doctor>
  </div>
</template>

<script>
import assignDoctor from "../../../../Reusables/MBDs/AssignDoctor.vue";
import manpowerList from "../../../../Reusables/MBDs/ManpowerList.vue";
export default {
  data() {
    return {
      assigned_doctor: null,
      selected_mbd_plan_schedule_doctors: []
    };
  },
  props: {
    mbd: Object,
    selected_mbd_plan_schedule: Object
  },
  components: {
    "manpower-list": manpowerList,
    "assign-doctor": assignDoctor
  },
  methods: {
    assignDoctor() {
      this.$bvModal.show("assign-doctor");
    },
    loadDoctors() {
      console.log("pasok");
      var schedule = this.mbd.schedules.find(
        schedule => schedule.id == this.selected_mbd_plan_schedule.id
      );
      schedule.manpower_list.forEach(val => {
        if ((val.admin.job_title = "Doctor")) {
          this.selected_mbd_plan_schedule_doctors.push(val.admin);
        }
      });
    },
    openManpowerList() {
      this.$bvModal.show("manpower-list");
    }
  },
  created() {
    this.loadDoctors();
  }
};
</script>