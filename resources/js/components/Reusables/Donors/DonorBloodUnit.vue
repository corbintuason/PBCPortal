<template>
  <b-modal id="donor-blood-unit" size="lg" scrollable hide-footer>
    <template slot="modal-title">{{donor.first_name}} {{donor.last_name}} </template>
    <div class="modal-body">
      <div class="row">
        <div class="col-md-12">
          <div class="row-title"> Register Blood Unit </div>
        </div>
      </div>
         <div class = "row-title"> Please enter Blood Unit Barcode </div>
            <label class="form-check-label" for="bloodUnitBarcode">Barcode</label>
             <input
                class="form-control"
                type="text"
                v-model="bloodUnitBarcode"
              />
      <div class="row">
        <div class = "col-md-12">
            
        </div>
      </div>
      <button type = "button" @click="registerBloodUnit" class = "btn btn-success float-right"> Register </button>
    </div>

  </b-modal>
</template>

<script>
export default {
  data() {
    return {
        bloodUnitBarcode: '',
    };
  },
  props: {
    donor: Object,
    donation: Object
  },
  methods: {
      registerBloodUnit(){
          axios.put("/api/donation/" + this.donation.id,{
              status: "Donated"
          }).then(()=>
          {
            this.$Progress.start();
            console.log(this.bloodUnitBarcode);
            axios.post("/api/blood_unit", {
            donation_id: this.donation.id,
            code: this.bloodUnitBarcode,
            status: "Registered"
          }).then(() => {
              toast.fire({
                type: "success",
                title: "Donation is now a Registered Blood Unit!"
            });
          }).then(() => {
               this.$Progress.finish();
               this.$bvModal.hide("donor-blood-unit ");
          })
        })
          
      },

      loadDonation(){
          
      }

  },

  mounted() {
      this.loadDonation();
  }
};
</script>

