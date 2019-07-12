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
                        <th>Donation ID</th>
                        <th>ABO</th>
                        <th>Rh Type</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- NVBSP20180000453-->
                      <tr
                        v-for="(registered_blood_unit, index) in registered_blood_units"
                        :key="index"
                      >
                        <td>{{registered_blood_unit.id}}</td>
                        <td>{{registered_blood_unit.donation_id}}</td>
                        <td>
                          <select class="custom-select" v-model="typing_blood_unit[index].ABO">
                            <option disabled value>Please select one</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="O">O</option>
                          </select>
                        </td>
                        <td>
                          <select class="custom-select" v-model="typing_blood_unit[index].rh_type">
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
                      @click="completeTyping"
                      class="btn btn-success float-right"
                    >Update</button>
                  </div>
                </div>
              </div>
              {{typing_blood_unit}}
     
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
      typing_blood_unit: [],
      //  typing_blood_unit: new Form({

      // }),
      registered_blood_units: []
    };
  },
  methods: {
    populateUnits(index) {
      for (var i = 0; i < index; i++) {
        var matching_donation_id = this.registered_blood_units[i].donation_id;
        let matching_id = this.registered_blood_units.find(obj => obj.donation_id == matching_donation_id).id;       
        console.log(matching_donation_id);
        console.log(matching_id);
        this.typing_blood_unit.push({
          donation_id: matching_donation_id,
          id: matching_id,
          ABO: null,
          rh_type: null,
        });
      }
    },
    loadRegisteredUnits() {
      axios
        .get("/api/blood_unit",{
          params: {
            status: "Registered"
          }
        })
        .then(response => (this.registered_blood_units = response.data.data))
        .then(() => {
          this.populateUnits(this.registered_blood_units.length);
        });
    },
    completeTyping() {
      this.typing_blood_unit.forEach(this.typeBlood);
    },
    updateToTyping(item, index) {
      axios.put("/api/blood_unit/"+ item.id, {
        status: "Typed"
      });
    },
    typeBlood(item, index) {
      this.updateToTyping(item, index);
      axios
        .post("/api/typed_blood_unit", {
          donation_id: this.typing_blood_unit[index].donation_id,
          ABO: this.typing_blood_unit[index].ABO,
          rh_type: this.typing_blood_unit[index].rh_type
        })
        .then(() => {
          // this.typing_blood_unit.post("/api/typing_blood_unit").then(() => {

          this.$Progress.start();

          // Activate Toast
          toast.fire({
            type: "success",
            title: "Blood Unit Typed"
          });
          this.$Progress.finish();
        }).then(() => {this.loadRegisteredUnits()});
    }
  },

  created() {
    this.loadRegisteredUnits();

    console.log("loaded");
  }
};
</script>
