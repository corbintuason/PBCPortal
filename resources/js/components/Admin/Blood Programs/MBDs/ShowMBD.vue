<template>
  <div>
    <!-- Dynamic Navbar -->
    <navbar></navbar>
    <!-- Actual Content-->
    <div class="content-wrapper">
      <div class="content">
        <div class="container-fluid">
          <!-- Basic Details of MBD -->
          <div v-if="show_mbd_fetched" class="row mt-3">
            <div class="col-md-12">
              <div class="card card-dark">
                <div class="card-header">
                  <div class="card-title">{{show_mbd.name}}</div>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <!-- MBD Summary -->
                  <div class="row-title">Basic Details</div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row-sub-category">
                        <a href="#" @click.prevent="openAgency">Agency: {{show_mbd.agency.name}}</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Schedule List of MBD -->
          <div class="row mt-3">
            <div class="col-md-12">
              <div class="card card-dark">
                <div class="card-header">
                  <div class="card-title">Schedule List</div>
                  <div class="card-tools">
                    <button @click="seeSchedules" class="btn btn-light">See Schedules</button>
                    <button type="button" class="btn btn-tool" data-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <schedule :mbd="show_mbd"></schedule>
                    </div>
                  </div>
                  <!-- <table class="table table-sm table-striped">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Venue</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(schedule, index) in show_mbd.schedules" :key="index">
                        <td>{{schedule.date}}</td>
                        <td>{{schedule.venue}}</td>
                        <td>{{schedule.start_time}}</td>
                        <td>{{schedule.end_time}}</td>
                      </tr>
                    </tbody>
                  </table>-->
                </div>
              </div>
            </div>
          </div>
          <!-- MBD Plan Breakdown -->
          <div class="row mt-3">
            <div class="col-md-12">
              <div class="card card-dark">
                <div class="card-header">
                  <div class="card-title">MBD Plan Breakdown</div>
                  <div class="card-tools">
                    <div class="btn-group">
                      <button
                        class="btn btn-light"
                        v-for="(schedule, index) in show_mbd.schedules"
                        :key="index"
                        @click="selected_mbd_plan_schedule = schedule"
                      >{{schedule.date}}</button>
                      <button type="button" class="btn btn-tool" data-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="card-body" v-if="selected_mbd_plan_schedule!=null">
                  <div class="row-title">{{selected_mbd_plan_schedule.date}}</div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="info-box bg-danger">
                        <span class="info-box-icon"></span>
                        <div class="info-box-content">
                          <span class="info-box-text">{{selected_mbd_plan_schedule.category}}</span>
                          <span
                            class="info-box-number"
                          >Expected # of Donors: {{selected_mbd_plan_schedule.expectedDonors}}</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="btn-group">
                        <button
                          href="#"
                          v-for="(mbd_plan_state, index) in mbd_plan_states"
                          :key="index"
                          class="btn btn-dark"
                          @click.prevent="clickRequirement(mbd_plan_state)"
                          :class="{ active: mbd_plan_state.state, disabled: selected_mbd_plan_schedule==null}"
                        >{{mbd_plan_state.title}}</button>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <materials
                        :mbd="show_mbd"
                        :selected_mbd_plan_schedule="selected_mbd_plan_schedule"
                        v-if="mbd_plan_states[0].state"
                      ></materials>
                      <manpower
                        :selected_mbd_plan_schedule="selected_mbd_plan_schedule"
                        :mbd="show_mbd"
                        v-if="mbd_plan_states[1].state"
                      ></manpower>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- MBD Proper -->
          <div class="row mt-3">
            <div class="col-md-12">
              <div class="card card-danger">
                <div class="card-header">
                  <div class="card-title">MBD Proper</div>
                  <div class="card-tools">
                    <div class="btn-group">
                      <button
                        v-for="(schedule, index) in show_mbd.schedules"
                        :key="index"
                        @click="showDonors(schedule)"
                        type="button"
                        class="btn btn-light"
                      >{{schedule.date}}</button>
                      <button type="button" class="btn btn-tool" data-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="btn-group float-right"></div>
                  <div class="row" v-if="donation_list_schedule!=null">
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
    </div>

    <!-- MODAL COMPONENTS -->
    <add-donation :mbd="show_mbd"></add-donation>
    <mbd-schedules></mbd-schedules>
    <agency v-if="show_mbd.agency!=null" :agency="show_mbd.agency"></agency>
    <!-- <schedule :all_dates="all_dates"></schedule>
    <manpower :all_dates="all_dates"></manpower>-->
  </div>
</template>

<script>
import agency from "../../../Reusables/Agencies/Agency.vue";
import mbdSchedules from "../../../Reusables/MBDs/MBDSchedules.vue";
import schedule from "../../../Admin/Blood Programs/MBDs/components/Schedule";
import manpower from "C:/xampp/htdocs/PBCPortal/resources/js/components/Admin/Blood Programs/MBDs/components/Manpower.vue";
import materials from "../../../Admin/Blood Programs/MBDs/components/Materials.vue";
import preRegDonors from "C:/xampp/htdocs/PBCPortal/resources/js/components/Admin/Blood Programs/MBDs/components/PreRegDonors.vue";
import donorsTable from "C:/xampp/htdocs/PBCPortal/resources/js/components/reusables/Donors/DonorsTable.vue";
import addDonation from "C:/xampp/htdocs/PBCPortal/resources/js/components/Reusables/AddDonation.vue";

export default {
  data() {
    return {
      show_mbd: {},
      selected_mbd_plan_schedule: null,
      donation_list_schedule: null,
      donors: [],
      show_mbd_fetched: false,
      seeDonorProgress: true,

      mbd_plan_states: [
        {
          title: "Materials List",
          state: false
        },
        {
          title: "Manpower List",
          state: false
        }
      ],

      difference: 0,

      all_dates: []
    };
  },
  components: {
    materials,
    schedule,
    manpower,
    "donors-table": donorsTable,
    "add-donation": addDonation,
    "pre-reg-donors": preRegDonors,
    "mbd-schedules": mbdSchedules,
    agency
    // donors
  },
  methods: {
    openAgency() {
      this.$bvModal.show("agency");
    },
    seeSchedules() {
      this.$bvModal.show("full-schedule");
    },
    clickRequirement(requirement) {
      this.mbd_plan_states.forEach((val, index) => {
        if (requirement.title == val.title) {
          val.state = true;
        } else {
          val.state = false;
        }
      });
    },
    showDonors(schedule) {
      this.show_mbd.schedules.donation_list.foreach((val, index) => {
        var donation = this.mbd.donation_list.find(
          donation_list =>
            donation_list.donation.donor_id === this.donor_progress.id
        );
      });
    },
    showAddDonation() {
      this.$bvModal.show("add-donation");
    },
    loadDonors() {
      // this.show_mbd.donation_list.forEach((val, index) => {
      //   this.donors.push(val.donation.donor);
      // });
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
    Fire.$on("RenderMBD", () => {
      console.log("MBD Should Render");
      this.selected_mbd_plan_schedule = null;
      this.loadShowMBD();
    });
  }
};
</script>
