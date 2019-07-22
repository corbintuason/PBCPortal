<template>
  <div>
    <b-modal id="add-mbd" hide-footer>
      <template slot="modal-title">Add MBD</template>
      <div class="modal-body">
        <!-- Input Name -->
        <div class="form-group">
          <label for="mbd_name">Enter MBD Name</label>
          <input
            v-model="mbd.name"
            id="mbd_name"
            type="text"
            name="name"
            placeholder="Enter MBD Name"
            class="form-control"
          />
        </div>

        <div class="form-group">
          <label for="mbd_agency">Agency</label>

          <select v-model="mbd.agency_id" name="agency_id" class="form-control">
            <option value selected disabled>Please Select an Agency</option>
            <option v-for="agency in agencies" :key="agency.id" :value="agency.id">{{agency.name}}</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" @click="addMBD" class="btn btn-primary">Schedule MBD</button>
      </div>
    </b-modal>
  </div>
</template>

<script>
export default {
  data() {
    return {
      mbd:{
        name: '',
        agency_id: '',
      },
      agencies:[],
    };
  },
  props: {},
  components: {
  },

  methods: {
    addMBD(){
      axios.post("/api/mbd",{
        name: this.mbd.name,
        agency_id: this.mbd.agency_id,
        status: "Approved"
      }).then(response => {
        this.$Progress.start();
          toast.fire({
            type: "success",
            title: "MBD " + this.mbd.name + " created!"
          });
          this.$Progress.finish();
          this.$bvModal.hide('add-mbd');
          this.$router.push("/bloodPrograms/MBDs/" + response.data.id);
      })
    },
    loadAgencies(){
      axios.get('/api/agency').then(response => {this.agencies = response.data.data})
    },
 
  },
  mounted() {
    this.loadAgencies();
  }
};
</script>