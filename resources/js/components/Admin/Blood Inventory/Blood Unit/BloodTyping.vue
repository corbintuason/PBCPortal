<template>
  <div>
    <!-- Dynamic Navbar -->
    <navbar></navbar>
    <!-- Actual Content-->
    <div class="content-wrapper">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <!-- <form @submit.prevent="typeBlood"> -->
              <div class="card mt-3">
                <div class="card-header">
                  <div class="card-title">Blood Typing</div>
                </div>
                <div class="card-body">
                  <table class="table table-md table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Donation Code</th>
                        <th>ABO</th>
                        <th>Rh Type</th>
                      </tr>
                    </thead>
                    <tbody v-if="typing_blood_units.length">
                      <!-- NVBSP20180000453-->
                      <tr
                        v-for="(donated_blood_unit, index) in donated_blood_units"
                        :key="index"
                      >
                        <td>{{index+1}}</td>
                        <td>{{donated_blood_unit.code}}</td>
                        <td>
                          <select class="custom-select" v-model="typing_blood_units[index].ABO">
                            <option disabled value>Please select one</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                          </select>
                        </td>
                        <td>
                          <select class="custom-select" v-model="typing_blood_units[index].rh_type">
                            <option disabled value>Please select one</option>
                            <option value="+">+</option>
                            <option value="-">-</option>
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
                      @click="typeBlood"
                      class="btn btn-success float-right"
                    >Update</button>
                  </div>
                </div>
              </div>
                
              <!-- </form> -->
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
      typing_blood_units: [],
      //  typing_blood_unit: new Form({

      // }),
      donated_blood_units: []
    };
  },
  methods: {
    populateUnits(index) {
       this.donated_blood_units.forEach((val, index)=>{
        this.typing_blood_units.push({
          id: val.id,
          donation_code: val.donation_code,
          ABO: null,
          rh_type: null,
        });
      })
    },
    loadRegisteredUnits() {
      axios
        .get("/api/blood_unit",{
          params: {
            status: "Registered"
          }
        })
        .then(response => (this.donated_blood_units = response.data.data))
        .then((response) => { console.log(response);
          this.populateUnits();
        });
    },
     typeBlood() {
      /* 1. Process Array of Blood Units to Processing */
      /* 
      MULTIPLE SMALL POST REQUEST
     */
      this.typing_blood_units
        .forEach((val, index) => {
          console.log(this.donated_blood_units[index].id);
          axios
            .post("/api/typed_blood_unit", {
              ABO: val.ABO,
              rh_type: val.rh_type,
              blood_unit_id: this.donated_blood_units[index].id
            })

            /* 2. Update status of Blood Units to Processing */
            .then(() => {
            this.updateToTyped(val);
            }).catch( err =>{console.log(err);});
        });
         
          /* 3. Activate Toast to display that Processing of Blood is Finished */
          this.$Progress.start();
          toast.fire({
            type: "success",
            title: "Blood Unit Typed"
          });
          this.$Progress.finish();
          this.loadRegisteredUnits();

    },
    // Updates Blood Unit to Processed
    updateToTyped(unit) {
      axios.put("/api/blood_unit/" + unit.id, {
        status: "Typed"
      });
    },
    
  },

  created() {
    this.loadRegisteredUnits();

    console.log("loaded");
  }
};
</script>
