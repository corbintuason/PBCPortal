<template>
  <div>
    <!-- Dynamic Navbar -->
    <navbar></navbar>
    <!-- Actual Content-->
    <div class="content-wrapper">
      <div class="content">
        <div class="container-fluid">
          <div class="row justify-content-center mt-3">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">Summary</div>
                </div>

                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <blood-stocks></blood-stocks>
                    </div>
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
import bloodstocks from "../Reusables/BloodStocks.vue";
export default {
  components: {
    "blood-stocks": bloodstocks
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
