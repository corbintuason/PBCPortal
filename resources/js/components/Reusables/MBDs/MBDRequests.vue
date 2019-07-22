<template>
  <div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>MBD ID</th>
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
    <mbd :mbd="mbd_request"></mbd>
  </div>
</template>

<script>
import mbd from "./ShowMBD.vue";

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
    mbd
  },
  methods: {
    openMBDRequest(mbd) {
        this.mbd_request = mbd;
      this.$bvModal.show("show-mbd");
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