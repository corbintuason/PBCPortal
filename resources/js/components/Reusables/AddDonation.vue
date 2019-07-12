<template>
  <b-modal id="add-donation" size="lg">
    <template slot="modal-title">Add Donation</template>
    <div class="modal-body">
      <div class="row-title">Blood Donor History Questionnaire</div>
      <div class="row-sub-category">Blood Program: {{MBDName}} </div>
      <div class="row-sub-category">Date: Now</div>
      <hr />
      <div class="row"></div>

      <!-- STEP 1: PERSONAL DETAILS -->
      <div v-if ="step === 1" class="personalDetails">
        <div class="row">
          <div class="col-md-12">
            <div class="row-sub-category">I. Personal Details</div>
            <!-- Input Name -->
            <div class="container">
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
                <!-- <div v-if="donation.donor != null">
                  <div class="row-title">{{donation.donor.full_name}}</div>
                  <div class="row">
                    <div class="col">
                      <label for="sex">Sex</label>
                      <input class="form-control" :placeholder="donation.donor.personal_details.sex" disabled />
                    </div>
                    <div class="col">
                      <label for="sex">Date of Birth</label>
                      <input class="form-control" :placeholder="donation.donor.personal_details.birthdate" disabled />
                    </div>
                    <div class="col">
                      <label for="sex">Age</label>
                      <input class="form-control" placeholder="22" disabled />
                    </div>
                    <div class="col">
                      <label for="sex">Civil Status</label>
                      <input class="form-control" placeholder="Single" disabled />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <label for="sex">Contact Number</label>
                      <input class="form-control" placeholder="09167757292" disabled />
                    </div>
                    <div class="col">
                      <label for="sex">Occupation</label>
                      <input class="form-control" placeholder="Student" disabled />
                    </div>
                    <div class="col">
                      <label for="sex">Email</label>
                      <input class="form-control" placeholder="johncorbintuason@gmail.com" disabled />
                    </div>
                    <div class="col">
                      <label for="sex">Nationality</label>
                      <input class="form-control" placeholder="Filipino" disabled />
                    </div>
                  </div>
                </div> -->
              </div>

              <div v-show="this.selected == 'new'"></div>
            </div>
          </div>
        </div>
      </div>
      <div class = "button-group">
      <button class = "btn btn-success" @click="step+=1" :class="{disabled: isNextDisabled }"> Next </button>
      <button @click="step-=1"> Previous </button>
      {{step}}
      </div>
      

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
      donation:{
        donor: null

      },
    };
  },
  props:{
    MBDName: String,
    Agency: Object,
    Date: Date
  },
  components: {
    "existing-donor": existingDonor
  },
  watch:{
    step:function(val){
      if(val < 3)
        this.isNextDisabled = true;
    }
  },

  methods: {
    onDonorChange(val) {
      this.donation.donor = val;
    },
    close() {
      this.$emit("close");
    }
  },

  mounted() {}
};
</script>

