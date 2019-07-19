<template>
  <div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>MBD Name</th>
          <th>Organization</th>
          <th>Category</th>
          <th>Start Date</th>
          <th>End Date</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="mbd in mbds" :key="mbd.id">
          <td>
            <router-link :to="`/bloodPrograms/MBDs/${mbd.id}`">{{mbd.name}}</router-link>
          </td>
          <td>{{mbd.agency.name}}</td>
          <td>{{mbd.category}}</td>
          <td>{{mbd.start_date}}</td>
          <td>{{mbd.end_date}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      mbds: []
    };
  },
  components: {},
  methods: {
    openMBDRequest(mbd) {
      this.mbd_modal = mbd;
      this.$bvModal.show("mbd-show");
    },
    loadMBDApproved() {
      axios
        .get("/api/mbd", {
          params: {
            status: "Approved"
          }
        })
        .then(response => (this.mbds = response.data.data));
        console.log(this.mbds);
    }
  },
  mounted() {
    this.loadMBDApproved();
  }
};
</script>