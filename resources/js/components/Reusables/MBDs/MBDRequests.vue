<template>
  <div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Request ID</th>
          <th>Agency</th>
          <th>MBD Name</th>
          <th>Status</th>
          <th>Date Requested</th>
         
        </tr>
      </thead>
      <tbody>
        <tr v-for ="(mbd, index) in mbds" :key="index">
          <td>
            <a href="#" @click.prevent="openMBDRequest(mbd)">{{mbd.id}}</a>
          </td>
          <td>{{mbd.agency.name}}</td>
          <td>{{mbd.name}}</td>
          <td>{{mbd.status}}</td>
          <td>{{mbd.date_requested}}</td>
        </tr>
      </tbody>
    </table>
    <mbd-request :mbd="mbd_request"></mbd-request>
  </div>
</template>

<script>
import mbdRequest from "./MBDRequest.vue";

export default {
  data() {
    return {
        mbds:[
        ],
        mbd_request:{

        }
    };
  },
  components: {
    "mbd-request": mbdRequest
  },
  methods: {
    openMBDRequest(mbd) {
        this.mbd_request = mbd;
      this.$bvModal.show("mbd-request");
    },
    loadMBDRequests(){
        axios.get("/api/mbd", {
            params:{
                status: "Requested"
            }
        }).then(response => (this.mbds = response.data.data))

    }
  },
  mounted(){
      this.loadMBDRequests();
  }
};
</script>