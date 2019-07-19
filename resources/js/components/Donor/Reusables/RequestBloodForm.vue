<template>
  <b-modal id="request-blood-form" hide-footer>
    <template slot="modal-title">Add Donation</template>
    <div class="modal-body">
      <div class="row-title">Request Blood</div>
      <div class="row">
        <div class="col-md-12"></div>
      </div>
          <button class="btn btn-success float-right" @click="submitRequest">Submit Request</button>
    </div>


    <!-- If Donor does not have any donations -->
  </b-modal>
</template>

<script>
export default {
  data() {
    return {};
  },
  props: {},

  methods: {
    requestBlood() {}
  },

  mounted() {}
};
</script>

