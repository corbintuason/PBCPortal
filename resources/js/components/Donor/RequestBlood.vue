<template>
  <div>
    <!-- Dynamic Navbar -->
    <donor-navbar> </donor-navbar>
    <!-- Actual Content-->

    <div class="content-wrapper">
      <div class="content">
        <div class="container-fluid">
          <div class = "row mt-3">
            <div class = "col-md-12">
              <div class = "card">
                <div class = "card-header">
                  <div class = "card-title">
                    Summary
                  </div>
                </div>
                <div class = "card-body">
                  <div class = "row">
                    <div class = "col-md-8">
                      You have requested a total number of {{}} times!
                    </div>
                    <div class = "col-md-4">
                      Your priority status for blood requests is HIGH!
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class = "row mt-3">
            <div class = "col-md-12">
              <div class = "card">
                <div class = "card-header">
                  <div class = "card-title">
                    Blood Request History
                  </div>
                  <div class = "card-tools">
                      <button type = "button" @click="requestBlood" class = "btn btn-warning"> Request Blood </button>
                  </div>
                </div>
                <div class = "card-body">
                  <div class = "row">
                    <div class = "col-md-12">
                        <table class = "table table-striped">
                            <thead>
                                <tr>
                                    <th> Blood Request ID </th>
                                    <th> Patient Name </th>
                                    <th> Hospital Location </th>
                                    <th> Status </th>
                                    <th> Date Requested </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> 123 </td>
                                    <td> Ling Xiaoyu </td>
                                    <td> The Medical City </td>
                                    <td> Success </td>
                                    <td> 07/11/2019</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          

        </div>
      </div>
    </div>
    <request-blood> </request-blood>
  </div>
</template>

<script>
import requestBlood from "C:/xampp/htdocs/PBCPortal/resources/js/components/Donor/Reusables/RequestBloodForm.vue";
import { request } from 'http';

export default {
  data(){
    return{
      my_donations: []
    };
  },
  components:{
      "request-blood": requestBlood
  },
  methods:{
    loadMyDonations(){
      axios.get("/api/donation",{
        params:{
          donor_id: 1
        }
      }).then(response => {
        this.my_donations = response.data.data;
      })
    },
    loadCurrentDonor(){
      
    },

    requestBlood(){
        this.$bvModal.show('request-blood-form');
    }
  },

  mounted() {
    this.loadMyDonations();
    this.loadCurrentDonor();
    console.log("Component mounted.");
  }
};
</script>
