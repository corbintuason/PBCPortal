<template>

</template>

<script>

</script><template>
  <table v-if="data_fetched" class="table table-sm table-striped">
    <thead>
      <tr>
        <th></th>
        <th>WB</th>
        <th>PR</th>
        <th>PC</th>
        <th>FFP</th>
        <th>CRYOP</th>
        <th>CRYOS</th>
        <th>TOTAL</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>A-</td>
        <td>{{this.countWholeBlood("A", "-")}}</td>
        <td>{{this.countPR("A", "-")}}</td>
        <td>{{this.countPC("A", "-")}}</td>
        <td>{{this.countFFP("A", "-")}}</td>
        <td>{{this.countCRYOP("A", "-")}}</td>
        <td>{{this.countCRYOS("A", "-")}}</td>
        <td>{{this.countTotal("A", "-")}}</td>
      </tr>
      <tr>
        <td>A+</td>
        <td>{{this.countWholeBlood("A", "+")}}</td>
        <td>{{this.countPR("A", "+")}}</td>
        <td>{{this.countPC("A", "+")}}</td>
        <td>{{this.countFFP("A", "+")}}</td>
        <td>{{this.countCRYOP("A", "+")}}</td>
        <td>{{this.countCRYOS("A", "+")}}</td>
        <td>{{this.countTotal("A", "+")}}</td>
      </tr>
      <tr>
        <td>AB-</td>
        <td>{{this.countWholeBlood("AB", "-")}}</td>
        <td>{{this.countPR("AB", "-")}}</td>
        <td>{{this.countPC("AB", "-")}}</td>
        <td>{{this.countFFP("AB", "-")}}</td>
        <td>{{this.countCRYOP("AB", "-")}}</td>
        <td>{{this.countCRYOS("AB", "-")}}</td>
        <td>{{this.countTotal("AB", "-")}}</td>
      </tr>
      <tr>
        <td>AB+</td>
        <td>{{this.countWholeBlood("AB", "+")}}</td>
        <td>{{this.countPR("AB", "+")}}</td>
        <td>{{this.countPC("AB", "+")}}</td>
        <td>{{this.countFFP("AB", "+")}}</td>
        <td>{{this.countCRYOP("AB", "+")}}</td>
        <td>{{this.countCRYOS("AB", "+")}}</td>
        <td>{{this.countTotal("AB", "+")}}</td>
      </tr>
      <tr>
        <td>B-</td>
        <td>{{this.countWholeBlood("B", "-")}}</td>
        <td>{{this.countPR("B", "-")}}</td>
        <td>{{this.countPC("B", "-")}}</td>
        <td>{{this.countFFP("B", "-")}}</td>
        <td>{{this.countCRYOP("B", "-")}}</td>
        <td>{{this.countCRYOS("B", "-")}}</td>
        <td>{{this.countTotal("B", "-")}}</td>
      </tr>
      <tr>
        <td>B+</td>
        <td>{{this.countWholeBlood("B", "+")}}</td>
        <td>{{this.countPR("B", "+")}}</td>
        <td>{{this.countPC("B", "+")}}</td>
        <td>{{this.countFFP("B", "+")}}</td>
        <td>{{this.countCRYOP("B", "+")}}</td>
        <td>{{this.countCRYOS("B", "+")}}</td>
        <td>{{this.countTotal("B", "+")}}</td>
      </tr>
      <tr>
        <td>O-</td>
        <td>{{this.countWholeBlood("O", "-")}}</td>
        <td>{{this.countPR("O", "-")}}</td>
        <td>{{this.countPC("O", "-")}}</td>
        <td>{{this.countFFP("O", "-")}}</td>
        <td>{{this.countCRYOP("O", "-")}}</td>
        <td>{{this.countCRYOS("O", "-")}}</td>
        <td>{{this.countTotal("O", "-")}}</td>
      </tr>
      <tr>
        <td>O+</td>
        <td>{{this.countWholeBlood("O", "+")}}</td>
        <td>{{this.countPR("O", "+")}}</td>
        <td>{{this.countPC("O", "+")}}</td>
        <td>{{this.countFFP("O", "+")}}</td>
        <td>{{this.countCRYOP("O", "+")}}</td>
        <td>{{this.countCRYOS("O", "+")}}</td>
        <td>{{this.countTotal("O", "+")}}</td>
      </tr>
      <tr>
        <td>Total</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  data() {
    return {
      data_fetched: false,
      stock_units: []
    };
  },
  computed: {},
  methods: {
    loadPassedUnits() {
      return axios
        .get("/api/blood_unit", {
          params: {
            status: "Stock"
          }
        })
        .then(response => (this.stock_units = response.data.data))
        .then(() => {
          this.data_fetched = true;
        });
    },

    getTargetBloodType(ABO, rh_type){
      var $target_blood_type = this.stock_units.filter(
        value =>
          value.typed_blood_unit.ABO === ABO &&
          value.typed_blood_unit.rh_type === rh_type
      );
      return $target_blood_type;
    },

    countWholeBlood(ABO, rh_type) {
      var $target_blood_type = this.getTargetBloodType(ABO, rh_type);
      var $whole_blood_count = 0;
      $target_blood_type.forEach((val, index) => {
        if (val.processed_blood_unit.whole_blood != null) $whole_blood_count++;
      });
      return $whole_blood_count;
    },
    countPR(ABO, rh_type) {
      var $target_blood_type = this.getTargetBloodType(ABO, rh_type);
      var $pr_count = 0;
      $target_blood_type.forEach((val, index) => {
        if (val.processed_blood_unit.packed_rbc != null) $pr_count++;
      });
      return $pr_count;
    },
    countPC(ABO, rh_type) {
      var $target_blood_type = this.getTargetBloodType(ABO, rh_type);
      var $pc_count = 0;
      $target_blood_type.forEach((val, index) => {
        if (val.processed_blood_unit.platelet_concentrate != null) $pc_count++;
      });
      return $pc_count;
    },
    countPC(ABO, rh_type) {
      var $target_blood_type = this.getTargetBloodType(ABO, rh_type);
      var $pc_count = 0;
      $target_blood_type.forEach((val, index) => {
        if (val.processed_blood_unit.platelet_concentrate != null) $pc_count++;
      });
      return $pc_count;
    },
    countFFP(ABO, rh_type) {
      var $target_blood_type = this.getTargetBloodType(ABO, rh_type);
      var $ffp_count = 0;
      $target_blood_type.forEach((val, index) => {
        if (val.processed_blood_unit.ffp != null) $ffp_count++;
      });
      return $ffp_count;
    },
    countCRYOP(ABO, rh_type) {
      var $target_blood_type = this.getTargetBloodType(ABO, rh_type);
      var $cryop_count = 0;
      $target_blood_type.forEach((val, index) => {
        if (val.processed_blood_unit.cryoprecipitate != null) $cryop_count++;
      });
      return $cryop_count;
    },
    countCRYOS(ABO, rh_type) {
      var $target_blood_type = this.getTargetBloodType(ABO, rh_type);
      var $cryos_count = 0;
      $target_blood_type.forEach((val, index) => {
        if (val.processed_blood_unit.cryosupernate != null) $cryos_count++;
      });
      return $cryos_count;
    },
    
    countTotal(ABO, rh_type){
      
    },
    filterStocksByType(blood_type) {
      return this.stock_units.filter(blood_type);
    }
  },

  created() {
    this.loadPassedUnits();

    /* Load all Blood Units with Tested - Pass Status*/
  }
};
</script>

