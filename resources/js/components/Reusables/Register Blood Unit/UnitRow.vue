<template>
  <div>
      {{lines}}
    <div v-for="(line, index) in lines" v-bind:key="index" class="row">
      <div class="col-lg-6">
        <div class="row">
          <div class="col-2">
            <div class="index-number">{{index}}</div>
          </div>
          <div class="col-6">
            <input v-model="line.donation_id" type="text" name="donation_id" class="form-control">
          </div>
          <div class="col-1">
            <input v-model="line.quantity" type="radio" name="quantity" value="S" class="input-sm">
          </div>
          <div class="col-1">
            <input v-model="line.quantity" type="radio" name="quantity" value="D" class="input-sm">
          </div>
          <div class="col-1">
            <input v-model="line.quantity" type="radio" name="quantity" value="T" class="input-sm">
          </div>
          <div class="col-1">
            <input v-model="line.quantity" type="radio" name="quantity" value="Q" class="input-sm">
          </div>
        </div>
      </div>
      <button type = "button" class="fas fa-times-circle" v-on:click="removeLine(index)"></button>
      <button type="button" class="fas fa-times-circle" v-on:click="addLine()"></button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      lines: [],
      blockRemoval: true
    };
  },
  watch: {
    lines() {
      this.blockRemoval = this.lines.length <= 1;
    }
  },
  methods: {
    removeLine(lineID) {
      if (!this.blockRemoval) this.lines.splice(lineID, lineID);
    },
    addLine() {
      let checkEmptyLines = this.lines.filter(line => line.number === null);

      if (checkEmptyLines.length >= 1 && this.lines.length > 0) return;

      this.lines.push({
        donation_id: null
      });
    }
  },
  mounted() {
    this.addLine();
  }
};
</script>