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
                  
                  <div class="card-tools"></div>
                </div>
                <div class="card-body">
                  <!-- MBD Summary -->
                  <div class="row-title">Summary</div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row-sub-category">Category Level: {{show_mbd.category}}</div>
                      <div class="row-sub-category">Agency: {{show_mbd.agency.name}}</div>
                    </div>
                  </div>
                  <hr/>

                  <!-- MBD Plan Divider -->
                  <div class="row-title">MBD Plan</div>
                  <div class="row">
                    <!-- If MBD has an MBD Plan -->
                    <div class="col-md-6">
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-light" @click="showDonors">Donors</button>
                        <button type="button" class="btn btn-dark" @click="showManpower">Manpower</button>
                        <button type="button" class="btn btn-light" @click="showEquipment">Equipment</button>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <donors :seeDonorProgress="true" :mbd="show_mbd" :all_dates="all_dates"></donors>
                    <!-- <schedule v-if="show_schedule" :all_dates="all_dates"></schedule> -->
                    <manpower v-if="show_manpower" :all_dates="all_dates"></manpower>
                    <equipment v-if="show_equipment"></equipment>
                  </div>

                  <!-- If MBD des not have an MBD Plan -->
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
import schedule from "C:/xampp/htdocs/PBCPortal/resources/js/components/Admin/Blood Programs/MBDs/components/Schedule.vue";
import manpower from "C:/xampp/htdocs/PBCPortal/resources/js/components/Admin/Blood Programs/MBDs/components/Manpower.vue";
import equipment from "C:/xampp/htdocs/PBCPortal/resources/js/components/Admin/Blood Programs/MBDs/components/Equipment.vue";
import donors from "C:/xampp/htdocs/PBCPortal/resources/js/components/Admin/Blood Programs/MBDs/components/Donors.vue";

export default {
  data() {
    return {
      show_mbd: {},
      show_mbd_fetched: false,
      

      show_manpower: false,
      show_equipment: false,
      show_schedule: false,
      show_donors: true,

      difference: 0,

      all_dates: [],

    };
  },
  components: {
    schedule,
    manpower,
    equipment,
    donors
  },
  methods: {
    differenceInDates() {
      var start_date = this.$moment(this.show_mbd.start_date);
      var end_date = this.$moment(this.show_mbd.end_date);
      var now = start_date.clone();

      while (now.isSameOrBefore(end_date)) {
        this.all_dates.push(now.format("YYYY/M/D"));
        now.add(1, "days");
      }
      console.log(now);
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
          this.differenceInDates();
        });
    },
    showDonors() {
      (this.show_manpower = false),
        (this.show_equipment = false),
        (this.show_schedule = false),
        (this.show_donors = true);
    },
    showSchedule() {
      (this.show_manpower = false),
        (this.show_equipment = false),
        (this.show_schedule = true),
        (this.show_donors = false);
    },
    showManpower() {
      (this.show_manpower = true),
        (this.show_equipment = false),
        (this.show_schedule = false),
        (this.show_donors = false);
    },
    showEquipment() {
      (this.show_manpower = false),
        (this.show_equipment = true),
        (this.show_schedule = false),
        (this.show_donors = false);
    },
  },

  created() {
    this.loadShowMBD();
    Fire.$on("AfterDonationAdded", () => {
     
    });
  }
};
</script>
