<template>
  <div>
    <!-- Dynamic Navbar -->
    <navbar></navbar>
    <!-- Actual Content-->
    <div v-if="data_fetched" class="content-wrapper">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card mt-3">
                <div class="card-header">
                  <h3 class="card-title">Blood Testing</h3>
                </div>
                <div class="card-body">
                  <div class></div>
                  <table class="table table-md table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Donation Code</th>
                        <th>HbSag</th>
                        <th>HCV</th>
                        <th>HIV</th>
                        <th>MALARIA</th>
                        <th>SYPHILIS</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- NVBSP20180000453-->
                      <tr
                        v-for="(processed_blood_unit, index) in processed_blood_units"
                        :key="index"
                      >
                        <td>{{index}}</td>
                        <td>{{processed_blood_units[index].code}}</td>
                        <td>
                          <select class="custom-select" v-model="testing_blood_units[index].hbSag">
                            <option disabled value>Please select one</option>
                            <option value="+">Positive</option>
                            <option value="-">Negative</option>
                          </select>
                        </td>
                        <td>
                          <select class="custom-select" v-model="testing_blood_units[index].HCV">
                            <option disabled value>Please select one</option>
                            <option value="+">Positive</option>
                            <option value="-">Negative</option>
                          </select>
                        </td>
                        <td>
                          <select class="custom-select" v-model="testing_blood_units[index].HIV">
                            <option disabled value>Please select one</option>
                            <option value="+">Positive</option>
                            <option value="-">Negative</option>
                          </select>
                        </td>
                        <td>
                          <select
                            class="custom-select"
                            v-model="testing_blood_units[index].malaria"
                          >
                            <option disabled value>Please select one</option>
                            <option value="+">Positive</option>
                            <option value="-">Negative</option>
                          </select>
                        </td>
                        <td>
                          <select
                            class="custom-select"
                            v-model="testing_blood_units[index].syphilis"
                          >
                            <option disabled value>Please select one</option>
                            <option value="+">Positive</option>
                            <option value="-">Negative</option>
                          </select>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer">
                  <div class="card-tools">
                    <button
                      type="button"
                      @click="testBlood"
                      class="btn btn-success float-right"
                    >Update</button>
                    {{testing_blood_units}}
                  </div>
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
  data() {
    return {
      testing_blood_units: [],
      processed_blood_units: {},
      data_fetched: false
    };
  },

  methods: {
    /* 
    ~ [START] Page Load Methods ~
    All methods 
    */

    // Populate Testing Units Array
    populateTestingUnits() {
      this.processed_blood_units.forEach((val, index) => {
        this.testing_blood_units.push({
          id: val.id
        });
      });

      // Sets Data_Fetched to True
      this.data_fetched = true;
    },

    // Load Typed Blood Units from API to typed_blood_units array
    loadProcessedUnits() {
      axios
        .get("/api/blood_unit", {
          params: {
            status: "Processed"
          }
        })
        .then(response => (this.processed_blood_units = response.data.data))
        .then(() => {
          console.log(this.processed_blood_units);
          this.populateTestingUnits();
        });
    },

    /* 
    ~ [END] Page Load Methods ~
    */

    /*
    [START] Blood Processing Methods 
      SUMMARY:
      1. Process Array of Blood Units to Testing
      2. Update status of Blood Units to Testing
      3. Activate Toast to display that Testing of Blood is Finished
    */
    bloodUnitPass(unit) {
      console.log(unit.hbSag);
      var hbSag = unit.hbSag;
      var HCV = unit.HCV;
      var HIV = unit.HIV;
      var malaria = unit.malaria;
      var syphilis = unit.syphilis;

      if (hbSag && HCV && HIV && malaria && syphilis == "-") return true;
      else return false;
    },
    testBlood() {
      /* 1. Process Array of Blood Units to Processing */

      /* 
      ONE BIG SINGLE POST REQUEST      
      this.processing_blood_unit.post("/api/processed_blood_unit").then(() => {   
      */

      /* 
      MULTIPLE SMALL POST REQUEST
     */
      this.testing_blood_units.forEach((val, index) => {
        axios
          .post("/api/tested_blood_unit", {
            hbSag: val.hbSag,
            HCV: val.HCV,
            HIV: val.HIV,
            malaria: val.malaria,
            syphilis: val.syphilis,
            blood_unit_id: this.processed_blood_units[index].id
          })
          /* 2. Update status of Blood Units to Tested */
          .then(() => {
            var test_status;
            if (this.bloodUnitPass(val)) {
              test_status = "Stock";
              console.log("pass dapat" + val.donation_id);
              this.storeBloodUnit(val);
            } else {
              test_status = "Tested - Fail";
            }

            this.updateToTested(val, test_status);
          })
          .catch(err => {
            console.log(err);
          });
      });

      /* 3. Activate Toast to display that Processing of Blood is Finished */
      this.$Progress.start();
      toast.fire({
        type: "success",
        title: "Blood Unit Tested"
      });
      this.$Progress.finish();
    },
    // Updates Blood Unit to Processed
    updateToTested(unit, test_status) {
      console.log(test_status);
      axios.put("/api/blood_unit/" + unit.id, {
        status: test_status
      });
    },

    storeBloodUnit(unit) {
      axios.post("/api/blood_stock", {
        donation_id: unit.donation_id,
        hbSag: unit.hbSag,
        HCV: unit.HCV,
        HIV: unit.HIV,
        malaria: unit.malaria,
        syphilis: unit.syphilis
      });
    },

    /* 
    ~ [END] Blood Processing Methods ~
  */
  },

  mounted() {
    this.loadProcessedUnits();
    console.log("Component mounted.");
  }
};
</script>
