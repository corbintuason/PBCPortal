<template>
  <div>
    <!-- Dynamic Navbar -->
    <navbar></navbar>
    <!-- Actual Content-->
    <div class="content-wrapper">
      <div class="content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">Donors</div>
                  <div class="card-tools"></div>
                </div>

                <div class="card-body">
                  <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                      <input
                        class="form-control form-control-navbar"
                        type="search"
                        placeholder="Search"
                        aria-label="Search"
                      />
                      <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                          <i class="fa fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                  <hr />
                  <div v-if="donors_fetched">
                    <donors-table :shouldSelect='false' :donors="donors"></donors-table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <donor-modal :donor="modal_donor" :donations="modal_donations"></donor-modal>
  </div>
</template>

<script>
import donorModal from "C:/xampp/htdocs/PBCPortal/resources/js/components/reusables/DonorModal.vue";
export default {
  data() {
    return {
      donors: [],
      donors_fetched: false,
      modal_donor: {},
      modal_donations: []
    };
  },

  components: {
    "donor-modal": donorModal
  },
  methods: {
    loadAllDonors() {
      axios
        .get("/api/donor")
        .then(response => (this.donors = response.data.data))
        .then(() => {
          this.donors_fetched = true;
        });
    },
    showDonorModal(donor) {
      this.modal_donor = donor;
      axios
        .get("/api/blood_unit", {
          params: {
            donor_id: this.modal_donor.donor_id
          }
        })
        .then(response => (this.modal_donations = response.data.data));
      this.$bvModal.show("donor-modal");
    }
  },
  mounted() {
    this.loadAllDonors();
    console.log("Component mounted.");
  }
};
</script>
