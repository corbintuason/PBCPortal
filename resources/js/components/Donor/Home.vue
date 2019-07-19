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
                      You have donated a total of {{my_donations.length}} times!
                    </div>
                    <div class = "col-md-4">
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <div class = "card">
                <div class = "card-header">
                  <div class = "card-title">
                    My Donations
                  </div>
                </div>
                <div class = "card-body">
                  <table class = "table">
                    <thead>
                      <tr> 
                        <th> Donation ID </th>
                        <th> Status </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(donation, index) in my_donations" :key="index">
                        <td> {{donation.id}} </td>
                        <td> {{donation.status}}</td>
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
</template>

<script>

export default {
  data(){
    return{
      my_donations: []
    };
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
      
    }
  },

  mounted() {
    this.loadMyDonations();
    this.loadCurrentDonor();
    console.log("Component mounted.");
  }
};
</script>
