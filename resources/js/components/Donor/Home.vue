<template>
  <div>
    <!-- Dynamic Navbar -->
    <navbar></navbar>
    <!-- Actual Content-->

    <div class="content-wrapper">
      <div class="content">
        <div class="container-fluid">
          <div class="row mt-3">
            <div class="col-md-8">
              <div class = "card">
                <div class = "card-header">
                  <div class = "card-title">
                    Home Page!
                  </div>
                </div>
                <div class = "card-body">
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

  mounted() {
    console.log("Component mounted.");
  }
};
</script>
