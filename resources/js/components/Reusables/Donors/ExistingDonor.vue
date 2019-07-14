<template>
  <div class="container">
    <div class="form-group">
      <div class="row">
        <div class="col">
          <label for="searchDonor">Search Donor</label>
          <input v-model="searchEntry" id="searchDonor" class="form-control" />
        </div>
        <div class="col">
          <label for="searchFilter">Select Filter</label>
          <select id="searchFilter" v-model="searchFilter" class="custom-select">
            <option
              v-for="filterOption in filterOptions"
              :key="filterOption.id"
              :value="filterOption.value"
            >{{filterOption.filter}}</option>
          </select>
        </div>
        <button id="searchBtn" @click="searchDonor" class="col btn btn-warning float-right">Search</button>
      </div>
      <br />
      <div v-if="searchResults_fetched">
        <div v-if="searchResults.length > 0">
          <div class="row-title">Search Results</div>
          <div class="row">
            <donors-table :shouldSelect='false' :donors="searchResults" @donor_change="onDonorChange"> </donors-table>
          </div>
        </div>
        <div v-else>
          <div class="row">
            <div class="row-sub-category">No Donors Found! </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import donorsTable from 'C:/xampp/htdocs/PBCPortal/resources/js/components/reusables/Donors/DonorsTable.vue';
export default {
  data() {
    return {
      searchEntry: "",
      searchFilter: "",
      searchResults: [],
      donor:{},
      searchResults_fetched: false,
      filterOptions: [
        {
          filter: "By Name",
          value: "name"
        },
        {
          filter: "By Donor ID",
          value: "donor_id"
        },
        {
          filter: "By Email",
          value: "email"
        }
      ]
    };
  },
  components:{
      "donors-table": donorsTable
  },

  methods: {
    onDonorChange(val){
      this.$emit('donor_change', val);
    },
    searchDonor() {
      var entry = this.searchEntry;
      var filter = this.searchFilter;

      if (filter == "name") {
        axios
          .get("/api/user")
          .then(response => (this.searchResults = response.data.data)).then(()=>{this.searchResults_fetched = true;});
      } else if (filter == "email") {
        axios
          .get("/api/user", {
            params: {
              email: this.searchEntry
            }
          })
          .then(response => (this.searchResults = response.data.data)).then(()=>{this.searchResults_fetched = true;});
      } else if (filter == "donor_id") {
        console.log("nagstart");
        axios
          .get("/api/user", {
            params: {
              donor_id: this.searchEntry
            }
          })
          .then(response => (this.searchResults = response.data.data)).then(()=>{this.searchResults_fetched = true;});
      }
      
    }
  },

  mounted() {}
};
</script>

