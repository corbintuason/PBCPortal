<template>
  <b-modal id="add-donation" size="lg" hide-footer>
    <template slot="modal-title">Add Donation</template>
    <div class="modal-body">
      <div class="row-title">Register Donor</div>
      <div class="row-sub-category">Blood Program: {{MBDName}}</div>
      <div class="row-sub-category">Date: Now</div>
      <hr />
      <div class="row"></div>

      <!-- STEP 1: PERSONAL DETAILS -->
      <div v-show="step === 1" class="personalDetails">
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
                </div>-->
              </div>

              <div v-show="this.selected == 'new'"></div>
            </div>
          </div>
        </div>
      </div>
      <div v-show="step ===2" class="donorHistory">
        <div class="row">
          <div class="col-md-12">
            <div class="row-sub-category">II. Donor History</div>
            <table
              class="table table-hover table-sm table-striped"
              v-for="(category, index) in donorHistoryForms.category"
              :key="index"
            >
              <thead></thead>
              <tbody>
                <tr>
                  <th>{{category.title}}</th>
                  <th></th>
                </tr>
                <tr v-for="(question, index) in category.questions" :key="index">
                  <td>{{question}}</td>
                  <td>
                    <input
                      class="form-check-input"
                      type="checkbox"
                      v-model="category.answers[index]"
                      value="true"
                    />
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div v-show="step===3" class="verdict">
        <div class="row">
          <div class="col-md-12">
            <div class="row-sub-category">III. Verdict</div>
            <div class="alert alert-info" role="alert">
              Donor will be marked as
             <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Pass">
  <label class="form-check-label" for="inlineRadio1">Pass</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Fail">
  <label class="form-check-label" for="inlineRadio2">Fail</label>
</div>
            </div>
            <div class="form-group">
  <label for="remarks">Remarks:</label>
  <textarea class="form-control" rows="5" id="remarks"></textarea>
</div>
             
          </div>
        </div>
      </div>
      <div class="button-group float-right">
        <button v-if="step != 1" class="btn btn-warning" @click="step-=1">Previous</button>
        <button class="btn btn-success" @click="step+=1" :disabled="donation.donor == null">Next</button>
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
      donation: {
        donor: null
      },
      donorHistoryForms: {
        category: [
          {
            title: "Are you?",
            questions: [
              "Feeling healthy and well today?",
              "Currently taking medication?",
              "Have you ever had any vaccination?"
            ],
            answers: [false, false, false]
          },
          {
            title: "In the past 3 days",
            questions: [
              "Have you taken aspirin or anything that has aspirin in it?",
              "Have you been pregnant or are you pregnant now?"
            ],
            answers: [false, false]
          },
          {
            title: "In the past 12 weeks, have you",
            questions: ["Donated blood, platelets or plasma?"],
            answers: [false]
          },
          {
            title: "In the past 12 months, have you",
            questions: [
              "Had a blood transfusion",
              "Had surgical operation? Dental Operation?",
              "Had a tattoo, ear, or body piercing, accidental contact with blood, needle-stick injury and acupuncture",
              "Had sexual contact with high-risk individuals?",
              "Had sexual contact with a person who has worked abroad?",
              "Engaged in casual sex?",
              "Lived with a person who has hepatitis?",
              "Have you been imprisoned?",
              "Have any of your relatives had Creutzfeldt-Jacob (Mad Cow) disease?"
            ],
            answers: [false, false, false, false, false, false, false]
          },
          {
            title: "Have you ever",
            questions: [
              "Lived outside your place of residence?",
              "Lived outside the Philippines?",
              "Used needles to take drugs, steroids, or anything not prescribed by your doctor?",
              "Used clotting factor concentrates?",
              "Had a positive test for HIV, Hepatitis, Syphilis, or Malaria?",
              "Been told to have or treated for genital wart, syphilis, gonorrhea, or other Sexually Transmittable Infections?",
              "Had any type of cancer? For example, leukemia?",
              "Had any problems with your heart or lungs?",
              "Had a bleeding condition or a blood disease?",
              "Are you giving blood because you want to be tested for HIV or Hepatitis Virus?",
              "Are you aware that if you have HIV or Hepatitis, you can give it to someone else though you may feel well and have a negative HIV/Hepatitis test?"
            ],
            answers: [
              false,
              false,
              false,
              false,
              false,
              false,
              false,
              false,
              false,
              false,
              false
            ]
          }
        ]
      }
    };
  },
  props: {
    MBDName: String,
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

