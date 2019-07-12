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
              <div class="card mt-3">
                <div class="card-header">
                  <div class="card-title">Register Blood Unit</div>
                </div>
                <div class="card-body">
                  <table class="table table-md table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Donor ID</th>
                        <th>Donation ID</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>

                    <tbody>
                      <!-- NVBSP20180000453-->
                      <!-- <tr v-for="index in 10" :key="index"> -->
                      <tr
                        v-for="(registering_blood_unit, index) in registering_blood_units"
                        v-bind:key="index"
                      >
                        <th>{{index+1}}</th>
                        <th>
                          <div
                            class="form-group"
                          >
                            <input
                              class="form__input"
                              v-model.trim="registering_blood_unit.donor_id"
                            />
                          </div>
                          <i class="fas fa-search" data-target="#searchDonor"></i>
                          <!-- <div
                            class="error"
                            v-if="!registering_blood_unit.donor_id.required"
                          >Name is required.</div>
                          <div
                            class="error"
                            v-if="!registering_blood_unit.donor_id.minLength"
                          >MinLength.</div> -->
                        </th>
                        <th>
                          <input
                            v-model="registering_blood_unit.donation_id"
                            type="text"
                            name="donation_id"
                            class="form-control"
                          />
                        </th>
                        <th>
                          <select class="custom-select" v-model="registering_blood_unit.quantity">
                            <option disabled value>Please select one</option>
                            <option value="S">Single</option>
                            <option value="D">Double</option>
                            <option value="T">Triple</option>
                            <option value="Q">Quadruple</option>
                          </select>
                        </th>
                        <i @click="removeRow(index)" class="fa fa-trash red"></i>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer">
                  <div class="card-tools">
                    <button
                      type="button"
                      @click="registerBlood"
                      class="btn btn-success float-right"
                    >Register Units</button>
                    <button
                      type="button"
                      class="btn btn-warning float-right"
                      v-on:click="addRow()"
                    >Add Row</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- searchDonor Modal -->
  </div>
</template>

<script>
// import unitRow from "./reusables/Register Blood Unit/UnitRow.vue";
import { required, minLength, between } from "vuelidate/lib/validators";

export default {
  data() {
    return {
      registering_blood_units: [
         
      ],
      blockRemoval: true
    };
  },
  validations: {
    registering_blood_units: {
      $each: {
        donor_id: {
          required,
          minLength: minLength(3)
        }
      }
    }
  },
  watch: {
    registering_blood_units() {
      this.blockRemoval = this.registering_blood_units.length <= 1;
    }
  },
  methods: {
    /** Add Blood Unit */
    registerBlood() {
      /* 1. Insert Array of Blood Units to Blood Units Table */
      this.registering_blood_units.forEach((val, index) => {
        axios
          .post("/api/blood_unit", {
            donation_id: val.donation_id,
            status: "Registered",
            donor_id: val.donor_id,
            quantity: val.quantity
          })
          .then(() => {
            this.fireToast();
          });
      });
    },

    /** Toast Method */
    fireToast() {
      this.$Progress.start();
      toast.fire({
        type: "success",
        title: "Blood Unit Registered"
      });
      this.$Progress.finish();
    },

    /**
     * Methods for registering_blood_unit Manipulation
     */

    removeRow(rowID) {
      if (!this.blockRemoval) this.registering_blood_units.splice(rowID, rowID);
    },
    addRow() {
      let checkEmptyRow = this.registering_blood_units.filter(
        registering_blood_unit => registering_blood_unit.number === null
      );
      if (checkEmptyRow.length >= 1 && this.registering_blood_units.length > 0)
        return;

      this.registering_blood_units.push({
        donation_id: null,
        quantity: null
      });
    }
  },
  computed: {
    main() {
      return this.$route.path === "/bloodInventory/registerUnit";
    }
  },
  mounted() {
    console.log("Component mounted.");
    this.addRow();
  }
};
</script>
