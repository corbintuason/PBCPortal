<template>
  <b-modal id="add-manpower" hide-footer>
    <template slot="modal-title">Add Manpower</template>
    <div class="modal-body">
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>Employee</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(available_employee, index) in available_employees" :key="index">
                <td>
                  <a
                    href="#"
                    @click="openAdmin(available_employee)"
                  >{{available_employee.full_name}}</a>
                </td>
                <td>
                <b-form-radio
                  v-model="submit_admin_id"
                  :value="available_employee.id"
                ></b-form-radio>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <span v-if="submit_admin_id!=null">
      {{"hahaha" + submit_admin_id}}

      </span>
      <button class = "btn btn-success float-right" @click="addManpower"> Add Manpower </button>
    </div>
    <admin v-if="selected_admin!=null" :admin="selected_admin"></admin>
  </b-modal>
</template>

<script>
import admin from "../../Reusables/Admin/AdminDetails.vue";
export default {
  data() {
    return {
      available_employees: [],
      selected_admin: null,
      submit_admin_id: null,
    };
  },
  components: {
    admin
  },
  props: {
    selected_mbd_plan_schedule: Object,
    mbd: Object
  },
  methods: {
    addManpower(){
        console.log(this.submit_admin_id + " yeet");
        axios.post("/api/manpower_list", {
            mbd_schedule_id: this.selected_mbd_plan_schedule.id,
            admin_id: this.submit_admin_id
        }).then(() => {
            this.$Progress.start();
          Fire.$emit("RenderMBD");
          toast.fire({
            type: "success",
            title: "Manpower successfully updated"
          });
          this.$Progress.finish();
          this.$bvModal.hide('add-manpower');
          this.$bvModal.hide('manpower-list');
        })
    },
    loadAvailableEmployees() {
      axios.get("/api/admin", {
          params:{
              job_title: "BCU"
          }
      }).then(response => {
        this.available_employees = response.data.data;
      });
    },
    openAdmin(admin) {
      this.selected_admin = admin;
      this.$bvModal.show("admin-modal");
    }
  },
  mounted() {
    this.loadAvailableEmployees();
  }
};
</script>