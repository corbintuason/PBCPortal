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
              <form @submit.prevent="processBlood">
                <div class="card mt-3">
                  <div class="card-header">
                    <h3 class="card-title">Blood Processing</h3>
                  </div>
                  <div class="card-body">
                    <table class="table table-md table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Donation Code</th>
                          <th>Blood Type</th>
                          <th>Whole Blood</th>
                          <th>Packed RBC</th>
                          <th>Platelet Concentrate</th>
                          <th>Fresh Frozen Plasma</th>
                          <th>Cryoprecipitate</th>
                          <th>Cryosupernate</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- NVBSP20180000453-->
                         <tr v-for="(typed_blood_unit, index) in typed_blood_units" :key="index"> 
                          <td>{{typed_blood_unit.id}}</td>
                          <td>{{typed_blood_unit.donation_code}}</td>
                          <td>{{typed_blood_unit.blood_type}}</td>
                          <td>{{typed_blood_unit.quantity}}</td>
                          <td>
                              <div class="form-group" :class="{ 'form-group--error': typed_blood_unit.$error }">
                            <input
                              v-model="processing_blood_units[index].whole_blood"
                              type="text"
                              name="whole_blood"
                              class="form-control"
                              
                            >
                              </div>
                          </td>
                           <td>
                            <input
                              v-model="processing_blood_units[index].packed_rbc"
                              type="text"
                              name="packed_rbc"
                              class="form-control"
                            >
                          </td>
                          <td>
                            <input
                              v-model="processing_blood_units[index].platelet_concentrate"
                              type="text"
                              name="platelet_concentrate"
                              class="form-control"
                            >
                          </td>
                          <td>
                            <input
                              v-model="processing_blood_units[index].ffp"
                              type="text"
                              name="fresh_frozen_plasma"
                              class="form-control"
                            >
                          </td>
                          <td>
                            <input
                              v-model="processing_blood_units[index].cryoprecipitate"
                              type="text"
                              name="cryoprecipitate"
                              class="form-control"
                            >
                          </td>
                          <td>
                            <input
                              v-model="processing_blood_units[index].cryosupernate"
                              type="text"
                              name="cryosupernate"
                              class="form-control"
                            >
                          </td> 
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer">
                    <div class="card-tools">
                      <button type="submit" class="btn btn-success float-right">Process Blood Units</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { required, minLength, between } from 'vuelidate/lib/validators'

export default {
  
  data() {
    return {
      data_fetched: false,
      name: '',
      processing_blood_units:[],
      typed_blood_units:[
      ],
    };
  },
  validations:{
    typed_blood_units: {
      required,
      minLength: minLength(3),
      $each: {
        name: {
          required,
          minLength: minLength(2)
        }
      }
    },
  },
  methods: {
    /* 
    ~ [START] Page Load Methods ~
    All methods 
    */

    // Populate Typed Blood Units Array
    populateProcessingUnits() {
      this.typed_blood_units.forEach((val, index) => {
        this.processing_blood_units.push({
          donation_id: val.donation_id,
          id: val.id
        });
      });

      // Sets Data_Fetched to True
      this.data_fetched = true;
    },

    // Load Typed Blood Units from API to typed_blood_units array
    loadTypedUnits() {
      axios
        .get("/api/blood_unit", {
          params: {
            status: "Typed"
          }
        })
        .then(response => (this.typed_blood_units = response.data.data))
        .then(() => {
          this.populateProcessingUnits();
        });
    },

    /* 
    ~ [END] Page Load Methods ~
    */

    /*
    [START] Blood Processing Methods 
      SUMMARY:
      1. Process Array of Blood Units to Processing
      2. Update status of Blood Units to Processing
      3. Activate Toast to display that Processing of Blood is Finished
    */

    processBlood() {
      /* 1. Process Array of Blood Units to Processing */
      /* 
      MULTIPLE SMALL POST REQUEST
     */
      this.processing_blood_units
        .forEach((val, index) => {
          axios
            .post("/api/processed_blood_unit", {
              donation_id: val.donation_id,
              whole_blood: val.whole_blood,
              packed_rbc: val.packed_rbc,
              platelet_concentrate: val.platelet_concentrate,
              ffp: val.ffp,
              cryoprecipitate: val.cryoprecipitate,
              cryosupernate: val.cryosupernate
            })

            /* 2. Update status of Blood Units to Processing */
            .then(() => {
            this.updateToProcessed(val);
            }).catch( err =>{console.log(err);});
        });
         
          /* 3. Activate Toast to display that Processing of Blood is Finished */
          this.$Progress.start();
          toast.fire({
            type: "success",
            title: "Blood Unit Processed"
          });
          this.$Progress.finish();

    },
    // Updates Blood Unit to Processed
    updateToProcessed(unit) {
      axios.put("/api/blood_unit/" + unit.id, {
        status: "Processed"
      });
    },
    
    /* 
    ~ [END] Blood Processing Methods ~
  */
  },
  mounted() {
    this.loadTypedUnits();
    console.log("Component mounted.");
  }
};
</script>
