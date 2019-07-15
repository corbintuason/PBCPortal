<template>
  <b-modal id="add-donation" size="lg" hide-footer>
    <template slot="modal-title">Add Donation</template>
    <div class="modal-body">
      <div class="row-title">Register Donor</div>
      <div class="row-sub-category">Blood Program: {{mbd.name}}</div>
      <div class="row-sub-category">Date: Now</div>
      <hr />
      <div class="row"></div>

      <!-- STEP 1: PERSONAL DETAILS -->
      <div v-show="step === 1" class="personalDetails">
        <div class="row">
          <div class="col-md-12">
            <!-- Input Name -->
            <div class="container">
              {{donor}}
              <b-form-group>
                <b-form-radio
                  style="display:inline"
                  v-model="selected"
                  value="existing"
                >Existing Donor</b-form-radio>
                <b-form-radio style="display:inline" v-model="selected" value="new">New Donor</b-form-radio>
              </b-form-group>

              <div v-show="this.selected == 'existing'">
                <existing-donor @donor_change="onDonorChange"></existing-donor>
              </div>

              <div v-show="this.selected == 'new'"></div>
            </div>
          </div>
        </div>
      </div>
      
    
        <button class="btn btn-success float-right" @click="registerDonor" :disabled="donor == null">Register</button>

      <!-- If Donor does not have any donations -->
    </div>
  </b-modal>
</template>

<script>
import existingDonor from "C:/xampp/htdocs/PBCPortal/resources/js/components/reusables/Donors/ExistingDonor.vue";
export default {
  data() {
    return {
      name: "modal",
      selected: "",
      step: 1,
      isNextDisabled: false,
      donor: null,
      
    };
  },
  props: {
    mbd: Object,
    Agency: Object,
    Date: Date
  },
  components: {
    "existing-donor": existingDonor
  },
  watch: {
    step: function(val) {
      if (val < 3) this.isNextDisabled = true;
    }
  },

  methods: {
    registerDonor(){
      axios.post("/api/donation", {
        donor_id: this.donor.id,
        status: "Registered",
      }).then((response) => {
       axios.post("/api/donation_list", {
        donation_id: response.data.id,
        mbd_id: this.mbd.id
      }) 
      })
      .then(()=>{
        this.$Progress.start();
        this.$bvModal.hide('add-donation');
          toast.fire({
            type: "success",
            title: "Added Donation for MBD " + this.mbd.name
          });
          this.$Progress.finish();
      })
    },
    onDonorChange(val) {
      this.donor = val;
    },
    close() {
      this.$emit("close");
    }
  },

  mounted() {}
};
</script>

