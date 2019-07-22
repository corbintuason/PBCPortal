<template>
  <b-modal id="assign-doctor" size="lg" hide-footer>
    <template slot="modal-title">Assign Doctor</template>
    <div class="modal-body">
      <!-- Input Name -->
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> ID </th>
                <th>Last Name</th>
                <th> First Name </th>
                <th> Middle Name </th>
                <th> Email</th>
                <th> </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(doctor, index) in doctors" :key="index">
                <td> <a href = "#" @click.prevent="openAdminDetails(doctor)"> {{doctor.id}}  </a></td>
                <td>{{doctor.last_name}}</td>
                <td>{{doctor.first_name}}</td>
                <td>{{doctor.middle_name}}</td>
                <td>{{doctor.email}}</td>
                <td> <b-form-radio v-model="selected_doctor" :value="doctor"></b-form-radio>

                </td>
              </tr>
            </tbody>
          </table>
          <button class = "btn btn-success float-right" @click="assignDoctor"> Assign Doctor </button>
        </div>
      </div>
    </div>
    <admin v-if="admin_modal!=null" :admin="admin_modal"> </admin>
  </b-modal>
</template>

<script>
import admin from '../../Reusables/Admin/AdminDetails.vue';
export default {
  data() {
    return {
      doctors: [],
      selected_doctor: null,
      admin_modal: null

    };
  },

  components: {
    admin
  },

props:{
    selected_mbd_plan_schedule: Object,
    mbd: Object
},
  methods: {
    openAdminDetails(doctor){
      this.admin_modal = doctor;
      this.$bvModal.show('admin-modal');
    },
      assignDoctor(){
          axios.post("/api/manpower_list", {
              mbd_schedule_id: this.selected_mbd_plan_schedule.id,
              admin_id: this.selected_doctor.id,
          }).then(() => {
            this.$Progress.start();
            toast.fire({
            type: "success",
            title: this.selected_doctor.full_name + " assigned to MBD"
          });
          this.$Progress.finish();
          this.$bvModal.hide('assign-doctor');
          Fire.$emit("RenderMBD");
          })
      },
    loadDoctors() {
        axios.get('/api/admin', {
            params:{
                job_title: "Doctor"
            }
        }).then( response => {
            this.doctors = response.data.data;
        })
    }
  },

  created(){
      this.loadDoctors();
  }
};
</script>