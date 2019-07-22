<template>
  <b-modal size="lg" id="manpower-list" hide-footer>
    <template slot="modal-title">Manpower List</template>
    <div class="modal-body">
      <div class="row-title"></div>
      <div class="row">
        <div class="col-md-12">
          <div class="row-sub-category">MBD: {{mbd.name}}</div>
          <div class="row-sub-category">Date: {{selected_mbd_plan_schedule.date}}</div>
          <div class="row-sub-category">Agency: {{mbd.agency.name}}</div>
        </div>
      </div>
      <div class ="row-title mt-3"> Assigned Employees </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Employee</th>
                <th>Date Assigned</th>
              </tr>
            </thead>
            <tbody v-if="assigned_employees.length">
              <tr v-for="(employee, index) in assigned_employees" :key="index">
                <td>{{employee.last_name}}, {{employee.first_name}}</td>
                <td></td>
              </tr>
            </tbody>
          </table>
          <button class="btn btn-dark float-right" @click="addManpower">Add Manpower</button>
        </div>
      </div>
    </div>
    <add-manpower :mbd="mbd" :selected_mbd_plan_schedule="selected_mbd_plan_schedule"></add-manpower>
  </b-modal>
</template>

<script>
import addManpower from "../../Reusables/MBDs/AddManpower.vue";
export default {
  data() {
    return {
      assigned_employees: []
    };
  },
  components:{
      "add-manpower":addManpower
  },
  props: {
    selected_mbd_plan_schedule: Object,
    mbd: Object
  },
  methods: {
    addManpower(){
        this.$bvModal.show('add-manpower');
    },
    loadAssignedEmployees() {
      axios
        .get("/api/manpower_list", {
          params: {
            mbd_schedule_id: this.selected_mbd_plan_schedule.id,
          }
        })
        .then(response => {
          console.log(response.data.data);
          response.data.data.forEach(element => {
            console.log(element.admin);
            if(element.admin.job_title == "BCU")
            this.assigned_employees.push(element.admin);
          });
        });
    }
  },
  created() {
    this.loadAssignedEmployees();
  }
};
</script>