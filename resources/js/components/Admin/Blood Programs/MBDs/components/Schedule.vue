<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="btn-group float-right" role="group">
          <button class = "btn btn-warning" v-for="(all_date, index) in all_dates" :key="index"> {{all_date}} </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
    };
  },
  props:{
      all_dates: Array,

  },
  created() {}
};
</script>