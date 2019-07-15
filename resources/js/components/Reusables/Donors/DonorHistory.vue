<template>
  <b-modal id="donor-history" size="lg" scrollable hide-footer>
    <template slot="modal-title">{{donor.first_name}} {{donor.last_name}}</template>
    <div class="modal-body">
      <div class="row">
        <div class="col-md-12">
          <div class="row-title">Donor History</div>
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
                <td>{{question}} --- {{category.answers[index]}}</td>
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

      <div class="row">
        <div class="col-md-12">
          <div class="row-sub-category">III. Verdict</div>
          <div class="alert alert-info" role="alert">
            Donor will be marked as
            <div class="form-check form-check-inline">
              <input
                class="form-check-input"
                type="radio"
                v-model="donorHistoryForms.verdict"
                id="inlineRadio1"
                value="Pass"
              />
              <label class="form-check-label" for="inlineRadio1">Pass</label>
            </div>
            <div class="form-check form-check-inline">
              <input
                class="form-check-input"
                type="radio"
                v-model="donorHistoryForms.verdict"
                id="inlineRadio2"
                value="Fail"
              />
              <label class="form-check-label" for="inlineRadio2">Fail</label>
            </div>
          </div>
          <div class="form-group">
            <label for="remarks">Remarks:</label>
            <textarea class="form-control" v-model="donorHistoryForms.remarks" rows="5" id="remarks"></textarea>
          </div>
        </div>
      </div>
      <button type = "button" @click="populateDonorHistoryAnswers" class = "btn btn-success float-right"> Save </button>
    </div>

  </b-modal>
</template>

<script>
export default {
  data() {
    return {
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
            answers: [false, false, false, false, false, false, false, false, false]
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
        ],
        verdict: '',
        remarks: ''
      },
      donorHistoryAnswers:[]
    };
  },
  props: {
    donation: Object,
    donor: Object
  },
  methods: {
    populateDonorHistoryAnswers(){
      this.donorHistoryAnswers = [];
      this.donorHistoryForms.category.forEach((val, index)=>{
        val.answers.forEach((val,index)=>{
          this.donorHistoryAnswers.push(val);
        })
      });
      this.submitDonorHistory();  
    },
    submitDonorHistory(){
   
      console.log(this.donorHistoryAnswers);
      axios.post("/api/donation_donor_history", {
        donation_id: this.donation.id,
        answer_1: this.donorHistoryAnswers[0],
        answer_2: this.donorHistoryAnswers[1],
        answer_3: this.donorHistoryAnswers[2],
        answer_4: this.donorHistoryAnswers[3],
        answer_5: this.donorHistoryAnswers[4],
        answer_6: this.donorHistoryAnswers[5],
        answer_7: this.donorHistoryAnswers[6],
        answer_8: this.donorHistoryAnswers[7],
        answer_9: this.donorHistoryAnswers[8],
        answer_10: this.donorHistoryAnswers[9],
        answer_11: this.donorHistoryAnswers[10],
        answer_12: this.donorHistoryAnswers[11],
        answer_13: this.donorHistoryAnswers[12],
        answer_14: this.donorHistoryAnswers[13],
        answer_15: this.donorHistoryAnswers[14],
        answer_16: this.donorHistoryAnswers[15],
        answer_17: this.donorHistoryAnswers[16],
        answer_18: this.donorHistoryAnswers[17],
        answer_19: this.donorHistoryAnswers[18],
        answer_20: this.donorHistoryAnswers[19],
        answer_21: this.donorHistoryAnswers[20],
        answer_22: this.donorHistoryAnswers[21],
        answer_23: this.donorHistoryAnswers[22],
        answer_24: this.donorHistoryAnswers[23],
        answer_25: this.donorHistoryAnswers[24],
        answer_26: this.donorHistoryAnswers[25],
        verdict: this.donorHistoryForms.verdict,
        remarks: this.donorHistoryForms.remarks
      }).then(()=>{
        this.$Progress.start();
        this.$bvModal.hide('donor-history');
          toast.fire({
            type: "success",
            title: "Added Donation History to Donation ID " + this.donation.id 
          });
          this.$Progress.finish();
      })
    }

  },

  mounted() {}
};
</script>

