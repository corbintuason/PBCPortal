<template>
  <div class="row mt-3">
    <div class="col-md-6">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Material</th>
            <th>Total # Requested</th>
            <th>Quantity Left</th>
          </tr>
        </thead>
        <tbody>
            <tr>
                <td> 1 </td>
                <td> Blood Bags </td>
                <td> {{selected_mbd_plan_schedule.total_blood_bags}} </td>
                <td> 0 </td>
            </tr>
            <tr>
                <td> 2 </td>
                <td> Barcodes </td>
                <td> {{selected_mbd_plan_schedule.total_barcodes}} </td>
                <td> 0 </td>
            </tr>
            <tr>
                <td> 3 </td>
                <td> Syringes </td>
                <td> {{selected_mbd_plan_schedule.total_syringes}} </td>
                <td> 0 </td>
            </tr>
            
          <!-- <tr v-for="(material, index) in selected_mbd_plan_schedule.material_list" :key="index">
            <td>{{index + 1}}</td>
            <td>{{material.material.name}}</td>
            <td>{{material.quantity}}</td>
            <td> </td>
          </tr> -->
        </tbody>
      </table>
    </div>
    <div class="col-md-6">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Material</th>
            <th>Quantity</th>
            <th> </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(add_material, index) in add_materials" :key="index">
            <td>{{index + 1}}</td>
            <td> {{add_material.name}}</td>
            <td>
              <input type="number" v-model="add_material.quantity" class="form-control" />
            </td>
            <td>
          </td>
          </tr>
        </tbody>
      </table>
      <button @click="addMaterials" class="float-right btn btn-success">Add Materials</button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      all_materials: [],
      add_materials: [
        {
        name: 'Blood Bags',
          material: null,
          quantity: null
        },{
            name: 'Syringes',
            material: null,
            quantity: null
        },
        {
            name: 'Barcodes',
            material: null,
            quantity: null
        }
      ]
    };
  },
  props: {
    selected_mbd_plan_schedule: Object,
    mbd: Object
  },
  methods: {
       removeMaterial(rowID) {
      this.add_schedules.splice(rowID, 1);
    },
    addMaterial(index) {
      var material = null;
      var quantity = null;
      this.add_materials.push({
        material: material,
        quantity: quantity
      });
    },
    loadAllMaterials() {
      axios.get("/api/material").then(response => {
        this.all_materials = response.data.data;
      });
    },
    addMaterials() {
      this.add_materials.forEach((val, index) => {
        console.log(val.material + " hi material");
        axios.post("/api/material_list", {
          mbd_schedule_id: this.selected_mbd_plan_schedule.id,
          material_id: val.material,
          quantity: val.quantity
        });
      });
      this.$Progress.start();
      toast.fire({
        type: "success",
        title: "Materials Added"
      });
      this.$Progress.finish();
      Fire.$emit("RenderMBD");
    }
  },
  mounted() {
    this.loadAllMaterials();
    Fire.$on("RenderAllMBDMaterials", () => {
      console.log("Materials Should Render");
      this.loadAllMaterials();
    });
  }
};
</script>
