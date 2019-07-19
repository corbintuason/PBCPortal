<template>
  <div>
    <!-- Dynamic Navbar -->
    <navbar></navbar>
    <!-- Actual Content-->
    <div class="content-wrapper">
      <div class="content">
        <div class="container-fluid">
          <div v-if="show_mbd_fetched" class="row mt-3">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">{{show_mbd.name}}</div>
                </div>
                <div class="card-body">
                  <!-- MBD Summary -->
                  <div class="row-title">Basic Details</div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class = "row-sub-category"> Agency: {{show_mbd.agency.name}}</div>
                      <div class = "row-sub-category"> Date Created: </div>
                    </div>
                  </div>
                  <div class="row-title mt-3">MBD Plan</div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="list-group">
                        <a href="#" v-for="(mbd_plan_state, index) in mbd_plan_states" :key="index" class="list-group-item list-group-item-action" @click.prevent="clickRequirement(mbd_plan_state)" :class="{ active: mbd_plan_state.state}">{{mbd_plan_state.title}}</a>
                      </div>
                    </div>
                      <pre-reg-donors v-if="mbd_plan_states[0].state"> </pre-reg-donors>
                      <schedule v-if="mbd_plan_states[1].state" :mbd="show_mbd"> </schedule>
                      <equipment v-if="mbd_plan_states[2].state"> </equipment>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">MBD Proper</div>
                </div>
                <div class="card-body">
                  <div class="btn-group float-right">
                    <button
                      v-for="(schedule, index) in show_mbd.schedules"
                      :key="index"
                      @click="showDonors(schedule)"
                      type="button"
                      class="btn btn-light"
                    >{{schedule.date}}</button>
                  </div>
                  <div class="row-title">Donation List</div>
                  <div class="col-md-12">
                    <!-- <donors v-if="show_mbd!=null" :seeDonorProgress="true" :mbd="show_mbd" :all_dates="all_dates"></donors> -->
                    <donors-table
                      v-if="show_mbd!=null"
                      :seeDonorProgress="seeDonorProgress"
                      :shouldSelect="false"
                      :mbd="show_mbd"
                      :donors="donors"
                    ></donors-table>
                  </div>
                  <button
                    type="button"
                    @click="showAddDonation"
                    class="btn btn-success"
                  >Add Donation</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- MODAL COMPONENTS -->
    <add-donation :mbd="show_mbd"></add-donation>
    <!-- <schedule :all_dates="all_dates"></schedule>
    <manpower :all_dates="all_dates"></manpower> -->
    <equipment ></equipment>
  </div>
</template>

<script>
import schedule from "C:/xampp/htdocs/PBCPortal/resources/js/components/Admin/Blood Programs/MBDs/components/Schedule.vue";
import manpower from "C:/xampp/htdocs/PBCPortal/resources/js/components/Admin/Blood Programs/MBDs/components/Manpower.vue";
import equipment from "C:/xampp/htdocs/PBCPortal/resources/js/components/Admin/Blood Programs/MBDs/components/Equipment.vue";
// import donors from "C:/xampp/htdocs/PBCPortal/resources/js/components/Admin/Blood Programs/MBDs/components/Donors.vue";
import preRegDonors from "C:/xampp/htdocs/PBCPortal/resources/js/components/Admin/Blood Programs/MBDs/components/PreRegDonors.vue";
import donorsTable from "C:/xampp/htdocs/PBCPortal/resources/js/components/reusables/Donors/DonorsTable.vue";
import addDonation from "C:/xampp/htdocs/PBCPortal/resources/js/components/Reusables/AddDonation.vue";

export default {
  data() {
    return {
      show_mbd: {},
      donors: [],
      show_mbd_fetched: false,
      seeDonorProgress: true,

      mbd_plan_states: [
        {
          title: "Pre-Registration of Donors",
          state: false
        },
        {
          title: "Schedules List",
          state: false
        },
        {
          title: "Equipment List",
          state: false,
        },
        {
          title: "Materials List",
          state: false,
        },
        {
          title: "Manpower List",
          state: false,
        }
      ],

      difference: 0,

      all_dates: []
    };
  },
  components: {
    schedule,
    manpower,
    equipment,
    "donors-table": donorsTable,
    "add-donation": addDonation,
    "pre-reg-donors": preRegDonors
    // donors
  },
  methods: {
    clickRequirement(requirement){
      this.mbd_plan_states.forEach((val, index) => {
        if(requirement.title == val.title){
          val.state = true;
        } else {
          val.state = false;
        }
      })
    },
    showDonors(schedule) {
      this.show_mbd.donation_list.foreach((val, index) => {});
    },
    showAddDonation() {
      this.$bvModal.show("add-donation");
    },
    loadDonors() {
      this.show_mbd.donation_list.forEach((val, index) => {
        this.donors.push(val.donation.donor);
      });
    },
    loadShowMBD() {
      var mbd_id = this.$route.params.mbd_id;
      axios
        .get("/api/mbd", {
          params: {
            id: mbd_id
          }
        })
        .then(response => (this.show_mbd = response.data.data[0]))
        .then(() => {
          this.show_mbd_fetched = true;
        })
        .then(() => {
          this.loadDonors();
        });
    }
  },

  created() {
    this.loadShowMBD();
    Fire.$on("AfterDonationAdded", () => {});
  }
};
</script>
